@extends('admin.main')

@php
    use App\Helper\Template as Template;
    use App\Helper\Form as FormTemplate;
    
    $formLabelAttr = Config::get('zvn.template.form_label');
    $formInputAttr = Config::get('zvn.template.form_input');
    $formCkeditor = Config::get('zvn.template.form_ckeditor');

    $statusValue = [
        'default' => 'Select status',
        'active' => Config::get('zvn.template.status.active.name'),
        'inactive' => Config::get('zvn.template.status.inactive.name')
    ];

    if(!empty($item)){
        $inputHiddenID = Form::hidden('id', $item['id']);
        $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb']);

        $elements = [
            [
                'label' => Form::label('name', 'Name', ['class' => $formLabelAttr]),
                'element' => Form::text('name', $item['name'], ['class' => $formInputAttr])
            ],
            [
                'label' => Form::label('content', 'Content', ['class' => $formLabelAttr]),
                'element' => Form::textArea('content', $item['content'], ['class' => $formCkeditor])
            ],
            [
                'label' => Form::label('status', 'Status', ['class' => $formLabelAttr]),
                'element' => Form::select('status', $statusValue, $item['status'], ['class' => $formInputAttr])
            ],
            [
                'label' => Form::label('category_id', 'Category', ['class' => $formLabelAttr]),
                'element' => Form::select('category_id', $itemsCategory, $item['category_id'], ['class' => $formInputAttr])
            ],
            [
                'label' => Form::label('thumb', 'Thumb', ['class' => $formLabelAttr]),
                'element' => Form::file('thumb', ['class' => $formInputAttr]),
                'thumb' => ( !empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null,
                'type' => 'thumb'
            ],
            [
                'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Lưu lại', ['class' => 'btn btn-success']),
                'type' => 'btn-submit'
            ]
        ];
    } else {
        $inputHiddenID = Form::hidden('id', null);
        $inputHiddenThumb = Form::hidden('thumb_current', null);

        $elements = [
            [
                'label' => Form::label('name', 'Name', ['class' => $formLabelAttr]),
                'element' => Form::text('name', null, ['class' => $formInputAttr])
            ],
            [
                'label' => Form::label('content', 'Content', ['class' => $formLabelAttr]),
                'element' => Form::textArea('content', null, ['class' => $formCkeditor])
            ],
            [
                'label' => Form::label('status', 'Status', ['class' => $formLabelAttr]),
                'element' => Form::select('status', $statusValue, null, ['class' => $formInputAttr])
            ],
            [
                'label' => Form::label('category_id', 'Category', ['class' => $formLabelAttr]),
                'element' => Form::select('category_id', $itemsCategory, null, ['class' => $formInputAttr])
            ],
            [
                'label' => Form::label('thumb', 'Thumb', ['class' => $formLabelAttr]),
                'element' => Form::file('thumb', ['class' => $formInputAttr]),
                'thumb' => ( !empty($item['id'])) ? Template::showItemThumb($controllerName, null, null) : null,
                'type' => 'thumb'
            ],
            [
                'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Lưu lại', ['class' => 'btn btn-success']),
                'type' => 'btn-submit'
            ]
        ];
    }

@endphp

@section('content')

@include('admin.templates.page_header', ['pageIndex' => false])
@include('admin.templates.error')

{{-- @if (!empty($item) > 0) --}}

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => "Form"])
                <div class="x_content">
                    {!! Form::open([
                        'method' => 'POST',
                        'url' => route($controllerName) . '/save',
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
    
{{-- @endif --}}


@endsection