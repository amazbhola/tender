<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->integer('tender_id')->unique();
            $table->string('description');
            $table->integer('price');
            $table->integer('security');
            $table->integer('method_id');
            $table->integer('location_id');
            $table->integer('similar')->nullable();
            $table->integer('turnover')->nullable();
            $table->integer('Liquid');
            $table->integer('department_id');
            $table->integer('tendercapacity');
            $table->string('others')->nullable();
            $table->string('requerdocument')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('tenders');
    }
}
