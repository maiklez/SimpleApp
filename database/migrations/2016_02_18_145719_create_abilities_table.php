<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description');
            $table->timestamps();
        });
        
        	Schema::create('abilities_users', function (Blueprint $table) {
        		$table->increments('id');
        		$table->integer ( 'ability_id' )->unsigned ();
				$table->foreign ( 'ability_id' )->references ( 'id' )->on ( 'abilities' );
				$table->integer ( 'user_id' )->unsigned ();
				$table->foreign ( 'user_id' )->references ( 'id' )->on ( 'users' );
				$table->unique ( array (
						'ability_id',
						'user_id' 
				) );
        	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('abilities_users');
    	Schema::drop('abilities');
    }
}
