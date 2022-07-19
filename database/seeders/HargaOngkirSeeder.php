<?php

namespace Database\Seeders;

use App\Models\HargaOngkir;
use Illuminate\Database\Seeder;

class HargaOngkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HargaOngkir::truncate();
        $HargaOngkir = ([
            [
                'provinces_id' => '1',
                'ongkir' => '50000',
            ],
            [
                'provinces_id' => '2',
                'ongkir' => '25000',
            ],
            [
                'provinces_id' => '3',
                'ongkir' => '15000',
            ],
            [
                'provinces_id' => '4',
                'ongkir' => '20000',
            ],
            [
                'provinces_id' => '5',
                'ongkir' => '30000',
            ],
            [
                'provinces_id' => '6',
                'ongkir' => '220000',
            ],
            [
                'provinces_id' => '7',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '8',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '9',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '10',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '11',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '12',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '13',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '14',
                'ongkir' => '35000',
            ],
            [
                'provinces_id' => '15',
                'ongkir' => '35000',
            ],
        ]);
        foreach ($HargaOngkir as $ongkir) {
            HargaOngkir::create($ongkir);
        }
    }
}
