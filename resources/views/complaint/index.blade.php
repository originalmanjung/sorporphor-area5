@extends('layouts.frontend.app')
@push('css')
<style>
    .card {
        border-radius: 3px;
        border: 0;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }


    .card {
        position: relative;
        width: 100%;
    }


    .complaint-services .col-md-6 {
        margin-bottom: 20px;
    }

    .complaint-services .icon-box {
        background-color: #f8f9fa;
    }

    .complaint-services .icon-box {

        padding: 30px;
        border-radius: 6px;
    }

    .complaint-services .icon-box i {
        float: left;
        color: #30a42a;
        font-size: 40px;
    }

    .complaint-services .icon-box h4 {
        margin-left: 70px;
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 18px;
    }

    .complaint-services .icon-box h4 a {
        color: #556270;
        transition: 0.3s;
    }

    .complaint-services .icon-box p,
    .complaint-services .icon-box .complaint-button {
        margin-left: 70px;
        line-height: 24px;
        font-size: 14px;
    }

    .complaint-services .icon-box:hover h4 a {
        color: #30a42a;
    }

</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>ช่องทางแจ้งเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= complaint-services Section ======= -->
    <section id="complaint-services" class="complaint-services">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    Complaint
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="font-weight-bold" style="color:#556270;">ความเป็นธรรมที่เข้าถึงได้</p>
                        <footer class="blockquote-footer">สำนักเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5 ได้จัดทำช่องทางการร้องเรียนต่างๆ เพื่ออำนวยความสะดวกให้กับประชาชนในการร้องเรียนหากท่านได้รับความเดือดร้อนหรือความไม่เป็นธรรมจากการไม่ปฏิบัติตามกฎหมาย หรือนอกเหนืออำนาจหน้าที่ตามกฎหมายของหน่วยงาน หรือเจ้าหน้าที่ของหน่วยงาน หรือหน่วยงานในสังกัดสำนักเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5 ยังมิได้ปฏิบัติหน้าที่ให้ครบถ้วนตามหมวด 5 หน้าที่ของรัฐ ตามรัฐธรรมนูญ หรือมีกฎหมาย กฎ ข้อบังคับ ระเบียบ คำสั่ง หรือขั้นตอนปฏิบัติงานใดๆ ที่ก่อให้เกิดความเดือดร้อน หรือไม่เป็นธรรมแก่ประชาชน หรือเป็นภาระแก่ประชาชนโดยไม่จำเป็น หรือเกินสมควรแก่เหตุ สามารถแจ้งหรือร้องเรียนได้ ตามช่องทางด้านล่างนี้</footer>
                    </blockquote>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box h-100">
                        <i class="fas fa-tty"></i>
                        <h4><a>ร้องเรียนทางสายด่วนการศึกษา 053-461089</a></h4>
                        <p>โทรศัพท์ไปยังสำนักงาน หมายเลข 053-461089
                            แจ้งชื่อ ที่อยู่ และหมายเลขโทรศัพท์ (ถ้ามี) ของผู้ร้องเรียน
                            แจ้งเลขประจำตัวประชาชน หรือเลขที่หนังสือ เดินทางของผู้ร้องเรียน</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box h-100">
                        <i class="fab fa-internet-explorer"></i>
                        <h4><a>ร้องเรียนทางอินเทอร์เน็ต</a></h4>
                        <p>ท่านสามารถร้องเรียนผ่านเว็บไซต์ สำนักเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5</p>
                        <a href="{{ route('complaints.create') }}" class="btn btn-primary btn-sm complaint-button text-white">คลิกร้องเรียนที่นี่</a>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box h-100">
                       <i class="fas fa-envelope"></i>
                        <h4><a>ร้องเรียนทางไปรษณีย์</a></h4>
                        <p>ทำหนังสือร้องเรียนส่งไปยัง
                            สำนักงานเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5
                            404 หมู่ 10 ถนนเชียงใหม่-ฮอด ตำบลหางดง อำเภอฮอด จังหวัดเชียงใหม่ 50240</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box h-100">
                        <i class="fas fa-male"></i>
                        <h4><a>ร้องเรียนด้วยตนเอง</a></h4>
                        <p>ณ สำนักงานเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5
                            404 หมู่ 10 ถนนเชียงใหม่-ฮอด ตำบลหางดง อำเภอฮอด จังหวัดเชียงใหม่</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End complaint-services Section -->
</main>
@endsection
