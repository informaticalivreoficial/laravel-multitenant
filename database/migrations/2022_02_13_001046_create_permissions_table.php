<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('content')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });

        Schema::create('permission_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('permission_id')->constrained('permissions');
            $table->unsignedInteger('profile_id')->constrained('profiles');
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
        Schema::dropIfExists('permission_profile');
        Schema::dropIfExists('permissions');
    }
}
