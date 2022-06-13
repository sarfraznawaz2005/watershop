@if (isset($entry) && $entry->exists)
    {!! Former::horizontal_open()->action(route('entries.update', $entry))->method('put')->class('validate') !!}
    {{--{!! Former::setOption('automatic_label', false) !!}--}}
    {!! Former::populate($entry) !!}
@else
    {!! Former::horizontal_open()->action(route('entries.store'))->method('post')->class('validate') !!}
@endif

{!! Former::select('area_id', 'Area')->options(['' => 'Select'] + \Modules\Main\Models\Area::pluck('name', 'id')->toArray())->required()->class('form-control no_select2') !!}
{!! Former::text('address', 'House Number')->required() !!}
{!! Former::number('bottles_sent', 'Bottles Sent')->required() !!}
{!! Former::number('bottles_received', 'Bottles Received')->required() !!}
{!! Former::number('amount', 'Amount')->required() !!}
{!! Former::text('rider_name', 'Rider Name') !!}
{!! Former::textarea('notes', 'Notes') !!}
{!! Former::date('created_at', 'Date')->value(isset($entry) ? date('Y-m-d', strtotime($entry->created_at)) : date('Y-m-d', strtotime(now()))) !!}
{!! Former::checkbox('paid', 'Paid') !!}
{!! Former::checkbox('is_monthly', 'Monthly') !!}

<div class="card-footer border-light">
    @button
    <i class="fa fa-save"></i> Save
    @endbutton
</div>

{!! Former::close() !!}

