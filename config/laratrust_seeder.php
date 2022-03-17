<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'stations' => 'c,r,u,d',
            'trains' => 'c,r,u,d',
            'tickets' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
        ],
        'moderator' => [
            'users' => 'c,r,u,d',
            'stations' => 'c,r,u,d',
            'trains' => 'c,r,u,d',
            'tickets' => 'c,r,d',
            'posts' => 'c,r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
