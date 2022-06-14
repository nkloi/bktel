<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('last_name',30);
            $table->string('first_name',30);
            $table->string('student_code');
            $table->string('department');
            $table->string('faculty');
            $table->string('address');
            $table->string('phone');
            $table->string('note') ->nullable();
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
        Schema::dropIfExists('student');
    }
}
