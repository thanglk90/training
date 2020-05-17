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
            'default' => ['name' => 'Chưa xác định', 'class' => "btn-info"],
            'none' => ['name' => 'Tất cả', 'class' => "btn-danger"],
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
        'button' => [
            'edit' => ['class' => 'btn-success', 'title' => 'Edit', 'icon' => 'fa-pencil', 'route-name' => '/form'],
            'delete' => ['class' => 'btn-danger btn-delete', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name' => '/delete'],
            'info' => ['class' => 'btn-info', 'title' => 'View', 'icon' => 'fa-pencil', 'route-name' => '/delete']
        ]
    ],
    
    'config' => [
        'search' => [
            'default' => ['all', 'id', 'fullname'],
            'slider' => ['all', 'id', 'name', 'description', 'link']
        ],

        'button' => [
            'default' => ['edit' , 'delete'],
            'slider'  => ['edit', 'delete']
        ]
    ]


];

?>