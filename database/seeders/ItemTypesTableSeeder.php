<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Seeder;

class ItemTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemType::create([
            'name' => 'Peralatan Audio dan Visual',
            'description' => 'Barang-barang yang digunakan untuk keperluan presentasi, seminar, atau acara hiburan.'
        ]);

        ItemType::create([
            'name' => 'Peralatan Panggung dan Dekorasi',
            'description' => 'Barang-barang yang digunakan untuk mendukung dekorasi dan kebutuhan panggung acara.'
        ]);

        ItemType::create([
            'name' => 'Peralatan Teknologi Informasi',
            'description' => 'Barang-barang yang digunakan untuk kebutuhan teknologi informasi selama acara.'
        ]);

        ItemType::create([
            'name' => 'Peralatan Olahraga',
            'description' => 'Barang-barang yang digunakan untuk acara olahraga atau kegiatan fisik.'
        ]);

        ItemType::create([
            'name' => 'Peralatan Logistik dan Keamanan',
            'description' => 'Barang-barang yang digunakan untuk mendukung logistik dan keamanan acara.'
        ]);
    }
}
