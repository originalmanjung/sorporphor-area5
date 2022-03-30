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
            $table->boolean('manager_type')->nullable()->default(false);
            $table->enum('position_general', ['ผู้อำนวยการ สพป.เชียงใหม่ เขต 5', 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5', 'ผู้อำนวยการกลุ่มอำนวยการ', 'ผู้อำนวยการกลุ่มนโยบายและแผน', 'ผู้อำนวยการกลุ่มบริหารงานบุคคล', 'ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์', 'ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา', 'ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา', 'ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา', 'ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร', 'ผู้อำนวยการกลุ่มกฎหมายและคดี', 'ผู้อำนวยการหน่วยตรวจสอบภายใน'])->nullable();
            $table->string('level')->nullable();
            $table->string('layer')->nullable();
            $table->enum('personal_type', ['ข้าราชการ', 'พนักงานราชการ', 'ลูกจ้างประจำ', 'ลูกจ้างชั่วคราว']);
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('user_id')->constrained('users');
            $table->string('email')->nullable();
            $table->string('phone',10)->unique()->nullable();
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
