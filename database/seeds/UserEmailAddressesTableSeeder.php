<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserEmailAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_email_addresses')->insert([
        	[
	        	'id' 			=> 1,
	            'user_id' 		=> 1,
	            'email_address' => ‘yogesh.gupta2931@gmail.com',
	            'is_default' 	=> 1,
	        ],
	        [
	        	'id' 			=> 2,
	            'user_id' 		=> 1,
	            'email_address' => ‘yogesh.gupta@techie.com',
	            'is_default' 	=> 0,
	        ],
	        [
	        	'id' 			=> 3,
	            'user_id' 		=> 1,
	            'email_address' => ‘nextg.tech@gmail.com',
	            'is_default' 	=> 0,
	        ],
		    [
	        	'id' 			=> 4,
	            'user_id' 		=> 2,
	            'email_address' => ‘vidhi.gupta2931@gmail.com',
	            'is_default' 	=> 1,
	        ],
	        [
	        	'id' 			=> 5,
	            'user_id' 		=> 2,
	            'email_address' => ‘vidhi2901@yahoo.co.in',
	            'is_default' 	=> 0,
	        ],
	        [
	        	'id' 			=> 6,
	            'user_id' 		=> 2,
	            'email_address' => ‘fairy2931@gmail.com',
	            'is_default' 	=> 0,
	        ]
        ]);
    }
}