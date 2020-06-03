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
                        <i class="glyphicon glyphicon-edit"></i> รายการครุภัณฑ์</div>
                    </div>
                    <div style="padding: 15px;">


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
                @endif

                @if(is_null($equipment))

                <h2 class="text-center">** ไม่มีข้อมูลประเภทครุภัณฑ์ **</h2>

                @else

                        <table id='myTable' class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th id='th_css'>รหัสครุภัณฑ์</th>
                                    <th id='th_css' style='width:10%;'>รูปภาพ</th>
                                    <th id='th_css'>ลักษณะ/ยี่ห้อ</th>
                                    <th id='th_css'>ตำแหน่งที่ตั้ง</th>
                                    <th id='th_css'>สถานะ</th>
                                    <th id='th_css'>หมายเหตุ</th>
                                    <th id='th_css' style='width:15%;'>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipment as $list)
                                    <tr>
                                        <td>{{ $list->equipment_code }}</td>
                                    <td><img src="{{ asset('images/' . $list->equipment_image) }}"
                                            style='height:100px; width:100px;'></td>
                                    <td>{{ $list->equipment_name }}</td>
                                    <td>{{ $list->equipment_location }}</td>
                                    {{-- <td>
                                        @if ($list->equipment_role == 2)
                                        {{ 'ทุกคน' }}
                                        @else
                                        {{ 'ผู้ดูแลระบบ/บุคลากร/อาจารย์' }}
                                        @endif
                                    </td> --}}
                                    <td>
                                        @if ($list->equipment_status == 1)
                                        <h4><label class='badge badge-success'>{{ 'ว่าง' }}</label></h4>
                                        @endif
                                        @if ($list->equipment_status == 2)
                                        <h4><label class='badge badge-danger'>{{ 'ไม่ว่าง' }}</label></h4>
                                        @endif
                                        @if ($list->equipment_status == 3)
                                        <h4><label class='badge badge-warning'>{{ 'ซ่อม/รอซ่อม' }}</label></h4>
                                        @endif
                                        @if ($list->equipment_status == 4)
                                        <h4><label class='badge badge-default'>{{ 'ชำรุด' }}</label></h4>
                                        @endif
                                        @if ($list->equipment_status == 5)
                                        <h4><label class='badge badge-default'>{{ 'บริจาค' }}</label></h4>
                                        @endif
                                        @if ($list->equipment_status == 6)
                                        <h4><label class='badge badge-default'>{{ 'รอบริจาค' }}</label></h4>
                                        @endif
                                        @if ($list->equipment_status == 7)
                                        <h4><label class='badge badge-default'>{{ 'ขายทอดตลาด' }}</label></h4>
                                        @endif
                                        @if ($list->equipment_status == 8)
                                        <h4><<label class='badge badge-default'>{{ 'โอนย้าย' }}</label>/h4>
                                        @endif
                                    </td>
                                    <td>{{ $list->equipment_etc }}</td>
                                    <td>
                                         <div class='btn-group' role='group'>
                                    <button type='button' class='btn btn-success' data-toggle='modal' id='' data-target='#rentModal'>ยืม</button>
                                    <button type='button' class='btn btn-dark' data-toggle='modal' id='' data-target='#Modal'>ข้อมูลเพิ่มเติม</button>
	                                </div>
                                    </td>
                                </tr>
                                @endforeach



                            </tbody>
                        </table>
                        @endif
                        </div>
                </div>
            </div>
        </div>
        </div>

        <div class='modal fade' id='rentModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-centered' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalCenterTitle' style="color:black;">ยืนยันการยืมครุภัณฑ์</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <div>
                                                        <label style="color:black;font-size:15px;">คุณแน่ใจว่าจะยืมครุภัณฑ์ (</label>&nbsp;<label class='label label-warning' style="font-size:15px;">{{ $list->equipment_code }}&nbsp;/&nbsp;{{ $list->equipment_name }}</label>&nbsp;<label style="color:black;font-size:15px;">) ?</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <form action="" method="post">
                                                            @csrf
                                                            <label for="rent_detail" style="color:black;font-size:15px;">วัตถุประสงค์ในการยืม</label>
                                                            <input type="text" class="form-control" id="rent_detail" name="rent_detail" required>
                                                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->name }}" />
                                                            <input type="hidden" id="product_code" name="product_code" value="{{ $list->equipment_code }}" />
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>ยกเลิก</button>
                                                    <button type='submit' class='btn btn-primary'>ยืนยัน</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


@endsection
