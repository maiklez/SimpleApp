<?php

use App\User;
use App\Models\Ability;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
		$users = array(
				array(
						'name'      => 'maik',
						'email'      => 'maik.ledzep@gmail.com',
						'password'   => Hash::make('12345678'),
						'created_at' => new DateTime,
						'updated_at' => new DateTime,
				)
		);
		
		DB::table('users')->insert( $users );
		
		DB::table('abilities')->delete();
        $abilities = array(
            array(
                'id'      =>  '1',
                'name'      => 'admin_master',
                'description' => 'The master of the universe',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,            
            ),
        		array(
        				'id'      =>  '2',
        				'name'      => 'post_blog',
        				'description' => 'Post a blog',
        				'created_at' => new DateTime,
        				'updated_at' => new DateTime,
        		)
        );

        DB::table('abilities')->insert( $abilities );
        
        $maik = User::where('name', 'maik')->first();
        $ab = Ability::where('name', 'admin_master')->first();
        //$abs=[$ab];
        $maik->abilities()->attach($ab);
    }
}
