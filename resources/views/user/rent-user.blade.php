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
                        <i class="glyphicon glyphicon-edit"></i>ติดตามรายการยืม - คืน</div>
                    </div>
                    <div style="padding: 15px;">

                    <table id='myTable' class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <!-- <th id="th_css">ลำดับ</th> -->
                                        <th id="th_css">ชื่อผู้ยืม</th>
                                        <th id="th_css">รูปภาพ</th>
                                        <th id="th_css">รหัสครุภัณฑ์</th>
                                        <th id="th_css">ลักษณะ/ยี่ห้อ</th>
                                        <th id="th_css">สถานะการยืม</th>
                                        <th id="th_css">วัตถุประสงค์</th>
                                        <th id="th_css">หมายเหตุ</th>
                                        <th id="th_css">ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </fieldset>

                        </div>
                </div>
            </div>
        </div>
        </div>

@endsection
