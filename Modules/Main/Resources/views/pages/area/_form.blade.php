@if (isset($area) && $area->exists)
    {!! Former::open_for_files()->action(route('areas.update', $area))->method('put')->class('validate') !!}
    {{--{!! Former::setOption('automatic_label', false) !!}--}}
    {!! Former::populate($area) !!}
@else
    {!! Former::open_for_files()->action(route('areas.store'))->method('post')->class('validate') !!}
@endif

{!! Former::text('name', 'Area Name')->required() !!}

<div class="card-footer border-light">
    @button
    <i class="fa fa-save"></i> Save
    @endbutton
</div>

{!! Former::close() !!}

