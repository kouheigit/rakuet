<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  $planvalue =  [
		  'title'=>'テストです';
	          'text'=>'テストです';
	     DB::table('testtable')->insert($planvalue);
         ];
    }
}
