<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tacgia;
use App\Models\tensach;
use Faker\Factory as Faker;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $tg = Tacgia::create([
                'name' => $faker->name,
                'ngay_sinh' => $faker->date('Y-m-d', '2000-01-01')
            ]);

            // mỗi tác giả có 1-3 quyển sách
            $soSach = rand(1, 3);
            for ($j = 0; $j < $soSach; $j++) {
                Tensach::create([
                    'ten_sach' => $faker->sentence(3),
                    'Noi_dung' => $faker->paragraph(2),
                    'tacgia_id' => $tg->id
                ]);
            }
        }
    }
}
