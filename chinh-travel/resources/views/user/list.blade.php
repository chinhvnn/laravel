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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Ngày nhận phòng</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>

                                @for ($i = 0; $i < count($bills); $i++)
                                    <tr>
                                        <th scope="row">{{ $bills[$i]->id }}</th>
                                        <td>{{ $bills[$i]->name2 }}</td>
                                        <td>{{ $bills[$i]->phone2 }}</td>
                                        <td>{{ $bills[$i]->date_start }}</td>
                                        <td>{{ $bills[$i]->totalPrice }}</td>
                                        <td>{{ $bills[$i]->status }}</td>
                                        <td>Chi tiet</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                        {{ $bills->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--================ About History Area  =================-->

@endsection
