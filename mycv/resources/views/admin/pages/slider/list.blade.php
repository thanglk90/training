@php

use App\Helper\Template as Template;

@endphp

{{-- <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right">
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            
        </div>
    </div>
</div> --}}

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Slider Info</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $value)
                        @php
                            $index = $key + 1;
                            $id = $value['id'];
                            $name = $value['name'];
                            $description = $value['description'];
                            $link = $value['link'];
                            $thumb = Template::showItemThumb($controllerName, $value['thumb'], $value['name'] );
                            $status = Template::showItemStatus($controllerName, $id, $value['status']);
                            $createdHistory = Template::showItemHistory($value['created_by'], $value['created']);
                            $modifiedHistory = Template::showItemHistory($controllerName, $value['modified_by'], $value['modified']);
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="odd pointer">
                            <td>{{ $index }}</td>
                            <td width="40%">
                                <p><strong>Name:</strong> {{ $name }}</p>
                                <p><strong>Description:</strong> {{ $description }}</p>
                                <p><strong>Link:</strong> {{ $link }}</p>
                                <p>{!! $thumb !!}</p>
                            </td>
                            <td>{!! $status !!}</td>
                            <td>
                                {!! $createdHistory !!}
                            </td>
                            <td>
                                {!! $modifiedHistory !!}
                            </td>
                            <td class="last">
                                {!! $listBtnAction !!}
                            </td>
                        </tr>
                    @endforeach
                    

                @else

                    @include('admin.templates.list_empty' , [
                        'colspan' => 6,
                        'class'   => 'text-center'
                    ])

                @endif
            </tbody>
        </table>
    </div>
</div>
