<div class="d-flex align-items-center py-1">
        @if(Auth::user()->hasRole('Lab Technician'))
            <div class="dropdown">
                <a href="javascript:void(0)" class="btn btn-primary" id="bloodIssuesDropdownMenuButton" data-bs-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="bloodIssuesDropdownMenuButton">
                    <li>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#bloodIssuesAddModal"
                           class="dropdown-item  px-5">{{ __('messages.blood_issue.new_blood_issue') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('blood.donations.excel') }}"
                           class="dropdown-item  px-5"
                           data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
                    </li>
                </ul>
            </div>
    @else
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#bloodIssuesAddModal"
           class="btn btn-primary blood-issue-modal">{{ __('messages.blood_issue.new_blood_issue') }}</a>
    @endif
</div>
