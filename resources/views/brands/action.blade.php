<div class="d-flex justify-content-center align-items-center">
    <a href="{{route('brands.edit',$row->id)}}" title="<?php echo __('messages.common.edit') ?>"
       class="btn px-2 text-primary fs-3">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
       class="brand-delete-btn btn px-2 text-danger fs-3 {{ getLoggedInUser()->language = 'ar' ? ' ps-5' : '' }}">
        <i class="fa-solid fa-trash"></i>
    </a>
</div>
