@extends('layouts.app-admin')

@section('body')
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 style="text-align:center;">รายการแจ้งซ่อม</h3>
            </div>
            <div class="panel-body">


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

                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="myTable" align="center">
                        <thead class="thead-dark">
                            <tr>
                                <th>รหัสครุภัณฑ์</th>
                            <th>ลักษณะ/ยี่ห้อ</th>
                            <th>ชื่อผู้แจ้งซ่อม</th>
                            <th>คำอธิบาย</th>
                            <th>สถานะการซ่อม</th>
                            <th style="width:20%;">ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_null($repair))
                                <h2 class="text-center">** ไม่มีรายการแจ้งซ่อม **</h2>
                            @else
                            @foreach ($repair as $list)
                            <tr>
                                <td>{{ $list->equipment->equipment_code }}</td>
                                <td>{{ $list->equipment->equipment_name }}</td>
                                <td>{{ $list->user->name }}</td>
                                <td>{{ $list->repair_detail }}</td>
                                <td>
                                    @if ($list->repair_status == 0)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#660000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>แจ้งซ่อม</span>
                                    @endif
                                    @if ($list->rent_status == 1)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#120eeb;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>กำลังดำเนินการ</label>
                                    @endif
                                    @if ($list->rent_status == 2)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#d940ff;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>รออะไหล่</label>
                                    @endif
                                    @if ($list->rent_status == 3)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#06d628;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมสำเร็จ</label>
                                    @endif
                                    @if ($list->rent_status == 4)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#ff0000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ซ่อมไม่สำเร็จ</label>
                                    @endif
                                    @if ($list->rent_status == 5)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#ff6ff0;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ยกเลิกการซ่อม</label>
                                    @endif
                                    @if ($list->rent_status == 6)
                                        <span
                                            style='font-size:16px;font-weight: normal; background:#000000;padding: .2em .6em .3em;display: inline;border-radius: .25em;color: #ffffff;'>ส่งมอบเรียบร้อย</label>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories(' . $repairId . ')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories(' . $repairId . ')"> <i class="glyphicon glyphicon-trash"></i> ลบ</button>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->
@endsection
