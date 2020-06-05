@extends('layouts.app-user')

@section('body')

<div class="container" style="padding-top:20px;">
    <div class="row" style="padding-top:20px;">
        <div class="col-md-12">

            <div style="box-shadow: 0 1px 2px rgba(0,0,0,.05);border-color: #ddd;margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;">

                <div style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;">
                    <div style="box-sizing: border-box;">
                        <i class="glyphicon glyphicon-edit"></i> รายละเอียดการซ่อม</div>
                </div>

                <div style="padding: 15px;">



                    <form class="well form-horizontal" action="php_action/repair_up_image.php" method="post"
                        id="contact_form" enctype="multipart/form-data" form="form1">

                        <!--Body-->
                        <div class="form-group row">

                            <div class="input-group mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">พัสดุ</label>

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/745/745437.svg' width="21px"
                                            height="21px"></div>
                                </div>
                                <select class="form-control" title="เลือกพัสดุ" id="picker" name="equipment_id"
                                    data-live-search="true">
                                @if(is_null($equipment))
                                <option value="">** ไม่มีข้อมูลครุภัณฑ์ **</option>
                                @else
                                @foreach ($equipment as $list)
                                <option class="form-control" value="{{ $list->id }}">{{ $list->equipment_name }}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                            <!-- <div>
                                    <label style="color:#60e160;padding-left:20px;">ค้นหาพัสดุโดย
                                        ชื่อพัสดุ/ยี่ห้อ</label>
                                        </div>
                                    </div> -->
                        </div>

                        {{-- <div class="form-group row">
                            <div class="input-group mb-2">

                                <label for="inputEmail3" class="col-sm-2 col-form-label">หมายเลขครุภัณฑ์</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/2627/2627843.svg' width="21px"
                                            height="21px"></div>

                                </div>


                                <input name="pcode" id="pcode" value="" class="form-control" type="text">

                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="input-group mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">รายละเอียดการซ่อม/ปัญหา</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/1102/1102457.svg' width="21px"
                                            height="21px"></div>
                                </div>
                                <textarea class="form-control" name="detail" id="detail" placeholder="กรอกรายละเอียด"
                                    required></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="input-group mb-2">

                                <label for="inputEmail3" class="col-sm-2 col-form-label">หมายเหตุ</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/2615/2615067.svg' width="21px"
                                            height="21px"></div>
                                </div>

                                <input name="etc" id="etc" placeholder="" class="form-control" type="text" required>

                            </div>
                            <label style="color:#60e160;padding-left:20px;">คำอธิบายหรือหมายเหตุเพิ่มเติม
                                (สถานที่/เลขห้อง)</label>

                        </div>


                        <div class="form-group row">
                            <div class="input-group mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">เพิ่มไฟล์ภาพ</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img
                                            src='https://image.flaticon.com/icons/svg/685/685686.svg' width="21px"
                                            height="21px"></div>
                                </div>
                                <input name="files[]" class="form-control" type="file" multiple>
                            </div>

                            <label style="color:#60e160;padding-left:20px;">เลือกรูปภาพอัปโหลด
                                (สามารถเลือกได้หลายไฟล์)</label>
                        </div>

                        <div class="text-center">
                            <input type="submit" name="submit" value="บันทึก"
                                class="btn btn-info btn-block rounded-0 py-2">
                        </div>
                </div>

                </form>



            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $('#pname').change(function () {
            $.POST("my-ajax-call-code.php", {
                    pid: $("#pname").val()
                },
                function (data) {
                    $('input[name="pcode"]').val(data.description);
                }, "json");
        });
    });

</script>

<script>
    $(document).ready(function () {
        $('#picker').select2();
    });

</script>

@endsection
