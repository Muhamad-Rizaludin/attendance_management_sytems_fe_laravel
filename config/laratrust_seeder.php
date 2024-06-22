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
        'admin' => [
            'users' => 'c,r,u,d',
            'karyawans' => 'c,r,u,d',
            'jabatans' => 'c,r,u,d',
            'jobdesks' => 'c,r,u,d',
            'jobdeskdetails' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'karyawan' => [
            'users' => 'c,r,u,d',
            'karyawans' => 'r',
            'jabatans' => 'r',
            'jobdesks' => 'c,r,u,d',
            'jobdeskdetails' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'pimpinan' => [
            'users' => 'c,r,u,d',
            'jobdeskdetails' => 'r',
            'profile' => 'r,u',
        ],
        'spmi' => [
            'users' => 'c,r,u,d',
            'karyawans' => 'r',
            'jabatans' => 'r',
            'jobdesks' => 'c,r,u,d',
            'jobdeskdetails' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
