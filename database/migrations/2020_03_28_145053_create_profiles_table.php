<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('rfc',12);
            $table->string('phoneH',10);
            $table->string('phoneM',10);
            $table->string('phoneO',10);
            $table->binary('photo');
            $table->boolean('isBusiness');
            $table->string('concat_name',200);
            $table->string('concat_phoneH',10);
            $table->string('concat_phoneM',10);
            $table->string('concact_email',50);
            $table->integer('id_user')->unsigned();
            $table->string('email',50);
    
            $table->string('l_whats_app',50);
            $table->string('l_facebook',50);
            $table->string('l_twitter',50);
            $table->string('l_instagram',50);
    
            $table->timestamps();                        
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
