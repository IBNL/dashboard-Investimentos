<?php

namespace Database\Seeders;

use App\Models\Fundo;
use Illuminate\Database\Seeder;

class FundoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fundos = [
            [
            'name' => 'FUNDO 1'
            ],
            [
                'name' => 'FUNDO 2'
            ],
            [
                'name' => 'FUNDO 3'
            ],
            [
                'name' => 'FUNDO 4'
            ]
        ];

        foreach ($fundos as $fundo) {
            Fundo::create($fundo);
        }
 
    }
}
