@extends('main::layouts.master')

@section('content')

    @card(['type' => 'white', 'header_type' => 'light', 'classes' => 'mb3'])
    @slot('header')
        <strong>Backup</strong>
    @endslot

    <div class="text-center">
        Click the button below to create backup of files + database as zip file.
        <br><br>

        {!! Former::horizontal_open()->action(route('backup.store'))->method('post')->class('validate') !!}
        <button type="submit" class="btn btn-success">Create Backup</button>
        {!! Former::close() !!}
    </div>

    @endcard

@stop
