<?php

use Illuminate\Database\Seeder;

class usertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $param = [
		    'name'=>'大橋昌信',
		    'email'=>'oohashi@gmail.com',
		    'email_verified_at'=>'oohashi@gmail.com',
		    'password'=>'oohashi',
	    ];
	    DB::table('users')->insert($param);
    }
}
