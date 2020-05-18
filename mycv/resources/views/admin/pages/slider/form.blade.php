@extends('admin.main')

@php
    use App\Helper\Template as Template;
    use App\Helper\Form as FormTemplate;
    
    $formLabelClass = Config::get('zvn.template.form_label.class');
    $formInputClass = Config::get('zvn.template.form_input.class');

    $statusValue = [
        'default' => 'Select status',
        'active' => Config::get('zvn.template.status.active.name'),
        'inactive' => Config::get('zvn.template.status.inactive.name')
    ];

    $inputHiddenID = Form::hidden('id', $item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb']);

    $elements = [
        [
            'label' => Form::label('name', 'Name', ['class' => $formLabelClass]),
            'element' => Form::text('name', $item['name'], ['class' => $formInputClass])
        ],
        [
            'label' => Form::label('description', 'description', ['class' => $formLabelClass]),
            'element' => Form::text('description', $item['description'], ['class' => $formInputClass])
        ],
        [
            'label' => Form::label('status', 'Status', ['class' => $formLabelClass]),
            'element' => Form::select('status', $statusValue, $item['status'], ['class' => $formInputClass])
        ],
        [
            'label' => Form::label('link', 'Link', ['class' => $formLabelClass]),
            'element' => Form::text('link', $item['link'], ['class' => $formInputClass])
        ],
        [
            'label' => Form::label('thumb', 'Thumb', ['class' => $formLabelClass]),
            'element' => Form::file('thumb', ['class' => $formInputClass]),
            'thumb' => ( !empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null,
            'type' => 'thumb'
        ],
        [
            'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Lưu lại', ['class' => 'btn btn-success']),
            'type' => 'btn-submit'
        ]
    ];
    
    
@endphp

@section('content')

@include('admin.templates.page_header', ['pageIndex' => false])

{{-- @if (count($item) > 0)
    
@endif --}}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title', ['title' => "Form"])
            <div class="x_content">
                {!! Form::open([
                    'method' => 'POST',
                    'url' => route($controllerName) . '/form',
                    'accept-charset' => 'UTF-8',
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'main-form'
                    ]) 
                !!}
                    
                {!! FormTemplate::show($elements) !!}
                {!! Form::close() !!}
                {{-- 
                    
                               
                    <div class="form-group">
                        <label for="thumb" class="control-label col-md-3 col-sm-3 col-xs-12">Thumb</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-6 col-xs-12" name="thumb" type="file" id="thumb">
                            <p style="margin-top: 50px;"><img src="{{ asset('images/slider/DeX0M02V6t.jpeg') }}" alt="Ưu đãi học phí" class="zvn-thumb"></p>
                        </div>
                    </div>
                    
                 --}}
            </div>
        </div>
    </div>
</div>

@endsection