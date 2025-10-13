<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        // Siapkan data untuk view
        $catalog = $this->catalog();
        
        // Pisahkan berdasarkan platform
        $ps4Games = [];
        $ps5Games = [];
        
        foreach ($catalog as $slug => $game) {
            $platforms = $game['platforms'] ?? [];
            
            // Konversi ke format array yang cocok dengan view
            $gameData = [
                'title' => $game['title'],
                'img' => $game['cover'],
                'genre' => is_array($game['genres']) ? implode(', ', $game['genres']) : $game['genres'],
                'desc' => $game['storyline'] ?? '',
                'developer' => $game['developer'] ?? '-',
                'year' => $game['release_year'] ?? '-',
                'age' => $game['age_rating'] ?? '-',
                'slug' => $slug,
            ];
            
            if (in_array('PS4', $platforms)) {
                $ps4Games[] = $gameData;
            }
            if (in_array('PS5', $platforms)) {
                $ps5Games[] = $gameData;
            }
        }
        
        return view('games.index', compact('ps4Games', 'ps5Games'));
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

    // ================= Admin stubs (sesuaikan nanti) =================
    public function adminIndex() 
    { 
        return response('Admin - daftar games', 200); 
    }
    
    public function create() 
    { 
        return response('Admin - form tambah game', 200); 
    }
    
    public function store(Request $request) 
    { 
        return response('Admin - simpan game (stub)', 201); 
    }
    
    public function edit($game) 
    { 
        return response("Admin - edit game {$game}", 200); 
    }
    
    public function update(Request $request, $game) 
    { 
        return response("Admin - update game {$game} (stub)", 200); 
    }
    
    public function destroy($game) 
    { 
        return response("Admin - hapus game {$game} (stub)", 200); 
    }

    // ================= Data statis contoh untuk demo =================
    private function catalog(): array
    {
        $p = fn($path) => asset($path);

        return [
            // PS4 Games
            'pes-2026-eleven' => [
                'title' => 'PES 2026 Eleven',
                'cover' => $p('images/pes2026eleven.jpg'),
                'genres' => ['Sports'],
                'platforms' => ['PS4', 'PS5'],
                'rating' => 4.2,
                'developer' => 'Konami',
                'publisher' => 'Konami',
                'release_year' => 2026,
                'age_rating' => 'E',
                'storyline' => 'Mode karier, turnamen lengkap, dan update musim terbaru.',
                'modes' => ['Single Player', 'Co-op', 'Online'],
                'size_gb' => 40,
                'languages' => ['EN', 'ID'],
                'features' => ['AI lebih pintar', 'Animasi gerakan baru', 'Stadion update'],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'pes-2026-patch-monster' => [
                'title' => 'PES 2026 Patch Monster',
                'cover' => $p('images/pes2026patchmonster.jpg'),
                'genres' => ['Sports'],
                'platforms' => ['PS4'],
                'rating' => 4.0,
                'developer' => 'Konami (mod)',
                'publisher' => 'Community',
                'release_year' => 2026,
                'age_rating' => 'E',
                'storyline' => 'Patch komunitas dengan update tim, kit, dan stadion.',
                'modes' => ['Single Player', 'Local Co-op'],
                'size_gb' => 35,
                'languages' => ['EN'],
                'features' => ['Kit lengkap', 'Nama tim resmi', 'Stadion baru'],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'street-fighter-6' => [
                'title' => 'Street Fighter 6',
                'cover' => $p('images/streetfighter.jpg'),
                'genres' => ['Fighting', 'Action'],
                'platforms' => ['PS4', 'PS5'],
                'rating' => 4.7,
                'developer' => 'Capcom',
                'publisher' => 'Capcom',
                'release_year' => 2023,
                'age_rating' => 'T',
                'storyline' => 'Pertarungan cepat dengan Drive System baru, roster ikonik, dan online netcode modern untuk pengalaman kompetitif lintas mode.',
                'modes' => ['Story', 'Versus', 'Online Ranked', 'Training'],
                'size_gb' => 50,
                'languages' => ['EN', 'JP', 'ID'],
                'features' => [
                    'Drive System dengan variasi defensif dan ofensif',
                    'Rollback netcode untuk pengalaman online stabil',
                    'Mode single-player eksploratif dan latihan kombo mendalam',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                    $p('images/placeholder-640x360.jpg'),
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'naruto-x-boruto' => [
                'title' => 'Naruto x Boruto',
                'cover' => $p('images/narutoxboruto.jpg'),
                'genres' => ['Action', 'Fighting'],
                'platforms' => ['PS4'],
                'rating' => 4.1,
                'developer' => 'Bandai Namco',
                'publisher' => 'Bandai Namco',
                'release_year' => 2022,
                'age_rating' => 'T',
                'storyline' => 'Aksi shinobi cepat dengan jurus spektakuler lintas generasi.',
                'modes' => ['Story', 'Versus', 'Online'],
                'size_gb' => 30,
                'languages' => ['EN', 'JP'],
                'features' => [
                    'Mode cerita sinematik',
                    'Banyak jurus spesial',
                    'Roster petarung beragam',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'injustice' => [
                'title' => 'Injustice',
                'cover' => $p('images/injustice 1.jpg'),
                'genres' => ['Fighting'],
                'platforms' => ['PS4'],
                'rating' => 4.0,
                'developer' => 'NetherRealm',
                'publisher' => 'WB Games',
                'release_year' => 2013,
                'age_rating' => 'T',
                'storyline' => 'Pertarungan superhero DC dalam kisah alternatif yang gelap.',
                'modes' => ['Story', 'Versus', 'Online'],
                'size_gb' => 25,
                'languages' => ['EN'],
                'features' => [
                    'Cinematic story mode',
                    'Roster DC ikonik',
                    'Pertarungan epik',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'injustice-2' => [
                'title' => 'Injustice 2',
                'cover' => $p('images/injustice 2.jpg'),
                'genres' => ['Fighting'],
                'platforms' => ['PS4'],
                'rating' => 4.3,
                'developer' => 'NetherRealm',
                'publisher' => 'WB Games',
                'release_year' => 2017,
                'age_rating' => 'T',
                'storyline' => 'Sekuel dengan sistem gear dan konten lebih kaya.',
                'modes' => ['Story', 'Versus', 'Online'],
                'size_gb' => 36,
                'languages' => ['EN'],
                'features' => [
                    'Sistem gear unik',
                    'Mode multiverse',
                    'Roster lebih banyak',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],

            // PS5 Games
            'it-takes-two' => [
                'title' => 'It Takes Two',
                'cover' => $p('images/ittakestwo.jpg'),
                'genres' => ['Adventure', 'Co-op'],
                'platforms' => ['PS5'],
                'rating' => 4.8,
                'developer' => 'Hazelight',
                'publisher' => 'EA',
                'release_year' => 2021,
                'age_rating' => 'T',
                'storyline' => 'Petualangan ko-op kreatif dua karakter yang harus bekerja sama.',
                'modes' => ['Local Co-op', 'Online Co-op'],
                'size_gb' => 43,
                'languages' => ['EN', 'ID'],
                'features' => [
                    'Puzzle ko-op inovatif',
                    'Variasi gameplay tiap bab',
                    'Cerita emosional',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'nba-2k25' => [
                'title' => 'NBA 2K25',
                'cover' => $p('images/NBA.jpg'),
                'genres' => ['Sports', 'Basketball'],
                'platforms' => ['PS5'],
                'rating' => 4.5,
                'developer' => 'Visual Concepts',
                'publisher' => '2K',
                'release_year' => 2025,
                'age_rating' => 'E',
                'storyline' => 'Simulasi basket generasi terbaru dengan fisika realistis.',
                'modes' => ['MyCareer', 'MyTeam', 'Online'],
                'size_gb' => 90,
                'languages' => ['EN'],
                'features' => [
                    'Mode MyCareer mendalam',
                    'Grafis next-gen',
                    'Fisika realistis',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'overcooked' => [
                'title' => 'Overcooked!',
                'cover' => $p('images/overcooked.jpg'),
                'genres' => ['Party', 'Simulation'],
                'platforms' => ['PS5'],
                'rating' => 4.4,
                'developer' => 'Ghost Town Games',
                'publisher' => 'Team17',
                'release_year' => 2016,
                'age_rating' => 'E',
                'storyline' => 'Chaos dapur yang seru dan menantang untuk dimainkan bersama.',
                'modes' => ['Local Co-op', 'Versus'],
                'size_gb' => 6,
                'languages' => ['EN'],
                'features' => [
                    'Ko-op super seru',
                    'Level desain kreatif',
                    'Party game terbaik',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'gta5' => [
                'title' => 'GTA 5',
                'cover' => $p('images/gta5.jpg'),
                'genres' => ['Action', 'Open World'],
                'platforms' => ['PS5'],
                'rating' => 4.7,
                'developer' => 'Rockstar North',
                'publisher' => 'Rockstar Games',
                'release_year' => 2013,
                'age_rating' => 'M',
                'storyline' => 'Kisah tiga protagonis dalam dunia terbuka Los Santos.',
                'modes' => ['Single-player', 'Online'],
                'size_gb' => 95,
                'languages' => ['EN'],
                'features' => [
                    'Dunia terbuka luas',
                    'Konten online masif',
                    'Kebebasan bermain tinggi',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'downhills' => [
                'title' => 'Downhills',
                'cover' => $p('images/downhills.jpg'),
                'genres' => ['Racing'],
                'platforms' => ['PS5'],
                'rating' => 3.9,
                'developer' => 'Indie Studio',
                'publisher' => 'Indie',
                'release_year' => 2024,
                'age_rating' => 'E',
                'storyline' => 'Balapan sepeda menuruni bukit yang menegangkan.',
                'modes' => ['Single-player'],
                'size_gb' => 12,
                'languages' => ['EN'],
                'features' => [
                    'Kontrol presisi',
                    'Lintasan bervariasi',
                    'Gameplay adiktif',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
            'fc25' => [
                'title' => 'FC25',
                'cover' => $p('images/fc25.jpg'),
                'genres' => ['Sports', 'Football'],
                'platforms' => ['PS5'],
                'rating' => 4.3,
                'developer' => 'EA',
                'publisher' => 'EA',
                'release_year' => 2025,
                'age_rating' => 'E',
                'storyline' => 'Pengalaman sepak bola modern dengan tempo cepat.',
                'modes' => ['Online', 'Career', 'Volta'],
                'size_gb' => 80,
                'languages' => ['EN'],
                'features' => [
                    'Mesin fisika baru',
                    'Mode karier ditingkatkan',
                    'Ultimate Team',
                ],
                'screenshots' => [
                    $p('images/placeholder-640x360.jpg'),
                ],
            ],
        ];
    }
}