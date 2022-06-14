<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->enum('content', ['general','honest','culture','participation']); //general = ทั่วไป honest = กิจกรรมเขตพื้นที่สุจริต-การมีส่วนร่วมของผู้บริหาร, culture = กิจกรรมการเสริมสร้างวัฒนธรรมองค์กร, participation = กิจกรรมการมีส่วนร่วมจากทุกภาคส่วน
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('news');
    }
}
