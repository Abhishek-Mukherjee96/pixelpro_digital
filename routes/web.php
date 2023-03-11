<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FAQController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PlanController;
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;

//ADMIN ROUTE
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/get-session-data', [AdminAuthController::class, 'get_session_data'])->name('get_session_data');

    //PROFILE ROUTE
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/update-profile', [ProfileController::class, 'update_profile'])->name('update_profile');
    Route::post('/update-password', [ProfileController::class, 'update_password'])->name('update_password');

    //FOOTER ROUTE
    Route::get('/footer', [CommonController::class, 'footer'])->name('footer');
    Route::get('/update-footer/{id}', [CommonController::class, 'update_footer'])->name('update_footer');
    Route::post('/update-footer-action/{id}', [CommonController::class, 'update_footer_action'])->name('update_footer_action');

    // ========================HOME PAGE SECTION ROUTE START=================================

    //BANNER ROUTE
    Route::get('/banner', [CommonController::class, 'banner'])->name('banner');
    Route::get('/add-banner', [CommonController::class, 'add_banner'])->name('add_banner');
    Route::post('/add-banner-action', [CommonController::class, 'add_banner_action'])->name('add_banner_action');
    Route::get('/edit-banner/{id}', [CommonController::class, 'edit_banner'])->name('edit_banner');
    Route::post('/edit-banner-action/{id}', [CommonController::class, 'edit_banner_action'])->name('edit_banner_action');
    Route::get('/edit-banner-status/{id}', [CommonController::class, 'edit_banner_status'])->name('edit_banner_status');
    Route::get('/delete-banner/{id}', [CommonController::class, 'delete_banner'])->name('delete_banner');

    //ABOUT ROUTE
    Route::get('/about', [CommonController::class, 'about'])->name('about');
    Route::get('/edit-about/{id}', [CommonController::class, 'edit_about'])->name('edit_about');
    Route::post('/edit-about-action/{id}', [CommonController::class, 'edit_about_action'])->name('edit_about_action');
    Route::get('/edit-about-status/{id}', [CommonController::class, 'edit_about_status'])->name('edit_about_status');

    //WHAT WE OFFER ROUTE
    Route::get('/what-we-offer', [CommonController::class, 'what_we_offer'])->name('what_we_offer');
    Route::get('/add-we-offer', [CommonController::class, 'add_what_we_offer'])->name('add_what_we_offer');
    Route::post('/add-we-offer-action', [CommonController::class, 'add_what_we_offer_action'])->name('add_what_we_offer_action');
    Route::get('/edit-we-offer/{id}', [CommonController::class, 'edit_what_we_offer'])->name('edit_what_we_offer');
    Route::post('/edit-we-offer-action/{id}', [CommonController::class, 'edit_what_we_offer_action'])->name('edit_what_we_offer_action');
    Route::get('/edit-we-offer-status/{id}', [CommonController::class, 'edit_what_we_offer_status'])->name('edit_what_we_offer_status');
    Route::get('/delete-we-offer/{id}', [CommonController::class, 'delete_what_we_offer'])->name('delete_what_we_offer');

    //COMPANY ACTIVITIES ROUTE
    Route::get('/counter', [CommonController::class, 'counter'])->name('counter');
    Route::get('/edit-counter/{id}', [CommonController::class, 'edit_counter'])->name('edit_counter');
    Route::post('/edit-counter-action/{id}', [CommonController::class, 'edit_counter_action'])->name('edit_counter_action');
    Route::get('/edit-counter-status/{id}', [CommonController::class, 'edit_counter_status'])->name('edit_counter_status');

    //TEAM ROUTE
    Route::get('/team', [CommonController::class, 'team'])->name('team');
    Route::get('/add-team', [CommonController::class, 'add_team'])->name('add_team');
    Route::post('/add-team-action', [CommonController::class, 'add_team_action'])->name('add_team_action');
    Route::get('/edit-team/{id}', [CommonController::class, 'edit_team'])->name('edit_team');
    Route::post('/edit-team-action/{id}', [CommonController::class, 'edit_team_action'])->name('edit_team_action');
    Route::get('/edit-team-status/{id}', [CommonController::class, 'edit_team_status'])->name('edit_team_status');
    Route::get('/delete-team/{id}', [CommonController::class, 'delete_team'])->name('delete_team');

    //TESTIMONIAL ROUTE
    Route::get('/testimonial', [CommonController::class, 'testimonial'])->name('testimonial');
    Route::get('/add-testimonial', [CommonController::class, 'add_testimonial'])->name('add_testimonial');
    Route::post('/add-testimonial-action', [CommonController::class, 'add_testimonial_action'])->name('add_testimonial_action');
    Route::get('/edit-testimonial/{id}', [CommonController::class, 'edit_testimonial'])->name('edit_testimonial');
    Route::post('/edit-testimonial-action/{id}', [CommonController::class, 'edit_testimonial_action'])->name('edit_testimonial_action');
    Route::get('/edit-testimonial-status/{id}', [CommonController::class, 'edit_testimonial_status'])->name('edit_testimonial_status');
    Route::get('/delete-testimonial/{id}', [CommonController::class, 'delete_testimonial'])->name('delete_testimonial');

    //OUR PARTNERS ROUTE
    Route::get('/client', [CommonController::class, 'client'])->name('client');
    Route::get('/add-client', [CommonController::class, 'add_client'])->name('add_client');
    Route::post('/add-client-action', [CommonController::class, 'add_client_action'])->name('add_client_action');
    Route::get('/edit-client/{id}', [CommonController::class, 'edit_client'])->name('edit_client');
    Route::post('/edit-client-action/{id}', [CommonController::class, 'edit_client_action'])->name('edit_client_action');
    Route::get('/edit-client-status/{id}', [CommonController::class, 'edit_client_status'])->name('edit_client_status');
    Route::get('/delete-client/{id}', [CommonController::class, 'delete_client'])->name('delete_client');

    // ========================HOME PAGE SECTION ROUTE END=================================

    //BLOG ROUTE
    Route::get('/blog', [CommonController::class, 'blog'])->name('blog');
    Route::get('/add-blog', [CommonController::class, 'add_blog'])->name('add_blog');
    Route::post('/add-blog-action', [CommonController::class, 'add_blog_action'])->name('add_blog_action');
    Route::get('/edit-blog/{id}', [CommonController::class, 'edit_blog'])->name('edit_blog');
    Route::post('/edit-blog-action/{id}', [CommonController::class, 'edit_blog_action'])->name('edit_blog_action');
    Route::get('/edit-blog-status/{id}', [CommonController::class, 'edit_blog_status'])->name('edit_blog_status');
    Route::get('/delete-blog/{id}', [CommonController::class, 'delete_blog'])->name('delete_blog');

    //PLAN ROUTE
    Route::get('/plan', [CommonController::class, 'plan'])->name('plan');
    Route::get('/add-plan', [CommonController::class, 'add_plan'])->name('add_plan');
    Route::post('/add-plan-action', [CommonController::class, 'add_plan_action'])->name('add_plan_action');
    Route::get('/edit-plan/{id}', [CommonController::class, 'edit_plan'])->name('edit_plan');
    Route::post('/edit-plan-action/{id}', [CommonController::class, 'edit_plan_action'])->name('edit_plan_action');
    Route::get('/edit-plan-status/{id}', [CommonController::class, 'edit_plan_status'])->name('edit_plan_status');
    Route::get('/delete-plan/{id}', [CommonController::class, 'delete_plan'])->name('delete_plan');

    //FAQ ROUTE
    Route::get('/faq-list', [CommonController::class, 'faq_list'])->name('faq_list');
    Route::get('/add-faq', [CommonController::class, 'add_faq'])->name('add_faq');
    Route::post('/add-faq-action', [CommonController::class, 'add_faq_action'])->name('add_faq_action');
    Route::get('/edit-faq/{id}', [CommonController::class, 'edit_faq'])->name('edit_faq');
    Route::post('/edit-faq-action/{id}', [CommonController::class, 'edit_faq_action'])->name('edit_faq_action');
    Route::get('/edit-faq-status/{id}', [CommonController::class, 'edit_faq_status'])->name('edit_faq_status');
    Route::get('/delete-faq/{id}', [CommonController::class, 'delete_faq'])->name('delete_faq');


    //PROJECT ROUTE
    Route::get('/project-list', [CommonController::class, 'project_list'])->name('project_list');
    Route::get('/add-project', [CommonController::class, 'add_project'])->name('add_project');
    Route::post('/add-project-action', [CommonController::class, 'add_project_action'])->name('add_project_action');
    Route::get('/edit-project/{id}', [CommonController::class, 'edit_project'])->name('edit_project');
    Route::post('/edit-project-action/{id}', [CommonController::class, 'edit_project_action'])->name('edit_project_action');
    Route::get('/edit-project-status/{id}', [CommonController::class, 'edit_project_status'])->name('edit_project_status');
    Route::get('/delete-project/{id}', [CommonController::class, 'delete_project'])->name('delete_project');

    //PROJECT CATEGORY ROUTE
    Route::get('/project-category', [CommonController::class, 'project_category'])->name('project_category');
    Route::get('/add-category', [CommonController::class, 'add_category'])->name('add_category');
    Route::post('/add-category-action', [CommonController::class, 'add_category_action'])->name('add_category_action');
    Route::get('/edit-category/{id}', [CommonController::class, 'edit_category'])->name('edit_category');
    Route::post('/edit-category-action/{id}', [CommonController::class, 'edit_category_action'])->name('edit_category_action');
    Route::get('/delete-category/{id}', [CommonController::class, 'delete_category'])->name('delete_category');
    Route::get('/edit-category-status/{id}', [CommonController::class, 'edit_category_status'])->name('edit_category_status');

    //FOR CAREER
    Route::get('career', [CommonController::class, 'career'])->name('career');
    Route::get('add-career', [CommonController::class, 'add_career'])->name('add_career');
    Route::post('add-career-action', [CommonController::class, 'add_career_action'])->name('add_career_action');
    Route::get('edit-career/{id}', [CommonController::class, 'edit_career'])->name('edit_career');
    Route::post('update-career/{id}', [CommonController::class, 'update_career'])->name('update_career');
    Route::get('delete-career/{id}', [CommonController::class, 'delete_career'])->name('delete_career');
    Route::get('career-status-update/{id}', [CommonController::class, 'career_status_update'])->name('career_status_update');

    //FOR CAREER TAB
    Route::get('career-tab', [CommonController::class, 'career_tab'])->name('career_tab');
    Route::get('add-career-tab', [CommonController::class, 'add_career_tab'])->name('add_career_tab');
    Route::post('add-career-tab-action', [CommonController::class, 'add_career_tab_action'])->name('add_career_tab_action');
    Route::get('edit-career-tab/{id}', [CommonController::class, 'edit_career_tab'])->name('edit_career_tab');
    Route::post('update-career-tab/{id}', [CommonController::class, 'update_career_tab'])->name('update_career_tab');
    Route::get('delete-career-tab/{id}', [CommonController::class, 'delete_career_tab'])->name('delete_career_tab');
    Route::get('edit-career-tab-status/{id}', [CommonController::class, 'edit_career_tab_status'])->name('edit_career_tab_status');

    //FORM ROUTE
    Route::get('/contact-list', [ContactController::class, 'contact_list'])->name('contact_list');
    Route::get('/get-a-quote-list', [ContactController::class, 'quote_list'])->name('quote_list');
});

//FRONTEND ROUTE
Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [AdminAuthController::class, 'admin_login'])->name('login');
    Route::post('/admin-login-action', [AdminAuthController::class, 'admin_login_action'])->name('admin.login.action');
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about-us', [AboutController::class, 'about_us'])->name('about_us');
    Route::get('/service-details/{slug}', [HomeController::class, 'service_details'])->name('service_details');
    Route::get('/plans', [PlanController::class, 'plans'])->name('plans');
    Route::get('/plans-details/{slug}', [PlanController::class, 'plan_details'])->name('plan_details');
    Route::get('/project', [FrontendProjectController::class, 'project'])->name('project');
    Route::get('/project/{id}', [FrontendProjectController::class, 'project_id'])->name('project_id');
    Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs');
    Route::get('/blog-details/{slug}', [HomeController::class, 'blog_details'])->name('blog_details');
    Route::get('/careers', [CareerController::class, 'careers'])->name('careers');
    Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact');
    //SUBMIT CONTACT FORM
    Route::post('/submit-contact-form', [ContactController::class, 'submit_contact_form'])->name('submit_contact_form');
    Route::post('/get-a-quote-form', [ContactController::class, 'get_a_quote'])->name('get_a_quote');
    Route::get('/faq', [FAQController::class, 'faq'])->name('faq');
});
