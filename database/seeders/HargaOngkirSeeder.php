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
                'ongkir' => '134000',
            ],
            [
                'provinces_id' => '2',
                'ongkir' => '86000',
            ],
            [
                'provinces_id' => '3',
                'ongkir' => '84000',
            ],
            [
                'provinces_id' => '4',
                'ongkir' => '92000',
            ],
            [
                'provinces_id' => '5',
                'ongkir' => '68000',
            ],
            [
                'provinces_id' => '6',
                'ongkir' => '54000',
            ],
            [
                'provinces_id' => '7',
                'ongkir' => '92000',
            ],
            [
                'provinces_id' => '8',
                'ongkir' => '74000',
            ],
            [
                'provinces_id' => '9',
                'ongkir' => '84000',
            ],
            [
                'provinces_id' => '10',
                'ongkir' => '92000',
            ],
            [
                'provinces_id' => '11',
                'ongkir' => '26000',
            ],
            [
                'provinces_id' => '12',
                'ongkir' => '28000',
            ],
            [
                'provinces_id' => '13',
                'ongkir' => '38000',
            ],
            [
                'provinces_id' => '14',
                'ongkir' => '38000',
            ],
            [
                'provinces_id' => '15',
                'ongkir' => '44000',
            ],
            [
                'provinces_id' => '16',
                'ongkir' => '34000',
            ],
            [
                'provinces_id' => '17',
                'ongkir' => '56000',
            ],
            [
                'provinces_id' => '18',
                'ongkir' => '88000',
            ],
            [
                'provinces_id' => '19',
                'ongkir' => '142000',
            ],
            [
                'provinces_id' => '20',
                'ongkir' => '98000',
            ],
            [
                'provinces_id' => '21',
                'ongkir' => '98000',
            ],
            [
                'provinces_id' => '22',
                'ongkir' => '96000',
            ],
            [
                'provinces_id' => '23',
                'ongkir' => '128000',
            ],
            [
                'provinces_id' => '24',
                'ongkir' => '132000',
            ],
            [
                'provinces_id' => '25',
                'ongkir' => '142000',
            ],
            [
                'provinces_id' => '26',
                'ongkir' => '152000',
            ],
            [
                'provinces_id' => '27',
                'ongkir' => '100000',
            ],
            [
                'provinces_id' => '28',
                'ongkir' => '152000',
            ],
            [
                'provinces_id' => '29',
                'ongkir' => '152000',
            ],
            [
                'provinces_id' => '30',
                'ongkir' => '118000',
            ],
            [
                'provinces_id' => '31',
                'ongkir' => '188000',
            ],
            [
                'provinces_id' => '32',
                'ongkir' => '176000',
            ],
            [
                'provinces_id' => '33',
                'ongkir' => '244000',
            ],
            [
                'provinces_id' => '34',
                'ongkir' => '274000',
            ],
        ]);
        foreach ($HargaOngkir as $ongkir) {
            HargaOngkir::create($ongkir);
        }
    }
}
