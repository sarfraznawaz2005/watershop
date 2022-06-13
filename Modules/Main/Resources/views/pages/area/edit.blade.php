@extends('main::layouts.master')

@section('content')

    @card(['type' => 'white', 'header_type' => 'light', 'classes' => 'mb3'])
    @slot('header')
        <div class="pull-left">
            <a href="{{route('areas.index')}}" class="btn btn-secondary">
                <i class="fa fa-arrow-circle-left"></i> Back to Area List
            </a>
        </div>
        <div class="clearfix"></div>
    @endslot

    @include('main::pages.area._form')

    @endcard

@endsection
