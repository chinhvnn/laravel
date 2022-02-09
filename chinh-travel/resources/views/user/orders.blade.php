@extends('user.user_layout.user_layout') @section('content')
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Booking</h2>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Booking</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ About History Area  =================-->
<section class="section_gap-50 testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <div class="panel panel-default">
                    Thanh điều hướng bên
                    <ul>
                        <li><a href="/list-order">Danh sách đã đặt</a></li>
                        <li>Mục 2</li>
                        <li>Mục 3</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Booking</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('checkout') }}">
                            {{ csrf_field() }}

                            <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Name </label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="name2" value="{{Auth::user()->user_name ?? ''}}" required autofocus> @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
                                </div>
                            </div>

                            <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">E-Mail Address</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email ?? ''}}" required> @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="user_phone" class="col-md-3 control-label">Phone number</label>
                                <div class="col-md-8">
                                    <input id="user_phone" type="user_phone" class="form-control" name="phone2" value="{{Auth::user()->user_phone ?? ''}}" required>
                                </div>
                            </div>

                            <div class="form-row col">
                                <div class="col-md-7 form-group">
                                    <label for="start_date" class="control-label">Ngày bắt đầu</label>
                                    <div class="input-group date" id="datetimepicker11">
                                        <input type='text' class="form-control act-startDate" placeholder="Arrival Date" name="start_date" value="{{ $orders['start_date'] ?? ''}}" required/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="room_num" class="control-label">Số ngày thuê</label>
                                    <div class="input-group">
                                        <input type="text" readonly class="form-control alert-danger act-date" value="1" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row col">
                                <div class="form-group col-md-7">
                                    <label for="end_date" class="control-label">Ngày trả phòng </label>
                                    <div class="input-group date" id="datetimepicker11">
                                        <input type='text' class="form-control act-endDate" placeholder="Departure Date" name="end_date" value="{{ $orders['end_date'] ?? ''}}" required/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row col">
                                <div class="col-md-7 form-group">
                                    <label for="room_id" class="control-label">Chọn phòng</label>
                                    <div class="input-group">
                                        <select class="wide" name="room_id" id="room_id">
                                            @for ($i = 1; $i <= 4; $i++)
                                            @if (@isset($orders) && ($orders['room_id'] == $i))
                                                <option selected value="{{$i}}">{{ $i==1?"VIP":($i==2?"Double Deluxe":($i==3?"Single Deluxe":"Economic")) }}</option>
                                                @else   
                                                <option value="{{$i}}">{{ $i==1?"VIP":($i==2?"Double Deluxe":($i==3?"Single Deluxe":"Economic")) }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label for="room_num" class="control-label">Số lượng</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control act-roomNum" id="quantity" name="quantity" min="1" max="5" name="room_num" value="1" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <p><a href="/accomodation" id="act-detailRoom">Chi tiết phòng</a></p>
                                <p class="text-break" id="act-desRoom"></p>
                            </div>

                            <div class="form-row col">
                                <div class="col-md-7 form-group">
                                    <label for="totalPrice" class="control-label">Tổng tiền (đ)</label>
                                    <div class="input-group">
                                        <input type="text" readonly class="form-control alert-danger act-totalPrice" name=totalPrice value="" />
                                    </div>

                                </div>
                                <div class="col form-group">
                                    <label for="price" class="control-label">Đơn giá (đ/đêm)</label>
                                    <div class="input-group">
                                        <input type="text" readonly class="form-control alert-danger act-price" value="" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="note" class="control-label">Ghi chú</label>
                                <div class="input-group">
                                    <textarea type="text" class="form-control" name="note">{{ $orders['note'] ?? 'Ghi chú'}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đặt chỗ
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ About History Area  =================-->

@endsection @section('script')
<script>
    function tinhGiaPhong() {
            var sophong = $(".act-roomNum").val();
            var gia = $(".act-price").val();

            var start = Date.parse($(".act-startDate").val());
            var end = Date.parse($(".act-endDate").val());
            var ngaythue = Math.floor((end - start) / (60 * 60 * 24 * 1000));
            $(".act-date").val(ngaythue);

            var tongtien = sophong * gia * ngaythue;
            $(".act-totalPrice").val(tongtien);;

            var room_id = $("#room_id").val();
            //thay the bang cau lenh for cho tuong minh
            $(".act-date").val(ngaythue);
            if (room_id == 1) {
                $(".act-price").val(750);
                $("#act-desRoom").text("Mô tả: Phòng loại 1");
                $("#act-detailRoom").attr("href", "#");
            }
            if (room_id == 2) {
                $(".act-price").val(250);
                $("#act-desRoom").text("Mô tả: Phòng loại 2");
                $("#act-detailRoom").attr("href", "#");
            }
            if (room_id == 3) {
                $(".act-price").val(200);
                $("#act-desRoom").text("Mô tả: Phòng loại 3");
                $("#act-detailRoom").attr("href", "#");
            }
            if (room_id == 4) {
                $(".act-price").val(200);
                $("#act-desRoom").text("Mô tả: Phòng loại 4");
                $("#act-detailRoom").attr("href", "#");
            }
        }
        //khi thay doi nut
        $(".act-roomNum, .act-startDate, .act-endDate, #room_id").change(function() {
            tinhGiaPhong();
        });
</script>



@endsection
