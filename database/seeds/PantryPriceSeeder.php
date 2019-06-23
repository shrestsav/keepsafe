<?php

use Illuminate\Database\Seeder;
use App\PantryPrice;

class PantryPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPrices = [
            'client_id' => '0',
            'CSFEP' 	=> '17.50',
            'CTFEP' 	=> '16.50',
            'RSEP' 		=> '16.50',
            'RPEP' 		=> '18.50',
            'REP' 		=> '16.50',
            'RP' 		=> '28',
            'STDCP' 	=> '28',
            'ICP' 		=> '35',
            'CEP' 		=> '16.50',
            'BL' 		=> '400',
            'CO' 		=> '1',
            'EVOR' 		=> '3',
            'EVTR' 		=> '5',
            'K' 		=> '3',
            'MG' 		=> '6',
            'COF' 		=> '150',
            'ERC' 		=> '25',
            'MMC' 		=> '30',
            'HCR' 		=> '0.50',
            'HCP' 		=> '1',
            'HCEVO' 	=> '0.10',
            'HCEVT' 	=> '0.20',
            'HCEK' 		=> '0',
            'HCEMG' 	=> '0.30',
            'DW' 		=> '2',
            'Note' 		=> '',
        ];
        
        PantryPrice::create($defaultPrices);
        
    }
}
