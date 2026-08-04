<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    Destinasi::truncate();
 
    Destinasi::create([
        'nama' => 'bukit cinta',
        'deskripsi' => 'Bukit cinta adalah salah satu viewpoint terbaik di kawasan Bromo untuk menikmati Sunrise( matahari terbit). Dari sini juga dapat melihat panorama Gn. Bromo, Gn. Batok, dan Gn. Semeru',
        'gambar' => 'sunrise-bromo.webp',
        'jam_buka' => '03.00.00',
        'jam_tutup' => '06:00:00',
        'lokasi' => 'Area Pegunungan, Wonokitri, Tosari, Kabupaten Pasuruan, Jawa Timur.',
    ]);

 
    Destinasi::create([
        'nama' => 'Air Terjun Madakaripura',
        'deskripsi' => 'Air Terjun yang sangat indah dan menjadi Air Terjun tertinggi di Jawa Timur setinggi 200 meter. Dan memiliki sejarah yang merupakan lokasi pertapaan terakhir Mahapahit Gajah Mada.',
        'gambar' => 'madakripura.jpg',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '16:00:00',
        'lokasi' => 'Branggah, Sapih, Kec. Lumbang, Kabupaten Probolinggo, Jawa Timur 67183.',
    ]);

    Destinasi::create([
        'nama' => 'bukit teletubies',
        'deskripsi' => 'Bukit Teletubbies adalah hamparan padang savan hijau berbukit-bukit gelombang yang terletak di TNBTS. Tampilan bukitnya berubah mengikuti musim dan tempat ini menjadi favorit wisatawan untuk foto pre-wedding.
',
        'gambar' => 'menunggangi-kuda.jpg',
        'jam_buka' => '05:00:00',
        'jam_tutup' => '17:00:00',
        'lokasi' => 'Jl. Raya ngandas, Gedong, Sariwani, kec. Sukapura, Kab. Probolinggo, Jawa Timur.',
    ]);
 
}
}