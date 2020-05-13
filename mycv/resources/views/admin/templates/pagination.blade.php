<div class="x_content">
    <div class="row">
        <div class="col-md-6">
            <p class="m-b-0">Tổng phần tử trên trang: <b>{{ $items->perPage() }}</b></p>
            <p class="m-b-0">Có tổng cộng <b> {{ $items->lastPage() }}</b> trang</p>
            <p class="m-b-0">Có tổng cộng <b> {{ $items->total() }}</b> Phần tử</p>
        </div>
        <div class="col-md-6">
            {{-- need pass params if variable != $paginator --}}
            {{-- {{ $items->links('pagination.pagination_backend', ['paginator1213' => $items]) }} --}}

            {{ $items->links('pagination.pagination_backend') }}  
        </div>
    </div>
</div>
