<?php

return [

    'url' => [
        'prefix_admin' => 'admin'
    ],

    'format' => [
        'long_time' => 'H:m:s d/m/Y',
        'short_time' => 'd/m/Y'
    ],

    'template' => [
        'status' => [
            'all' => ['name' => 'Tất cả', 'class' => "btn-success"],
            'active' => ['name' => 'Kích hoạt', 'class' => "btn-success"],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => "btn-info"],
            'block' => ['name' => 'Bị khóa', 'class' => "btn-danger"],
            'default' => ['name' => 'Chưa xác định', 'class' => "btn-info"]
        ],
        'search' => [
            'all' => ['name' => 'Search by all'],
            'id' => ['name' => 'Search by ID'],
            'name' => ['name' => 'Search by name'],
            'username' => ['name' => 'Search by username'],
            'fullname' => ['name' => 'Search by fullname'],
            'email' => ['name' => 'Search by email'],
            'description' => ['name' => 'Search by description'],
            'link' => ['name' => 'Search by link'],
            'content' => ['name' => 'Search by content']
        ],
    ]

];

?>