<?php

use Illuminate\Database\Seeder;
use App\ApiCall;
use Illuminate\Support\Facades\DB;

class ChampionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = new ApiCall;

        $champions = $api->getChampions();

        DB::transaction(function () use ($champions, $api) {
        	foreach($champions as $champion){
            
            DB::table('champions')->insert([
		    						'riot_id' => $champion['id'],
		    						'active' => $champion['active'],
		    						'botEnabled' => $champion['botEnabled'],
		    						'rankedPlayEnabled'=> $champion['rankedPlayEnabled'],
		    						'freeToPlay' => $champion['freeToPlay'],
		    						'botMmEnabled' => $champion['botMmEnabled'],
                                    'created_at' => date("Y-m-d H:i:s"),
		    						'updated_at' => date("Y-m-d H:i:s")
                                    ]);	
        	}
		    

		   
		});
    }
}
