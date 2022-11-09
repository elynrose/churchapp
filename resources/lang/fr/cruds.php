<?php

return [
    'userManagement' => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Full Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'country'                   => 'Country',
            'country_helper'            => ' ',
            'church'                    => 'Church',
            'church_helper'             => ' ',
            'pastor_name'               => 'Pastor\'s Name',
            'pastor_name_helper'        => ' ',
            'language'                  => 'Language',
            'language_helper'           => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'ip_address'                => 'IP Address',
            'ip_address_helper'         => ' ',
        ],
    ],
    'websiteSetting' => [
        'title'          => 'Website Settings',
        'title_singular' => 'Website Setting',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'logo'                        => 'Logo',
            'logo_helper'                 => ' ',
            'favicon'                     => 'Favicon',
            'favicon_helper'              => ' ',
            'meta_content'                => 'Meta Content',
            'meta_content_helper'         => ' ',
            'keywords'                    => 'Keywords',
            'keywords_helper'             => ' ',
            'global_css'                  => 'Global CSS',
            'global_css_helper'           => ' ',
            'global_js'                   => 'Global JS',
            'global_js_helper'            => ' ',
            'maintainance_mode'           => 'Maintainance Mode',
            'maintainance_mode_helper'    => ' ',
            'maintainance_message'        => 'Maintainance Message',
            'maintainance_message_helper' => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'site_name'                   => 'Site Name',
            'site_name_helper'            => ' ',
        ],
    ],
    'category' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => 'Category name',
            'active'            => 'Active',
            'active_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
        ],
    ],
    'announcement' => [
        'title'          => 'Announcements',
        'title_singular' => 'Announcement',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'category'           => 'Category',
            'category_helper'    => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'expires_on'         => 'Expires On',
            'expires_on_helper'  => ' ',
            'files'              => 'Files',
            'files_helper'       => ' ',
        ],
    ],
    'homepageCarousel' => [
        'title'          => 'Homepage Carousel',
        'title_singular' => 'Homepage Carousel',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'headline'           => 'Headline',
            'headline_helper'    => ' ',
            'sub_heading'        => 'Sub Heading',
            'sub_heading_helper' => ' ',
            'link_to'            => 'Link To',
            'link_to_helper'     => ' ',
            'order'              => 'Order',
            'order_helper'       => ' ',
            'primary'            => 'Primary',
            'primary_helper'     => ' ',
            'active'             => 'Active',
            'active_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'praiseprayer' => [
        'title'          => 'Praise and Prayer Request',
        'title_singular' => 'Praise and Prayer Request',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'full_name'             => 'Full Name',
            'full_name_helper'      => ' ',
            'on_behalf_of'          => 'On Behalf of',
            'on_behalf_of_helper'   => ' ',
            'date_submitted'        => 'Date Submitted',
            'date_submitted_helper' => ' ',
            'select_type'           => 'Select Type',
            'select_type_helper'    => ' ',
            'closed'                => 'Closed',
            'closed_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'details'               => 'Details',
            'details_helper'        => ' ',
        ],
    ],
    'qotd' => [
        'title'          => 'Quote of the Day',
        'title_singular' => 'Quote of the Day',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'quote'             => 'Quote',
            'quote_helper'      => ' ',
            'video_file'        => 'Video File',
            'video_file_helper' => ' ',
            'audio_file'        => 'Audio File',
            'audio_file_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'weeksMessage' => [
        'title'          => 'This Weeks Messages',
        'title_singular' => 'This Weeks Message',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'week_of'               => 'Week Of',
            'week_of_helper'        => ' ',
            'message_titles'        => 'Message Titles',
            'message_titles_helper' => ' ',
            'files'                 => 'Files',
            'files_helper'          => ' ',
            'active'                => 'Active',
            'active_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'page' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'page_title'         => 'Page Title',
            'page_title_helper'  => ' ',
            'content'            => 'Content',
            'content_helper'     => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'cover_image'        => 'Cover Image',
            'cover_image_helper' => ' ',
            'thumb_image'        => 'Thumb Image',
            'thumb_image_helper' => ' ',
            'active'             => 'Active',
            'active_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'section' => [
        'title'          => 'Armory Sections',
        'title_singular' => 'Armory Section',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'active'             => 'Active',
            'active_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
        ],
    ],
    'file' => [
        'title'          => 'Armory Files',
        'title_singular' => 'Armory File',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'section'           => 'Section',
            'section_helper'    => ' ',
            'file_name'         => 'File Name',
            'file_name_helper'  => ' ',
            'file'              => 'File',
            'file_helper'       => ' ',
            'file_type'         => 'File Type',
            'file_type_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'album' => [
        'title'          => 'Albums',
        'title_singular' => 'Album',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'active'             => 'Active',
            'active_helper'      => ' ',
            'cover_photo'        => 'Cover Photo',
            'cover_photo_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'photo' => [
        'title'          => 'Photos',
        'title_singular' => 'Photo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'photos'            => 'Photos',
            'photos_helper'     => ' ',
            'album'             => 'Album',
            'album_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'videoExcerpt' => [
        'title'          => 'Video Excerpts',
        'title_singular' => 'Video Excerpt',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'title'                => 'Title',
            'title_helper'         => ' ',
            'preached_by'          => 'Preached By',
            'preached_by_helper'   => ' ',
            'date_preached'        => 'Date Preached',
            'date_preached_helper' => ' ',
            'location'             => 'Location',
            'location_helper'      => ' ',
            'video_file'           => 'Video File',
            'video_file_helper'    => ' ',
            'ordering'             => 'Ordering',
            'ordering_helper'      => ' ',
            'active'               => 'Active',
            'active_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'resource' => [
        'title'          => 'Resources',
        'title_singular' => 'Resource',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'link_to'           => 'Link To',
            'link_to_helper'    => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contact' => [
        'title'          => 'Contact us',
        'title_singular' => 'Contact us',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'full_name'         => 'Full Name',
            'full_name_helper'  => ' ',
            'church'            => 'Church',
            'church_helper'     => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'category'          => 'Minister',
            'category_helper'   => ' ',
            'comment'           => 'Comment',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'archive' => [
        'title'          => 'Archives',
        'title_singular' => 'Archive',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'title'                => 'Message Title',
            'title_helper'         => ' ',
            'location'             => 'Location',
            'location_helper'      => ' ',
            'language'             => 'Language',
            'language_helper'      => ' ',
            'name'                 => 'Preached by',
            'name_helper'          => ' ',
            'date_preached'        => 'Date Preached',
            'date_preached_helper' => ' ',
            'published'            => 'Published',
            'published_helper'     => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'video_url'            => 'Video',
            'video_url_helper'     => ' ',
            'audio_url'            => 'Audio (MP3)',
            'audio_url_helper'     => ' ',
            'pdf_file'             => 'PDF',
            'pdf_file_helper'      => ' ',
        ],
    ],
    'directory' => [
        'title'          => 'Directory',
        'title_singular' => 'Directory',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'first_name'        => 'First Name',
            'first_name_helper' => ' ',
            'last_name'         => 'Last Name',
            'last_name_helper'  => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'birthday'          => 'Birthday',
            'birthday_helper'   => ' ',
        ],
    ],
    'member' => [
        'title'          => 'Members Only',
        'title_singular' => 'Members Only',
    ],
    'general' => [
        'title'          => 'General',
        'title_singular' => 'General',
    ],
    'sisterChurch' => [
        'title'          => 'Sister Churches',
        'title_singular' => 'Sister Church',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'link_to'           => 'Link To',
            'link_to_helper'    => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'uploader' => [
        'title'          => 'Uploader',
        'title_singular' => 'Uploader',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'date_preached'           => 'Date Preached',
            'date_preached_helper'    => ' ',
            'preached_by'             => 'Preached By',
            'preached_by_helper'      => ' ',
            'location'                => 'Location',
            'location_helper'         => ' ',
            'file_code'               => 'File Code',
            'file_code_helper'        => ' ',
            'ftp_path'                => 'FTP Path',
            'ftp_path_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'processed'               => 'Processed',
            'processed_helper'        => ' ',
            'coconut_job_code'        => 'Job ID',
            'coconut_job_code_helper' => ' ',
        ],
    ],
];