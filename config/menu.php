<?php
return [
    [
        'label' => 'Users Managerment',
        'route' => 'user.list',
        'icon' => 'fa-user',
        'id' => 'user',
        'request' => 'admin/users*',
        'gate' => 'user-list',
        'items' => [
            [
                'label' => 'Users List',
                'gate' => 'user-list',
                'route' => 'user.list',
                'icon' => 'fa-list-alt',
            ],
            [
                'label' => 'Create Users',
                'gate' => 'user-create',
                'route' => 'user.create',
                'icon' => 'fa-user-plus',
            ],
            [
                'label' => 'Edit Role',
                'gate' => 'user-editrole',
                'route' => 'user.role',
                'icon' => 'fa-user-shield',
            ]
        ],
    ],
    [
        'label' => 'Category',
        'route' => 'category.list',
        'icon' => 'fa-layer-group',
        'id' => 'category',
        'request' => 'admin/category*',
        'gate' => null,
        'items' => [
            [
                'label' => 'Document Collection',
                'route' => 'category.list',
                'gate' => 'category-list',
                'icon' => 'fa-th-list',
            ],
            [
                'label' => 'Role',
                'route' => 'role.list',
                'gate' => 'role-list',
                'icon' => 'fas fa-shield-alt',
            ],
            [
                'label' => 'Class',
                'route' => 'class.list',
                'gate' => 'class-list',
                'icon' => 'far fa-id-badge',
            ],
            // [
            // 'label' => 'Semester',
            // 'route' => 'semester.list',
            // 'gate' => null,
            // 'icon' => 'fa-plus-square',
            // ],
        ],
    ],
    [
        'label' => 'Documents',
        'route' => 'documents.index',
        'icon' => 'fa-book',
        'id' => 'document',
        'request' => 'admin/documents*',
        'gate' => 'documents-list',
        'items' => [
            [
                'label' => 'All Documents',
                'route' => 'documents.index',
                'gate' => 'documents-list',
                'icon' => 'fa-book',
            ],
            [
                'label' => 'Add Documents',
                'route' => 'documents.create',
                'gate' => 'documents-create',
                'icon' => 'fa-file-upload',
            ],
            [
                'label' => 'Search',
                'route' => 'documents.search',
                'gate' => 'documents-search',
                'icon' => 'fa-search',
            ],
            [
                'label' => 'Document Approval',
                'route' => 'documents.censor',
                'gate' => 'documents-censor',
                'icon' => 'fa-clipboard-check',
            ],
        ],
    ]
];
