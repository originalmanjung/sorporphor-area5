<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionSubToPersonals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->enum('position_sub', ['ปฏิบัติหน้าที่ผู้อำนวยการกลุ่มบริหารงานบุคคล','ปฏิบัติหน้าที่ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร', 'ปฏิบัติหน้าที่ผู้อำนวยการกลุ่มกฎหมายและคดี', 'ปฏิบัติหน้าที่ผู้อำนวยการหน่วยตรวจสอบภายใน', 'ปฏิบัติหน้าที่ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา'])->nullable()->after('position_general');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personals', function (Blueprint $table) {
            //
        });
    }
}
