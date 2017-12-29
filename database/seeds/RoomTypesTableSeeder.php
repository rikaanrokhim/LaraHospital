<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create([
            'name' => 'VIP'
        ]);

        RoomType::create([
            'name' => 'Regular'
        ]);

        RoomType::create([
            'name' => 'Operasi'
        ]);

        RoomType::create([
            'name' => 'Rawat Intensiv'
        ]);

        RoomType::create([
            'name' => 'Persalinan'
        ]);

        RoomType::create([
            'name' => 'Rehabilitasi'
        ]);

        RoomType::create([
            'name' => 'IGD'
        ]);

        RoomType::create([
            'name' => 'Medichal Check Up'
        ]);
    }
}
