@if ($row->date === null)
{{__('messages.common.n/a')}}
@else
    <div class="badge bg-light-info">
        {{ \Carbon\Carbon::parse($row->date)->isoFormat('Do MMM, Y')}}
    </div>
@endif
