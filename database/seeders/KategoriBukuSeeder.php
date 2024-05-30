<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_buku')->insert([
            ['nama' => 'Novel'],
            ['nama' => 'Cerpen (Cerita Pendek)'],
            ['nama' => 'Fiksi Ilmiah (Science Fiction)'],
            ['nama' => 'Fantasi'],
            ['nama' => 'Misteri dan Thriller'],
            ['nama' => 'Romansa'],
            ['nama' => 'Drama'],
            ['nama' => 'Horror'],
            ['nama' => 'Fiksi Sejarah'],
            ['nama' => 'Fiksi Remaja (Young Adult Fiction)'],
            ['nama' => 'Biografi dan Autobiografi'],
            ['nama' => 'Memoar'],
            ['nama' => 'Sejarah'],
            ['nama' => 'Self-Help (Pengembangan Diri)'],
            ['nama' => 'Buku Motivasi'],
            ['nama' => 'Esai'],
            ['nama' => 'Panduan dan Manual'],
            ['nama' => 'Buku Referensi'],
            ['nama' => 'Agama dan Spiritualitas'],
            ['nama' => 'Filsafat'],
            ['nama' => 'Matematika'],
            ['nama' => 'Fisika'],
            ['nama' => 'Kimia'],
            ['nama' => 'Biologi'],
            ['nama' => 'Ilmu Komputer'],
            ['nama' => 'Teknologi Informasi'],
            ['nama' => 'Teknik dan Rekayasa'],
            ['nama' => 'Astronomi'],
            ['nama' => 'Lingkungan dan Ekologi'],
            ['nama' => 'Kesehatan dan Kedokteran'],
            ['nama' => 'Psikologi'],
            ['nama' => 'Sosiologi'],
            ['nama' => 'Antropologi'],
            ['nama' => 'Ilmu Politik'],
            ['nama' => 'Ekonomi'],
            ['nama' => 'Hukum'],
            ['nama' => 'Pendidikan'],
            ['nama' => 'Geografi'],
            ['nama' => 'Budaya dan Seni'],
            ['nama' => 'Seni Rupa'],
            ['nama' => 'Fotografi'],
            ['nama' => 'Desain Grafis'],
            ['nama' => 'Arsitektur'],
            ['nama' => 'Musik'],
            ['nama' => 'Teater dan Drama'],
            ['nama' => 'Film dan Media'],
            ['nama' => 'Fashion'],
            ['nama' => 'Kriya (Crafts)'],
            ['nama' => 'Tari'],
            ['nama' => 'Cerita Anak'],
            ['nama' => 'Buku Bergambar'],
            ['nama' => 'Edukasi Anak'],
            ['nama' => 'Dongeng dan Fabel'],
            ['nama' => 'Komik dan Manga'],
            ['nama' => 'Buku Aktivitas'],
            ['nama' => 'Pendidikan Moral'],
            ['nama' => 'Sejarah untuk Anak'],
            ['nama' => 'Sains untuk Anak'],
            ['nama' => 'Memasak dan Resep'],
            ['nama' => 'Berkebun'],
            ['nama' => 'Olahraga'],
            ['nama' => 'Kerajinan Tangan (DIY)'],
            ['nama' => 'Traveling dan Pariwisata'],
            ['nama' => 'Fotografi'],
            ['nama' => 'Permainan dan Puzzles'],
            ['nama' => 'Memancing dan Berburu'],
            ['nama' => 'Hobi dan Koleksi'],
            ['nama' => 'Keterampilan Hidup'],
            ['nama' => 'Antologi'],
            ['nama' => 'Jurnal dan Majalah'],
            ['nama' => 'Puisi'],
            ['nama' => 'Petunjuk Praktis'],
            ['nama' => 'Laporan Penelitian'],
            ['nama' => 'Naskah Drama'],
            ['nama' => 'Pidato dan Ceramah'],
            ['nama' => 'Panduan Wisata'],
            ['nama' => 'Katalog'],
            ['nama' => 'Buku Audio'],
        ]);
    }

}
