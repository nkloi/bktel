<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->bigInterger()->nullable()->constrained('students')->onDelete('cascade');
            $table->foreignId('teacher_to_subject_id')->bigInterger()->nullable()->constrained('teacher_to_subjects')->onDelete('cascade');
            $table->string('title');
            $table->string('path');
            $table->integer('mark')->nullable();
            $table->string('note')->nullable(); 
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
        Schema::dropIfExists('reports');
    }
}
