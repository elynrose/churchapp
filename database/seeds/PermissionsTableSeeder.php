<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'app_create',
            ],
            [
                'id'    => 18,
                'title' => 'app_edit',
            ],
            [
                'id'    => 19,
                'title' => 'app_show',
            ],
            [
                'id'    => 20,
                'title' => 'app_delete',
            ],
            [
                'id'    => 21,
                'title' => 'app_access',
            ],
            [
                'id'    => 22,
                'title' => 'page_create',
            ],
            [
                'id'    => 23,
                'title' => 'page_edit',
            ],
            [
                'id'    => 24,
                'title' => 'page_show',
            ],
            [
                'id'    => 25,
                'title' => 'page_delete',
            ],
            [
                'id'    => 26,
                'title' => 'page_access',
            ],
            [
                'id'    => 27,
                'title' => 'page_layout_create',
            ],
            [
                'id'    => 28,
                'title' => 'page_layout_edit',
            ],
            [
                'id'    => 29,
                'title' => 'page_layout_show',
            ],
            [
                'id'    => 30,
                'title' => 'page_layout_delete',
            ],
            [
                'id'    => 31,
                'title' => 'page_layout_access',
            ],
            [
                'id'    => 32,
                'title' => 'module_create',
            ],
            [
                'id'    => 33,
                'title' => 'module_edit',
            ],
            [
                'id'    => 34,
                'title' => 'module_show',
            ],
            [
                'id'    => 35,
                'title' => 'module_delete',
            ],
            [
                'id'    => 36,
                'title' => 'module_access',
            ],
            [
                'id'    => 37,
                'title' => 'event_create',
            ],
            [
                'id'    => 38,
                'title' => 'event_edit',
            ],
            [
                'id'    => 39,
                'title' => 'event_show',
            ],
            [
                'id'    => 40,
                'title' => 'event_delete',
            ],
            [
                'id'    => 41,
                'title' => 'event_access',
            ],
            [
                'id'    => 42,
                'title' => 'blog_create',
            ],
            [
                'id'    => 43,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 44,
                'title' => 'blog_show',
            ],
            [
                'id'    => 45,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 46,
                'title' => 'blog_access',
            ],
            [
                'id'    => 47,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
