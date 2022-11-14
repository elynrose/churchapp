<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Website Settings
    Route::delete('website-settings/destroy', 'WebsiteSettingsController@massDestroy')->name('website-settings.massDestroy');
    Route::post('website-settings/media', 'WebsiteSettingsController@storeMedia')->name('website-settings.storeMedia');
    Route::post('website-settings/ckmedia', 'WebsiteSettingsController@storeCKEditorImages')->name('website-settings.storeCKEditorImages');
    Route::resource('website-settings', 'WebsiteSettingsController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Announcements
    Route::delete('announcements/destroy', 'AnnouncementsController@massDestroy')->name('announcements.massDestroy');
    Route::post('announcements/media', 'AnnouncementsController@storeMedia')->name('announcements.storeMedia');
    Route::post('announcements/ckmedia', 'AnnouncementsController@storeCKEditorImages')->name('announcements.storeCKEditorImages');
    Route::resource('announcements', 'AnnouncementsController');

    // Homepage Carousel
    Route::delete('homepage-carousels/destroy', 'HomepageCarouselController@massDestroy')->name('homepage-carousels.massDestroy');
    Route::post('homepage-carousels/media', 'HomepageCarouselController@storeMedia')->name('homepage-carousels.storeMedia');
    Route::post('homepage-carousels/ckmedia', 'HomepageCarouselController@storeCKEditorImages')->name('homepage-carousels.storeCKEditorImages');
    Route::resource('homepage-carousels', 'HomepageCarouselController');

    // Praiseprayer
    Route::delete('praiseprayers/destroy', 'PraiseprayerController@massDestroy')->name('praiseprayers.massDestroy');
    Route::post('praiseprayers/media', 'PraiseprayerController@storeMedia')->name('praiseprayers.storeMedia');
    Route::post('praiseprayers/ckmedia', 'PraiseprayerController@storeCKEditorImages')->name('praiseprayers.storeCKEditorImages');
    Route::resource('praiseprayers', 'PraiseprayerController');

    // Qotd
    Route::delete('qotds/destroy', 'QotdController@massDestroy')->name('qotds.massDestroy');
    Route::post('qotds/media', 'QotdController@storeMedia')->name('qotds.storeMedia');
    Route::post('qotds/ckmedia', 'QotdController@storeCKEditorImages')->name('qotds.storeCKEditorImages');
    Route::resource('qotds', 'QotdController');

    // Weeks Messages
    Route::delete('weeks-messages/destroy', 'WeeksMessagesController@massDestroy')->name('weeks-messages.massDestroy');
    Route::post('weeks-messages/media', 'WeeksMessagesController@storeMedia')->name('weeks-messages.storeMedia');
    Route::post('weeks-messages/ckmedia', 'WeeksMessagesController@storeCKEditorImages')->name('weeks-messages.storeCKEditorImages');
    Route::resource('weeks-messages', 'WeeksMessagesController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // Section
    Route::delete('sections/destroy', 'SectionController@massDestroy')->name('sections.massDestroy');
    Route::post('sections/media', 'SectionController@storeMedia')->name('sections.storeMedia');
    Route::post('sections/ckmedia', 'SectionController@storeCKEditorImages')->name('sections.storeCKEditorImages');
    Route::resource('sections', 'SectionController');

    // Files
    Route::delete('files/destroy', 'FilesController@massDestroy')->name('files.massDestroy');
    Route::post('files/media', 'FilesController@storeMedia')->name('files.storeMedia');
    Route::post('files/ckmedia', 'FilesController@storeCKEditorImages')->name('files.storeCKEditorImages');
    Route::resource('files', 'FilesController');

    // Albums
    Route::delete('albums/destroy', 'AlbumsController@massDestroy')->name('albums.massDestroy');
    Route::post('albums/media', 'AlbumsController@storeMedia')->name('albums.storeMedia');
    Route::post('albums/ckmedia', 'AlbumsController@storeCKEditorImages')->name('albums.storeCKEditorImages');
    Route::resource('albums', 'AlbumsController');

    // Photos
    Route::delete('photos/destroy', 'PhotosController@massDestroy')->name('photos.massDestroy');
    Route::post('photos/media', 'PhotosController@storeMedia')->name('photos.storeMedia');
    Route::post('photos/ckmedia', 'PhotosController@storeCKEditorImages')->name('photos.storeCKEditorImages');
    Route::resource('photos', 'PhotosController');

    // Video Excerpts
    Route::delete('video-excerpts/destroy', 'VideoExcerptsController@massDestroy')->name('video-excerpts.massDestroy');
    Route::post('video-excerpts/media', 'VideoExcerptsController@storeMedia')->name('video-excerpts.storeMedia');
    Route::post('video-excerpts/ckmedia', 'VideoExcerptsController@storeCKEditorImages')->name('video-excerpts.storeCKEditorImages');
    Route::resource('video-excerpts', 'VideoExcerptsController');

    // Resources
    Route::delete('resources/destroy', 'ResourcesController@massDestroy')->name('resources.massDestroy');
    Route::post('resources/media', 'ResourcesController@storeMedia')->name('resources.storeMedia');
    Route::post('resources/ckmedia', 'ResourcesController@storeCKEditorImages')->name('resources.storeCKEditorImages');
    Route::resource('resources', 'ResourcesController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Archives
    Route::delete('archives/destroy', 'ArchivesController@massDestroy')->name('archives.massDestroy');
    Route::post('archives/parse-csv-import', 'ArchivesController@parseCsvImport')->name('archives.parseCsvImport');
    Route::post('archives/process-csv-import', 'ArchivesController@processCsvImport')->name('archives.processCsvImport');
    Route::resource('archives', 'ArchivesController');

    // Directory
    Route::delete('directories/destroy', 'DirectoryController@massDestroy')->name('directories.massDestroy');
    Route::post('directories/media', 'DirectoryController@storeMedia')->name('directories.storeMedia');
    Route::post('directories/ckmedia', 'DirectoryController@storeCKEditorImages')->name('directories.storeCKEditorImages');
    Route::resource('directories', 'DirectoryController');

    // Sister Churches
    Route::delete('sister-churches/destroy', 'SisterChurchesController@massDestroy')->name('sister-churches.massDestroy');
    Route::post('sister-churches/media', 'SisterChurchesController@storeMedia')->name('sister-churches.storeMedia');
    Route::post('sister-churches/ckmedia', 'SisterChurchesController@storeCKEditorImages')->name('sister-churches.storeCKEditorImages');
    Route::resource('sister-churches', 'SisterChurchesController');

    // Uploader
    Route::delete('uploaders/destroy', 'UploaderController@massDestroy')->name('uploaders.massDestroy');
    Route::post('uploaders/media', 'UploaderController@storeMedia')->name('uploaders.storeMedia');
    Route::post('uploaders/ckmedia', 'UploaderController@storeCKEditorImages')->name('uploaders.storeCKEditorImages');
    Route::post('uploaders/parse-csv-import', 'UploaderController@parseCsvImport')->name('uploaders.parseCsvImport');
    Route::post('uploaders/process-csv-import', 'UploaderController@processCsvImport')->name('uploaders.processCsvImport');
    Route::resource('uploaders', 'UploaderController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Website Settings
    Route::delete('website-settings/destroy', 'WebsiteSettingsController@massDestroy')->name('website-settings.massDestroy');
    Route::post('website-settings/media', 'WebsiteSettingsController@storeMedia')->name('website-settings.storeMedia');
    Route::post('website-settings/ckmedia', 'WebsiteSettingsController@storeCKEditorImages')->name('website-settings.storeCKEditorImages');
    Route::resource('website-settings', 'WebsiteSettingsController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Announcements
    Route::delete('announcements/destroy', 'AnnouncementsController@massDestroy')->name('announcements.massDestroy');
    Route::post('announcements/media', 'AnnouncementsController@storeMedia')->name('announcements.storeMedia');
    Route::post('announcements/ckmedia', 'AnnouncementsController@storeCKEditorImages')->name('announcements.storeCKEditorImages');
    Route::resource('announcements', 'AnnouncementsController');

    // Homepage Carousel
    Route::delete('homepage-carousels/destroy', 'HomepageCarouselController@massDestroy')->name('homepage-carousels.massDestroy');
    Route::post('homepage-carousels/media', 'HomepageCarouselController@storeMedia')->name('homepage-carousels.storeMedia');
    Route::post('homepage-carousels/ckmedia', 'HomepageCarouselController@storeCKEditorImages')->name('homepage-carousels.storeCKEditorImages');
    Route::resource('homepage-carousels', 'HomepageCarouselController');

    // Praiseprayer
    Route::delete('praiseprayers/destroy', 'PraiseprayerController@massDestroy')->name('praiseprayers.massDestroy');
    Route::post('praiseprayers/media', 'PraiseprayerController@storeMedia')->name('praiseprayers.storeMedia');
    Route::post('praiseprayers/ckmedia', 'PraiseprayerController@storeCKEditorImages')->name('praiseprayers.storeCKEditorImages');
    Route::resource('praiseprayers', 'PraiseprayerController');

    // Qotd
    Route::delete('qotds/destroy', 'QotdController@massDestroy')->name('qotds.massDestroy');
    Route::post('qotds/media', 'QotdController@storeMedia')->name('qotds.storeMedia');
    Route::post('qotds/ckmedia', 'QotdController@storeCKEditorImages')->name('qotds.storeCKEditorImages');
    Route::resource('qotds', 'QotdController');

    // Weeks Messages
    Route::delete('weeks-messages/destroy', 'WeeksMessagesController@massDestroy')->name('weeks-messages.massDestroy');
    Route::post('weeks-messages/media', 'WeeksMessagesController@storeMedia')->name('weeks-messages.storeMedia');
    Route::post('weeks-messages/ckmedia', 'WeeksMessagesController@storeCKEditorImages')->name('weeks-messages.storeCKEditorImages');
    Route::resource('weeks-messages', 'WeeksMessagesController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // Section
    Route::delete('sections/destroy', 'SectionController@massDestroy')->name('sections.massDestroy');
    Route::post('sections/media', 'SectionController@storeMedia')->name('sections.storeMedia');
    Route::post('sections/ckmedia', 'SectionController@storeCKEditorImages')->name('sections.storeCKEditorImages');
    Route::resource('sections', 'SectionController');

    // Files
    Route::delete('files/destroy', 'FilesController@massDestroy')->name('files.massDestroy');
    Route::post('files/media', 'FilesController@storeMedia')->name('files.storeMedia');
    Route::post('files/ckmedia', 'FilesController@storeCKEditorImages')->name('files.storeCKEditorImages');
    Route::resource('files', 'FilesController');

    // Albums
    Route::delete('albums/destroy', 'AlbumsController@massDestroy')->name('albums.massDestroy');
    Route::post('albums/media', 'AlbumsController@storeMedia')->name('albums.storeMedia');
    Route::post('albums/ckmedia', 'AlbumsController@storeCKEditorImages')->name('albums.storeCKEditorImages');
    Route::resource('albums', 'AlbumsController');

    // Photos
    Route::delete('photos/destroy', 'PhotosController@massDestroy')->name('photos.massDestroy');
    Route::post('photos/media', 'PhotosController@storeMedia')->name('photos.storeMedia');
    Route::post('photos/ckmedia', 'PhotosController@storeCKEditorImages')->name('photos.storeCKEditorImages');
    Route::resource('photos', 'PhotosController');

    // Video Excerpts
    Route::delete('video-excerpts/destroy', 'VideoExcerptsController@massDestroy')->name('video-excerpts.massDestroy');
    Route::post('video-excerpts/media', 'VideoExcerptsController@storeMedia')->name('video-excerpts.storeMedia');
    Route::post('video-excerpts/ckmedia', 'VideoExcerptsController@storeCKEditorImages')->name('video-excerpts.storeCKEditorImages');
    Route::resource('video-excerpts', 'VideoExcerptsController');

    // Resources
    Route::delete('resources/destroy', 'ResourcesController@massDestroy')->name('resources.massDestroy');
    Route::post('resources/media', 'ResourcesController@storeMedia')->name('resources.storeMedia');
    Route::post('resources/ckmedia', 'ResourcesController@storeCKEditorImages')->name('resources.storeCKEditorImages');
    Route::resource('resources', 'ResourcesController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Archives
    Route::delete('archives/destroy', 'ArchivesController@massDestroy')->name('archives.massDestroy');
    Route::resource('archives', 'ArchivesController');

    // Directory
    Route::delete('directories/destroy', 'DirectoryController@massDestroy')->name('directories.massDestroy');
    Route::post('directories/media', 'DirectoryController@storeMedia')->name('directories.storeMedia');
    Route::post('directories/ckmedia', 'DirectoryController@storeCKEditorImages')->name('directories.storeCKEditorImages');
    Route::resource('directories', 'DirectoryController');

    // Sister Churches
    Route::delete('sister-churches/destroy', 'SisterChurchesController@massDestroy')->name('sister-churches.massDestroy');
    Route::post('sister-churches/media', 'SisterChurchesController@storeMedia')->name('sister-churches.storeMedia');
    Route::post('sister-churches/ckmedia', 'SisterChurchesController@storeCKEditorImages')->name('sister-churches.storeCKEditorImages');
    Route::resource('sister-churches', 'SisterChurchesController');

    // Uploader
    Route::delete('uploaders/destroy', 'UploaderController@massDestroy')->name('uploaders.massDestroy');
    Route::post('uploaders/media', 'UploaderController@storeMedia')->name('uploaders.storeMedia');
    Route::post('uploaders/ckmedia', 'UploaderController@storeCKEditorImages')->name('uploaders.storeCKEditorImages');
    Route::resource('uploaders', 'UploaderController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
