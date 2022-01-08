@extends('user.user_layout.user_layout')
@section('content')
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
<section class="about_history_area section_gap-50">
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
                    <div class="panel-heading">THANH TOÁN</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Name:</label>
                                <span class="col-md-3">{{$checkout['name2'] ?? ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Email:</label>
                                <span class="col-md-3">{{$checkout['email'] ?? ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Phone:</label>
                                <span class="col-md-3">{{$checkout['phone2'] ?? ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Ngày bắt đầu:</label>
                                <span class="col-md-3">{{$checkout['start_date'] ?? ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Ngày kết thúc:</label>
                                <span class="col-md-3">{{$checkout['end_date'] ?? ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Loại phòng:</label>
                                <span class="col-md-3">
                                    @if (isSet($checkout['room_id']))
                                        {{ $checkout['room_id']==1?"VIP":($checkout['room_id']==2?"Double Deluxe":($checkout['room_id']==3?"Single Deluxe":"Economic")) }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Tổng tiền:</label>
                                <span class="col-md-3">{{$checkout['totalPrice'] ?? ''}} VNĐ</span>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Note:</label>
                                <span class="col-md-3">{{$checkout['note'] ?? ''}}</span>
                            </div>
                            <button type="button" class="btn btn-primary btn-md">Thanh toán ngay</button>
                            <button type="button" class="btn btn-secondary btn-md">Chờ nhận phòng, thanh toán trực tiếp</button>
                    </div>
                </div>
            </div>
    </div>
</section>
<!--================ About History Area  =================-->

@endsection