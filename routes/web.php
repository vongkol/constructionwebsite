<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin',"HomeController@index");
Route::get('/admin/dashboard',"HomeController@index");
Route::get('/',"FrontController@index");
// staff admin
Route::get('/admin/staff', "StaffController@index");
Route::get('/admin/staff/create', "StaffController@create");
Route::get('/admin/staff/edit/{id}', "StaffController@edit");
Route::get('/admin/staff/delete/{id}', "StaffController@delete");
Route::post('/admin/staff/save', "StaffController@save");
Route::post('/admin/staff/update', "StaffController@update");

Auth::routes();
// Ebook
Route::get('/ebook', "EbookController@index");
Route::get('/ebook/create', "EbookController@create");
Route::post('/ebook/save', "EbookController@save");
Route::get('/ebook/edit/{id}', "EbookController@edit");
Route::get('/ebook/detail/{id}', "EbookController@detail");
Route::post('/ebook/update', "EbookController@update");
Route::get('/ebook/delete/{id}', "EbookController@delete");
// Newsletter
Route::get('/newsletter', "NewsletterController@index");
Route::get('/newsletter/create', "NewsletterController@create");
Route::post('/newsletter/save', "NewsletterController@save");
Route::get('/newsletter/edit/{id}', "NewsletterController@edit");
Route::post('/newsletter/update', "NewsletterController@update");
Route::get('/newsletter/delete/{id}', "NewsletterController@delete");
// Video
Route::get('/video', "VideoController@index");
Route::get('/video/create', "VideoController@create");
Route::post('/video/save', "VideoController@save");
Route::get('/video/edit/{id}', "VideoController@edit");
Route::post('/video/update', "VideoController@update");
Route::get('/video/delete/{id}', "VideoController@delete");
// Social
Route::get('/social', "SocialController@index");
Route::get('/social/create', "SocialController@create");
Route::post('/social/save', "SocialController@save");
Route::get('/social/edit/{id}', "SocialController@edit");
Route::post('/social/update', "SocialController@update");
Route::get('/social/delete/{id}', "SocialController@delete");
// Advertisement
Route::get('/advertisement', "AdvertisementController@index");
Route::get('/advertisement/create', "AdvertisementController@create");
Route::post('/advertisement/save', "AdvertisementController@save");
Route::get('/advertisement/edit/{id}', "AdvertisementController@edit");
Route::post('/advertisement/update', "AdvertisementController@update");
Route::get('/advertisement/delete/{id}', "AdvertisementController@delete");
// Company Feature
Route::get('/company-feature', "CompanyFeatureController@index");
Route::get('/company-feature/create', "CompanyFeatureController@create");
Route::post('/company-feature/save', "CompanyFeatureController@save");
Route::get('/company-feature/edit/{id}', "CompanyFeatureController@edit");
Route::post('/company-feature/update', "CompanyFeatureController@update");
Route::get('/company-feature/delete/{id}', "CompanyFeatureController@delete");
// Membership
Route::get('/membership', "MembershipController@index");
Route::get('/membership/create', "MembershipController@create");
Route::post('/membership/save', "MembershipController@save");
Route::get('/membership/edit/{id}', "MembershipController@edit");
Route::get('/membership/detail/{id}', "MembershipController@detail");
Route::post('/membership/update', "MembershipController@update");
Route::get('/membership/delete/{id}', "MembershipController@delete");
Route::get('/membership/export-excel', "MembershipController@export_excel");
// Slide 
Route::get('/slide', "SlideController@index");
Route::get('/slide/create', "SlideController@create");
Route::post('/slide/save', "SlideController@save");
Route::get('/slide/edit/{id}', "SlideController@edit");
Route::post('/slide/update', "SlideController@update");
Route::get('/slide/delete/{id}', "SlideController@delete");
// Current Project 
Route::get('/current-project', "CurrentProjectController@index");
Route::get('/current-project/create', "CurrentProjectController@create");
Route::post('/current-project/save', "CurrentProjectController@save");
Route::get('/current-project/edit/{id}', "CurrentProjectController@edit");
Route::post('/current-project/update', "CurrentProjectController@update");
Route::get('/current-project/delete/{id}', "CurrentProjectController@delete");
// Partner
Route::get('/partner', "PartnerController@index");
Route::get('/partner/create', "PartnerController@create");
Route::get('/partner/edit/{id}', "PartnerController@edit");
Route::get('/partner/delete/{id}', "PartnerController@delete");
Route::post('/partner/save', "PartnerController@save");
Route::post('/partner/update', "PartnerController@update");

Route::get('/home', 'HomeController@index')->name('home');
// detail page
Route::get('/news-and-education/detail/{id}', 'FrontController@detail');
Route::get('/new-and-education', 'FrontController@page_by_category');
// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");
Route::get('/user/branch/{id}', "UserController@branch");
Route::post('/user/branch/save', "UserController@add_branch");
Route::get('/user/branch/delete/{id}', "UserController@delete_branch");

// role
Route::get('/role', "RoleController@index");
Route::get('/role/create', "RoleController@create");
Route::post('/role/save', "RoleController@save");
Route::get('/role/delete/{id}', "RoleController@delete");
Route::get('/role/edit/{id}', "RoleController@edit");
Route::post('/role/update', "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");

//Main Menu
Route::get('/main-menu', "MainMenuController@index");
Route::get('/main-menu/create', "MainMenuController@create");
Route::post('/main-menu/save', "MainMenuController@save");
Route::get('/main-menu/delete/{id}', "MainMenuController@delete");
Route::get('/main-menu/edit/{id}', "MainMenuController@edit");
Route::post('/main-menu/update', "MainMenuController@update");

//Sub Menu
Route::get('/sub-menu', "SubMenuController@index");
Route::get('/sub-menu/create', "SubMenuController@create");
Route::post('/sub-menu/save', "SubMenuController@save");
Route::get('/sub-menu/delete/{id}', "SubMenuController@delete");
Route::get('/sub-menu/edit/{id}', "SubMenuController@edit");
Route::post('/sub-menu/update', "SubMenuController@update");

// catogory
Route::get('/category', "CategoryController@index");
Route::get('/category/create', "CategoryController@create");
Route::get('/category/edit/{id}', "CategoryController@edit");
Route::get('/category/delete/{id}', "CategoryController@delete");
Route::post('/category/save', "CategoryController@save");
Route::post('/category/update', "CategoryController@update");
//membership form
Route::get('/page/membership-form', "FrontPageController@membership");
Route::post('/front/membership/save', "FrontPageController@membership_save");
Route::post('/front/newsletter/save', "FrontPageController@newsletter_save");
Route::get('/public/newsletter/sms', "FrontPageController@newsletter_sms");
// Page
Route::get('/page', "PageController@index");
Route::get('/page/create', "PageController@create");
Route::post('/page/save', "PageController@save");
Route::get('/page/delete/{id}', "PageController@delete");
Route::get('/page/edit/{id}', "PageController@edit");
Route::post('/page/update', "PageController@update");
Route::get('/page/view/{id}', "PageController@view");

// Comming Up
Route::get('/announcement', "AnnouncementController@index");
Route::get('/announcement/create', "AnnouncementController@create");
Route::post('/announcement/save', "AnnouncementController@save");
Route::get('/announcement/delete/{id}', "AnnouncementController@delete");
Route::get('/announcement/edit/{id}', "AnnouncementController@edit");
Route::post('/announcement/update', "AnnouncementController@update");
Route::get('/announcement/view/{id}', "AnnouncementController@view");
// load front page
Route::get('/page/staff', "FrontPageController@staff");
Route::get('/page/staff/detail/{id}', "FrontPageController@staff_detail");
Route::get('/page/board-member', "FrontPageController@board");
//Front Recent News
Route::get('/recent-news/detail/{id}', "FrontPageController@recent_news_detail");
Route::get('/recent-news/all/', "FrontPageController@recent_news_all");
Route::get('/page/{id}', "FrontPageController@index");

// // test
// Route::get('/test', "TestController@index");

// Post
Route::get('/post', "PostController@index");
Route::get('/post/create', "PostController@create");
Route::get('/post/create/new', "PostController@create");
Route::post('/post/save', "PostController@save");
Route::get('/post/delete/{id}', "PostController@delete");
Route::get('/post/edit/{id}', "PostController@edit");
Route::post('/post/update', "PostController@update");
Route::get('/post/view/{id}', "PostController@view");

Route::get('/language/{id}', "LangController@index");
// load file manager
Route::get('/fm', "FileManagerController@index");
// case study
Route::get('/case-study', "CaseStudyController@index");
Route::get('/case-study/create', "CaseStudyController@create");
Route::get('/case-study/edit/{id}', "CaseStudyController@edit");
Route::get('/case-study/delete/{id}', "CaseStudyController@delete");
Route::get('/case-study/detail/{id}', "CaseStudyController@detail");
Route::post('/case-study/save', "CaseStudyController@save");
Route::post('/case-study/update', "CaseStudyController@update");
// front case study
Route::get('/case/study', "FrontController@case_study");
Route::get('/case/study/{id}', "FrontController@case_detail");
// front elibrary
Route::get('/elibrary', "FrontController@elibrary");
Route::get('/elibrary/{id}', "FrontController@elibrary_detail");
// front event
Route::get('/event', "FrontController@event");
Route::get('/event/{id}', "FrontController@event_detail");
Route::get('/subscribe/{id}', "FrontController@subscribe");