<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Database\QueryException;

class GameController extends Controller
{
    public function index()
    {
        try {
            $all = Game::orderBy('title', 'asc')->get();

            $map = fn($g) => [
                'title' => $g->title,
                'img' => $g->cover ?: asset('images/placeholder-640x360.jpg'),
                'genre' => is_array($g->genres) && count($g->genres) ? $g->genres[0] : '-',
                'desc' => $g->storyline ?? '-',
                'developer' => $g->developer ?? '-',
                'year' => $g->release_year ?? null,
                'age' => $g->age_rating ?? '-',
            ];

            $ps4Games = $all->filter(fn($g) => in_array('PS4', (array) $g->platforms, true))->map($map)->values()->all();
            $ps5Games = $all->filter(fn($g) => in_array('PS5', (array) $g->platforms, true))->map($map)->values()->all();

            return view('games.index', compact('ps4Games', 'ps5Games'));
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table' => 'games',
                'exception' => $e,
            ]);
        }
    }

    public function show(string $slug)
    {
        try {
            $g = Game::where('slug', $slug)->firstOrFail();

            $game = [
                'title' => $g->title,
                'developer' => $g->developer,
                'publisher' => $g->publisher,
                'genres' => (array) $g->genres,
                'storyline' => $g->storyline,
                'release_year' => $g->release_year,
                'age_rating' => $g->age_rating,
                'platforms' => (array) $g->platforms,
                'modes' => (array) $g->modes,
                'size_gb' => $g->size_gb,
                'languages' => (array) $g->languages,
                'rating' => $g->rating,
                'cover' => $g->cover ?: asset('images/placeholder-640x360.jpg'),
                'screenshots' => (array) $g->screenshots,
            ];
            $slug = $g->slug;

            if (view()->exists("games.$slug")) {
                return view("games.$slug", compact('game', 'slug'));
            }
            return view('games.show', compact('game', 'slug'));
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table' => 'games',
                'exception' => $e,
            ]);
        }
    }

    // -------- Admin CRUD (simple) --------

    public function adminIndex()
    {
        $search = request('search');
        $query = Game::orderBy('created_at', 'desc');
        
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('developer', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        }
        
        $games = $query->paginate(12);
        return view('admin.games.index', compact('games', 'search'));
    }

    public function create()
    {
        $game = new Game();
        return view('admin.games.form', compact('game'));
    }

    public function store(Request $request)
    {
        $data = $this->validateGame($request);
        $data['slug'] = $data['slug'] ?: str($data['title'])->slug();
        Game::create($data);
        return redirect()->route('admin.games.index')->with('status', 'Game ditambahkan.');
    }

    public function edit(Game $game)
    {
        return view('admin.games.form', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $data = $this->validateGame($request);
        if (empty($data['slug'])) $data['slug'] = $game->slug;
        $game->update($data);
        return redirect()->route('admin.games.index')->with('status', 'Game diperbarui.');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('admin.games.index')->with('status', 'Game dihapus.');
    }

    private function validateGame(Request $request): array
    {
        $v = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'developer' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'genres' => 'nullable',
            'storyline' => 'nullable|string',
            'release_year' => 'nullable|integer',
            'age_rating' => 'nullable|string|max:50',
            'platforms' => 'nullable',
            'modes' => 'nullable',
            'size_gb' => 'nullable|integer',
            'languages' => 'nullable',
            'rating' => 'nullable|numeric',
            'cover' => 'nullable|string|max:1024',
            'screenshots' => 'nullable',
        ]);

        foreach (['genres','platforms','modes','languages','screenshots'] as $key) {
            if (isset($v[$key]) && is_string($v[$key])) {
                $v[$key] = array_values(array_filter(array_map('trim', explode(',', $v[$key]))));
            }
        }
        return $v;
    }
}
