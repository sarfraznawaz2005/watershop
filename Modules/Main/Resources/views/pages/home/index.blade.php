@extends('main::layouts.master')

@section('content')

    @card(['type' => 'white', 'header_type' => 'light', 'classes' => 'mb3'])
    @slot('header')
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#others">Others</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#monthly">Monthly</a>
            </li>
        </ul>
    @endslot

    <div class="tab-content">
        <div class="tab-pane active" id="others">

            <span class="badge badge-warning" style="font-size: 16px;">Today</span>
            <hr style="margin-top: 5px;">

            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'amountDueToday'])}}" class="widget-link">
                        <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Amount Due</h4>
                                <h3>{{number_format($entry->amountDueToday()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'bottlesDueToday'])}}" class="widget-link">
                        <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                            <div class="info">
                                <h4>Bottles Due</h4>
                                <h3>{{$entry->bottlesDueToday()->get()->sum('cnt')}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'totalAmountDueToday'])}}" class="widget-link">
                        <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Total Amount (Paid/Unpaid)</h4>
                                <h3>{{number_format($entry->totalAmountDueToday()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <span class="badge badge-warning" style="font-size: 16px;">Month</span>
            <hr style="margin-top: 5px;">

            <div class="row">

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'amountDueMonth'])}}" class="widget-link">
                        <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Amount Due</h4>
                                <h3>{{number_format($entry->amountDueMonth()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'bottlesDueMonth'])}}" class="widget-link">
                        <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                            <div class="info">
                                <h4>Bottles Due</h4>
                                <h3>{{$entry->bottlesDueMonth()->get()->sum('cnt')}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'totalAmountDueMonth'])}}" class="widget-link">
                        <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Total Amount (Paid/Unpaid)</h4>
                                <h3>{{number_format($entry->totalAmountDueMonth()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <span class="badge badge-warning" style="font-size: 16px;">Overall</span>
            <hr style="margin-top: 5px;">

            <div class="row">

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'amountDueOverall'])}}" class="widget-link">
                        <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Amount Due</h4>
                                <h3>{{number_format($entry->amountDueOverall()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'bottlesDueOverall'])}}" class="widget-link">
                        <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                            <div class="info">
                                <h4>Bottles Due</h4>
                                <h3>{{$entry->bottlesDueOverall()->get()->sum('cnt')}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'totalAmountDueOverall'])}}" class="widget-link">
                        <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Total Amount (Paid/Unpaid)</h4>
                                <h3>{{number_format($entry->totalAmountDueOverall()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </div>

        <div class="tab-pane" id="monthly">
            <span class="badge badge-warning" style="font-size: 16px;">Today</span>
            <hr style="margin-top: 5px;">

            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'amountDueTodayMonthly'])}}" class="widget-link">
                        <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Amount Due</h4>
                                <h3>{{number_format($entry->amountDueTodayMonthly()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'bottlesDueTodayMonthly'])}}" class="widget-link">
                        <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                            <div class="info">
                                <h4>Bottles Due</h4>
                                <h3>{{$entry->bottlesDueTodayMonthly()->get()->sum('cnt')}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'totalAmountDueTodayMonthly'])}}" class="widget-link">
                        <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Total Amount (Paid/Unpaid)</h4>
                                <h3>{{number_format($entry->totalAmountDueTodayMonthly()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <span class="badge badge-warning" style="font-size: 16px;">Month</span>
            <hr style="margin-top: 5px;">

            <div class="row">

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'amountDueMonthMonthly'])}}" class="widget-link">
                        <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Amount Due</h4>
                                <h3>{{number_format($entry->amountDueMonthMonthly()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'bottlesDueMonthMonthly'])}}" class="widget-link">
                        <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                            <div class="info">
                                <h4>Bottles Due</h4>
                                <h3>{{$entry->bottlesDueMonthMonthly()->get()->sum('cnt')}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'totalAmountDueMonthMonthly'])}}" class="widget-link">
                        <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Total Amount (Paid/Unpaid)</h4>
                                <h3>{{number_format($entry->totalAmountDueMonthMonthly()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <span class="badge badge-warning" style="font-size: 16px;">Overall</span>
            <hr style="margin-top: 5px;">

            <div class="row">

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'amountDueOverallMonthly'])}}" class="widget-link">
                        <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Amount Due</h4>
                                <h3>{{number_format($entry->amountDueOverallMonthly()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'bottlesDueOverallMonthly'])}}" class="widget-link">
                        <div class="widget-small danger"><i class="icon fa fa-flask fa-3x"></i>
                            <div class="info">
                                <h4>Bottles Due</h4>
                                <h3>{{$entry->bottlesDueOverallMonthly()->get()->sum('cnt')}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{route('entries.index', ['query' => 'totalAmountDueOverallMonthly'])}}" class="widget-link">
                        <div class="widget-small success"><i class="icon fa fa-money fa-3x"></i>
                            <div class="info">
                                <h4>Total Amount (Paid/Unpaid)</h4>
                                <h3>{{number_format($entry->totalAmountDueOverallMonthly()->get()->sum('amount'))}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>

    @endcard

@stop

@push('styles')
    <style>
        .widget-small .info h4 {
            font-weight: bold;
            font-size: 1rem;
        }
    </style>
@endpush