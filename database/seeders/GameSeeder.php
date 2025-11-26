<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Game; 

class GameSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('games')->truncate();

        $games = [
            [
                'id' => 4,
                'title' => 'It Takes Two',
                'slug' => 'it-takes-two',
                'developer' => 'Hazelight Studios',
                'publisher' => 'Electronic Arts (EA Originals)',
                'genres' => '["Action","Adevnture"]',
                'storyline' => 'It Takes Two mengikuti kisah sepasang suami istri, Cody dan May, yang sedang dalam proses perceraian hingga secara ajaib berubah menjadi boneka kecil akibat air mata putri mereka, Rose.
Untuk kembali ke tubuh asli mereka, keduanya harus bekerja sama melewati berbagai dunia fantasi penuh rintangan dan teka-teki kreatif. Dengan gameplay yang sepenuhnya berfokus pada kerja sama, game ini menawarkan pengalaman emosional, lucu, dan menantang yang hanya bisa diselesaikan bersama.',
                'release_year' => 2021,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Co-op Local"]',
                'size_gb' => 50,
                'languages' => '["Japan"]',
                'rating' => '9.1',
                'cover' => '/storage/covers/JrmTRIHuPCTtoOPfNo9ECdUTIrXYeI4q6HUEXT8J.jpg',
                'screenshots' => '["/storage/screenshots/aX9rbm8wihr8wKPqNaI84cg697hpP535FNZhHEs5.jpg"]',
                'created_at' => '2025-11-13 06:59:19',
                'updated_at' => '2025-11-13 06:59:19',
            ],
            [
                'id' => 7,
                'title' => 'Downhills',
                'slug' => 'downhills',
                'developer' => 'BluePeak Studios',
                'publisher' => 'Summit Interactive',
                'genres' => '["Racing","Sports","Adventure"]',
                'storyline' => 'Downhills adalah game balap sepeda gunung yang menantang,
di mana pemain harus melewati jalur ekstrem, menghindari rintangan,
dan mencapai garis akhir secepat mungkin. Dengan grafik realistis
dan fisika yang detail, game ini menghadirkan pengalaman downhill
yang intens dan memacu adrenalin.',
                'release_year' => 2024,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Single Player","MultiPlayer"]',
                'size_gb' => 12,
                'languages' => '["English","Indonesian"]',
                'rating' => '8.7',
                'cover' => '/storage/covers/X335CdBs7wysnSbHajfCTYqdoKKPVWCm4oL6cNfj.jpg',
                'screenshots' => '["/storage/screenshots/AQtw93KZczNnOzxIsCbzwKIjoo5LdpYI4d7DmDiC.jpg"]',
                'created_at' => '2025-11-13 07:40:39',
                'updated_at' => '2025-11-13 07:40:39',
            ],
            [
                'id' => 8,
                'title' => 'Overcooked 2',
                'slug' => 'overcooked-2',
                'developer' => 'Ghost Town Games',
                'publisher' => 'Team17',
                'genres' => '["Party","Simulation","Cooking"]',
                'storyline' => 'Overcooked! 2 adalah game memasak co-op yang kacau, lucu, dan penuh tantangan.
Pemain bekerja sama di dapur yang semakin tidak masuk akal — mulai dari dapur di udara, tambang, hingga restoran di dunia fantasi.
Tujuan pemain adalah memasak dan menyajikan pesanan secepat mungkin sebelum waktu habis.
Game ini mendukung multiplayer lokal dan online, membuatnya sangat cocok dimainkan bersama teman atau keluarga.
Dengan level-level kreatif, tantangan unik, dan resep yang beragam, Overcooked! 2 memberikan pengalaman seru, menegangkan, dan penuh tawa.',
                'release_year' => 2018,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Co-op","Multiplayer"]',
                'size_gb' => 36,
                'languages' => '["English","Indonesian"]',
                'rating' => '8.7',
                'cover' => '/storage/covers/znJEi1t0pV5ebj19DtIi1zsbYDvgkbgMXd1d9ADa.jpg',
                'screenshots' => '["/storage/screenshots/PuY3v8KMCflZDYkj1o1GVIVWhc7CrIfcfkN2lUJH.jpg"]',
                'created_at' => '2025-11-13 07:58:03',
                'updated_at' => '2025-11-13 08:13:23',
            ],
            [
                'id' => 9,
                'title' => 'PES 2026 Patch Monster',
                'slug' => 'pes-2026-patch-monster',
                'developer' => 'Konami (mod patch by Monster Team)',
                'publisher' => 'Konami',
                'genres' => '["Sports","Football","Simulation"]',
                'storyline' => 'PES 2026 Patch Monster adalah versi modifikasi terbaru dari Pro Evolution Soccer
yang menghadirkan update besar pada gameplay, grafis, dan database pemain.
Patch Monster dikenal dengan detail tinggi seperti wajah pemain realistis,
jersey terbaru musim 2025–2026, transfer lengkap, serta stadion HD yang diperbarui.
Gameplay lebih halus dengan peningkatan fisik bola, kontrol dribbling,
dan animasi tendangan yang lebih realistis. Mod ini juga menambahkan
tim nasional baru, klub promosi, mode turnamen lengkap, dan ratusan
wajah pemain yang diperbarui.
Sangat cocok untuk pemain yang ingin merasakan sensasi sepak bola modern
dengan performa yang stabil di PS4/PS5.',
                'release_year' => 2026,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Offline","Online Match","Exhibition","Master League","Co-op"]',
                'size_gb' => 45,
                'languages' => '["Inggris","Spanyol","Prancis","Jepang"]',
                'rating' => '9.2',
                'cover' => '/storage/covers/CVYivXeoEhIQujV61MbIfh6NO5JEjzIgtoZwc2gI.jpg',
                'screenshots' => '["/storage/screenshots/BXtvK00VAEBB8xv3FuOWXXYOqOMbxVBosuqPUTXC.jpg"]',
                'created_at' => '2025-11-13 08:08:50',
                'updated_at' => '2025-11-13 08:10:45',
            ],
            [
                'id' => 10,
                'title' => 'PES 2026 Patch Eleven',
                'slug' => 'pes-2026-patch-eleven',
                'developer' => 'Konami (mod patch by Eleven Studio)',
                'publisher' => 'Konami',
                'genres' => '["Sports","Football","Simulation"]',
                'storyline' => 'PES 2026 Patch Eleven adalah upgrade besar dari eFootball seri klasik yang telah
dimodifikasi oleh Eleven Studio. Patch ini menyajikan pengalaman sepak bola yang
lebih realistis berkat peningkatan grafis, update database pemain terbaru
musim 2025–2026, serta animasi baru yang membuat gameplay semakin halus.
Patch Eleven menambahkan ratusan wajah pemain (facepack HD),
tim nasional terbaru, update jersey resmi, stadion 4K, hingga sistem AI
yang lebih pintar dalam bertahan dan menyerang. Mode Career dan Exhibition
juga memiliki pembaruan menu serta animasi sinematik baru.
Patch ini sangat digemari karena stabil, ringan, dan memiliki tampilan
yang sangat modern dan bersih dibanding patch lainnya.',
                'release_year' => 2026,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Offline","Online Match","Exhibition","Career Mode","Co-op"]',
                'size_gb' => 43,
                'languages' => '["Inggris","Portugis","Spanyol","Jepang"]',
                'rating' => '9.0',
                'cover' => '/storage/covers/lQHd0l4L6FVTSzN3AuYlMuTwLmkf44bTlD6vAM33.jpg',
                'screenshots' => '["/storage/screenshots/t01HhuZzdEZZIscnvmpfiaLFXtgfe4cmQYsU75DL.jpg"]',
                'created_at' => '2025-11-13 18:14:48',
                'updated_at' => '2025-11-13 18:14:48',
            ],
            [
                'id' => 11,
                'title' => 'GTA V',
                'slug' => 'gta-v',
                'developer' => 'Rockstar North',
                'publisher' => 'Rockstar Games',
                'genres' => '["Action-Adventure","Open World"]',
                'storyline' => 'Grand Theft Auto V adalah game open-world populer yang mengikuti kisah tiga
karakter utama: Michael, Franklin, dan Trevor. Berlatar di kota fiksi Los Santos,
pemain bebas menjelajahi dunia yang luas, melakukan misi cerita, atau
menghabiskan waktu melakukan berbagai aktivitas sampingan.
GTA V menawarkan aksi tembak-menembak, perampokan berskala besar, balapan,
serta interaksi dengan dunia yang sangat hidup. Mode GTA Online memungkinkan
pemain bergabung bersama teman atau pemain lain dari seluruh dunia
untuk menjalankan misi, balapan, roleplay, dan berbagai event live.',
                'release_year' => 2013,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Singleplayer","Online Multiplayer","Story Mode","Free Roam"]',
                'size_gb' => 90,
                'languages' => '["Inggris","Spanyol","Portugis","Prancis"]',
                'rating' => '9.7',
                'cover' => '/storage/covers/3m8GGZuKJgZzD9xui0WjhqGnAf7h7W5iDBjQb6RA.jpg',
                'screenshots' => '["/storage/screenshots/yxil60YRKWZwdisOumsN9QcfeTpyknDmuCFfWKCq.jpg"]',
                'created_at' => '2025-11-13 18:17:23',
                'updated_at' => '2025-11-13 18:17:23',
            ],
            [
                'id' => 12,
                'title' => 'FC 25',
                'slug' => 'fc-25',
                'developer' => 'EA Sports',
                'publisher' => 'Electronic Arts (EA)',
                'genres' => '["Sports","Football","Simulation"]',
                'storyline' => 'EA SPORTS FC 25 merupakan kelanjutan dari franchise sepak bola terkenal EA,
menghadirkan gameplay yang semakin realistis dengan animasi HyperMotion V2,
fisik bola yang lebih hidup, dan kontrol dribbling yang lebih responsif.
Mode Career mendapatkan peningkatan besar seperti sistem manajemen taktik baru,
cutscene modern, serta perkembangan pemain yang lebih dinamis.
Ultimate Team hadir dengan Event Live mingguan, kartu evolusi pemain,
dan matchmatch yang lebih seimbang.
Dengan lisensi klub dan pemain resmi, FC 25 menawarkan pengalaman sepak bola
yang imersif — baik secara offline maupun online.',
                'release_year' => 2024,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single-player","Multiplayer","Online PvP"]',
                'size_gb' => 52,
                'languages' => '["Inggris","Spanyol","Portugis","Prancis"]',
                'rating' => '8.9',
                'cover' => '/storage/covers/CfDCbd2O1unBTonQP9Dip3TnVJGKXFjX0VKyKPky.jpg',
                'screenshots' => '["/storage/screenshots/ZX0eeCEsClpmmdrrUMupJjMrCxMaQuDwuCXk9lWk.jpg"]',
                'created_at' => '2025-11-13 18:19:25',
                'updated_at' => '2025-11-14 00:18:34',
            ],
            [
                'id' => 13,
                'title' => 'Injustice: Gods Among Us',
                'slug' => 'injustice-gods-among-us',
                'developer' => 'NetherRealm Studios',
                'publisher' => 'Warner Bros. Interactive Entertainment',
                'genres' => '["Fighting","Action"]',
                'storyline' => 'Injustice: Gods Among Us adalah game fighting yang mempertemukan para karakter
ikonik DC Universe seperti Superman, Batman, The Flash, Wonder Woman, dan Joker.
Cerita berfokus pada dunia alternatif di mana Superman menjadi diktator setelah
kehilangan Lois Lane, sementara Batman memimpin kelompok pemberontak yang menolak
tirani tersebut.
Gameplay menggunakan sistem pertarungan khas NetherRealm dengan combo cepat,
interaksi lingkungan, dan super move yang spektakuler. Game ini terkenal dengan
cerita sinematiknya yang kuat serta mode multiplayer kompetitif.',
                'release_year' => 2013,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Story Mode","Multiplayer","Local Versus","Online Versus","Training"]',
                'size_gb' => 22,
                'languages' => '["Inggris","Spanyol","Portugis"]',
                'rating' => '8.5',
                'cover' => '/storage/covers/RZRdfTFcmqH4xSTXRWqVBKxDrn0VX6AIXQAL1OPf.jpg',
                'screenshots' => '["/storage/screenshots/0vSY7NznbwfUP7hMlqNj500iw8zvD6bXO9sNcPVM.jpg"]',
                'created_at' => '2025-11-13 18:25:30',
                'updated_at' => '2025-11-13 18:25:30',
            ],
            [
                'id' => 14,
                'title' => 'Injustice 2',
                'slug' => 'injustice-2',
                'developer' => 'NetherRealm Studios',
                'publisher' => 'Warner Bros. Interactive Entertainment',
                'genres' => '["Fighting","Action"]',
                'storyline' => 'Injustice 2 melanjutkan cerita setelah kejadian di Injustice: Gods Among Us.
Batman dan para sekutunya berusaha membangun kembali dunia setelah rezim
Superman tumbang. Namun ancaman baru muncul dengan kedatangan Brainiac,
musuh kosmik yang ingin menghancurkan Bumi.
Game ini punya sistem pertarungan cepat, animasi halus, serta Gear System
yang membuat pemain dapat mengkustomisasi karakter seperti Batman, Superman,
Supergirl, Flash, dan lainnya. Mode Multiverse memberikan event harian
dan tantangan berbeda yang menjaga gameplay tetap segar.
Injustice 2 dikenal sebagai salah satu game fighting terbaik dengan cerita
epik dan super move yang spektakuler.',
                'release_year' => 2017,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Story Mode","Online Versus","Local Versus","AI Battle","Multiverse","Training"]',
                'size_gb' => 29,
                'languages' => '["Inggris","Spanyol","Portugis","Prancis"]',
                'rating' => '9.0',
                'cover' => '/storage/covers/vE8EErsYrBCquNKVamjFHPaNkSnJgBrZugbpZInU.jpg',
                'screenshots' => '["/storage/screenshots/8uT17AFMTSK0ee64AmWxMin9BHqZU2W8R4ziu0Ha.jpg"]',
                'created_at' => '2025-11-13 18:27:01',
                'updated_at' => '2025-11-13 18:27:01',
            ],
            [
                'id' => 15,
                'title' => 'Street Fighter 6',
                'slug' => 'street-fighter-6',
                'developer' => 'Capcom',
                'publisher' => 'Capcom',
                'genres' => '["Fighting","Action"]',
                'storyline' => 'Street Fighter 6 adalah game fighting generasi terbaru dari Capcom yang
menghadirkan grafis modern, animasi realistis, dan sistem pertarungan yang
lebih fleksibel. Game ini memiliki tiga mode utama: Fighting Ground untuk
pertarungan klasik, World Tour sebagai mode cerita open-world, dan Battle Hub
yang menjadi pusat komunitas online.
Dengan roster petarung ikonik seperti Ryu, Ken, Chun-Li, Juri, Blanka, dan
karakter baru seperti Luke serta Jamie, Street Fighter 6 menawarkan pengalaman
bertempur yang cepat, responsif, dan penuh teknik.
Sistem Drive Gauge membuat gameplay lebih strategis, memungkinkan pemain
melakukan parry, rush attack, dan counter dengan waktu yang tepat.',
                'release_year' => 2023,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["Story Mode","Fighting Ground","World Tour","Online Versus","Training"]',
                'size_gb' => 60,
                'languages' => '["Inggris","Jepang","Spanyol","Prancis","Korea"]',
                'rating' => '9.3',
                'cover' => '/storage/covers/duzNbiIqUCnAt3IHCy1RyztfKPjgn1XlHeabCkLW.jpg',
                'screenshots' => '["/storage/screenshots/vzmTHgRW6uLM8uv6xtNnoVjZTpZNcglb3x4EhwOt.jpg"]',
                'created_at' => '2025-11-13 18:28:55',
                'updated_at' => '2025-11-13 18:28:55',
            ],
            [
                'id' => 16,
                'title' => 'NBA 2K25',
                'slug' => 'nba-2k25',
                'developer' => 'Visual Concepts',
                'publisher' => '2K Sports',
                'genres' => '["Sports","Basketball","Simulation"]',
                'storyline' => 'NBA 2K25 menghadirkan pengalaman basket paling realistis dengan peningkatan
grafis next-gen, animasi pemain yang lebih halus, serta mekanik shooting yang
lebih akurat. Mode MyCareer memperkenalkan cerita baru dengan perjalanan pemain
dari rookie menuju superstar NBA.
MyTeam hadir dengan sistem kartu terbaru, event mingguan, dan tantangan online.
Untuk pemain PS5, game ini juga menawarkan fitur ProPLAY+ yang membuat gerakan
atlet lebih autentik berdasarkan rekaman pertandingan asli.
NBA 2K25 menjadi pilihan utama bagi penggemar basket yang ingin merasakan
simulasi NBA yang lengkap, kompetitif, dan penuh update live.',
                'release_year' => 2024,
                'age_rating' => NULL,
                'platforms' => '["PS4"]',
                'modes' => '["MyCareer","MyTeam","Play Now","MyGM","MyLeague","Online Match"]',
                'size_gb' => 110,
                'languages' => '["Inggris","Spanyol","Portugis","Prancis"]',
                'rating' => '8.7',
                'cover' => '/storage/covers/TT5SNNWpndZHOlUGJqOshG44uvj4so5OYu0qGJFB.jpg',
                'screenshots' => '["/storage/screenshots/QQmWxr9Y2upKleUy60spRX7A85NhZNfsTxjyBFWh.jpg"]',
                'created_at' => '2025-11-13 18:30:54',
                'updated_at' => '2025-11-13 18:30:54',
            ],
            [
                'id' => 17,
                'title' => 'PES 2021 Season Update',
                'slug' => 'pes-2021-season-update',
                'developer' => 'Konami',
                'publisher' => 'Konami Digital Entertainment',
                'genres' => '["Sports","Football","Simulation"]',
                'storyline' => 'eFootball PES 2021 Season Update adalah versi pembaruan dari PES 2020 yang
menghadirkan update pemain, kit, dan transfer terbaru musim 2020–2021.
Walaupun bukan game baru sepenuhnya, PES 2021 menawarkan gameplay yang halus
dan realistik, terutama pada kontrol bola dan gerakan pemain.
Mode Master League tetap menjadi favorit dengan cerita manajemen klub yang
mendalam. MyClub memungkinkan pemain membangun tim impian dan bersaing secara
online. Dengan lisensi eksklusif klub seperti Barcelona, Juventus, Manchester
United, dan Bayern Munich, PES 2021 tetap menjadi salah satu game sepak bola
terbaik dan paling populer di rental.',
                'release_year' => 2020,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Master League","Become A Legend","MyClub","Exhibition","Online Match"]',
                'size_gb' => 42,
                'languages' => '["Inggris","Jepang","Spanyol","Portugis","Prancis"]',
                'rating' => '8.4',
                'cover' => '/storage/covers/1ZG3vaLNCWIb9dXaO53f7NsJ4j3Z39t250ChbzrK.jpg',
                'screenshots' => '["/storage/screenshots/9kjVDwVLKwHgrqbrMN5YWtlQ2tQg06LMes8XhamD.jpg"]',
                'created_at' => '2025-11-13 18:34:07',
                'updated_at' => '2025-11-13 18:34:07',
            ],
            [
                'id' => 18,
                'title' => 'EA Sports UFC 5',
                'slug' => 'ea-sports-ufc-5',
                'developer' => 'EA Vancouver',
                'publisher' => 'Electronic Arts',
                'genres' => '["Sports","Fighting","Mixed Martial Arts"]',
                'storyline' => 'EA Sports UFC 5 menghadirkan pengalaman pertarungan MMA paling realistis dengan Frostbite Engine yang baru, memberikan visual sinematik dan detail yang sangat presisi. Game ini menyertakan sistem damage real-time, animasi gerakan yang lebih halus, serta mode Karier yang lebih mendalam. Pemain dapat bertarung melawan petarung UFC terkenal atau membangun karakter sendiri untuk mencapai gelar juara dunia.',
                'release_year' => 2023,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single-player","Multiplayer","Online PvP"]',
                'size_gb' => 45,
                'languages' => '["English","Spanish","French","German","Italian","Portuguese"]',
                'rating' => '8.5',
                'cover' => '/storage/covers/v6cfEenGSXAtV3bWBiXgFAqqLf8zY3UI8Xcr6NYj.jpg',
                'screenshots' => '["/storage/screenshots/3Wikzus66pltg4ixpjukZpBgeCwzR0dAIhFoz1d3.jpg"]',
                'created_at' => '2025-11-13 18:39:43',
                'updated_at' => '2025-11-13 18:39:43',
            ],
            [
                'id' => 20,
                'title' => 'Mortal Kombat 11',
                'slug' => 'mortal-kombat-11',
                'developer' => 'NetherRealm Studios',
                'publisher' => 'Warner Bros. Interactive Entertainment',
                'genres' => '["Fighting","Action","PvP"]',
                'storyline' => 'Mortal Kombat 11 menghadirkan kisah epik yang mengikuti perjalanan Raiden dan para pahlawan Earthrealm melawan Kronika, penjaga waktu yang ingin mengulang sejarah demi menghapus keberadaan Raiden. Game ini menawarkan pertarungan brutal dengan sistem Fatal Blows, Custom Variations, serta grafis sinematik yang sangat detail. Pemain dapat menjelajahi mode cerita, Towers of Time, dan bertarung melawan pemain lain secara online maupun lokal.',
                'release_year' => 2019,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single-player","Multiplayer","Online PvP","Local Multiplayer","Story Mode"]',
                'size_gb' => 40,
                'languages' => '["English","Spanish","French","German","Italian","Portuguese","Russian","Japanese"]',
                'rating' => '9.0',
                'cover' => '/storage/covers/mdTX1O0XSJftJpziJOdRpApHIcTYaPVvNhll5p3J.jpg',
                'screenshots' => '["/storage/screenshots/Cd6I2WNmY22Zvq48QaTt5r7yafVbqDg9hxiH1I1F.jpg"]',
                'created_at' => '2025-11-13 18:42:45',
                'updated_at' => '2025-11-13 18:42:45',
            ],
            [
                'id' => 21,
                'title' => 'EA Sports FC 25 Online',
                'slug' => 'ea-fc25-online',
                'developer' => 'EA Vancouver',
                'publisher' => 'Electronic Arts',
                'genres' => '["Sports","Football","Simulation"]',
                'storyline' => 'EA Sports FC 25 Online menghadirkan pengalaman sepak bola kompetitif dengan peningkatan pada gameplay berbasis fisik, animasi lebih realistis, serta sistem passing dan dribbling yang diperbarui. Mode online seperti Ultimate Team, Seasons, dan Volta memberikan pemain kesempatan bersaing dengan orang lain secara global. Dengan update konten rutin, pemain dapat membangun skuad impian, mengikuti event musiman, dan berpartisipasi dalam pertandingan peringkat untuk mencapai divisi tertinggi.',
                'release_year' => 2024,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single-player","Multiplayer","Online PvP"]',
                'size_gb' => 45,
                'languages' => '["English","Indonesian"]',
                'rating' => '8.2',
                'cover' => '/storage/covers/7nTeKvnigYl11eUligTd0Fk04YQrIosR23ed9c6O.jpg',
                'screenshots' => '["/storage/screenshots/SQtZxymlJYkE1rsIXzV2kZO3vqWgQWD0UrQXea3z.jpg"]',
                'created_at' => '2025-11-13 18:47:07',
                'updated_at' => '2025-11-13 19:32:59',
            ],
            [
                'id' => 22,
                'title' => 'It Takes Two',
                'slug' => 'it-takes-two2',
                'developer' => 'Hazelight Studios',
                'publisher' => 'Electronic Arts',
                'genres' => '["Action","Adevnture"]',
                'storyline' => 'It Takes Two adalah game petualangan co-op yang menceritakan pasangan suami istri, Cody dan May, yang berubah menjadi boneka dan harus bekerja sama untuk kembali ke tubuh asli mereka. Setiap level menghadirkan mekanik unik, puzzle kreatif, dan gameplay kerja sama yang intens. Game ini dirancang sepenuhnya untuk dua pemain, memberikan pengalaman emosional, lucu, dan penuh kejutan yang menekankan pentingnya komunikasi dan kerja sama.',
                'release_year' => 2021,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single Player","MultiPlayer"]',
                'size_gb' => 25,
                'languages' => '["English","Indonesian"]',
                'rating' => '9.5',
                'cover' => '/storage/covers/6hKGh68kfLo0kVuRZzniDmbOCZmtaso63DwP6O6O.jpg',
                'screenshots' => '["/storage/screenshots/Mis0h66KOVX3WJNBdnd9hptxAqoQxydVh0CSS3fj.jpg"]',
                'created_at' => '2025-11-13 18:51:34',
                'updated_at' => '2025-11-13 19:17:03',
            ],
            [
                'id' => 23,
                'title' => 'Ghost of Tsushima',
                'slug' => 'ghost-of-tsushima',
                'developer' => 'Sucker Punch Productions',
                'publisher' => 'Sony Interactive Entertainment',
                'genres' => '["Action-adventure","Open World","Samurai","Stealth"]',
                'storyline' => 'Ghost of Tsushima mengikuti perjalanan Jin Sakai, seorang samurai terakhir dari klannya yang berusaha mempertahankan pulau Tsushima dari invasi Mongol. Ketika metode samurai tradisional tidak lagi cukup, Jin harus mengadopsi taktik baru sebagai “Ghost”, menggunakan stealth, taktik gerilya, dan kemampuan tempur yang mematikan. Game ini menampilkan open-world yang indah, mekanik pertarungan katana yang memuaskan, dan narasi emosional tentang kehormatan, pengorbanan, dan identitas.',
                'release_year' => 2020,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single-player","Co-op Online (Legends Mode)"]',
                'size_gb' => 60,
                'languages' => '["nglish","Japanese","Spanish","French","German","Italian","Portuguese"]',
                'rating' => '9.3',
                'cover' => '/storage/covers/GYp7KLX2QkkvjYm9r7mKZah0eeRBxGASj0wmTh04.jpg',
                'screenshots' => '["/storage/screenshots/AyjYd8afu9e7swBltg9tW5iWyZjrd56z6RWOsvuB.jpg"]',
                'created_at' => '2025-11-13 18:53:21',
                'updated_at' => '2025-11-13 18:53:21',
            ],
            [
                'id' => 24,
                'title' => 'Roblox',
                'slug' => 'roblox',
                'developer' => 'Roblox Corporation',
                'publisher' => 'Roblox Corporation',
                'genres' => '["Action","Adevnture"]',
                'storyline' => 'Roblox adalah platform game online tempat pemain dapat membuat, berbagi, dan memainkan jutaan game buatan komunitas. Dengan berbagai genre mulai dari roleplay, adventure, racing, horror, hingga shooter, Roblox menawarkan pengalaman tanpa batas yang selalu berkembang. Pemain dapat membuat avatar sendiri, bermain bersama teman, dan memanfaatkan sistem ekonomi Robux untuk membeli item dalam game.',
                'release_year' => 2023,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single Player","MultiPlayer"]',
                'size_gb' => 5,
                'languages' => '["English","Indonesian"]',
                'rating' => '8.8',
                'cover' => '/storage/covers/NWCwng1IwzVZWiwolSklVYlESZj8Mnu8AfGMxscD.jpg',
                'screenshots' => '["/storage/screenshots/v0RYlI5dQm7gKWpvHQ88Q2pQPEYkK81VG0Tx4hoX.jpg"]',
                'created_at' => '2025-11-13 18:55:24',
                'updated_at' => '2025-11-13 19:21:01',
            ],
            [
                'id' => 25,
                'title' => 'Gran Turismo',
                'slug' => 'gran-turismo',
                'developer' => 'Polyphony Digital',
                'publisher' => 'Sony Interactive Entertainment',
                'genres' => '["Racing","Sports","Adventure"]',
                'storyline' => 'Gran Turismo adalah simulator balap realistis yang menampilkan ratusan mobil dari berbagai pabrikan dunia, trek balap ikonik, serta fisik kendaraan yang sangat detail. Pemain dapat mengikuti career mode, mengoleksi mobil, melakukan tuning, atau bersaing secara online. Game ini terkenal dengan grafis sinematik, handling realistis, dan dukungan mode kompetitif resmi seperti FIA Gran Turismo Championships.',
                'release_year' => 2022,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single Player","MultiPlayer"]',
                'size_gb' => 110,
                'languages' => '["English","Indonesian"]',
                'rating' => '9.0',
                'cover' => '/storage/covers/d21i1RALC7lRa28JrNmWAQnZde0jM5244B38qthO.jpg',
                'screenshots' => '["/storage/screenshots/vxPjYLehNxM4AqJdbmFYADB6hPI2SbL83LMwBsaX.jpg"]',
                'created_at' => '2025-11-13 18:57:39',
                'updated_at' => '2025-11-13 19:18:52',
            ],
            [
                'id' => 26,
                'title' => 'Spider-Man Miles Morales',
                'slug' => 'spiderman-mm',
                'developer' => 'Insomniac Games',
                'publisher' => 'Sony Interactive Entertainment',
                'genres' => '["Action","Adeventure"]',
                'storyline' => 'Marvel’s Spider-Man: Miles Morales mengikuti perjalanan Miles yang belajar menjadi Spider-Man setelah Peter Parker mempercayakan kota padanya. Saat perang antara perusahaan energi Roxxon dan kelompok kriminal Tinkerer mengancam New York, Miles harus menguasai kemampuan uniknya seperti Venom Strike dan camouflage. Dunia open-world yang indah, aksi cepat, dan cerita emosional menjadikan game ini salah satu pengalaman superhero terbaik di PlayStation.',
                'release_year' => 2020,
                'age_rating' => NULL,
                'platforms' => '["PS5"]',
                'modes' => '["Single-player","Multiplayer","Online PvP"]',
                'size_gb' => 55,
                'languages' => '["English","Indonesian"]',
                'rating' => '9.2',
                'cover' => '/storage/covers/w7iTB4iYVJxCXmmuaabytLt8GoKaMkpMyqAvUi0r.jpg',
                'screenshots' => '["/storage/screenshots/OcdiIQjZRARRjdNqQCAJjfWxJI9m9y9vKOBX56Bg.jpg"]',
                'created_at' => '2025-11-13 18:59:30',
                'updated_at' => '2025-11-13 19:24:55',
            ],
        ];

        // 3. Insert data ke tabel
        DB::table('games')->insert($games);

        // 4. Reset AUTO_INCREMENT
        DB::statement('ALTER TABLE games AUTO_INCREMENT = 27;'); 

        // 5. Hidupkan kembali Foreign Key Checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}