<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('position')->nullable();
            $table->enum('group', ['ผู้บริหาร', 'กลุ่มอำนวยการ', 'กลุ่มนโยบายและแผน', 'กลุ่มบริหารงานบุคคล', 'กลุ่มบริหารงานการเงินและสินทรัพย์', 'กลุ่มส่งเสริมการจัดการศึกษา', 'กลุ่มพัฒนาครูและบุคลากรทางการศึกษา', 'กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา', 'กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร', 'หน่วยตรวจสอบภายใน',  'กลุ่มกฎหมายและคดี',]);
            $table->enum('position_general', ['ผู้อำนวยการ สพป.เชียงใหม่ เขต 5', 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5', 'ผู้อำนวยการกลุ่มอำนวยการ', 'ผู้อำนวยการกลุ่มนโยบายและแผน', 'ผู้อำนวยการกลุ่มบริหารงานบุคคล', 'ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์', 'ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา', 'ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา', 'ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา', 'ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร', 'ผู้อำนวยการกลุ่มกฎหมายและคดี', 'ผู้อำนวยการหน่วยตรวจสอบภายใน'])->nullable();
            $table->enum('personal_type', ['ข้าราชการ', 'พนักงานราชการ', 'ลูกจ้างประจำ', 'ลูกจ้างชั่วคราว']);
            $table->foreignId('user_id')->constrained('users');
            $table->string('email')->nullable();
            $table->string('phone',10)->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('deletable')->default(true);
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
        Schema::dropIfExists('personals');
    }
}
