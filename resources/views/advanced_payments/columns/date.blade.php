<div class="d-flex align-items-center mt-2">
    @if($row->date === null)
        {{__('messages.common.n/a')}}
    @else
        <div class="badge bg-light-info">
            <div>{{ \Carbon\Carbon::parse($row->date)->translatedFormat('jS M, Y')}}

            </div>
        </div>
    @endif
</div>

