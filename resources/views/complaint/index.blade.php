@extends('layouts.home.app')
@push('css')
<style>


</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>ช่องทางรับเรื่องร้องเรียน</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li>ช่องทางรับเรื่องร้องเรียน</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= complaint-services Section ======= -->
    <section id="complaint-services" class="complaint-services">
        <div class="container">
            <div class="card">
                <div class="card-header">
                  Complaint
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>ความเป็นธรรมที่เข้าถึงได้</p>
                    <footer class="blockquote-footer">สำนักเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5 ได้จัดทำช่องทางการร้องเรียนต่างๆ เพื่ออำนวยความสะดวกให้กับประชาชนในการร้องเรียนหากท่านได้รับความเดือดร้อนหรือความไม่เป็นธรรมจากการไม่ปฏิบัติตามกฎหมาย หรือนอกเหนืออำนาจหน้าที่ตามกฎหมายของหน่วยงาน หรือเจ้าหน้าที่ของหน่วยงาน หรือหน่วยงานในสังกัดสำนักเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5 ยังมิได้ปฏิบัติหน้าที่ให้ครบถ้วนตามหมวด 5 หน้าที่ของรัฐ ตามรัฐธรรมนูญ หรือมีกฎหมาย กฎ ข้อบังคับ ระเบียบ คำสั่ง หรือขั้นตอนปฏิบัติงานใดๆ ที่ก่อให้เกิดความเดือดร้อน หรือไม่เป็นธรรมแก่ประชาชน หรือเป็นภาระแก่ประชาชนโดยไม่จำเป็น หรือเกินสมควรแก่เหตุ สามารถแจ้งหรือร้องเรียนได้ ตามช่องทางด้านล่างนี้</footer>
                  </blockquote>
                </div>
              </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box h-100">
                        <i class="bi bi-briefcase"></i>
                        <h4><a>ร้องเรียนทางสายด่วนการศึกษา 1579</a></h4>
                        <p>โทรศัพท์ไปยังสำนักงาน หมายเลข 1579
                            แจ้งชื่อ ที่อยู่ และหมายเลขโทรศัพท์ (ถ้ามี) ของผู้ร้องเรียน
                            แจ้งเลขประจำตัวประชาชน หรือเลขที่หนังสือ เดินทางของผู้ร้องเรียน</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box h-100">
                        <i class="bi bi-card-checklist"></i>
                        <h4><a>ร้องเรียนทางอินเทอร์เน็ต</a></h4>
                        <p>ท่านสามารถร้องเรียนผ่านเว็บไซต์ สำนักเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5</p>
                        <a href="{{ route('complaints.create') }}" class="btn btn-danger btn-sm complaint-button text-white">คลิกร้องเรียนที่นี่</a>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box h-100">
                        <i class="bi bi-bar-chart"></i>
                        <h4><a>ร้องเรียนทางไปรษณีย์</a></h4>
                        <p>ทำหนังสือร้องเรียนส่งไปยัง
                            สำนักงานเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5
                            404 หมู่ 10 ถนนเชียงใหม่-ฮอด ตำบลหางดง อำเภอฮอด จังหวัดเชียงใหม่ 50240</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box h-100">
                        <i class="bi bi-binoculars"></i>
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
