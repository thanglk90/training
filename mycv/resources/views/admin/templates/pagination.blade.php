<div class="x_content">
    <div class="row">
        <div class="col-md-6">
            <p class="m-b-0">Số phần tử muốn hiển thị trên trang: <b>{{ $items->perPage() }}</b></p>
            <p class="m-b-0">Số phần tử tìm được: <b>{{ $items->count() }}</b></p>
            <p class="m-b-0">Có tổng cộng <b> {{ $items->lastPage() }}</b> trang</p>
            <p class="m-b-0">Có tổng cộng <b> {{ $items->total() }}</b> Phần tử</p>
        </div>
        <div class="col-md-6">
            {{-- need pass params if variable != $paginator --}}
            {{-- {{ $items->links('pagination.pagination_backend', ['paginator1213' => $items]) }} --}}

            {{-- {{ $items->links('pagination.pagination_backend') }} --}}
            <!-- Nối tham số có trong request->input vào tham số phân trang-->
            {{ $items->appends(request()->input())->links('pagination.pagination_backend') }}
           
            
        </div>
    </div>
</div>
