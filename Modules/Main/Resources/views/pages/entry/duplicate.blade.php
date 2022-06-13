@extends('main::layouts.master')

@section('content')

    @card(['type' => 'white', 'header_type' => 'light', 'classes' => 'mb3'])
    @slot('header')
        <div class="pull-left">
            <a href="{{route('entries.index')}}" class="btn btn-secondary">
                <i class="fa fa-arrow-circle-left"></i> Back to Entries List
            </a>
        </div>
        <div class="clearfix"></div>
    @endslot

    {!! Former::horizontal_open()->action(route('entries.store'))->method('post')->class('validate') !!}
    {!! Former::populate($entry) !!}

    {!! Former::select('area_id', 'Area')->options(['' => 'Select'] + \Modules\Main\Models\Area::pluck('name', 'id')->toArray())->required()->class('form-control no_select2') !!}
    {!! Former::text('address', 'House Number')->required() !!}
    {!! Former::number('bottles_sent', 'Bottles Sent')->required() !!}
    {!! Former::number('bottles_received', 'Bottles Received')->required() !!}
    {!! Former::number('amount', 'Amount')->required() !!}
    {!! Former::text('rider_name', 'Rider Name') !!}
    {!! Former::textarea('notes', 'Notes') !!}
    {!! Former::date('created_at', 'Date')->value(date('Y-m-d', strtotime($entry->created_at))) !!}
    {!! Former::checkbox('paid', 'Paid') !!}
    {!! Former::checkbox('is_monthly', 'Monthly') !!}

    <div class="card-footer border-light">
        @button
        <i class="fa fa-save"></i> Save
        @endbutton
    </div>

    {!! Former::close() !!}

    @endcard

@endsection
