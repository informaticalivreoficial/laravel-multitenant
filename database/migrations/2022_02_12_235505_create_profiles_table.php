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
            $table->increments('id');
            $table->string('name');
            $table->text('content')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });

        Schema::create('plan_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profile_id')->constrained('profiles');
            $table->unsignedInteger('plan_id')->constrained('plans');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('plan_profile');
        Schema::dropIfExists('profiles');        
    }
}
