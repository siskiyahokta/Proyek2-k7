<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class GameController extends Controller
{
    /**
     * Halaman daftar game publik (PS4 dan PS5)
     */
    public function index()
    {
        try {
            $all = Game::orderBy('title')->get();

            $map = function ($g) {
                return [
                    'title' => $g->title,
                    'img' => $g->cover ? asset($g->cover) : asset('images/placeholder-640x360.jpg'),
                    'genre' => is_array($g->genres) && count($g->genres) ? $g->genres[0] : '-',
                    'desc' => $g->storyline ?? '-',
                    'developer' => $g->developer ?? '-',
                    'year' => $g->release_year ?? null,
                    'age' => $g->age_rating ?? '-',
                    'slug' => $g->slug,
                ];
            };

            $ps4Games = $all->filter(fn($g) => is_array($g->platforms) && in_array('PS4', $g->platforms))->map($map)->values();
            $ps5Games = $all->filter(fn($g) => is_array($g->platforms) && in_array('PS5', $g->platforms))->map($map)->values();

            return view('games.index', compact('ps4Games', 'ps5Games'));
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table' => 'games',
                'exception' => $e,
            ]);
        }
    }

    /**
     * Detail satu game (publik)
     */
    public function show(string $slug)
    {
        try {
            $g = Game::where('slug', $slug)->firstOrFail();

            $game = [
                'title' => $g->title,
                'developer' => $g->developer,
                'publisher' => $g->publisher,
                'genres' => is_array($g->genres) ? $g->genres : [],
                'storyline' => $g->storyline,
                'release_year' => $g->release_year,
                'age_rating' => $g->age_rating,
                'platforms' => is_array($g->platforms) ? $g->platforms : [],
                'modes' => is_array($g->modes) ? $g->modes : [],
                'size_gb' => $g->size_gb,
                'languages' => is_array($g->languages) ? $g->languages : [],
                'rating' => $g->rating,
                'cover' => $g->cover ? asset($g->cover) : asset('images/placeholder-640x360.jpg'),
                'screenshots' => $g->screenshots ? array_map('asset', json_decode($g->screenshots, true)) : [],
            ];

            return view('games.show', compact('game', 'slug'));
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table' => 'games',
                'exception' => $e,
            ]);
        }
    }

    // ====================== ADMIN ======================

    public function adminIndex(Request $request)
    {
        $search = $request->get('search');
        $query = Game::query()->orderByDesc('created_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('developer', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
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

        // Upload Cover
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $data['cover'] = '/storage/' . $path;
        }

        // Upload Screenshots
        if ($request->hasFile('screenshots')) {
            $screenshots = [];
            foreach ($request->file('screenshots') as $file) {
                $path = $file->store('screenshots', 'public');
                $screenshots[] = '/storage/' . $path;
            }
            $data['screenshots'] = json_encode($screenshots);
        }

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        Game::create($data);

        return redirect()->route('admin.games.index')->with('status', 'Game berhasil ditambahkan.');
    }

    public function edit(Game $game)
    {
        return view('admin.games.form', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $data = $this->validateGame($request);

        if ($request->hasFile('cover')) {
            if ($game->cover && file_exists(public_path($game->cover))) {
                @unlink(public_path($game->cover));
            }
            $path = $request->file('cover')->store('covers', 'public');
            $data['cover'] = '/storage/' . $path;
        }

        if ($request->hasFile('screenshots')) {
            if ($game->screenshots) {
                foreach (json_decode($game->screenshots, true) as $path) {
                    if (file_exists(public_path($path))) {
                        @unlink(public_path($path));
                    }
                }
            }
            $screenshots = [];
            foreach ($request->file('screenshots') as $file) {
                $path = $file->store('screenshots', 'public');
                $screenshots[] = '/storage/' . $path;
            }
            $data['screenshots'] = json_encode($screenshots);
        }

        $data['slug'] = $data['slug'] ?: $game->slug;
        $game->update($data);

        return redirect()->route('admin.games.index')->with('status', 'Game berhasil diperbarui.');
    }

    public function destroy(Game $game)
    {
        if ($game->cover && file_exists(public_path($game->cover))) {
            @unlink(public_path($game->cover));
        }

        if ($game->screenshots) {
            foreach (json_decode($game->screenshots, true) as $path) {
                if (file_exists(public_path($path))) {
                    @unlink(public_path($path));
                }
            }
        }

        $game->delete();
        return redirect()->route('admin.games.index')->with('status', 'Game berhasil dihapus.');
    }

    /**
     * Validasi form game + ubah input string jadi array json
     */
    private function validateGame(Request $request): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:games,slug,' . ($request->route('game')?->id ?? ''),
            'developer' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'genres' => 'nullable|string',
            'storyline' => 'nullable|string',
            'release_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 1),
            'age_rating' => 'nullable|string|max:50',
            'platforms' => 'nullable|string',
            'modes' => 'nullable|string',
            'size_gb' => 'nullable|integer|min:1|max:500',
            'languages' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:10',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'screenshots' => 'nullable|array|max:10',
            'screenshots.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        $validated = $request->validate($rules);

        foreach (['genres', 'platforms', 'modes', 'languages'] as $field) {
            if (!empty($validated[$field])) {
                $validated[$field] = json_encode(array_values(array_filter(array_map('trim', explode(',', $validated[$field])))));
            }
        }

        return $validated;
    }
}
