<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['type' => '1', 'title' => 'Proyektor', 'location' => 'Ruangan A.1'],
            ['type' => '1', 'title' => 'Mikrofon', 'location' => 'Ruangan A.1'],
            ['type' => '1', 'title' => 'Kamera', 'location' => 'Ruangan A.1'],
            ['type' => '1', 'title' => 'Speaker', 'location' => 'Ruangan A.1'],
            ['type' => '2', 'title' => 'Panggung portabel', 'location' => 'Ruangan B.6'],
            ['type' => '2', 'title' => 'Backdrop', 'location' => 'Ruangan B.6'],
            ['type' => '2', 'title' => 'Lampu panggung', 'location' => 'Ruangan A.1'],
            ['type' => '2', 'title' => 'Tirai panggung', 'location' => 'Ruangan A.3'],
            ['type' => '3', 'title' => 'Laptop', 'location' => 'Ruangan B.2'],
            ['type' => '3', 'title' => 'Router Wi-Fi', 'location' => 'Ruangan B.2'],
            ['type' => '3', 'title' => 'Kabel HDMI', 'location' => 'Ruangan B.2'],
            ['type' => '3', 'title' => 'Printer', 'location' => 'Ruangan B.2'],
            ['type' => '4', 'title' => 'Bola basket', 'location' => 'Ruangan C.4'],
            ['type' => '4', 'title' => 'Bola voli', 'location' => 'Ruangan C.4'],
            ['type' => '4', 'title' => 'Net bulu tangkis', 'location' => 'Ruangan C.4'],
            ['type' => '4', 'title' => 'Raket tenis meja', 'location' => 'Ruangan C.4'],
            ['type' => '5', 'title' => 'Meja ', 'location' => 'Ruang kelas'],
            ['type' => '5', 'title' => 'Kursi', 'location' => 'Ruang kelas'],
            ['type' => '5', 'title' => 'Pembatas antrian', 'location' => 'Gudang'],
            ['type' => '5', 'title' => 'Kotak P3K', 'location' => 'Ruangan A.1'],
        ];

        for ($i = 1; $i < count($items); $i++) {
            Item::create([
                'item_type_id' => $items[$i]['type'],
                'item_number' => 'ITM-' . rand(10, 90) . rand(101, 199) . rand(200, 999),
                'image' => 'assets/images/items/default.png',
                'title' => $items[$i]['title'],
                'location' => $items[$i]['location'],
                'date_of_added' => date('Y-m-d'),
            ]);
        }
    }
}
