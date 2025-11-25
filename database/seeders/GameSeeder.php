<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // WAJIB

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Peringatan: Kolom 'id' disertakan dalam INSERT di bawah. 
        // Ini memastikan foreign key integrity jika ada,
        // namun bisa menyebabkan error jika ID sudah ada. 
        // Asumsi: Alda menjalankan migrate:fresh --seed yang membersihkan DB terlebih dahulu.

        DB::statement("
            INSERT INTO games (id, title, slug, developer, publisher, genres, storyline, release_year, age_rating, platforms, modes, size_gb, languages, rating, cover, screenshots, created_at, updated_at) VALUES
            (4, 'It Takes Two', 'it-takes-two', 'Hazelight Studios', 'Electronic Arts (EA Originals)', '\"[\\\"Action\\\",\\\"Adevnture\\\"]\"', 'It Takes Two mengikuti kisah sepasang suami istri, Cody dan May, yang sedang dalam proses perceraian hingga secara ajaib berubah menjadi boneka kecil akibat air mata putri mereka, Rose.
Untuk kembali ke tubuh asli mereka, keduanya harus bekerja sama melewati berbagai dunia fantasi penuh rintangan dan teka-teki kreatif. Dengan gameplay yang sepenuhnya berfokus pada kerja sama, game ini menawarkan pengalaman emosional, lucu, dan menantang yang hanya bisa diselesaikan bersama.', 2021, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Co-op Local\\\"]\"', 50, '\"[\\\"Japan\\\"]\"', '9.1', '/storage/covers/JrmTRIHuPCTtoOPfNo9ECdUTIrXYeI4q6HUEXT8J.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/aX9rbm8wihr8wKPqNaI84cg697hpP535FNZhHEs5.jpg\\\"]\"', '2025-11-13 06:59:19', '2025-11-13 06:59:19'),
            (7, 'Downhills', 'downhills', 'BluePeak Studios', 'Summit Interactive', '\"[\\\"Racing\\\",\\\"Sports\\\",\\\"Adventure\\\"]\"', 'Downhills adalah game balap sepeda gunung yang menantang, 
di mana pemain harus melewati jalur ekstrem, menghindari rintangan, 
dan mencapai garis akhir secepat mungkin. Dengan grafik realistis 
dan fisika yang detail, game ini menghadirkan pengalaman downhill 
yang intens dan memacu adrenalin.', 2024, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Single Player\\\",\\\"MultiPlayer\\\"]\"', 12, '\"[\\\"English\\\",\\\"Indonesian\\\"]\"', '8.7', '/storage/covers/X335CdBs7wysnSbHajfCTYqdoKKPVWCm4oL6cNfj.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/AQtw93KZczNnOzxIsCbzwKIjoo5LdpYI4d7DmDiC.jpg\\\"]\"', '2025-11-13 07:40:39', '2025-11-13 07:40:39'),
            (8, 'Overcooked 2', 'overcooked-2', 'Ghost Town Games', 'Team17', '\"[\\\"Party\\\",\\\"Simulation\\\",\\\"Cooking\\\"]\"', 'Overcooked! 2 adalah game memasak co-op yang kacau, lucu, dan penuh tantangan.
Pemain bekerja sama di dapur yang semakin tidak masuk akal — mulai dari dapur di udara, tambang, hingga restoran di dunia fantasi.
Tujuan pemain adalah memasak dan menyajikan pesanan secepat mungkin sebelum waktu habis.
Game ini mendukung multiplayer lokal dan online, membuatnya sangat cocok dimainkan bersama teman atau keluarga.
Dengan level-level kreatif, tantangan unik, dan resep yang beragam, Overcooked! 2 memberikan pengalaman seru, menegangkan, dan penuh tawa.', 2018, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Co-op\\\",\\\"Multiplayer\\\"]\"', 36, '\"[\\\"English\\\",\\\"Indonesian\\\"]\"', '8.7', '/storage/covers/znJEi1t0pV5ebj19DtIi1zsbYDvgkbgMXd1d9ADa.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/PuY3v8KMCflZDYkj1o1GVIVWhc7CrIfcfkN2lUJH.jpg\\\"]\"', '2025-11-13 07:58:03', '2025-11-13 08:13:23'),
            (9, 'PES 2026 Patch Monster', 'pes-2026-patch-monster', 'Konami (mod patch by Monster Team)', 'Konami', '\"[\\\"Sports\\\",\\\"Football\\\",\\\"Simulation\\\"]\"', 'PES 2026 Patch Monster adalah versi modifikasi terbaru dari Pro Evolution Soccer
yang menghadirkan update besar pada gameplay, grafis, dan database pemain.
Patch Monster dikenal dengan detail tinggi seperti wajah pemain realistis,
jersey terbaru musim 2025–2026, transfer lengkap, serta stadion HD yang diperbarui.
Gameplay lebih halus dengan peningkatan fisik bola, kontrol dribbling,
dan animasi tendangan yang lebih realistis. Mod ini juga menambahkan
tim nasional baru, klub promosi, mode turnamen lengkap, dan ratusan
wajah pemain yang diperbarui.
Sangat cocok untuk pemain yang ingin merasakan sensasi sepak bola modern
dengan performa yang stabil di PS4/PS5.', 2026, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Offline\\\",\\\"Online Match\\\",\\\"Exhibition\\\",\\\"Master League\\\",\\\"Co-op\\\"]\"', 45, '\"[\\\"Inggris\\\",\\\"Spanyol\\\",\\\"Prancis\\\",\\\"Jepang\\\"]\"', '9.2', '/storage/covers/CVYivXeoEhIQujV61MbIfh6NO5JEjzIgtoZwc2gI.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/BXtvK00VAEBB8xv3FuOWXXYOqOMbxVBosuqPUTXC.jpg\\\"]\"', '2025-11-13 08:08:50', '2025-11-13 08:10:45'),
            (10, 'PES 2026 Patch Eleven', 'pes-2026-patch-eleven', 'Konami (mod patch by Eleven Studio)', 'Konami', '\"[\\\"Sports\\\",\\\"Football\\\",\\\"Simulation\\\"]\"', 'PES 2026 Patch Eleven adalah upgrade besar dari eFootball seri klasik yang telah
dimodifikasi oleh Eleven Studio. Patch ini menyajikan pengalaman sepak bola yang
lebih realistis berkat peningkatan grafis, update database pemain terbaru
musim 2025–2026, serta animasi baru yang membuat gameplay semakin halus.
Patch Eleven menambahkan ratusan wajah pemain (facepack HD),
tim nasional terbaru, update jersey resmi, stadion 4K, hingga sistem AI
yang lebih pintar dalam bertahan dan menyerang. Mode Career dan Exhibition
juga memiliki pembaruan menu serta animasi sinematik baru.
Patch ini sangat digemari karena stabil, ringan, dan memiliki tampilan
yang sangat modern dan bersih dibanding patch lainnya.', 2026, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Offline\\\",\\\"Online Match\\\",\\\"Exhibition\\\",\\\"Career Mode\\\",\\\"Co-op\\\"]\"', 43, '\"[\\\"Inggris\\\",\\\"Portugis\\\",\\\"Spanyol\\\",\\\"Jepang\\\"]\"', '9.0', '/storage/covers/lQHd0l4L6FVTSzN3AuYlMuTwLmkf44bTlD6vAM33.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/t01HhuZzdEZZIscnvmpfiaLFXtgfe4cmQYsU75DL.jpg\\\"]\"', '2025-11-13 18:14:48', '2025-11-13 18:14:48'),
            (11, 'GTA V', 'gta-v', 'Rockstar North', 'Rockstar Games', '\"[\\\"Action-Adventure\\\",\\\"Open World\\\"]\"', 'Grand Theft Auto V adalah game open-world populer yang mengikuti kisah tiga
karakter utama: Michael, Franklin, dan Trevor. Berlatar di kota fiksi Los Santos,
pemain bebas menjelajahi dunia yang luas, melakukan misi cerita, atau
menghabiskan waktu melakukan berbagai aktivitas sampingan.
GTA V menawarkan aksi tembak-menembak, perampokan berskala besar, balapan,
serta interaksi dengan dunia yang sangat hidup. Mode GTA Online memungkinkan
pemain bergabung bersama teman atau pemain lain dari seluruh dunia
untuk menjalankan misi, balapan, roleplay, dan berbagai event live.', 2013, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Singleplayer\\\",\\\"Online Multiplayer\\\",\\\"Story Mode\\\",\\\"Free Roam\\\"]\"', 90, '\"[\\\"Inggris\\\",\\\"Spanyol\\\",\\\"Portugis\\\",\\\"Prancis\\\"]\"', '9.7', '/storage/covers/3m8GGZuKJgZzD9xui0WjhqGnAf7h7W5iDBjQb6RA.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/yxil60YRKWZwdisOumsN9QcfeTpyknDmuCFfWKCq.jpg\\\"]\"', '2025-11-13 18:17:23', '2025-11-13 18:17:23'),
            (12, 'FC 25', 'fc-25', 'EA Sports', 'Electronic Arts (EA)', '\"[\\\"Sports\\\",\\\"Football\\\",\\\"Simulation\\\"]\"', 'EA SPORTS FC 25 merupakan kelanjutan dari franchise sepak bola terkenal EA,
menghadirkan gameplay yang semakin realistis dengan animasi HyperMotion V2,
fisik bola yang lebih hidup, dan kontrol dribbling yang lebih responsif.
Mode Career mendapatkan peningkatan besar seperti sistem manajemen taktik baru,
cutscene modern, serta perkembangan pemain yang lebih dinamis.
Ultimate Team hadir dengan Event Live mingguan, kartu evolusi pemain,
dan matchmatch yang lebih seimbang.
Dengan lisensi klub dan pemain resmi, FC 25 menawarkan pengalaman sepak bola
yang imersif — baik secara offline maupun online.', 2024, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single-player\\\",\\\"Multiplayer\\\",\\\"Online PvP\\\"]\"', 52, '\"[\\\"Inggris\\\",\\\"Spanyol\\\",\\\"Portugis\\\",\\\"Prancis\\\"]\"', '8.9', '/storage/covers/CfDCbd2O1unBTonQP9Dip3TnVJGKXFjX0VKyKPky.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/ZX0eeCEsClpmmdrrUMupJjMrCxMaQuDwuCXk9lWk.jpg\\\"]\"', '2025-11-13 18:19:25', '2025-11-14 00:18:34'),
            (13, 'Injustice: Gods Among Us', 'injustice-gods-among-us', 'NetherRealm Studios', 'Warner Bros. Interactive Entertainment', '\"[\\\"Fighting\\\",\\\"Action\\\"]\"', 'Injustice: Gods Among Us adalah game fighting yang mempertemukan para karakter
ikonik DC Universe seperti Superman, Batman, The Flash, Wonder Woman, dan Joker.
Cerita berfokus pada dunia alternatif di mana Superman menjadi diktator setelah
kehilangan Lois Lane, sementara Batman memimpin kelompok pemberontak yang menolak
tirani tersebut.
Gameplay menggunakan sistem pertarungan khas NetherRealm dengan combo cepat,
interaksi lingkungan, dan super move yang spektakuler. Game ini terkenal dengan
cerita sinematiknya yang kuat serta mode multiplayer kompetitif.', 2013, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Story Mode\\\",\\\"Multiplayer\\\",\\\"Local Versus\\\",\\\"Online Versus\\\",\\\"Training\\\"]\"', 22, '\"[\\\"Inggris\\\",\\\"Spanyol\\\",\\\"Portugis\\\"]\"', '8.5', '/storage/covers/RZRdfTFcmqH4xSTXRWqVBKxDrn0VX6AIXQAL1OPf.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/0vSY7NznbwfUP7hMlqNj500iw8zvD6bXO9sNcPVM.jpg\\\"]\"', '2025-11-13 18:25:30', '2025-11-13 18:25:30'),
            (14, 'Injustice 2', 'injustice-2', 'NetherRealm Studios', 'Warner Bros. Interactive Entertainment', '\"[\\\"Fighting\\\",\\\"Action\\\"]\"', 'Injustice 2 melanjutkan cerita setelah kejadian di Injustice: Gods Among Us.
Batman dan para sekutunya berusaha membangun kembali dunia setelah rezim
Superman tumbang. Namun ancaman baru muncul dengan kedatangan Brainiac,
musuh kosmik yang ingin menghancurkan Bumi.
Game ini punya sistem pertarungan cepat, animasi halus, serta Gear System
yang membuat pemain dapat mengkustomisasi karakter seperti Batman, Superman,
Supergirl, Flash, dan lainnya. Mode Multiverse memberikan event harian
dan tantangan berbeda yang menjaga gameplay tetap segar.
Injustice 2 dikenal sebagai salah satu game fighting terbaik dengan cerita
epik dan super move yang spektakuler.', 2017, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Story Mode\\\",\\\"Online Versus\\\",\\\"Local Versus\\\",\\\"AI Battle\\\",\\\"Multiverse\\\",\\\"Training\\\"]\"', 29, '\"[\\\"Inggris\\\",\\\"Spanyol\\\",\\\"Portugis\\\",\\\"Prancis\\\"]\"', '9.0', '/storage/covers/vE8EErsYrBCquNKVamjFHPaNkSnJgBrZugbpZInU.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/8uT17AFMTSK0ee64AmWxMin9BHqZU2W8R4ziu0Ha.jpg\\\"]\"', '2025-11-13 18:27:01', '2025-11-13 18:27:01'),
            (15, 'Street Fighter 6', 'street-fighter-6', 'Capcom', 'Capcom', '\"[\\\"Fighting\\\",\\\"Action\\\"]\"', 'Street Fighter 6 adalah game fighting generasi terbaru dari Capcom yang
menghadirkan grafis modern, animasi realistis, dan sistem pertarungan yang
lebih fleksibel. Game ini memiliki tiga mode utama: Fighting Ground untuk
pertarungan klasik, World Tour sebagai mode cerita open-world, dan Battle Hub
yang menjadi pusat komunitas online.
Dengan roster petarung ikonik seperti Ryu, Ken, Chun-Li, Juri, Blanka, dan
karakter baru seperti Luke serta Jamie, Street Fighter 6 menawarkan pengalaman
bertempur yang cepat, responsif, dan penuh teknik.
Sistem Drive Gauge membuat gameplay lebih strategis, memungkinkan pemain
melakukan parry, rush attack, dan counter dengan waktu yang tepat.', 2023, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"Story Mode\\\",\\\"Fighting Ground\\\",\\\"World Tour\\\",\\\"Online Versus\\\",\\\"Training\\\"]\"', 60, '\"[\\\"Inggris\\\",\\\"Jepang\\\",\\\"Spanyol\\\",\\\"Prancis\\\",\\\"Korea\\\"]\"', '9.3', '/storage/covers/duzNbiIqUCnAt3IHCy1RyztfKPjgn1XlHeabCkLW.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/vzmTHgRW6uLM8uv6xtNnoVjZTpZNcglb3x4EhwOt.jpg\\\"]\"', '2025-11-13 18:28:55', '2025-11-13 18:28:55'),
            (16, 'NBA 2K25', 'nba-2k25', 'Visual Concepts', '2K Sports', '\"[\\\"Sports\\\",\\\"Basketball\\\",\\\"Simulation\\\"]\"', 'NBA 2K25 menghadirkan pengalaman basket paling realistis dengan peningkatan
grafis next-gen, animasi pemain yang lebih halus, serta mekanik shooting yang
lebih akurat. Mode MyCareer memperkenalkan cerita baru dengan perjalanan pemain
dari rookie menuju superstar NBA.
MyTeam hadir dengan sistem kartu terbaru, event mingguan, dan tantangan online.
Untuk pemain PS5, game ini juga menawarkan fitur ProPLAY+ yang membuat gerakan
atlet lebih autentik berdasarkan rekaman pertandingan asli.
NBA 2K25 menjadi pilihan utama bagi penggemar basket yang ingin merasakan
simulasi NBA yang lengkap, kompetitif, dan penuh update live.', 2024, NULL, '\"[\\\"PS4\\\"]\"', '\"[\\\"MyCareer\\\",\\\"MyTeam\\\",\\\"Play Now\\\",\\\"MyGM\\\",\\\"MyLeague\\\",\\\"Online Match\\\"]\"', 110, '\"[\\\"Inggris\\\",\\\"Spanyol\\\",\\\"Portugis\\\",\\\"Prancis\\\"]\"', '8.7', '/storage/covers/TT5SNNWpndZHOlUGJqOshG44uvj4so5OYu0qGJFB.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/QQmWxr9Y2upKleUy60spRX7A85NhZNfsTxjyBFWh.jpg\\\"]\"', '2025-11-13 18:30:54', '2025-11-13 18:30:54'),
            (17, 'PES 2021 Season Update', 'pes-2021-season-update', 'Konami', 'Konami Digital Entertainment', '\"[\\\"Sports\\\",\\\"Football\\\",\\\"Simulation\\\"]\"', 'eFootball PES 2021 Season Update adalah versi pembaruan dari PES 2020 yang
menghadirkan update pemain, kit, dan transfer terbaru musim 2020–2021.
Walaupun bukan game baru sepenuhnya, PES 2021 menawarkan gameplay yang halus
dan realistik, terutama pada kontrol bola dan gerakan pemain.
Mode Master League tetap menjadi favorit dengan cerita manajemen klub yang
mendalam. MyClub memungkinkan pemain membangun tim impian dan bersaing secara
online. Dengan lisensi eksklusif klub seperti Barcelona, Juventus, Manchester
United, dan Bayern Munich, PES 2021 tetap menjadi salah satu game sepak bola
terbaik dan paling populer di rental.', 2020, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Master League\\\",\\\"Become A Legend\\\",\\\"MyClub\\\",\\\"Exhibition\\\",\\\"Online Match\\\"]\"', 42, '\"[\\\"Inggris\\\",\\\"Jepang\\\",\\\"Spanyol\\\",\\\"Portugis\\\",\\\"Prancis\\\"]\"', '8.4', '/storage/covers/1ZG3vaLNCWIb9dXaO53f7NsJ4j3Z39t250ChbzrK.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/9kjVDwVLKwHgrqbrMN5YWtlQ2tQg06LMes8XhamD.jpg\\\"]\"', '2025-11-13 18:34:07', '2025-11-13 18:34:07'),
            (18, 'EA Sports UFC 5', 'ea-sports-ufc-5', 'EA Vancouver', 'Electronic Arts', '\"[\\\"Sports\\\",\\\"Fighting\\\",\\\"Mixed Martial Arts\\\"]\"', 'EA Sports UFC 5 menghadirkan pengalaman pertarungan MMA paling realistis dengan Frostbite Engine yang baru, memberikan visual sinematik dan detail yang sangat presisi. Game ini menyertakan sistem damage real-time, animasi gerakan yang lebih halus, serta mode Karier yang lebih mendalam. Pemain dapat bertarung melawan petarung UFC terkenal atau membangun karakter sendiri untuk mencapai gelar juara dunia.', 2023, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single-player\\\",\\\"Multiplayer\\\",\\\"Online PvP\\\"]\"', 45, '\"[\\\"English\\\",\\\"Spanish\\\",\\\"French\\\",\\\"German\\\",\\\"Italian\\\",\\\"Portuguese\\\"]\"', '8.5', '/storage/covers/v6cfEenGSXAtV3bWBiXgFAqqLf8zY3UI8Xcr6NYj.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/3Wikzus66pltg4ixpjukZpBgeCwzR0dAIhFoz1d3.jpg\\\"]\"', '2025-11-13 18:39:43', '2025-11-13 18:39:43'),
            (20, 'Mortal Kombat 11', 'mortal-kombat-11', 'NetherRealm Studios', 'Warner Bros. Interactive Entertainment', '\"[\\\"Fighting\\\",\\\"Action\\\",\\\"PvP\\\"]\"', 'Mortal Kombat 11 menghadirkan kisah epik yang mengikuti perjalanan Raiden dan para pahlawan Earthrealm melawan Kronika, penjaga waktu yang ingin mengulang sejarah demi menghapus keberadaan Raiden. Game ini menawarkan pertarungan brutal dengan sistem Fatal Blows, Custom Variations, serta grafis sinematik yang sangat detail. Pemain dapat menjelajahi mode cerita, Towers of Time, dan bertarung melawan pemain lain secara online maupun lokal.', 2019, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single-player\\\",\\\"Multiplayer\\\",\\\"Online PvP\\\",\\\"Local Multiplayer\\\",\\\"Story Mode\\\"]\"', 40, '\"[\\\"English\\\",\\\"Spanish\\\",\\\"French\\\",\\\"German\\\",\\\"Italian\\\",\\\"Portuguese\\\",\\\"Russian\\\",\\\"Japanese\\\"]\"', '9.0', '/storage/covers/mdTX1O0XSJftJpziJOdRpApHIcTYaPVvNhll5p3J.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/Cd6I2WNmY22Zvq48QaTt5r7yafVbqDg9hxiH1I1F.jpg\\\"]\"', '2025-11-13 18:42:45', '2025-11-13 18:42:45'),
            (21, 'EA Sports FC 25 Online', 'ea-fc25-online', 'EA Vancouver', 'Electronic Arts', '\"[\\\"Sports\\\",\\\"Football\\\",\\\"Simulation\\\"]\"', 'EA Sports FC 25 Online menghadirkan pengalaman sepak bola kompetitif dengan peningkatan pada gameplay berbasis fisik, animasi lebih realistis, serta sistem passing dan dribbling yang diperbarui. Mode online seperti Ultimate Team, Seasons, dan Volta memberikan pemain kesempatan bersaing dengan orang lain secara global. Dengan update konten rutin, pemain dapat membangun skuad impian, mengikuti event musiman, dan berpartisipasi dalam pertandingan peringkat untuk mencapai divisi tertinggi.', 2024, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single-player\\\",\\\"Multiplayer\\\",\\\"Online PvP\\\"]\"', 45, '\"[\\\"English\\\",\\\"Indonesian\\\"]\"', '8.2', '/storage/covers/7nTeKvnigYl11eUligTd0Fk04YQrIosR23ed9c6O.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/SQtZxymlJYkE1rsIXzV2kZO3vqWgQWD0UrQXea3z.jpg\\\"]\"', '2025-11-13 18:47:07', '2025-11-13 19:32:59'),
            (22, 'It Takes Two', 'it-takes-two2', 'Hazelight Studios', 'Electronic Arts', '\"[\\\"Action\\\",\\\"Adevnture\\\"]\"', 'It Takes Two adalah game petualangan co-op yang menceritakan pasangan suami istri, Cody dan May, yang berubah menjadi boneka dan harus bekerja sama untuk kembali ke tubuh asli mereka. Setiap level menghadirkan mekanik unik, puzzle kreatif, dan gameplay kerja sama yang intens. Game ini dirancang sepenuhnya untuk dua pemain, memberikan pengalaman emosional, lucu, dan penuh kejutan yang menekankan pentingnya komunikasi dan kerja sama.', 2021, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single Player\\\",\\\"MultiPlayer\\\"]\"', 25, '\"[\\\"English\\\",\\\"Indonesian\\\"]\"', '9.5', '/storage/covers/6hKGh68kfLo0kVuRZzniDmbOCZmtaso63DwP6O6O.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/Mis0h66KOVX3WJNBdnd9hptxAqoQxydVh0CSS3fj.jpg\\\"]\"', '2025-11-13 18:51:34', '2025-11-13 19:17:03'),
            (23, 'Ghost of Tsushima', 'ghost-of-tsushima', 'Sucker Punch Productions', 'Sony Interactive Entertainment', '\"[\\\"Action-adventure\\\",\\\"Open World\\\",\\\"Samurai\\\",\\\"Stealth\\\"]\"', 'Ghost of Tsushima mengikuti perjalanan Jin Sakai, seorang samurai terakhir dari klannya yang berusaha mempertahankan pulau Tsushima dari invasi Mongol. Ketika metode samurai tradisional tidak lagi cukup, Jin harus mengadopsi taktik baru sebagai “Ghost”, menggunakan stealth, taktik gerilya, dan kemampuan tempur yang mematikan. Game ini menampilkan open-world yang indah, mekanik pertarungan katana yang memuaskan, dan narasi emosional tentang kehormatan, pengorbanan, dan identitas.', 2020, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single-player\\\",\\\"Co-op Online (Legends Mode)\\\"]\"', 60, '\"[\\\"nglish\\\",\\\"Japanese\\\",\\\"Spanish\\\",\\\"French\\\",\\\"German\\\",\\\"Italian\\\",\\\"Portuguese\\\"]\"', '9.3', '/storage/covers/GYp7KLX2QkkvjYm9r7mKZah0eeRBxGASj0wmTh04.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/AyjYd8afu9e7swBltg9tW5iWyZjrd56z6RWOsvuB.jpg\\\"]\"', '2025-11-13 18:53:21', '2025-11-13 18:53:21'),
            (24, 'Roblox', 'roblox', 'Roblox Corporation', 'Roblox Corporation', '\"[\\\"Action\\\",\\\"Adevnture\\\"]\"', 'Roblox adalah platform game online tempat pemain dapat membuat, berbagi, dan memainkan jutaan game buatan komunitas. Dengan berbagai genre mulai dari roleplay, adventure, racing, horror, hingga shooter, Roblox menawarkan pengalaman tanpa batas yang selalu berkembang. Pemain dapat membuat avatar sendiri, bermain bersama teman, dan memanfaatkan sistem ekonomi Robux untuk membeli item dalam game.', 2023, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single Player\\\",\\\"MultiPlayer\\\"]\"', 5, '\"[\\\"English\\\",\\\"Indonesian\\\"]\"', '8.8', '/storage/covers/NWCwng1IwzVZWiwolSklVYlESZj8Mnu8AfGMxscD.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/v0RYlI5dQm7gKWpvHQ88Q2pQPEYkK81VG0Tx4hoX.jpg\\\"]\"', '2025-11-13 18:55:24', '2025-11-13 19:21:01'),
            (25, 'Gran Turismo', 'gran-turismo', 'Polyphony Digital', 'Sony Interactive Entertainment', '\"[\\\"Racing\\\",\\\"Sports\\\",\\\"Adventure\\\"]\"', 'Gran Turismo adalah simulator balap realistis yang menampilkan ratusan mobil dari berbagai pabrikan dunia, trek balap ikonik, serta fisik kendaraan yang sangat detail. Pemain dapat mengikuti career mode, mengoleksi mobil, melakukan tuning, atau bersaing secara online. Game ini terkenal dengan grafis sinematik, handling realistis, dan dukungan mode kompetitif resmi seperti FIA Gran Turismo Championships.', 2022, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single Player\\\",\\\"MultiPlayer\\\"]\"', 110, '\"[\\\"English\\\",\\\"Indonesian\\\"]\"', '9.0', '/storage/covers/d21i1RALC7lRa28JrNmWAQnZde0jM5244B38qthO.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/vxPjYLehNxM4AqJdbmFYADB6hPI2SbL83LMwBsaX.jpg\\\"]\"', '2025-11-13 18:57:39', '2025-11-13 19:18:52'),
            (26, 'Spider-Man Miles Morales', 'spiderman-mm', 'Insomniac Games', 'Sony Interactive Entertainment', '\"[\\\"Action\\\",\\\"Adeventure\\\"]\"', 'Marvel’s Spider-Man: Miles Morales mengikuti perjalanan Miles yang belajar menjadi Spider-Man setelah Peter Parker mempercayakan kota padanya. Saat perang antara perusahaan energi Roxxon dan kelompok kriminal Tinkerer mengancam New York, Miles harus menguasai kemampuan uniknya seperti Venom Strike dan camouflage. Dunia open-world yang indah, aksi cepat, dan cerita emosional menjadikan game ini salah satu pengalaman superhero terbaik di PlayStation.', 2020, NULL, '\"[\\\"PS5\\\"]\"', '\"[\\\"Single-player\\\",\\\"Multiplayer\\\",\\\"Online PvP\\\"]\"', 55, '\"[\\\"English\\\",\\\"Indonesian\\\"]\"', '9.2', '/storage/covers/w7iTB4iYVJxCXmmuaabytLt8GoKaMkpMyqAvUi0r.jpg', '\"[\\\"\\\\/storage\\\\/screenshots\\\\/OcdiIQjZRARRjdNqQCAJjfWxJI9m9y9vKOBX56Bg.jpg\\\"]\"', '2025-11-13 18:59:30', '2025-11-13 19:24:55');
        ");
    }
}