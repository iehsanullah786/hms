<div class="alert alert-danger d-none hide" id="visitorErrorsBox"></div>
<div class="row">
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Name',__('messages.visitor.purpose').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{-- {{ Form::select('purpose', $purpose, null, ['class' => 'form-select', 'id' => 'visitorPurpose','placeholder' => __('messages.visitor.select_purpose')]) }} --}}
    @if($isEdit)
    <select class="form-select status-selector " id="visitorPurpose" data-control="select2" name="purpose">
        <option value="">{{ __('messages.visitor.select_purpose') }}</option>
        <option @selected($visitor->purpose == 1)  value="1">{{ __('messages.visitor_filter.visit') }}</option>
        <option @selected($visitor->purpose == 2) value="2">{{ __('messages.visitor_filter.enquiry') }}</option>
        <option @selected($visitor->purpose == 3) value="3">{{ __('messages.visitor_filter.seminar') }}</option>
    </select>
    @else
    <select class="form-select status-selector " id="visitorPurpose" data-control="select2" name="purpose">
        <option value="">{{ __('messages.visitor.select_purpose') }}</option>
        <option  value="1">{{ __('messages.visitor_filter.visit') }}</option>
        <option  value="2">{{ __('messages.visitor_filter.enquiry') }}</option>
        <option  value="3">{{ __('messages.visitor_filter.seminar') }}</option>
    </select>
    @endif
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Name',__('messages.visitor.name').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('name', null, ['class' => 'form-control','required', 'placeholder' => __('messages.visitor.name')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Phone',__('messages.visitor.phone').':', ['class' => 'form-label']) }}
        <br>
        {!! Form::tel('phone', null, ['class' => 'form-control phoneNumber','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
        {!! Form::hidden('prefix_code',null,['class'=>'prefix_code','id'=>'visitorPrefixCode']) !!}
        {!! Form::hidden('country_iso', null, ['class' => 'country_iso']) !!}
        <span id="valid-msg"
              class="text-success valid-msg d-none fw-400 fs-small mt-2" >✓ &nbsp; {{__('messages.valid')}}</span>
        <span id="error-msg" class="text-danger error-msg d-none fw-400 fs-small mt-2" ></span>
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Id Card',__('messages.visitor.id_card').':', ['class' => 'form-label']) }}
        {{ Form::text('id_card', null, ['class' => 'form-control','id' => 'visitorIdCard', 'placeholder' => __('messages.visitor.id_card')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Number Of Person',__('messages.visitor.number_of_person').':', ['class' => 'form-label']) }}
        {{ Form::number('no_of_person', null, ['class' => 'form-control','id' => 'no_of_visitor','min'=>'1', 'placeholder' => __('messages.visitor.number_of_person')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Date',__('messages.visitor.date').':', ['class' => 'form-label']) }}
        {{ Form::text('date', null, ['class' => (getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control'),'autocomplete' => 'off','id' => 'visitorDate', 'placeholder' => __('messages.visitor.date')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('In Time',__('messages.visitor.in_time').':', ['class' => 'form-label']) }}
        {{ Form::text('in_time', null, ['class' => (getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control'),'id' => 'visitorInTime', 'placeholder' => __('messages.visitor.in_time')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Out Time',__('messages.visitor.out_time').':', ['class' => 'form-label']) }}
        {{ Form::text('out_time', null, ['class' => (getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control'),'autocomplete' => 'off','id' => 'visitorOutTime', 'placeholder' => __('messages.visitor.out_time')]) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('Note',__('messages.visitor.note').':', ['class' => 'form-label']) }}
        {{ Form::textarea('note', null, ['class' => 'form-control','autocomplete' => 'off','id' => 'visitorNote','rows' => 5,'cols' => 5, 'placeholder' => __('messages.visitor.note')]) }}
    </div>
    <div class="col-sm-6 col-md-3 col-lg-2 col-6">
        <div class="form-group mb-5">
            <div class="row2" io-image-input="true">
                {{ Form::label('attachment', __('messages.expense.attachment').':', ['class' => 'form-label']) }}
                <div class="d-block">
                    <?php
                    $style = 'style=';
                    $background = 'background-image:';
                    ?>

                    <div class="image-picker">
                        <div class="image previewImage" id="visitorPreviewImage"
                        {{$style}}"{{$background}} url( @if($isEdit)
                            @if($fileExt=='pdf')
                                {{asset('assets/img/pdf.png')}}
                            @elseif($fileExt=='doc' || $fileExt=='docx')
                                {{asset('assets/img/doc.png')}}
                            @else
                                {{ empty($visitor->document_url)?asset('assets/img/default_image.jpg'):$visitor->document_url }}
                            @endif
                        @else
                            {{ asset('assets/img/default_image.jpg') }}
                        @endif)">
                        <span class="picker-edit rounded-circle text-gray-500 fs-small" title="{{ $isEdit ? 'Change Attachment' : __('messages.incomes.attachment')  }}">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        <input type="file" id="visitorAttachments" name="attachment"
                                               class="image-upload d-none profileImage"
                                               accept=".png, .jpg, .jpeg, .gif, .webp"/>
                                        <input type="hidden" name="avatar_remove"/>
                                    </label>
                                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3','id' => 'visitorSave']) !!}
    <a href="{!! route('visitors.index') !!}"
       class="btn btn-secondary me-2">{!! __('messages.common.cancel') !!}</a>
</div>
