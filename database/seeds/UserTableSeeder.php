<?php

	/**
	* 
	*/
	class UserTableSeeder extends Seeder
	{
		
		public function run()
		{
			DB::table->('users')->delete();
			User::create(array(
					'name'=>'admin',
					'email'=>'admin@example.com',
					'passord'=>Hash::make('admin')
				));
		}
	}