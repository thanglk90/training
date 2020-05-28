@extends('news.main')

@section('content')
    @include('news.blocks.slider')
    <!-- Content Container -->
    <div class="content_container">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="main_content">
                        <!-- Featured -->
                        @include('news.blocks.featured', ['items' => $itemsFeatured])
                        <!-- Category -->
                        @include('news.pages.home.child-index.category')
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <!-- Latest Posts -->
                        @include('news.blocks.latest_posts', ['items' => $itemsLatest])
                        <!-- Advertisement -->
                        @include('news.blocks.advertisement', ['itemsAdvertisement' => []])
                        
                        <!-- Most Viewed -->
                        @include('news.blocks.most_viewed', ['itemsMostViewed' => []])
                        
                        <!-- Tags -->
                        @include('news.blocks.tags', ['itemsTags' => []])
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection