<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('teachers');
       
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 15)->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('app_language', 5)->default('en');
            $table->integer('teacher_type', false, true)->default(101);
            $table->mediumText('description')->nullable();
            
            $table->string('salutation', 10)->nullable();
            $table->string('surname')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            
            $table->string('gender', 1)->nullable();
            
            $table->date('birthdate')->nullable();
            $table->dateTimeTz('last_login')->nullable();
            $table->dateTimeTz('last_location_time')->nullable();
            $table->decimal('last_location_lat')->nullable();
            $table->dateTime('last_location_lon')->nullable();
            
            $table->smallInteger('is_activated')->default(0);
            
            $table->string('avatar', 45)->default('');
            
            $table->string('country', 3)->nullable();
            $table->string('province', 5)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('address', 100)->nullable();
            
            $table->json('teacher_options')->nullable();
            
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('teachers');
    }
}
