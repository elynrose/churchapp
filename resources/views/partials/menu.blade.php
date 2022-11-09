<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/website-settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-atlas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('website_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.website-settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/website-settings") || request()->is("admin/website-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.websiteSetting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('member_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/announcements*") ? "c-show" : "" }} {{ request()->is("admin/qotds*") ? "c-show" : "" }} {{ request()->is("admin/weeks-messages*") ? "c-show" : "" }} {{ request()->is("admin/praiseprayers*") ? "c-show" : "" }} {{ request()->is("admin/sections*") ? "c-show" : "" }} {{ request()->is("admin/files*") ? "c-show" : "" }} {{ request()->is("admin/video-excerpts*") ? "c-show" : "" }} {{ request()->is("admin/albums*") ? "c-show" : "" }} {{ request()->is("admin/photos*") ? "c-show" : "" }} {{ request()->is("admin/directories*") ? "c-show" : "" }} {{ request()->is("admin/archives*") ? "c-show" : "" }} {{ request()->is("admin/uploaders*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.member.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('announcement_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.announcements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/announcements") || request()->is("admin/announcements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bullhorn c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.announcement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('qotd_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.qotds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/qotds") || request()->is("admin/qotds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.qotd.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('weeks_message_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.weeks-messages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/weeks-messages") || request()->is("admin/weeks-messages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.weeksMessage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('praiseprayer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.praiseprayers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/praiseprayers") || request()->is("admin/praiseprayers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hand-holding c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.praiseprayer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('section_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sections.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sections") || request()->is("admin/sections/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bookmark c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.section.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('file_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.files.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/files") || request()->is("admin/files/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-upload c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.file.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('video_excerpt_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.video-excerpts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/video-excerpts") || request()->is("admin/video-excerpts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-video c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.videoExcerpt.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('album_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.albums.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/albums") || request()->is("admin/albums/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.album.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('photo_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.photos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/photos") || request()->is("admin/photos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-images c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.photo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('directory_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.directories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/directories") || request()->is("admin/directories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.directory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('archive_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.archives.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/archives") || request()->is("admin/archives/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-audio c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.archive.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('uploader_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.uploaders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/uploaders") || request()->is("admin/uploaders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-upload c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.uploader.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('general_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/homepage-carousels*") ? "c-show" : "" }} {{ request()->is("admin/pages*") ? "c-show" : "" }} {{ request()->is("admin/resources*") ? "c-show" : "" }} {{ request()->is("admin/contacts*") ? "c-show" : "" }} {{ request()->is("admin/sister-churches*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.general.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('homepage_carousel_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.homepage-carousels.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/homepage-carousels") || request()->is("admin/homepage-carousels/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-columns c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.homepageCarousel.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.page.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('resource_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.resources.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/resources") || request()->is("admin/resources/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.resource.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contact.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sister_church_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sister-churches.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sister-churches") || request()->is("admin/sister-churches/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sisterChurch.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>