<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        // Data game saat ini masih dummy di view.
        // Jika ingin mem-pass dari controller: return view('games.index', compact('games'));
        $games = $this->catalog();
        return view('games.index', compact('games'));
    }

    private function catalog(): array
    {
        $p = fn($path) => asset($path);

        return [
            // PS4
            'pes-2026-patch-monster' => [
                'title' => 'PES 2026 Patch Monster',
                'developer' => 'Konami (mod community)',
                'publisher' => 'Konami',
                'genres' => ['Sports', 'Football'],
                'storyline' => 'Patch mod yang menyegarkan musim terbaru dengan update liga, tim, kostum, dan stadion.',
                'release_year' => 2026,
                'age_rating' => 'E (Everyone)',
                'platforms' => ['PS4'],
                'modes' => ['Single-player', 'Local Multiplayer', 'Co-op'],
                'size_gb' => 45,
                'languages' => ['EN', 'ID'],
                'rating' => 4.4,
                'cover' => $p('images/games/pes2026patchmonster-cover.jpg'),
                'screenshots' => [
                    $p('images/games/pes2026patchmonster-1.jpg'),
                    $p('images/games/pes2026patchmonster-2.jpg'),
                ],
                'features' => [
                    'Update roster & kits musim terbaru',
                    'Peningkatan grafis dan stadion',
                    'Mode karier dan turnamen',
                ],
            ],
            'pes-2026-eleven' => [
                'title' => 'PES 2026 Eleven',
                'developer' => 'Konami',
                'publisher' => 'Konami',
                'genres' => ['Sports', 'Football'],
                'storyline' => 'Pengalaman sepak bola sinematik dengan gameplay lebih responsif.',
                'release_year' => 2026,
                'age_rating' => 'E (Everyone)',
                'platforms' => ['PS4'],
                'modes' => ['Single-player', 'Local Multiplayer', 'Online'],
                'size_gb' => 42,
                'languages' => ['EN', 'ID', 'JP'],
                'rating' => 4.2,
                'cover' => $p('images/games/pes2026eleven-cover.jpg'),
                'screenshots' => [
                    $p('images/games/pes2026eleven-1.jpg'),
                ],
                'features' => [
                    'Animasi gerak lebih halus',
                    'Mode online stabil',
                ],
            ],
            'street-fighter' => [
                'title' => 'Street Fighter',
                'developer' => 'Capcom',
                'publisher' => 'Capcom',
                'genres' => ['Fighting'],
                'storyline' => 'Pertarungan cepat antar petarung ikonik dengan mekanik kombo yang dalam.',
                'release_year' => 2023,
                'age_rating' => 'T (Teen)',
                'platforms' => ['PS4'],
                'modes' => ['Single-player', 'Versus', 'Online'],
                'size_gb' => 38,
                'languages' => ['EN', 'JP'],
                'rating' => 4.6,
                'cover' => $p('images/games/streetfighter-cover.jpg'),
                'screenshots' => [
                    $p('images/games/streetfighter-1.jpg'),
                    $p('images/games/streetfighter-2.jpg'),
                ],
                'features' => [
                    'Roster petarung beragam',
                    'Sistem kombo intuitif',
                ],
            ],
            'naruto-x-boruto' => [
                'title' => 'Naruto x Boruto',
                'developer' => 'Bandai Namco',
                'publisher' => 'Bandai Namco',
                'genres' => ['Action', 'Fighting'],
                'storyline' => 'Aksi shinobi cepat dengan jurus spektakuler lintas generasi.',
                'release_year' => 2022,
                'age_rating' => 'T (Teen)',
                'platforms' => ['PS4'],
                'modes' => ['Story', 'Versus', 'Online'],
                'size_gb' => 30,
                'languages' => ['EN', 'JP'],
                'rating' => 4.1,
                'cover' => $p('images/games/narutoxboruto-cover.jpg'),
                'screenshots' => [
                    $p('images/games/narutoxboruto-1.jpg'),
                ],
                'features' => [
                    'Mode cerita sinematik',
                    'Banyak jurus spesial',
                ],
            ],
            'injustice' => [
                'title' => 'Injustice',
                'developer' => 'NetherRealm',
                'publisher' => 'WB Games',
                'genres' => ['Fighting'],
                'storyline' => 'Pertarungan superhero DC dalam kisah alternatif yang gelap.',
                'release_year' => 2013,
                'age_rating' => 'T (Teen)',
                'platforms' => ['PS4'],
                'modes' => ['Story', 'Versus', 'Online'],
                'size_gb' => 25,
                'languages' => ['EN'],
                'rating' => 4.0,
                'cover' => $p('images/games/injustice1-cover.jpg'),
                'screenshots' => [
                    $p('images/games/injustice1-1.jpg'),
                ],
                'features' => [
                    'Cinematic story mode',
                    'Roster DC ikonik',
                ],
            ],
            'injustice-2' => [
                'title' => 'Injustice 2',
                'developer' => 'NetherRealm',
                'publisher' => 'WB Games',
                'genres' => ['Fighting'],
                'storyline' => 'Sekuel dengan sistem gear dan konten lebih kaya.',
                'release_year' => 2017,
                'age_rating' => 'T (Teen)',
                'platforms' => ['PS4'],
                'modes' => ['Story', 'Versus', 'Online'],
                'size_gb' => 36,
                'languages' => ['EN'],
                'rating' => 4.3,
                'cover' => $p('images/games/injustice2-cover.jpg'),
                'screenshots' => [
                    $p('images/games/injustice2-1.jpg'),
                ],
                'features' => [
                    'Sistem gear unik',
                    'Mode multiverse',
                ],
            ],

            // PS5
            'it-takes-two' => [
                'title' => 'It Takes Two',
                'developer' => 'Hazelight',
                'publisher' => 'EA',
                'genres' => ['Adventure', 'Co-op'],
                'storyline' => 'Petualangan ko-op kreatif dua karakter yang harus bekerja sama.',
                'release_year' => 2021,
                'age_rating' => 'T (Teen)',
                'platforms' => ['PS5'],
                'modes' => ['Local Co-op', 'Online Co-op'],
                'size_gb' => 43,
                'languages' => ['EN', 'ID (subtitle)'],
                'rating' => 4.8,
                'cover' => $p('images/games/ittakestwo-cover.jpg'),
                'screenshots' => [
                    $p('images/games/ittakestwo-1.jpg'),
                    $p('images/games/ittakestwo-2.jpg'),
                ],
                'features' => [
                    'Puzzle ko-op inovatif',
                    'Variasi gameplay tiap bab',
                ],
            ],
            'nba-2k25' => [
                'title' => 'NBA 2K25',
                'developer' => 'Visual Concepts',
                'publisher' => '2K',
                'genres' => ['Sports', 'Basketball'],
                'storyline' => 'Simulasi basket generasi terbaru dengan fisika realistis.',
                'release_year' => 2025,
                'age_rating' => 'E (Everyone)',
                'platforms' => ['PS5'],
                'modes' => ['MyCareer', 'MyTeam', 'Online'],
                'size_gb' => 90,
                'languages' => ['EN'],
                'rating' => 4.5,
                'cover' => $p('images/games/nba2k25-cover.jpg'),
                'screenshots' => [
                    $p('images/games/nba2k25-1.jpg'),
                ],
                'features' => [
                    'Mode MyCareer mendalam',
                    'Grafis next-gen',
                ],
            ],
            'overcooked' => [
                'title' => 'Overcooked!',
                'developer' => 'Ghost Town Games',
                'publisher' => 'Team17',
                'genres' => ['Party', 'Simulation'],
                'storyline' => 'Chaos dapur yang seru dan menantang untuk dimainkan bersama.',
                'release_year' => 2016,
                'age_rating' => 'E (Everyone)',
                'platforms' => ['PS5'],
                'modes' => ['Local Co-op', 'Versus'],
                'size_gb' => 6,
                'languages' => ['EN'],
                'rating' => 4.4,
                'cover' => $p('images/games/overcooked-cover.jpg'),
                'screenshots' => [
                    $p('images/games/overcooked-1.jpg'),
                ],
                'features' => [
                    'Ko-op super seru',
                    'Level desain kreatif',
                ],
            ],
            'gta5' => [
                'title' => 'GTA 5',
                'developer' => 'Rockstar North',
                'publisher' => 'Rockstar Games',
                'genres' => ['Action', 'Open World'],
                'storyline' => 'Kisah tiga protagonis dalam dunia terbuka Los Santos.',
                'release_year' => 2013,
                'age_rating' => 'M (Mature 17+)',
                'platforms' => ['PS5'],
                'modes' => ['Single-player', 'Online'],
                'size_gb' => 95,
                'languages' => ['EN'],
                'rating' => 4.7,
                'cover' => $p('images/games/gta5-cover.jpg'),
                'screenshots' => [
                    $p('images/games/gta5-1.jpg'),
                ],
                'features' => [
                    'Dunia terbuka luas',
                    'Konten online masif',
                ],
            ],
            'downhills' => [
                'title' => 'Downhills',
                'developer' => 'Indie Studio',
                'publisher' => 'Indie',
                'genres' => ['Racing'],
                'storyline' => 'Balapan sepeda menuruni bukit yang menegangkan.',
                'release_year' => 2024,
                'age_rating' => 'E (Everyone)',
                'platforms' => ['PS5'],
                'modes' => ['Single-player'],
                'size_gb' => 12,
                'languages' => ['EN'],
                'rating' => 3.9,
                'cover' => $p('images/games/downhills-cover.jpg'),
                'screenshots' => [
                    $p('images/games/downhills-1.jpg'),
                ],
                'features' => [
                    'Kontrol presisi',
                    'Lintasan bervariasi',
                ],
            ],
            'fc25' => [
                'title' => 'FC25',
                'developer' => 'EA',
                'publisher' => 'EA',
                'genres' => ['Sports', 'Football'],
                'storyline' => 'Pengalaman sepak bola modern dengan tempo cepat.',
                'release_year' => 2025,
                'age_rating' => 'E (Everyone)',
                'platforms' => ['PS5'],
                'modes' => ['Online', 'Career', 'Volta'],
                'size_gb' => 80,
                'languages' => ['EN'],
                'rating' => 4.3,
                'cover' => $p('images/games/fc25-cover.jpg'),
                'screenshots' => [
                    $p('images/games/fc25-1.jpg'),
                ],
                'features' => [
                    'Mesin fisika baru',
                    'Mode karier ditingkatkan',
                ],
            ],
            'street-fighter-6' => [
                'title' => 'Street Fighter 6',
                'developer' => 'Capcom',
                'publisher' => 'Capcom',
                'genres' => ['Fighting', 'Action'],
                'storyline' => 'Pertarungan cepat dengan Drive System baru, roster ikonik, dan online netcode modern untuk pengalaman kompetitif lintas mode.',
                'release_year' => 2023,
                'age_rating' => 'T (Teen)',
                'platforms' => ['PS4', 'PS5'],
                'modes' => ['Story', 'Versus', 'Online Ranked', 'Training'],
                'size_gb' => 50,
                'languages' => ['EN', 'JP', 'ID (subtitle)'],
                'rating' => 4.7,
                'cover' => $p('images/games/streetfighter6-cover.jpg'),
                'screenshots' => [
                    $p('images/games/streetfighter6-1.jpg'),
                    $p('images/games/streetfighter6-2.jpg'),
                    $p('images/games/streetfighter6-3.jpg'),
                ],
                'features' => [
                    'Drive System dengan variasi defensif dan ofensif',
                    'Rollback netcode untuk pengalaman online stabil',
                    'Mode single-player eksploratif dan latihan kombo mendalam',
                ],
            ],
        ];
    }

    public function show(string $slug)
    {
        $catalog = $this->catalog();

        if (!isset($catalog[$slug])) {
            $title = ucwords(str_replace('-', ' ', $slug));
            $catalog[$slug] = [
                'title' => $title,
                'developer' => 'Unknown',
                'publisher' => 'Unknown',
                'genres' => ['Action'],
                'storyline' => "Detail singkat untuk {$title}. Ganti dengan data dinamis bila tersedia.",
                'release_year' => date('Y'),
                'age_rating' => 'T (Teen)',
                'platforms' => ['PS4/PS5'],
                'modes' => ['Single-player'],
                'size_gb' => 20,
                'languages' => ['EN'],
                'rating' => 4.0,
                'cover' => asset('images/placeholder-640x360.jpg'),
                'screenshots' => [asset('images/placeholder-640x360.jpg')],
                'features' => ['Template fitur 1', 'Template fitur 2'],
            ];
        }
        $game = $catalog[$slug];

        if (view()->exists("games.$slug")) {
            return view("games.$slug", compact('game', 'slug'));
        }

        return view('games.show', compact('game', 'slug'));
    }
}
