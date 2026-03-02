<?php

use App\Http\Controllers\Backend\Blog\BlogController as BackendBlogController;
use App\Http\Controllers\Backend\HeroImage\HeroImageController;
use App\Http\Controllers\Backend\IndustryPartner\IndustryPartnerController;
use App\Http\Controllers\Backend\Login\LoginController;
use App\Http\Controllers\Backend\StudyAbroad\StudyAbroadController as BackendStudyAbroadController;
use App\Http\Controllers\Backend\Testimonials\TestimonialsController;
use App\Http\Controllers\Frontend\Blog\BlogController as FrontEndBlogController;
use App\Http\Controllers\Frontend\ContactUs\ContactUsController as FrontendContactUsController;
use App\Http\Controllers\Backend\ContactUs\ContactUsController as BackenContactUsController;
use App\Http\Controllers\Frontend\StudyAbroad\StudyAbroadController as FrontendStudyAbroadController;
use App\Http\Controllers\Frontend\About\AboutController;
use App\Http\Controllers\Frontend\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\DashboardController;



#Initial
Route::get('/',[HomeController::class,'home'])->name('home');


#Login Logout
Route::get('/login',[LoginController::class,'loginPage'])->name('login');
Route::Post('/signin',[LoginController::class,'signin'])->name('signin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


## Backend
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

# Study_abroad
Route::get('/study_abroad',[BackendStudyAbroadController::class,'studyAbroad'])->name('study_abroad');
Route::get('/study_abroad_create',[BackendStudyAbroadController::class,'studyAbroadCreate'])->name('study_abroad_create');
Route::post('/study_abroad/store',[BackendStudyAbroadController::class, 'store'])->name('study_abroad.store');
Route::get('/study_abroad_edit/{id}',[BackendStudyAbroadController::class,'studyAbroadEdit'])->name('study_abroad_edit');
Route::put('/study_abroad/update/{id}', [BackendStudyAbroadController::class, 'update'])->name('study_abroad.update');
Route::delete('/study_abroad_delete/{id}', [BackendStudyAbroadController::class,'destroy'])->name('study_abroad.delete');

#Blog
Route::get('backend_blog',[BackendBlogController::class,'blog'])->name('backend_blog');
Route::get('/blog_create',[BackendBlogController::class,'blogCreate'])->name('blog_create');
Route::Post('/blog/store',[BackendBlogController::class,'store'])->name('blog_store');
Route::get('/blog_edit/{id}',[BackendBlogController::class,'blogEdit'])->name('blog_edit');
Route::put('/blog/update/{id}', [BackendBlogController::class, 'blogUpdate'])->name('blog.update');
Route::delete('/blog_delete/{id}', [BackendBlogController::class,'destroy'])->name('blog.delete');

#Testimonials
Route::get('testimonials',[TestimonialsController::class,'testimonials'])->name('testimonials');
Route::get('/testinomials_create',[TestimonialsController::class,'testimonials_create'])->name('testinomials_create');
Route::Post('/testinomials/store',[TestimonialsController::class,'store'])->name('testinomials_store');
Route::get('/testinomials_edit/{id}',[TestimonialsController::class,'testinomials_edit'])->name('testinomials_edit');
Route::put('/testinomials/update/{id}', [TestimonialsController::class, 'testinomials_update'])->name('testinomials.update');
Route::delete('/testinomials_delete/{id}', [TestimonialsController::class,'testinomials_delete'])->name('testinomials.delete');
//testinomials title edit
Route::get('/testinomials_title_edit/{id}',[TestimonialsController::class,'testinomials_titles_edit'])->name('testinomials_title_edit');
Route::put('/testinomials_title_update/{id}', [TestimonialsController::class, 'testinomials_titles_update'])->name('testinomials_title.update');


#Contact Us
Route::get('/backend_contact_us',[BackenContactUsController::class,'contactUs'])->name('backend_contact_us');
Route::delete('contact_us_delete/{id}',[BackenContactUsController::class,'deleteContactUs'])->name('contact_us_delete');

#Hero Image  This is Resource Controller Route
Route::resource('hero-images', HeroImageController::class);

#Industry Partner This is Resource Controller Route
Route::resource('industry-partners', IndustryPartnerController::class);


##Frontend
#home
Route::get('/home',[HomeController::class,'home'])->name('home');
#about
Route::get('/about',[AboutController::class,'about'])->name('about');
#study_abroad
Route::get('/study-abroad/{id}', [FrontendStudyAbroadController::class, 'show'])->name('study_abroad.show');
#blog
Route::get('blog',[FrontEndBlogController::class,'blog'])->name('blog.show');
Route::get('/blogs/{id}', [FrontEndBlogController::class, 'details'])
    ->name('blog.details');

#contact_us
Route::get('contact_us',[FrontendContactUsController::class,'contactUs'])->name('contact_us');
//insert Contact Us
Route::post('store_contact_us',[FrontendContactUsController::class,'store'])->name('store_contact_us');







