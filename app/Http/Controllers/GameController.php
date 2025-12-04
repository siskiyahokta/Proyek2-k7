<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Games\StoreGameRequest;
use App\Http\Requests\Admin\Games\UpdateGameRequest;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{
    public function __construct(
        private readonly GameService $gameService
    ) {}

    /**
     * Halaman daftar game publik (PS4 dan PS5)
     */
    public function index(): View
    {
        try {
            $all = Game::orderBy('title')->get();

            $map = function (Game $g): array {
                return [
                    'title'     => $g->title,
                    'img'       => $g->cover
                        ? asset(ltrim(str_replace('public/', '', $g->cover), '/'))
                        : asset('images/placeholder-640x360.jpg'),
                    'genre'     => is_array($g->genres) && count($g->genres) ? $g->genres[0] : '-',
                    'desc'      => $g->storyline ?? '-',
                    'developer' => $g->developer ?? '-',
                    'year'      => $g->release_year ?? null,
                    'age'       => $g->age_rating ?? '-',
                    'slug'      => $g->slug,
                ];
            };

            $ps4Games = $all->filter(function (Game $g) {
                $platforms = is_array($g->platforms) ? $g->platforms : (json_decode($g->platforms ?? '[]', true) ?: []);
                return in_array('PS4', $platforms, true);
            })->map($map)->values();

            $ps5Games = $all->filter(function (Game $g) {
                $platforms = is_array($g->platforms) ? $g->platforms : (json_decode($g->platforms ?? '[]', true) ?: []);
                return in_array('PS5', $platforms, true);
            })->map($map)->values();

            return view('games.index', compact('ps4Games', 'ps5Games'));
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table'     => 'games',
                'exception' => $e,
            ]);
        }
    }

    /**
     * Detail satu game (publik)
     */
    public function show(Game $game): View
    {
        try {
            $gameData = [
                'title'        => $game->title,
                'developer'    => $game->developer,
                'publisher'    => $game->publisher,
                'genres'       => is_array($game->genres) ? $game->genres : [],
                'storyline'    => $game->storyline,
                'release_year' => $game->release_year,
                'age_rating'   => $game->age_rating,
                'platforms'    => is_array($game->platforms) ? $game->platforms : [],
                'modes'        => is_array($game->modes) ? $game->modes : [],
                'size_gb'      => $game->size_gb,
                'languages'    => is_array($game->languages) ? $game->languages : [],
                'rating'       => $game->rating,
                'cover'        => $game->cover
                    ? asset(ltrim(str_replace('public/', '', $game->cover), '/'))
                    : asset('images/placeholder-640x360.jpg'),
                'screenshots'  => is_array($game->screenshots)
                    ? array_map(
                        fn (string $path) => asset(ltrim(str_replace('public/', '', $path), '/')),
                        $game->screenshots
                    )
                    : [],
            ];

            return view('games.show', [
                'game' => $gameData,
                'slug' => $game->slug,
            ]);
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table'     => 'games',
                'exception' => $e,
            ]);
        }
    }

    // ====================== ADMIN ======================

    public function adminIndex(Request $request): View
    {
        $search = $request->get('search');
        $query  = Game::query()->orderByDesc('created_at');

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

    public function create(): View
    {
        $game = new Game();

        return view('admin.games.form', compact('game'));
    }

    public function store(StoreGameRequest $request): RedirectResponse
    {
        $this->gameService->create($request->validated());

        return redirect()
            ->route('admin.games.index')
            ->with('status', 'Game berhasil ditambahkan.');
    }

    public function edit(Game $game): View
    {
        return view('admin.games.form', compact('game'));
    }

    public function update(UpdateGameRequest $request, Game $game): RedirectResponse
    {
        $this->gameService->update($game, $request->validated());

        return redirect()
            ->route('admin.games.index')
            ->with('status', 'Game berhasil diperbarui.');
    }

    public function destroy(Game $game): RedirectResponse
    {
        $this->gameService->delete($game);

        return redirect()
            ->route('admin.games.index')
            ->with('status', 'Game berhasil dihapus.');
    }
}
