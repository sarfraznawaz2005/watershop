@extends('main::layouts.master')

@section('content')

    <span class="badge badge-warning" style="font-size: 16px;">Today</span>
    <hr style="margin-top: 5px;">

    <div class="row">
        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Amount Due</h4>
                        <h3>{{number_format($amountDueToday)}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                    <div class="info">
                        <h4>Bottles Due</h4>
                        <h3>{{$bottlesDueToday}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Amount (Paid/Unpaid)</h4>
                        <h3>{{number_format($amountDueTotal)}}</h3>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <span class="badge badge-warning" style="font-size: 16px;">This Month</span>
    <hr style="margin-top: 5px;">

    <div class="row">

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Amount Due</h4>
                        <h3>{{number_format($amountDueMonth)}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                    <div class="info">
                        <h4>Bottles Due</h4>
                        <h3>{{$bottlesDueMonth}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Amount (Paid/Unpaid)</h4>
                        <h3>{{number_format($amountDueTotalMonth)}}</h3>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <span class="badge badge-warning" style="font-size: 16px;">Overall</span>
    <hr style="margin-top: 5px;">

    <div class="row">

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Amount Due</h4>
                        <h3>{{number_format($amountDueOverall)}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                    <div class="info">
                        <h4>Bottles Due</h4>
                        <h3>{{$bottlesDueOverall}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="widget-link">
                <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                        <h4>Total Amount (Paid/Unpaid)</h4>
                        <h3>{{number_format($amountDueTotalOverall)}}</h3>
                    </div>
                </div>
            </a>
        </div>

    </div>

@stop

@push('styles')
    <style>
        .widget-small .info h4 {
            font-weight: bold;
            font-size: 1rem;
        }
    </style>
@endpush