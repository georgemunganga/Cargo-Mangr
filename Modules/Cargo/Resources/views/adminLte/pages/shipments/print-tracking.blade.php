@php
    use \Milon\Barcode\DNS1D;
    $d = new DNS1D();

    $admin  = 1;
    $code = filter_var($model->code, FILTER_SANITIZE_NUMBER_INT);
@endphp

@extends('cargo::adminLte.layouts.master')

@section('pageTitle')
    {{ __('cargo::view.package_list') }}
@endsection

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!-- begin::Card-->
        <div class="overflow-hidden card card-custom">
            <div class="p-0 card-body">
                <style>
                    .payment-wrap {
                    border: 1px solid #ececec;
                    padding: 0 10px 10px;
                    margin: 0 0 10px;
                    border-radius: 3px;}

                    .payment-title {
                    border-bottom: 1px solid #ccc;
                    padding: 18px 0;
                    margin: 0 0 26px; }
                    .payment-title span {
                        display: inline-block;
                        color: #ff6b6b;
                        font-size: 22px;
                        margin: 0 8px 0 0; }
                    .payment-title h4 {
                        display: inline-block;
                        margin: 0; }

                    .track-title {
                    border-bottom: 1px solid #ccc;
                    padding: 3px 0;
                    margin: 0 0 6px; }
                    .track-title span {
                        display: inline-block;
                        color: #bbb;
                        font-size: 18px;
                        margin: 0 5px 0 0; }
                    .track-title h4 {
                        display: inline-block;
                        margin: 0; }

                    .trackstatus-title {
                    border-bottom: 0px solid #ccc;
                    padding: 3px 0;
                    margin: 0 0 6px; }
                    .trackstatus-title span {
                        display: inline-block;
                        color: #00ab4c;
                        font-size: 18px;
                        margin: 0 8px 0 0; }
                    .trackstatus-title h4 {
                        display: inline-block;
                        margin: 0; }

                    .mapstatus-title {
                    border-bottom: 0px solid #ccc;
                    padding: 3px 0;
                    margin: 0 0 6px; }
                    .mapstatus-title span {
                        display: inline-block;
                        color: #2962FF;
                        font-size: 18px;
                        margin: 0 8px 0 0; }
                    .mapstatus-title h4 {
                        display: inline-block;
                        margin: 0; }

                    .card-header:hover {
                    text-decoration: none; }

                    .card-header h5 {
                    text-align: left;
                    font-size: 20px;
                    font-weight: 500; }

                    .card-header img {
                    width: 82px;
                    position: absolute;
                    right: 14px;
                    top: 13px; }

                    .booking-summary_block {
                    border: 1px solid #ececec; }
                    .booking-summary_block h6 {
                        font-weight: 700; }
                    .booking-summary_block span {
                        font-size: 14px; }

                    .booking-summary-box {
                    padding: 24px; }

                    .booking-summary_contact {
                    margin: 22px 0 22px; }
                    .booking-summary_contact p {
                        font-size: 15px;
                        margin: 0;
                        line-height: 1.8; }

                    .booking-summary_deatail h5 {
                    font-weight: 600; }

                    .min-height-block {
                    min-height: 500px; }

                    .mintrack-height-block {
                    min-height: 250px; }

                    .booking-cost {
                    margin: 20px 0 0; }
                    .booking-cost span {
                        font-weight: 600; }
                    .booking-cost p {
                        font-size: 15px;
                        margin: 10px 0 0;
                        line-height: 1.8; }
                        .booking-cost p span {
                        float: right; }

                    .track-cost {
                    margin: 0px 0 0; }
                    .track-cost span {
                        font-weight: 600; }
                    .track-cost p {
                        font-size: 15px;
                        margin: 10px 0 0;
                        line-height: 1; }



                    .payment-method-collapse .card-header {
                    cursor: pointer; }

                    .total-red {
                    color: #ff6b6b; }

                    .flex-fill {
                    -ms-flex: 1 1 auto !important;
                    -webkit-box-flex: 1 !important;
                    flex: 1 1 auto !important; }

                    /*# sourceMappingURL=style.css.map */


                    .param {
                        margin-bottom: 7px;
                        line-height: 1.4;
                    }
                    .param-inline dt {
                        display: inline-block;
                    }
                    .param dt {
                        margin: 0;
                        margin-right: 7px;
                        font-weight: 600;
                    }
                    .param-inline dd {
                        vertical-align: baseline;
                        display: inline-block;
                    }

                    .param dd {
                        margin: 0;
                        vertical-align: baseline;
                    }

                    .shopping-cart-wrap .price {
                        font-size: 18px;
                        margin-right: 5px;
                        display: block;
                    }

                    .table {
                        width: 100%;
                        background: #fff;
                        -webkit-box-shadow: rgba(0,0,0,.19) 0 2px 6px;
                        box-shadow: 0 1px 3px rgba(0,0,0,.19);
                        border-radius: 8px;
                        border-color: #ff6b6b;
                        border-radius: .35rem;
                        -webkit-font-smoothing: antialiased;
                        color: #737373;
                    }

                    .text-muted {
                        background: #fafafa;
                        line-height: 2.5;
                    }
                    var {
                        font-style: normal;
                    }

                    h5.form_sub {
                        color: #797979;
                        -webkit-box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        box-sizing: border-box;
                        padding: 10px 10px 12px;
                        background: #f3f3f3;
                        margin: 23px 0 12px;
                        font-size: 15px;
                        text-align: left;
                    }


                    .timeline {
                    position: relative;
                    padding: 1em 3em;
                    border-left: 2px solid #82b641;
                    border-top: none;
                    }

                    .event .event-speaker {
                    font-style: italic;
                    text-align: right;
                    }

                    .timeline .event {
                    border-bottom: 1px dashed rgba(89, 89, 89, 0.14);
                    padding-bottom: 2em;
                    margin-bottom: 0em;
                    position: relative;
                    }

                    .timeline .event:last-of-type {
                    padding-bottom: 0;
                    margin-bottom: 0;
                    border: none;
                    }

                    .timeline .event:after {
                    position: absolute;
                    display: block;
                    }

                    .timeline .event:after {
                    box-shadow: 0 0 0 4px #82b641;
                    left: -52.85px;
                    background: #fff;
                    border-radius: 50%;
                    height: 8px;
                    width: 8px;
                    content: "";
                    top: 15px;
                    }

                    .fake{
                        background: #fff;
                        padding: 30px;
                    }

                    .booking-page-container h1{
                        text-align: center;
                        padding: 30px;
                    }

                    #items {
                        font-family: 'Poppins', sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                </style>
                <!-- ERROR PAGE -->
                <section class="bg-home">
                    <div class="home-center">
                        <div class="home-desc-center">
                            <div class="container">
                                <div class="checkout-form">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="user-profile-data">

                                                <br><br><br>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="trackstatus-title">
                                                            <p><span class="ti-package align-top" style="font-size: 30px;"></span> <b>{{$model->getStatus()}}</b></p>
                                                            <label> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="trackstatus-title">
                                                        <label>{{ __('cargo::view.shipment') }}: <b>{{$model->code}}</b></label>
                                                    </div>
                                                    </div>

                                                </div>

                                                <!-- General Information -->
                                                <div class="payment-wrap">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="track-title">
                                                                <h5 class="form_sub" style="background-color: #ff700a; border-radius: 3px; color:white">المرسل</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <span class="ti-location-pin align-top"style="font-size: 30px;"></span> <label>جمع المدينة<br>
                                                                    <b>@if(isset($model->from_country)){{$model->from_country->name}} @endif</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <span class="ti-location-pin align-top"style="font-size: 30px;"></span> <label>مدينة المنشأ<br>
                                                                    <b>@if(isset($model->from_state)){{$model->from_state->name}} @endif </b></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <span class="ti-calendar align-top"style="font-size: 30px;"></span> <label>تاريخ الشحن<br>
                                                                    <b>{{$model->shipping_date}}</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="track-title">
                                                                    <span class="ti-timer align-top"style="font-size: 30px;"></span> <label>وقت الشحن<br>
                                                                        <b>{{ $model->deliveryTime ? json_decode($model->deliveryTime->name, true)[app()->getLocale()] : ''}}</b></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <label>اسم جهة الاتصال<br> <b>{{ $client->name }}</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="track-title">
                                                                    <span class="ti-direction-alt align-top" style="font-size: 30px;"></span> <label>عنوان  الاتصال<br> <b>{{$ClientAddress->address}}</b></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach($PackageShipment as $package)
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <label>كمية الشحن<br> <b>{{$package->qty}}</b></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="track-title">
                                                                    <label>{{ __('cargo::view.weigh_length_width_height') }}<br> <b> {{$package->weight." ". __('cargo::view.KG')." x ".$package->length." ". __('cargo::view.CM') ." x ".$package->width." ".__('cargo::view.CM')." x ".$package->height." ".__('cargo::view.CM')}}</b></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="track-title">
                                                                    <span class="ti-comment-alt align-top"
                                                                        style="font-size: 30px;"></span>
                                                                    <label>
                                                                    {{ __('cargo::view.package_items') }} <br> <b>{{$package->description}}</b>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <!--// General Information -->

                                                <!-- track shipment -->
                                                <div class="payment-wrap">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="track-title">
                                                                <h5 class="form_sub"  style="background-color: #ff700a; border-radius: 3px; color:white"> المستلم </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <span class="ti-location-pin align-top" style="font-size: 30px;"></span> <label>مدينة التوصيل<br>
                                                                    <b>@if(isset($model->to_country)){{$model->to_country->name}} @endif</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <span class="ti-location-pin align-top" style="font-size: 30px;"></span> <label>مدينة الوجهة<br>
                                                                    <b>@if(isset($model->to_state)){{$model->to_state->name}} @endif</b></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <span class="ti-calendar align-top"
                                                                    style="font-size: 30px;"></span> <label>وقت الشحن<br>
                                                                    <b>{{ $model->deliveryTime ? json_decode($model->deliveryTime->name, true)[app()->getLocale()] : ''}}</b>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="track-title">
                                                                    <span class="ti-timer align-top"
                                                                        style="font-size: 30px;"></span> <label>تاريخ التسليم  المقدّر<br> <b>{{$model->collection_time}}</b></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="track-title">
                                                                <label>اسم جهة الاتصال<br> <b>{{$model->reciver_name}}</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="track-title">
                                                                    <span class="ti-direction-alt align-top"
                                                                        style="font-size: 30px;"></span> <label>عنوان الاتصال<br> <b>{{$model->reciver_address}}</b></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> <!-- /.user-profile-data -->
                                        </div> <!-- /.col- -->

                                        <div class="col-lg-5">
                                            <br><br><br><br><br><br><br>
                                            <div class="booking-summary_block">
                                                <div class="booking-summary-box">
                                                    <h5>Booking Summary</h5>
                                                    <div class="track-cost">
                                                        <ul class="timeline a">
                                                            <li class="event">
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <p class="text-left button5">{{$model->created_at->diffForHumans()}}</p>
                                                                        <h6 class="text-left button4">
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <p class="text-right button5">{{ __('cargo::view.created') }}</p>
                                                                        <h4></h4>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!--event schedule 1 end-->
                                                        </ul>
                                                    </div>
                                                    <div class="track-cost">

                                                        <ul class="timeline a">
                                                            @foreach($model->logs()->orderBy('id','asc')->get() as $log)
                                                            <li class="event">
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <p class="text-left button5">{{$log->created_at->diffForHumans()}}</p>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <p class="text-right button5">{{Modules\Cargo\Entities\Shipment::getClientStatusByStatusId($log->to)}}</p>
                                                                        <h4></h4>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!--event schedule 1 end-->
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- /.row -->
                                </div> <!-- /.checkout-form -->
                            </div> <!-- /.container -->
                        </div>
                    </div>
                    <br><br>

                </section>
            </div>
        </div>
        <!-- end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

{{-- Inject styles --}}
@section('styles')
<style media="print">
    .no-print, div#kt_header_mobile, div#kt_header, div#kt_footer{
        display: none;
    }
</style>
@endsection

{{-- Inject Scripts --}}
@section('scripts')
<script>
    window.onload = function() {
        setTimeout(function () {
            javascript:window.print();
        }, 300);
    };
</script>
@endsection
