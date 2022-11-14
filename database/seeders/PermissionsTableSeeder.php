<?php

namespace Database\Seeders;

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
                'title' => 'website_setting_create',
            ],
            [
                'id'    => 18,
                'title' => 'website_setting_edit',
            ],
            [
                'id'    => 19,
                'title' => 'website_setting_show',
            ],
            [
                'id'    => 20,
                'title' => 'website_setting_delete',
            ],
            [
                'id'    => 21,
                'title' => 'website_setting_access',
            ],
            [
                'id'    => 22,
                'title' => 'category_create',
            ],
            [
                'id'    => 23,
                'title' => 'category_edit',
            ],
            [
                'id'    => 24,
                'title' => 'category_show',
            ],
            [
                'id'    => 25,
                'title' => 'category_delete',
            ],
            [
                'id'    => 26,
                'title' => 'category_access',
            ],
            [
                'id'    => 27,
                'title' => 'announcement_create',
            ],
            [
                'id'    => 28,
                'title' => 'announcement_edit',
            ],
            [
                'id'    => 29,
                'title' => 'announcement_show',
            ],
            [
                'id'    => 30,
                'title' => 'announcement_delete',
            ],
            [
                'id'    => 31,
                'title' => 'announcement_access',
            ],
            [
                'id'    => 32,
                'title' => 'homepage_carousel_create',
            ],
            [
                'id'    => 33,
                'title' => 'homepage_carousel_edit',
            ],
            [
                'id'    => 34,
                'title' => 'homepage_carousel_show',
            ],
            [
                'id'    => 35,
                'title' => 'homepage_carousel_delete',
            ],
            [
                'id'    => 36,
                'title' => 'homepage_carousel_access',
            ],
            [
                'id'    => 37,
                'title' => 'praiseprayer_create',
            ],
            [
                'id'    => 38,
                'title' => 'praiseprayer_edit',
            ],
            [
                'id'    => 39,
                'title' => 'praiseprayer_show',
            ],
            [
                'id'    => 40,
                'title' => 'praiseprayer_delete',
            ],
            [
                'id'    => 41,
                'title' => 'praiseprayer_access',
            ],
            [
                'id'    => 42,
                'title' => 'qotd_create',
            ],
            [
                'id'    => 43,
                'title' => 'qotd_edit',
            ],
            [
                'id'    => 44,
                'title' => 'qotd_show',
            ],
            [
                'id'    => 45,
                'title' => 'qotd_delete',
            ],
            [
                'id'    => 46,
                'title' => 'qotd_access',
            ],
            [
                'id'    => 47,
                'title' => 'weeks_message_create',
            ],
            [
                'id'    => 48,
                'title' => 'weeks_message_edit',
            ],
            [
                'id'    => 49,
                'title' => 'weeks_message_show',
            ],
            [
                'id'    => 50,
                'title' => 'weeks_message_delete',
            ],
            [
                'id'    => 51,
                'title' => 'weeks_message_access',
            ],
            [
                'id'    => 52,
                'title' => 'page_create',
            ],
            [
                'id'    => 53,
                'title' => 'page_edit',
            ],
            [
                'id'    => 54,
                'title' => 'page_show',
            ],
            [
                'id'    => 55,
                'title' => 'page_delete',
            ],
            [
                'id'    => 56,
                'title' => 'page_access',
            ],
            [
                'id'    => 57,
                'title' => 'section_create',
            ],
            [
                'id'    => 58,
                'title' => 'section_edit',
            ],
            [
                'id'    => 59,
                'title' => 'section_show',
            ],
            [
                'id'    => 60,
                'title' => 'section_delete',
            ],
            [
                'id'    => 61,
                'title' => 'section_access',
            ],
            [
                'id'    => 62,
                'title' => 'file_create',
            ],
            [
                'id'    => 63,
                'title' => 'file_edit',
            ],
            [
                'id'    => 64,
                'title' => 'file_show',
            ],
            [
                'id'    => 65,
                'title' => 'file_delete',
            ],
            [
                'id'    => 66,
                'title' => 'file_access',
            ],
            [
                'id'    => 67,
                'title' => 'album_create',
            ],
            [
                'id'    => 68,
                'title' => 'album_edit',
            ],
            [
                'id'    => 69,
                'title' => 'album_show',
            ],
            [
                'id'    => 70,
                'title' => 'album_delete',
            ],
            [
                'id'    => 71,
                'title' => 'album_access',
            ],
            [
                'id'    => 72,
                'title' => 'photo_create',
            ],
            [
                'id'    => 73,
                'title' => 'photo_edit',
            ],
            [
                'id'    => 74,
                'title' => 'photo_show',
            ],
            [
                'id'    => 75,
                'title' => 'photo_delete',
            ],
            [
                'id'    => 76,
                'title' => 'photo_access',
            ],
            [
                'id'    => 77,
                'title' => 'video_excerpt_create',
            ],
            [
                'id'    => 78,
                'title' => 'video_excerpt_edit',
            ],
            [
                'id'    => 79,
                'title' => 'video_excerpt_show',
            ],
            [
                'id'    => 80,
                'title' => 'video_excerpt_delete',
            ],
            [
                'id'    => 81,
                'title' => 'video_excerpt_access',
            ],
            [
                'id'    => 82,
                'title' => 'resource_create',
            ],
            [
                'id'    => 83,
                'title' => 'resource_edit',
            ],
            [
                'id'    => 84,
                'title' => 'resource_show',
            ],
            [
                'id'    => 85,
                'title' => 'resource_delete',
            ],
            [
                'id'    => 86,
                'title' => 'resource_access',
            ],
            [
                'id'    => 87,
                'title' => 'contact_create',
            ],
            [
                'id'    => 88,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 89,
                'title' => 'contact_show',
            ],
            [
                'id'    => 90,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 91,
                'title' => 'contact_access',
            ],
            [
                'id'    => 92,
                'title' => 'archive_create',
            ],
            [
                'id'    => 93,
                'title' => 'archive_edit',
            ],
            [
                'id'    => 94,
                'title' => 'archive_show',
            ],
            [
                'id'    => 95,
                'title' => 'archive_delete',
            ],
            [
                'id'    => 96,
                'title' => 'archive_access',
            ],
            [
                'id'    => 97,
                'title' => 'directory_create',
            ],
            [
                'id'    => 98,
                'title' => 'directory_edit',
            ],
            [
                'id'    => 99,
                'title' => 'directory_show',
            ],
            [
                'id'    => 100,
                'title' => 'directory_delete',
            ],
            [
                'id'    => 101,
                'title' => 'directory_access',
            ],
            [
                'id'    => 102,
                'title' => 'member_access',
            ],
            [
                'id'    => 103,
                'title' => 'general_access',
            ],
            [
                'id'    => 104,
                'title' => 'sister_church_create',
            ],
            [
                'id'    => 105,
                'title' => 'sister_church_edit',
            ],
            [
                'id'    => 106,
                'title' => 'sister_church_show',
            ],
            [
                'id'    => 107,
                'title' => 'sister_church_delete',
            ],
            [
                'id'    => 108,
                'title' => 'sister_church_access',
            ],
            [
                'id'    => 109,
                'title' => 'uploader_create',
            ],
            [
                'id'    => 110,
                'title' => 'uploader_edit',
            ],
            [
                'id'    => 111,
                'title' => 'uploader_show',
            ],
            [
                'id'    => 112,
                'title' => 'uploader_delete',
            ],
            [
                'id'    => 113,
                'title' => 'uploader_access',
            ],
            [
                'id'    => 114,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
