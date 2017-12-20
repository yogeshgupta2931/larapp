<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	[
	        	'id' 		 => '1',
	            'first_name' => ‘Yogesh’,
	            'last_name'  => ‘Gupta’,
	            'password'   => bcrypt('Abcd1234')
	        ],
	        [
	    		'id' 		 => '2',
	            'first_name' => ‘Vidhi’,
	            'last_name'  => ‘Gupta’,
	            'password'   => bcrypt('Abcd1234')
	        ]
	    ]);
    }
}