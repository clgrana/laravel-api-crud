<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ufs = [
            0 => [
                'name' => 'RONDÔNIA',
                'uf' => 'RO'
            ],
            1 => [
                'name' => 'ACRE',
                'uf' => 'AC'
            ],
            2 => [
                'name' => 'AMAZONAS',
                'uf' => 'AM'
            ],
            3 => [
                'name' => 'RORAIMA',
                'uf' => 'RR'
            ],
            4 => [
                'name' => 'PARÁ',
                'uf' => 'PA'
            ],
            5 => [
                'name' => 'AMAPÁ',
                'uf' => 'AP'
            ],
            6 => [
                'name' => 'TOCANTINS',
                'uf' => 'TO'
            ],
            7 => [
                'name' => 'MARANHÃO',
                'uf' => 'MA'
            ],
            8 => [
                'name' => 'PIAUÍ',
                'uf' => 'PI'
            ],
            9 => [
                'name' => 'CEARÁ',
                'uf' => 'CE'
            ],
            10 => [
                'name' => 'RIO GRANDE DO NORTE',
                'uf' => 'RN'
            ],
            11 => [
                'name' => 'PARAÍBA',
                'uf' => 'PB'
            ],
            12 => [
                'name' => 'PERNAMBUCO',
                'uf' => 'PE'
            ],
            13 => [
                'name' => 'ALAGOAS',
                'uf' => 'AL'
            ],
            14 => [
                'name' => 'SERGIPE',
                'uf' => 'SE'
            ],
            15 => [
                'name' => 'BAHIA',
                'uf' => 'BA'
            ],
            16 => [
                'name' => 'MINAS GERAIS',
                'uf' => 'MG'
            ],
            17 => [
                'name' => 'ESPIRITO SANTO',
                'uf' => 'ES'
            ],
            18 => [
                'name' => 'RIO DE JANEIRO',
                'uf' => 'RJ'
            ],
            19 => [
                'name' => 'SÃO PAULO',
                'uf' => 'SP'
            ],
            20 => [
                'name' => 'PARANÁ',
                'uf' => 'PR'
            ],
            21 => [
                'name' => 'SANTA CATARINA',
                'uf' => 'SC'
            ],
            22 => [
                'name' => 'RIO GRANDE DO SUL',
                'uf' => 'RS'
            ],
            23 => [
                'name' => 'MATO GROSSO DO SUL',
                'uf' => 'MS'
            ],
            24 => [
                'name' => 'MATO GROSSO',
                'uf' => 'MT'
            ],
            25 => [
                'name' => 'GOIÁS',
                'uf' => 'GO'
            ],
            26 => [
                'name' => 'DISTROTO FEDERAL',
                'uf' => 'DF'
            ]
        ];

        foreach ($ufs as $u) {
            $uf = \DB::table('uf')->where('uf', $u['uf'])->get();

            if ($uf->count()) {
                continue;
            }

            \DB::table('uf')->insert(
                [
                    'uf' => $u['uf'],
                    'name' => $u['name'],
                ]
            );
        }
    }
}
