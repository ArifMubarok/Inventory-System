<?php

return [
    'role_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'c,r,u,d'
        ],
        'sarpras' => [
            'users' => 'c,r,u',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ]
    ],
    'user_roles' => [
        'admin' => [
            ['name' => "Admin", "email" => "admin@admin.com", "password" => 'password', 'role' => "1"],
        ],
        'sarpras' => [
            ['name' => "Sarpras", "email" => "sarpras@sarpras.com", "password" => 'password', 'role' => "2"],
        ],
        'user' => [
            ['name' => "User", "email" => "user@user.com", "password" => 'password', 'role' => "3"],
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
