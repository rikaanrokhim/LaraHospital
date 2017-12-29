<?php

use Illuminate\Database\Seeder;
use App\Quotes;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quotes::create([
            'message' => 'Kerja ikhlas adalah kuci keberhasilan'
        ]);

        Quotes::create([
            'message' => 'Cintai pekerjaanmu, bukan perusahaanmu'
        ]);

        Quotes::create([
            'message' => 'Tekun, ulet, dan sabar adalah kunci kesuksesan'
        ]);

        Quotes::create([
            'message' => 'Percayalah, jam terbang tak akan menghianati hasil'
        ]);

        Quotes::create([
            'message' => '...ingatlah, hanya dengan mengingat Allah hati menjadi tentram'
        ]);
    }
}
