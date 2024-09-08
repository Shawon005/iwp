<?php
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventCityController;
use App\Http\Controllers\vv_eventController;
use App\Http\Controllers\vv_event_catagoriesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\vv_coupon_categotyController;
use App\Http\Controllers\vv_coupon_sub_categoryController;
use App\Http\Controllers\vv_coupon_child_categoryController;
use App\Http\Controllers\vv_coupon_brandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\JobStateController;
use App\Http\Controllers\JobCityController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobSubCategoryController;
use App\Http\Controllers\JobSkillController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceCategoryController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductChildCategoryController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpertStateController;
use App\Http\Controllers\ExpertCityController;
use App\Http\Controllers\ExpertAreaController;
use App\Http\Controllers\ExpertCategoryController;
use App\Http\Controllers\ExpertSubCategoryController;
use App\Http\Controllers\ExpertPaymentController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ListingCategoryController;
use App\Http\Controllers\ListingCountryController;
use App\Http\Controllers\ListingStateController;
use App\Http\Controllers\ListingCityController;
use App\Http\Controllers\ListingSubCategoryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingDuplicateController;
use App\Http\Controllers\ListingPromotionController;
use App\Http\Controllers\EventStateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProductWalletController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\SubAdminTypeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SocialMidiaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AppearanceController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PopularTagController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\TopServiceController;
use App\Http\Controllers\TopEventController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\SliderImageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\GateWayController;
use App\Http\Controllers\UiHomePageController;
use App\Http\Controllers\NewsTrendController;
use App\Http\Controllers\NewsSliderController;
use App\Http\Controllers\ListingEnquiryContoller;
use App\Http\Controllers\ListingFilterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\ProductFilterController;
use App\Http\Controllers\ListingFilterdController;
use App\Http\Controllers\CouponFilterController;
use App\Http\Controllers\ShippingController;
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
Route::get('admin/forget_password', function () {
    return view('forget_password');
})->name('admin/forget_password');
Route::get('/verifyEmail/{id}', [MailController::class,'verify'])->name('verifyEmail');
Route::get('/email/{email}', [MailController::class,'Email'])->name('email');
Route::resource('admin/admin', adminController::class);
Route::POST('/admin_forget_password', [adminController::class,'Forget'])->name('admin_forget_password');
Route::POST('/login', [adminController::class,'login'])->name('login');
Route::get('/admin', [adminController::class,'admin'])->name('admin');
Route::get('/logout', [adminController::class,'logout'])->name('logout');
Route::get('/admin/dashboard',function (){return view('dashboard');})->name('admin/dashboard');

Route::get('/approve_user/{id}', [UserController::class,'Approve']);
Route::POST('/admin/store', [UserController::class,'Store'])->name('user_store');
Route::get('/admin/user', [UserController::class,'User'])->name('user');
Route::POST('/admin/user/update/{id}', [UserController::class,'Update'])->name('user_update');
Route::get('/admin/user/edit/{id}', [UserController::class,'Edit'])->name('user_edit');
Route::get('/admin/user/delete/{id}', [UserController::class,'Delete'])->name('user_delete');
Route::get('/admin/user_table', [UserController::class,'Index'])->name('user_table');
Route::get('/admin/user_table/General', [UserController::class,'General'])->name('user_table_general');
Route::get('/admin/user_table/Service_provider', [UserController::class,'Service_provider'])->name('user_table_service_provider');
Route::get('/admin/user_table/Free', [UserController::class,'Free'])->name('user_table_free');
Route::get('/admin/user_table/Standard', [UserController::class,'Standard'])->name('user_table_standard');
Route::get('/admin/user_table/Premium', [UserController::class,'Premium'])->name('user_table_premium');
Route::get('/admin/user_table/Premium_plus', [UserController::class,'Premium_plus'])->name('user_table_premium_plus');
Route::get('/admin/user_table/Non_paid', [UserController::class,'Non_paid'])->name('user_table_non_paid');
Route::get('/admin/user_table/Paid', [UserController::class,'Paid'])->name('user_table_paid');
Route::get('/admin/user_table/request', [UserController::class,'Request'])->name('user_table_request');
Route::get('/admin/user_table/cod_request', [UserController::class,'COD'])->name('user_table_cod_request');
Route::POST('/login_check', [UserController::class,'Login'])->name('user_login');

Route::POST('/event/state/store', [EventStateController::class,'Store'])->name('store_event_state');
Route::get('/event/delete/{state_id}', [EventStateController::class,'Delete'])->name('state_delete');
Route::get('/event/states', [EventStateController::class,'event_state'])->name('event_state');
Route::get('/event/states/table', [EventStateController::class,'Index'])->name('event_state_table');
Route::get('/event/states/edit/{id}', [EventStateController::class,'Edit'])->name('event_state_edit');
Route::POST('/event/states/update/{id}', [EventStateController::class,'Update'])->name('event_state_update');

Route::get('/admin/event/city', [EventCityController::class,'event_city'])->name('event_city');
Route::get('/admin/event/city/table', [EventCityController::class,'Index'])->name('event_city_table');
Route::get('/admin/event/city/edit/{id}', [EventCityController::class,'Edit'])->name('event_city_edit');
Route::POST('/admin/event/city/update/{id}', [EventCityController::class,'Update'])->name('event_city_update');
Route::get('/admin/event/delete/city/{city_id}', [EventCityController::class,'Delete'])->name('city_delete');
Route::POST('/admin/event/city/store', [EventCityController::class,'Store'])->name('storeeventCity');

Route::resource('admin/event/cetagory', vv_event_cetagoriesController::class);
Route::POST('/admin/event/store/cetagories', [vv_event_catagoriesController::class,'store_cetagories_event'])->name('store_event_cetagories');
Route::get('/admin/event/cetagories/table', [ vv_event_catagoriesController::class,'event_cetagories_table'])->name('event_cetagories_table');
Route::get('/admin/event/cetagories/edit/{id}', [ vv_event_catagoriesController::class,'event_cetagories_edit'])->name('event_cetagories_edit');
Route::POST('/admin/event/cetagories/update/{id}', [ vv_event_catagoriesController::class,'event_cetagories_update'])->name('event_cetagories_update');
Route::get('/admin/event/delete/cetagories/{catagories_id}', [ vv_event_catagoriesController::class,'cetagories_delete'])->name('cetagories_delete');
Route::get('/admin/event/cetagory', [ vv_event_catagoriesController::class,'event_cetagory'])->name('event_cetagory');

Route::POST('/admin/event/store', [vv_eventController::class,'Store'])->name('event_store');
Route::get('/admin/New_event', [ vv_eventController::class,'event'])->name('event');
Route::get('/admin/event', [ vv_eventController::class,'Index'])->name('event_table');
Route::get('/admin/event/edit{id}', [ vv_eventController::class,'Edit'])->name('event_edit');
Route::POST('/admin/event/update{id}', [vv_eventController::class,'Update'])->name('event_update');
Route::get('/admin/event/delete{id}', [ vv_eventController::class,'Delete'])->name('event_delete');
Route::get('/get-event/{id}', [vv_eventController::class,'getPlans']);

Route::POST('/admin/blog/store', [BlogController::class,'Store'])->name('blog_store');
Route::get('/admin/New_Blog', [ BlogController::class,'Blog'])->name('blog');
Route::get('/admin/blog', [ BlogController::class,'Index'])->name('blog_table');
Route::get('/admin/blog/edit{id}', [BlogController::class,'Edit'])->name('blog_edit');
Route::POST('/admin/blog/update{id}', [BlogController::class,'Update'])->name('blog_update');
Route::get('/admin/blog/delete{id}', [BlogController::class,'Delete'])->name('blog_delete');

Route::POST('/admin/category/store', [vv_coupon_categotyController::class,'Store'])->name('category_store');
Route::get('/admin/New_category', [vv_coupon_categotyController::class,'Coupon'])->name('category');
Route::get('/admin/category', [vv_coupon_categotyController::class,'Index'])->name('category_table');
Route::get('/admin/category/edit{id}', [vv_coupon_categotyController::class,'Edit'])->name('category_edit');
Route::get('/admin/category/show{id}', [vv_coupon_categotyController::class,'Show'])->name('category_show');
Route::POST('/admin/category/update{id}', [vv_coupon_categotyController::class,'Update'])->name('category_update');
Route::get('/admin/category/delete{id}', [vv_coupon_categotyController::class,'Delete'])->name('category_delete');

Route::POST('/admin/subcategory/store', [vv_coupon_sub_categoryController::class,'Store'])->name('sub_category_store');
Route::get('/admin/New_sub_category', [vv_coupon_sub_categoryController::class,'Sub_Category'])->name('sub_category');
Route::get('/admin/sub_category', [vv_coupon_sub_categoryController::class,'Index'])->name('sub_category_table');
Route::get('/admin/sub_category/edit{id}', [vv_coupon_sub_categoryController::class,'Edit'])->name('sub_category_edit');
Route::POST('/admin/sub_category/update{id}', [vv_coupon_sub_categoryController::class,'Update'])->name('sub_category_update');
Route::get('/admin/sub_category/delete{id}', [vv_coupon_sub_categoryController::class,'Delete'])->name('sub_category_delete');

Route::POST('/admin/childcategory/store', [vv_coupon_child_categoryController::class,'Store'])->name('child_category_store');
Route::get('/admin/New_child_category', [vv_coupon_child_categoryController::class,'child_Category'])->name('child_category');
Route::get('/admin/child_category', [vv_coupon_child_categoryController::class,'Index'])->name('child_category_table');
Route::get('/admin/child_category/edit{id}', [vv_coupon_child_categoryController::class,'Edit'])->name('child_category_edit');
Route::POST('/admin/child_category/update{id}', [vv_coupon_child_categoryController::class,'Update'])->name('child_category_update');
Route::get('/admin/child_category/delete{id}', [vv_coupon_child_categoryController::class,'Delete'])->name('child_category_delete');

Route::POST('/admin/coupon_brand/store', [vv_coupon_brandController::class,'Store'])->name('brand_store');
Route::get('/admin/coupon_New_brand_', [vv_coupon_brandController::class,'Brand'])->name('brand');
Route::get('/admin/coupon_brand', [vv_coupon_brandController::class,'Index'])->name('brand_table');
Route::get('/admin/coupon_brand/edit{id}', [vv_coupon_brandController::class,'Edit'])->name('brand_edit');
Route::POST('/admin/coupon_brand/update{id}', [vv_coupon_brandController::class,'Update'])->name('brand_update');
Route::get('/admin/coupon_brand/delete{id}', [vv_coupon_brandController::class,'Delete'])->name('brand_delete');

Route::POST('/admin/coupon/store', [CouponController::class,'Store'])->name('coupon_store');
Route::get('/admin/New_coupon', [CouponController::class,'Coupon'])->name('coupon');
Route::get('/admin/coupon', [CouponController::class,'Index'])->name('coupon_table');
Route::get('/admin/coupon/users/{id}', [CouponController::class,'All_users'])->name('coupon_user_table');
Route::get('/admin/coupon/edit{id}', [CouponController::class,'Edit'])->name('coupon_edit');
Route::POST('/admin/coupon/update{id}', [CouponController::class,'Update'])->name('coupon_update');
Route::get('/admin/coupon/delete{id}', [CouponController::class,'Delete'])->name('coupon_delete');
Route::get('/get-planscoupon/{id}', [CouponController::class,'getPlans']);
Route::get('/get-plans1coupon/{id}', [CouponController::class,'getPlans1']);

Route::POST('/admin/news/category/store', [NewsCategoryController::class,'Store'])->name('news_category_store');
Route::get('/admin/New/News/category', [NewsCategoryController::class,'News'])->name('news_category');
Route::get('/admin/news/category/', [NewsCategoryController::class,'Index'])->name('news_category_table');
Route::get('/admin/news/categoryedit{id}', [NewsCategoryController::class,'Edit'])->name('news_category_edit');
Route::POST('/admin/news/categoryupdate{id}', [NewsCategoryController::class,'Update'])->name('news_category_update');
Route::get('/admin/news/categorydelete{id}', [NewsCategoryController::class,'Delete'])->name('news_category_delete');
Route::get('/admin/news/category/position', [NewsCategoryController::class,'Position'])->name('news_category_position');
Route::GET('/news_category_prosition_store/{id}', [NewsCategoryController::class,'Position_Store']);

Route::get('/admin/New/News/trend', [NewsTrendController::class,'Index'])->name('news_trend');
Route::get('/admin/news/trend/edit{id}', [NewsTrendController::class,'Edit'])->name('news_trend_edit');
Route::POST('/admin/news/trend/update{id}', [NewsTrendController::class,'Update'])->name('news_trend_update');
Route::get('/admin/news/trend/position', [NewsTrendController::class,'Position'])->name('news_trend_position');
Route::GET('/news_trend_prosition_store/{id}', [NewsTrendController::class,'Position_Store']);

Route::get('/admin/New/News/slider', [NewsSliderController::class,'Index'])->name('news_slider');
Route::get('/admin/news/slider/edit{id}', [NewsSliderController::class,'Edit'])->name('news_slider_edit');
Route::POST('/admin/news/slider/update{id}', [NewsSliderController::class,'Update'])->name('news_slider_update');
Route::get('/admin/news/slider/position', [NewsSliderController::class,'Position'])->name('news_slider_position');
Route::GET('/news_slider_prosition_store/{id}', [NewsSliderController::class,'Position_Store']);

Route::POST('/admin/news/store', [NewsController::class,'Store'])->name('news_store');
Route::get('/admin/New/News', [NewsController::class,'News'])->name('news');
Route::get('/admin/news', [NewsController::class,'Index'])->name('news_table');
Route::get('/admin/news/edit{id}', [NewsController::class,'Edit'])->name('news_edit');
Route::POST('/admin/news/update{id}', [NewsController::class,'Update'])->name('news_update');
Route::get('/admin/news/delete{id}', [NewsController::class,'Delete'])->name('news_delete');

Route::POST('/admin/job/state/store', [JobStateController::class,'Store'])->name('job_state_store');
Route::get('/admin/New/job/state/', [JobStateController::class,'Job'])->name('job_state');
Route::get('/admin/job/state/', [JobStateController::class,'Index'])->name('job_state_table');
Route::get('/admin/job/state/edit{id}', [JobStateController::class,'Edit'])->name('job_state_edit');
Route::POST('/admin/job/state/update{id}', [JobStateController::class,'Update'])->name('job_state_update');
Route::get('/admin/job/state/delete{id}', [JobStateController::class,'Delete'])->name('job_state_delete');

Route::POST('/admin/job/city/store', [JobCityController::class,'Store'])->name('job_city_store');
Route::get('/admin/New/job/city/', [JobCityController::class,'Job'])->name('job_city');
Route::get('/admin/job/city/', [JobCityController::class,'Index'])->name('job_city_table');
Route::get('/admin/job/city/edit{id}', [JobCityController::class,'Edit'])->name('job_city_edit');
Route::POST('/admin/job/city/update{id}', [JobCityController::class,'Update'])->name('job_city_update');
Route::get('/admin/job/city/delete{id}', [JobCityController::class,'Delete'])->name('job_city_delete');

Route::POST('/admin/job/category/store', [JobCategoryController::class,'Store'])->name('job_category_store');
Route::get('/admin/New/job/category/', [JobCategoryController::class,'Job'])->name('job_category');
Route::get('/admin/job/category/', [JobCategoryController::class,'Index'])->name('job_category_table');
Route::get('/admin/job/categorycity/edit{id}', [JobCategoryController::class,'Edit'])->name('job_category_edit');
Route::get('/admin/job/categorycity/show{id}', [JobCategoryController::class,'Show'])->name('job_category_show');
Route::POST('/admin/job/category/update{id}', [JobCategoryController::class,'Update'])->name('job_category_update');
Route::get('/admin/job/category/delete{id}', [JobCategoryController::class,'Delete'])->name('job_category_delete');




Route::POST('/admin/job/sub_category/store', [JobSubCategoryController::class,'Store'])->name('job_sub_category_store');
Route::get('/admin/New/job/sub_category/', [JobSubCategoryController::class,'Job'])->name('job_sub_category');
Route::get('/admin/job/sub_category/', [JobSubCategoryController::class,'Index'])->name('job_sub_category_table');
Route::get('/admin/job/sub_categorycity/edit{id}', [JobSubCategoryController::class,'Edit'])->name('job_sub_category_edit');
Route::POST('/admin/job/sub_category/update{id}', [JobSubCategoryController::class,'Update'])->name('job_sub_category_update');
Route::get('/admin/job/sub_category/delete{id}', [JobSubCategoryController::class,'Delete'])->name('job_sub_category_delete');

Route::POST('/admin/job/skill/store', [JobSkillController::class,'Store'])->name('job_skill_store');
Route::get('/admin/New/job/skill/', [JobSkillController::class,'Skill'])->name('job_skill');
Route::get('/admin/job/skill/', [JobSkillController::class,'Index'])->name('job_skill_table');
Route::get('/admin/job/skillcity/edit{id}', [JobSkillController::class,'Edit'])->name('job_skill_edit');
Route::POST('/admin/job/skill/update{id}', [JobSkillController::class,'Update'])->name('job_skill_update');
Route::get('/admin/job/skill/delete{id}', [JobSkillController::class,'Delete'])->name('job_skill_delete');

Route::POST('/admin/job/store', [JobController::class,'Store'])->name('job_store');
Route::get('/admin/New/job/', [JobController::class,'Job'])->name('job');
Route::get('/admin/jobs', [JobController::class,'Index'])->name('job_table');
Route::get('/admin/job/edit{id}', [JobController::class,'Edit'])->name('job_edit');
Route::POST('/admin/job/update{id}', [JobController::class,'Update'])->name('job_update');
Route::get('/admin/job/delete{id}', [JobController::class,'Delete'])->name('job_delete');
Route::get('/get-job-category/{id}', [JobController::class,'getPlans1']);
Route::get('/get-job/{id}', [JobController::class,'getPlans2']);
Route::get('/admin/job/seeker', [JobController::class,'Seeker'])->name('job_seeker');
Route::get('/admin/job_applied/delete{id}', [JobController::class,'Delete_Applied'])->name('job_applied_delete');
Route::get('/admin/job_seeker/delete{id}', [JobController::class,'Delete_Seeker'])->name('job_seeker_delete');
Route::get('/admin/job/applicant/', [JobController::class,'Applicant'])->name('job_applied');
Route::get('/admin/job/premium/', [JobController::class,'popular'])->name('job_popular');

Route::POST('/admin/place/store', [PlaceController::class,'Store'])->name('place_store');
Route::get('/admin/New/place/', [PlaceController::class,'Place'])->name('place');
Route::get('/admin/place', [PlaceController::class,'Index'])->name('place_table');
Route::get('/admin/place/edit{id}', [PlaceController::class,'Edit'])->name('place_edit');
Route::POST('/admin/place/update{id}', [PlaceController::class,'Update'])->name('place_update');
Route::get('/admin/place/delete{id}', [PlaceController::class,'Delete'])->name('place_delete');

Route::get('/admin/place_request', [PlaceController::class,'Request'])->name('place_request_table');
Route::get('/admin/place_request/delete{id}', [PlaceController::class,'Delete_Request'])->name('place_request_delete');

Route::POST('/admin/place/category/store', [PlaceCategoryController::class,'Store'])->name('place_category_store');
Route::get('/admin/New/category/place/', [PlaceCategoryController::class,'Place'])->name('place_category');
Route::get('/admin/place/category', [PlaceCategoryController::class,'Index'])->name('place_category_table');
Route::get('/admin/place/category/edit{id}', [PlaceCategoryController::class,'Edit'])->name('place_category_edit');
Route::POST('/admin/place/category/update{id}', [PlaceCategoryController::class,'Update'])->name('place_category_update');
Route::get('/admin/place/category/delete{id}', [PlaceCategoryController::class,'Delete'])->name('place_category_delete');
Route::get('/admin/place/category/position', [PlaceCategoryController::class,'Position'])->name('place_category_position');
Route::GET('/place_category_prosition_store/{id}', [PlaceCategoryController::class,'Position_Store']);

Route::get('/admin/New/Subscriber/place/', [SubscriberController::class,'subscriber'])->name('subscriber');
Route::get('/admin/New/Subscriber/social/', [SubscriberController::class,'Social'])->name('social');
Route::get('/admin/Subscriber/delete{id}', [SubscriberController::class,'Delete'])->name('Subscriber_delete');
Route::get('/admin/Social/edit{id}', [SubscriberController::class,'Edit'])->name('social_edit');
Route::POST('/admin/Social/update{id}', [SubscriberController::class,'Update'])->name('social_update');



Route::POST('/admin/product/category/store', [ProductCategoryController::class,'Store'])->name('product_category_store');
Route::get('/admin/New/category/product/', [ProductCategoryController::class,'product'])->name('product_category');
Route::get('/admin/product/category', [ProductCategoryController::class,'Index'])->name('product_category_table');
Route::get('/admin/product/category/edit{id}', [ProductCategoryController::class,'Edit'])->name('product_category_edit');
Route::POST('/admin/product/category/update{id}', [ProductCategoryController::class,'Update'])->name('product_category_update');
Route::get('/admin/product/category/delete{id}', [ProductCategoryController::class,'Delete'])->name('product_category_delete');

Route::POST('/admin/product/subcategory/store', [ProductSubCategoryController::class,'Store'])->name('product_sub_category_store');
Route::get('/admin/New/subcategory/product/', [ProductSubCategoryController::class,'product'])->name('product_sub_category');
Route::get('/admin/product/subcategory', [ProductSubCategoryController::class,'Index'])->name('product_sub_category_table');
Route::get('/admin/product/subcategory/edit{id}', [ProductSubCategoryController::class,'Edit'])->name('product_sub_category_edit');
Route::POST('/admin/product/subcategory/update{id}', [ProductSubCategoryController::class,'Update'])->name('product_sub_category_update');
Route::get('/admin/product/subcategory/delete{id}', [ProductSubCategoryController::class,'Delete'])->name('product_sub_category_delete');
Route::get('/getSubCatByCatId/{id}', [ProductSubCategoryController::class,'getSubCatByCatId']);

Route::POST('/admin/product/childcategory/store', [ProductChildCategoryController::class,'Store'])->name('product_child_category_store');
Route::get('/admin/New/childcategory/product/', [ProductChildCategoryController::class,'product'])->name('product_child_category');
Route::get('/admin/product/childcategory', [ProductChildCategoryController::class,'Index'])->name('product_child_category_table');
Route::get('/admin/product/childcategory/edit{id}', [ProductChildCategoryController::class,'Edit'])->name('product_child_category_edit');
Route::POST('/admin/product/childcategory/update{id}', [ProductChildCategoryController::class,'Update'])->name('product_child_category_update');
Route::get('/admin/product/childcategory/delete{id}', [ProductChildCategoryController::class,'Delete'])->name('product_child_category_delete');
Route::get('/getChildCatByCatId/{id}', [ProductChildCategoryController::class,'getChildCatByCatId']);

Route::POST('/admin/product/brand/store', [ProductBrandController::class,'Store'])->name('product_brand_store');
Route::get('/admin/New/brand/product/', [ProductBrandController::class,'product'])->name('product_brand');
Route::get('/admin/product/brand', [ProductBrandController::class,'Index'])->name('product_brand_table');
Route::get('/admin/product/brand/edit{id}', [ProductBrandController::class,'Edit'])->name('product_brand_edit');
Route::POST('/admin/product/brand/update{id}', [ProductBrandController::class,'Update'])->name('product_brand_update');
Route::get('/admin/product/brand/delete{id}', [ProductBrandController::class,'Delete'])->name('product_brand_delete');

Route::POST('/admin/product/store', [ProductController::class,'Store'])->name('product_store');
Route::get('/admin/New/product/', [ProductController::class,'product'])->name('product');
Route::get('/admin/product', [ProductController::class,'Index'])->name('product_table');
Route::get('/admin/product/edit{id}', [ProductController::class,'Edit'])->name('product_edit');
Route::POST('/admin/product/update{id}', [ProductController::class,'Update'])->name('product_update');
Route::get('/admin/product/delete{id}', [ProductController::class,'Delete'])->name('product_delete');

Route::POST('/admin/expert/state/store', [ExpertStateController::class,'Store'])->name('expert_state_store');
Route::get('/admin/New/expert/state', [ExpertStateController::class,'expert'])->name('expert_state');
Route::get('/admin/expert/state', [ExpertStateController::class,'Index'])->name('expert_state_table');
Route::get('/admin/expert/stateedit{id}', [ExpertStateController::class,'Edit'])->name('expert_state_edit');
Route::POST('/admin/expert/stateupdate{id}', [ExpertStateController::class,'Update'])->name('expert_state_update');
Route::get('/admin/expert/statedelete{id}', [ExpertStateController::class,'Delete'])->name('expert_state_delete');

Route::POST('/admin/expert/city/store', [ExpertCityController::class,'Store'])->name('expert_city_store');
Route::get('/admin/New/expert/city', [ExpertCityController::class,'expert'])->name('expert_city');
Route::get('/admin/expert/city', [ExpertCityController::class,'Index'])->name('expert_city_table');
Route::get('/admin/expert/cityedit{id}', [ExpertCityController::class,'Edit'])->name('expert_city_edit');
Route::POST('/admin/expert/cityupdate{id}', [ExpertCityController::class,'Update'])->name('expert_city_update');
Route::get('/admin/expert/citydelete{id}', [ExpertCityController::class,'Delete'])->name('expert_city_delete');

Route::POST('/admin/expert/area/store', [ExpertAreaController::class,'Store'])->name('expert_area_store');
Route::get('/admin/New/expert/area', [ExpertAreaController::class,'expert'])->name('expert_area');
Route::get('/admin/expert/area', [ExpertAreaController::class,'Index'])->name('expert_area_table');
Route::get('/admin/expert/areaedit{id}', [ExpertAreaController::class,'Edit'])->name('expert_area_edit');
Route::POST('/admin/expert/areaupdate{id}', [ExpertAreaController::class,'Update'])->name('expert_area_update');
Route::get('/admin/expert/areadelete{id}', [ExpertAreaController::class,'Delete'])->name('expert_area_delete');

Route::POST('/admin/expert/category/store', [ExpertCategoryController::class,'Store'])->name('expert_category_store');
Route::get('/admin/New/expert/category', [ExpertCategoryController::class,'expert'])->name('expert_category');
Route::get('/admin/expert/category', [ExpertCategoryController::class,'Index'])->name('expert_category_table');
Route::get('/admin/expert/categoryedit{id}', [ExpertCategoryController::class,'Edit'])->name('expert_category_edit');
Route::get('/admin/expert/categorycity/show{id}', [ExpertCategoryController::class,'Show'])->name('expert_category_show');
Route::POST('/admin/expert/categoryupdate{id}', [ExpertCategoryController::class,'Update'])->name('expert_category_update');
Route::get('/admin/expert/categorydelete{id}', [ExpertCategoryController::class,'Delete'])->name('expert_category_delete');
Route::get('/admin/expert/category/position', [ExpertCategoryController::class,'Position'])->name('expert_category_position');
Route::GET('/expert_category_prosition_store/{id}', [ExpertCategoryController::class,'Position_Store']);

Route::POST('/admin/expert/sub-category/store', [ExpertSubCategoryController::class,'Store'])->name('expert_sub_category_store');
Route::get('/admin/New/expert/sub-category', [ExpertSubCategoryController::class,'expert'])->name('expert_sub_category');
Route::get('/admin/expert/sub-category', [ExpertSubCategoryController::class,'Index'])->name('expert_sub_category_table');
Route::get('/admin/expert/sub-categoryedit{id}', [ExpertSubCategoryController::class,'Edit'])->name('expert_sub_category_edit');
Route::POST('/admin/expert/sub-categoryupdate{id}', [ExpertSubCategoryController::class,'Update'])->name('expert_sub_category_update');
Route::get('/admin/expert/sub-categorydelete{id}', [ExpertSubCategoryController::class,'Delete'])->name('expert_sub_category_delete');

Route::POST('/admin/expert/payment/store', [ExpertPaymentController::class,'Store'])->name('expert_payment_store');
Route::get('/admin/New/expert/payment', [ExpertPaymentController::class,'expert'])->name('expert_payment');
Route::get('/admin/expert/payment', [ExpertPaymentController::class,'Index'])->name('expert_payment_table');
Route::get('/admin/expert/paymentedit{id}', [ExpertPaymentController::class,'Edit'])->name('expert_payment_edit');
Route::POST('/admin/expert/paymentupdate{id}', [ExpertPaymentController::class,'Update'])->name('expert_payment_update');
Route::get('/admin/expert/paymentdelete{id}', [ExpertPaymentController::class,'Delete'])->name('expert_payment_delete');

Route::POST('/admin/expert/store', [ExpertController::class,'Store'])->name('expert_store');
Route::get('/admin/New/expert', [ExpertController::class,'expert'])->name('expert');
Route::get('/admin/expert', [ExpertController::class,'Index'])->name('expert_table');
Route::get('/admin/expert/edit{id}', [ExpertController::class,'Edit'])->name('expert_edit');
Route::POST('/admin/expert/update{id}', [ExpertController::class,'Update'])->name('expert_update');
Route::get('/admin/expert/delete{id}', [ExpertController::class,'Delete'])->name('expert_delete');
Route::get('/get-plans/{id}', [ExpertController::class,'getPlans']);
Route::get('/get-plans1/{id}', [ExpertController::class,'getPlans1']);
Route::get('/get-plans2/{id}', [ExpertController::class,'getPlans2']);

Route::get('/admin/general/expert', [ExpertController::class,'General_Listing'])->name('General_expert_table');
Route::get('/admin/lead/expert', [ExpertController::class,'Lead_Listing'])->name('lead_expert_table');
Route::get('/admin/today/expert', [ExpertController::class,'today_Listing'])->name('today_expert_table');
Route::get('/admin/finish/expert', [ExpertController::class,'finish_Listing'])->name('finish_expert_table');
Route::get('/admin/pending/expert', [ExpertController::class,'pending_Listing'])->name('pending_expert_table');
Route::get('/admin/cencle/expert', [ExpertController::class,'cencle_Listing'])->name('cencle_expert_table');
Route::get('/admin/general/expert/delete{id}', [ExpertController::class,'General_Delete'])->name('General_expert_delete');

Route::POST('/admin/listing/category/store', [ListingCategoryController::class,'Store'])->name('listing_category_store');
Route::get('/admin/New/listing/category', [ListingCategoryController::class,'listing'])->name('listing_category');
Route::get('/admin/listing/category', [ListingCategoryController::class,'Index'])->name('listing_category_table');
Route::get('/admin/listing/categoryedit{id}', [ListingCategoryController::class,'Edit'])->name('listing_category_edit');
Route::get('/admin/listing/categoryshow{id}', [ListingCategoryController::class,'Show'])->name('listing_category_show');
Route::POST('/admin/listing/categoryupdate{id}', [ListingCategoryController::class,'Update'])->name('listing_category_update');
Route::get('/admin/listing/categorydelete{id}', [ListingCategoryController::class,'Delete'])->name('listing_category_delete');
Route::get('/admin/listing/category/position', [ListingCategoryController::class,'Position'])->name('listing_category_position');
Route::GET('/listing_category_prosition_store/{id}', [ListingCategoryController::class,'Position_Store']);

Route::POST('/admin/listing/country/store', [ListingCountryController::class,'Store'])->name('listing_country_store');
Route::get('/admin/New/listing/country', [ListingCountryController::class,'listing'])->name('listing_country');
Route::get('/admin/listing/country', [ListingCountryController::class,'Index'])->name('listing_country_table');
Route::get('/admin/listing/countryedit{id}', [ListingCountryController::class,'Edit'])->name('listing_country_edit');
Route::POST('/admin/listing/countryupdate{id}', [ListingCountryController::class,'Update'])->name('listing_country_update');
Route::get('/admin/listing/countrydelete{id}', [ListingCountryController::class,'Delete'])->name('listing_country_delete');

Route::POST('/admin/listing/state/store', [ListingStateController::class,'Store'])->name('listing_state_store');
Route::get('/admin/New/listing/state', [ListingStateController::class,'listing'])->name('listing_state');
Route::get('/admin/listing/state', [ListingStateController::class,'Index'])->name('listing_state_table');
Route::get('/admin/listing/stateedit{id}', [ListingStateController::class,'Edit'])->name('listing_state_edit');
Route::POST('/admin/listing/stateupdate{id}', [ListingStateController::class,'Update'])->name('listing_state_update');
Route::get('/admin/listing/statedelete{id}', [ListingStateController::class,'Delete'])->name('listing_state_delete');

Route::POST('/admin/listing/city/store', [ListingCityController::class,'Store'])->name('listing_city_store');
Route::get('/admin/New/listing/city', [ListingCityController::class,'listing'])->name('listing_city');
Route::get('/admin/listing/city', [ListingCityController::class,'Index'])->name('listing_city_table');
Route::get('/admin/listing/cityedit{id}', [ListingCityController::class,'Edit'])->name('listing_city_edit');
Route::POST('/admin/listing/cityupdate{id}', [ListingCityController::class,'Update'])->name('listing_city_update');
Route::get('/admin/listing/citydelete{id}', [ListingCityController::class,'Delete'])->name('listing_city_delete');

Route::POST('/admin/listing/sub-category/store', [ListingSubCategoryController::class,'Store'])->name('listing_sub_category_store');
Route::get('/admin/New/listing/sub-category', [ListingSubCategoryController::class,'listing'])->name('listing_sub_category');
Route::get('/admin/listing/sub-category', [ListingSubCategoryController::class,'Index'])->name('listing_sub_category_table');
Route::get('/admin/listing/sub-categoryedit{id}', [ListingSubCategoryController::class,'Edit'])->name('listing_sub_category_edit');
Route::POST('/admin/listing/sub-categoryupdate{id}', [ListingSubCategoryController::class,'Update'])->name('listing_sub_category_update');
Route::get('/admin/listing/sub-categorydelete{id}', [ListingSubCategoryController::class,'Delete'])->name('listing_sub_category_delete');

Route::POST('/admin/listing/store', [ListingController::class,'Store'])->name('listing_store');
Route::get('/admin/New/listing', [ListingController::class,'listing'])->name('listing');
Route::get('/admin/listing', [ListingController::class,'Index'])->name('listing_table');
Route::get('/admin/listing/edit{id}', [ListingController::class,'Edit'])->name('listing_edit');
Route::POST('/admin/listing/update{id}', [ListingController::class,'Update'])->name('listing_update');
Route::get('/admin/listing/delete{id}', [ListingController::class,'Delete'])->name('listing_delete');
Route::get('/admin/listing/pdelete{id}', [ListingController::class,'PDelete'])->name('listing_pdelete');
Route::get('/admin/listing/restore{id}', [ListingController::class,'Restore'])->name('listing_restore');
Route::get('/admin/New/trash', [ListingController::class,'Trash'])->name('listing_trash');
Route::get('/get-listing/{id}', [ListingController::class,'getPlans']);
Route::get('/get-listing1/{id}', [ListingController::class,'getPlans1']);
Route::get('/get-listing2/{id}', [ListingController::class,'getPlans2']);

Route::get('/admin/enquiry/listing', [ListingEnquiryContoller::class,'Index'])->name('enquiry_listing_table');
Route::get('/admin/enquiry_save/listing', [ListingEnquiryContoller::class,'Save'])->name('save_enquiry_listing_table');
Route::get('/admin/enquiry/listing/delete{id}', [ListingEnquiryContoller::class,'Delete'])->name('enquiry_listing_delete');
Route::get('/save/{id}', [ListingEnquiryContoller::class,'Change']);
Route::get('/save_r/{id}', [ListingEnquiryContoller::class,'Change_R']);

Route::get('/admin/review/listing', [ListingEnquiryContoller::class,'Review'])->name('reviwe_listing_table');
Route::get('/admin/save/review/listing', [ListingEnquiryContoller::class,'Save_R'])->name('save_reviwe_listing_table');
Route::get('/admin/review/listing/delete{id}', [ListingEnquiryContoller::class,'Delete_R'])->name('reviwe_listing_delete');

Route::get('/admin/clain/listing', [ListingController::class,'Claim_Listing'])->name('claim_listing_table');
Route::get('/admin/claim/listing/delete{id}', [ListingController::class,'Claim_Delete'])->name('claim_listing_delete');

Route::get('/admin/filter/listing', [ListingFilterController::class,'F_Index'])->name('filter_listing');
Route::get('/admin/category/filter/listing', [ListingFilterController::class,'C_Index'])->name('category_filter_listing');
Route::POST('/admin/filter/store', [ListingFilterController::class,'Store'])->name('filter_store');
Route::get('/admin/filter/feature/listing', [ListingFilterController::class,'Index'])->name('filter_feature_listing');
Route::POST('/admin/filter/feature/store', [ListingFilterController::class,'F_Store'])->name('filter_feature_store');
Route::POST('/admin/category/filter/store', [ListingFilterController::class,'C_Store'])->name('category_filter_store');

Route::POST('/admin/listing/duplicate/store', [ListingDuplicateController::class,'Store'])->name('listing_duplicate_store');
Route::get('/admin/New/listing/duplicate', [ListingDuplicateController::class,'listing'])->name('listing_duplicate');
Route::POST('/admin/listing/promotion/store', [ListingPromotionController::class,'Update'])->name('listing_promotion_update');
Route::get('/admin/New/listing/promotion', [ListingPromotionController::class,'listing'])->name('listing_promotion');
Route::get('/admin/listing/promotion', [ListingPromotionController::class,'Index'])->name('listing_promotion_table');
Route::get('/admin/listing/promotion_delete{id}', [ListingPromotionController::class,'Delete'])->name('listing_promotion_delete');

Route::POST('/admin/listing/point/store', [ListingPromotionController::class,'P_Update'])->name('listing_point_store');
Route::get('/admin/New/listing/point', [ListingPromotionController::class,'P_listing'])->name('listing_point');
Route::get('/admin/listing/point', [ListingPromotionController::class,'P_Index'])->name('listing_point_table');
Route::get('/admin/listing/point_delete{id}', [ListingPromotionController::class,'P_Delete'])->name('listing_point_delete');


Route::get('/admin/order', [OrderController::class,'Index'])->name('order_table');
Route::get('/admin/order/paddind', [OrderController::class,'Padding'])->name('order_paddind');
Route::get('/admin/order/approve', [OrderController::class,'Approved'])->name('order_approve');
Route::get('/admin/order/rejected', [OrderController::class,'Rejected'])->name('order_rejected');
Route::get('/admin/order/delivered', [OrderController::class,'Delivered'])->name('order_delivered');
Route::get('/admin/order_delete{id}', [OrderController::class,'Delete'])->name('order_delete');
Route::POST('/admin/order_approval{id}', [OrderController::class,'Approvel'])->name('order_approvel');
Route::POST('/admin/order_delivery{id}', [OrderController::class,'Delivery'])->name('order_delivery');
Route::get('/admin/order/cancel', [OrderController::class,'Cancel'])->name('order_cancel');
Route::GET('/admin/order-viwe/{id}', [OrderController::class,'View'])->name('admin_order_viwe');

Route::get('/admin/wallet', [WalletController::class,'Wallet'])->name('wallet');
Route::get('/admin/wihdraw', [WalletController::class,'Index'])->name('withdrew');
Route::get('/admin/commission/', [WalletController::class,'commission'])->name('commission');
Route::get('/admin/wallet-transition', [WalletController::class,'Tran'])->name('wallet_withdrew-tran');
Route::get('/admin/wallet/paddind', [WalletController::class,'Padding'])->name('wallet_paddind');
Route::get('/admin/wallet/approve', [WalletController::class,'Approved'])->name('wallet_approve');
Route::get('/admin/wallet/rejected', [WalletController::class,'Rejected'])->name('wallet_rejected');
Route::get('/admin/wallet/delivered', [WalletController::class,'Sent'])->name('wallet_sent');
Route::get('/admin/wallet_delete{id}', [WalletController::class,'Delete'])->name('wallet_delete');
Route::POST('/admin/wallet_status{id}', [WalletController::class,'Status'])->name('wallet_status');
Route::get('/admin/request', [WalletController::class,'Request'])->name('request');
Route::POST('/admin/request_store', [WalletController::class,'Store'])->name('request_store');
Route::get('/admin/request/Sub', [WalletController::class,'SubRequest'])->name('sub_request');

Route::get('/admin/product_wallet', [ProductWalletController::class,'Wallet'])->name('product_wallet');
Route::get('/admin/product/wihdraw', [ProductWalletController::class,'Index'])->name('product_withdrew');
Route::get('/admin/product/wallet-transition', [ProductWalletController::class,'Tran'])->name('product_withdrew-tran');
Route::get('/admin/product_wallet/paddind', [ProductWalletController::class,'Padding'])->name('product_wallet_paddind');
Route::get('/admin/product_wallet/approve', [ProductWalletController::class,'Approved'])->name('product_wallet_approve');
Route::get('/admin/product_wallet/rejected', [ProductWalletController::class,'Rejected'])->name('product_wallet_rejected');
Route::get('/admin/product_wallet/delivered', [ProductWalletController::class,'Sent'])->name('product_wallet_sent');
Route::POST('/admin/product_wallet_status{id}', [ProductWalletController::class,'Status'])->name('product_wallet_status');
Route::get('/admin/product_wallet_delete{id}', [ProductWalletController::class,'Delete'])->name('product_wallet_delete');

Route::POST('/admin/sub_admin/store', [SubAdminController::class,'Store'])->name('sub_admin_store');
Route::GET('/admin/sub_admin', [SubAdminController::class,'Sub'])->name('sub_admin');
Route::get('/admin/sub_admin/table', [SubAdminController::class,'Index'])->name('sub_admin_table');
Route::get('/admin/sub_admin/edit{id}', [SubAdminController::class,'Edit'])->name('sub_admin_edit');
Route::POST('/admin/sub_admin/update{id}', [SubAdminController::class,'Update'])->name('sub_admin_update');
Route::get('/admin/sub_admin_delete{id}', [SubAdminController::class,'Delete'])->name('sub_admin_delete');

Route::get('/admin/sub_admin_type/table', [SubAdminTypeController::class,'Index'])->name('sub_admin_type_table');
Route::get('/admin/sub_admin_type/edit{id}', [SubAdminTypeController::class,'Edit'])->name('sub_admin_type_edit');
Route::POST('/admin/sub_admin_type/update{id}', [SubAdminTypeController::class,'Update'])->name('sub_admin_type_update');

Route::get('/admin/feedback_delete{id}', [FeedbackController::class,'Delete'])->name('feedback_delete');
Route::get('admin/feedback', [FeedbackController::class,'Index'])->name('feedback_table');

Route::POST('/admin/notification/store', [NotificationController::class,'Store'])->name('notification_store');
Route::GET('/admin/notification', [NotificationController::class,'Notification'])->name('notification');
Route::get('/admin/notification/table', [NotificationController::class,'Index'])->name('notification_table');
Route::get('/admin/notification/edit{id}', [NotificationController::class,'Edit'])->name('notification_edit');
Route::POST('/admin/notification/update{id}', [NotificationController::class,'Update'])->name('notification_update');
Route::get('/admin/notification/delete{id}', [NotificationController::class,'Delete'])->name('notification_delete');

Route::GET('/admin/Social_media', [SocialMidiaController::class,'Show'])->name('Social_media');
Route::get('/admin/facebook/{id}', [SocialMidiaController::class,'Facebook']);
Route::get('/admin/Twitter/{id}', [SocialMidiaController::class,'Twitter']);
Route::get('/admin/WhatsApp/{id}', [SocialMidiaController::class,'WhatsApp']);
Route::get('/admin/LinkedIn/{id}', [SocialMidiaController::class,'LinkedIn']);
Route::get('/admin/Pinterest/{id}', [SocialMidiaController::class,'Pinterest']);

Route::POST('/admin/setting/store', [SettingController::class,'Store'])->name('setting_store');
Route::GET('/admin/setting', [SettingController::class,'Setting'])->name('setting');
Route::POST('/admin/setting/page_url',[SettingController::class,'PAGE_URL'])->name('setting_page_url');
Route::GET('/admin/setting/all_page', [SettingController::class,'URL'])->name('setting_all_page');
Route::POST('/admin/dummy', [SettingController::class,'Dummy_image'])->name('dummy_update');

Route::POST('/admin/website/logo_store', [AppearanceController::class,'Store'])->name('website_logo_store');
Route::GET('/admin/website/logo', [AppearanceController::class,'Logo'])->name('website_logo');
Route::GET('/admin/website/feature', [AppearanceController::class,'Feature'])->name('feature');
Route::GET('/admin/mobile/{id}', [AppearanceController::class,'Mobile']);
Route::GET('/admin/touch/{id}', [AppearanceController::class,'Touch']);
Route::GET('/admin/m_footer/{id}', [AppearanceController::class,'Download']);
Route::GET('/admin/country/{id}', [AppearanceController::class,'Country']);

Route::GET('/admin/media/library', [MediaController::class,'Media'])->name('media');
Route::GET('admin/footer', [FooterController::class,'Footer'])->name('footer');
Route::POST('admin/footer/store', [FooterController::class,'Store'])->name('footer_store');

Route::POST('/admin/popular_tag/store', [PopularTagController::class,'Store'])->name('popular_tag_store');
Route::get('/admin/New/popular_tag', [PopularTagController::class,'Show'])->name('popular_tag');
Route::get('/admin/popular_tag', [PopularTagController::class,'Index'])->name('popular_tag_table');
Route::get('/admin/popular_edit{id}', [PopularTagController::class,'Edit'])->name('popular_tag_edit');
Route::POST('/admin/popular_update{id}', [PopularTagController::class,'Update'])->name('popular_tag_update');
Route::get('/admin/popular_delete{id}', [PopularTagController::class,'Delete'])->name('popular_tag_delete');

Route::get('/admin/top_section', [HomePageController::class,'Index'])->name('top_section_table');
Route::get('/admin/top_section_edit{id}', [HomePageController::class,'Edit'])->name('top_section_edit');
Route::POST('/admin/top_section_update{id}', [HomePageController::class,'Update'])->name('top_section_update');

Route::get('/admin/top_category', [HomePageController::class,'Top_Index'])->name('top_category_table');
Route::get('/admin/top_category_edit{id}', [HomePageController::class,'Top_Edit'])->name('top_category_edit');
Route::POST('/admin/top_category_update{id}', [HomePageController::class,'Top_Update'])->name('top_category_update');

Route::get('/admin/trend_category', [HomePageController::class,'Trend_Index'])->name('trend_category_table');
Route::get('/admin/trend_category_edit{id}', [HomePageController::class,'Trend_Edit'])->name('trend_category_edit');
Route::POST('/admin/trend_category_update{id}', [HomePageController::class,'Trend_Update'])->name('trend_category_update');

Route::get('/admin/popular_business', [HomePageController::class,'Business_Index'])->name('popular_business_table');
Route::get('/admin/popular_business_edit{id}', [HomePageController::class,'Business_Edit'])->name('popular_business_edit');
Route::POST('/admin/popular_business_update{id}', [HomePageController::class,'Business_Update'])->name('popular_business_update');

Route::get('/admin/top_service', [TopServiceController::class,'Index'])->name('top_service_table');
Route::get('/admin/top_service_cat_edit{id}', [TopServiceController::class,'Edit_Category'])->name('top_service_cat_edit');
Route::POST('/admin/top_service_cat_update{id}', [TopServiceController::class,'Update_Category'])->name('top_service_cat_update');
Route::get('/admin/top_service_sub_edit{id}{sub}', [TopServiceController::class,'Edit_Sub'])->name('top_service_sub_edit');
Route::POST('/admin/top_service_sub_update{id}', [TopServiceController::class,'Update_Sub'])->name('top_service_sub_update');

Route::get('/admin/top_event', [TopEventController::class,'Index'])->name('top_event_table');
Route::get('/admin/top_event_edit{id}', [TopEventController::class,'Edit'])->name('top_event_edit');
Route::POST('/admin/top_event_update{id}', [TopEventController::class,'Update'])->name('top_event_update');

Route::get('/admin/color_setting', [ColorController::class,'Index'])->name('color_setting');
Route::POST('/admin/color_setting_update', [ColorController::class,'Update'])->name('color_setting_update');

Route::get('/admin/text_change', function () {return view('CMS.text_change');})->name('text_change');
Route::get('/admin/dummy_image', function () {return view('CMS.dummy_image');})->name('dummy_image');

Route::get('/admin_ads', [AdsController::class,'Ads'])->name('ads');
Route::POST('/admin_ads_store', [AdsController::class,'Store'])->name('ads_store');
Route::get('/admin_ads_request', [AdsController::class,'Index'])->name('ads_request_table');
Route::get('/admin_ads_current', [AdsController::class,'Index_C'])->name('ads_current_table');
Route::get('/admin_ads_edit{id}', [AdsController::class,'Edit'])->name('ads_edit');
Route::get('/admin_ads_delete{id}', [AdsController::class,'Delete'])->name('ads_delete');
Route::get('/admin_ads_approve{id}', [AdsController::class,'Approve'])->name('ads_approve');
Route::POST('/admin_ads_update{id}', [AdsController::class,'Update'])->name('ads_update');
Route::get('/admin_ads_pricing', [AdsController::class,'Ad_pricing'])->name('ads_pricing');
Route::get('/admin_ads_pricing_edit{id}', [AdsController::class,'Edit_P'])->name('ads_pricing_edit');
Route::POST('/admin_ads_pricing_update{id}', [AdsController::class,'Update_P'])->name('ads_pricing_update');
Route::get('/admin_google_adsense', [AdsController::class,'Google_ad'])->name('google_ad');
Route::POST('/admin_google', [AdsController::class,'Update_G'])->name('google_ad_update');
Route::get('/par_cost{id}', [AdsController::class,'Cost']);

Route::POST('/admin/slider/store', [SliderImageController::class,'Store'])->name('slider_store');
Route::get('/admin/New/slider/', [SliderImageController::class,'Slider'])->name('slider');
Route::get('/admin/slider', [SliderImageController::class,'Index'])->name('slider_table');
Route::get('/admin/slider/edit{id}', [SliderImageController::class,'Edit'])->name('slider_edit');
Route::POST('/admin/slider/update{id}', [SliderImageController::class,'Update'])->name('slider_update');
Route::get('/admin/slider/delete{id}', [SliderImageController::class,'Delete'])->name('slider_delete');

Route::get('/admin/plan', [PlanController::class,'Index'])->name('plan_table');
Route::get('/admin/plan/edit{id}', [PlanController::class,'Edit'])->name('plan_edit');
Route::POST('/admin/plan/update{id}', [PlanController::class,'Update'])->name('plan_update');

Route::get('/admin/all-payment', [PaymentController::class,'Index'])->name('all_payment');
Route::get('/admin/payment_delete{id}', [PaymentController::class,'Delete'])->name('payment_delete');
Route::get('/admin/invoice_delete{id}', [PaymentController::class,'I_Delete'])->name('invoice_delete');
Route::get('/admin/send_invoice', [PaymentController::class,'Edit'])->name('send_invoice');
Route::POST('/admin/send-invoice/store', [PaymentController::class,'Store'])->name('send_invoice_store');
Route::get('/admin/all-invoice', [PaymentController::class,'All_Invoice'])->name('all_invoice');
Route::get('/admin/PDF', [PaymentController::class,'PDF'])->name('pdf');

Route::get('/admin/gateway', [GateWayController::class,'Index'])->name('payment_gateway');
Route::get('/admin/cash_on_de', [GateWayController::class,'Free'])->name('free_edit');
Route::get('/admin/paypal', [GateWayController::class,'Paypal'])->name('paypal_edit');
Route::get('/admin/Stripe', [GateWayController::class,'Stripe'])->name('stripe_edit');
Route::get('/admin/Razorpay', [GateWayController::class,'Razorpay'])->name('razorpay_edit');
Route::get('/admin/Paytm', [GateWayController::class,'Paytm'])->name('paytm_edit');

Route::POST('/admin/cash_on_de_U', [GateWayController::class,'Free_Update'])->name('free_update');
Route::POST('/admin/paypal_U', [GateWayController::class,'Paypal_Update'])->name('paypal_update');
Route::POST('/admin/Stripe_U', [GateWayController::class,'Stripe_Update'])->name('stripe_update');
Route::POST('/admin/Razorpay_U', [GateWayController::class,'Razorpay_Update'])->name('razorpay_update');
Route::POST('/admin/Paytm_U', [GateWayController::class,'Paytm_Update'])->name('paytm_update');

// Shipping

Route::resource('/shipping', ShippingController::class);
Route::get('/shipping.delete/{id}', [ShippingController::class,'destroy'])->name('shipping.delete');

Route::get('/', [UiHomePageController::class,'Top_section'])->name('index');
Route::get('/all-category', [UiHomePageController::class,'All_category'])->name('all-category');
Route::get('/events', [UiHomePageController::class,'Events'])->name('events');
Route::get('/all-products', [UiHomePageController::class,'Products'])->name('all-products');
Route::get('/community',[UiHomePageController::class,'Community'])->name('community');
Route::get('/pricing-details',[UiHomePageController::class,'Plan'])->name('pricing-details');
Route::get('/stores',[UiHomePageController::class,'Stores'])->name('mystore');
Route::get('/job',[UiHomePageController::class,'Jobs'])->name('jobs');
Route::get('/all-job/{id}',[UiHomePageController::class,'All_Jobs'])->name('all-jobs');
Route::get('/job/{id}',[UiHomePageController::class,'Job_Details'])->name('job_details');
Route::get('/experts',[UiHomePageController::class,'Experts'])->name('experts');
Route::get('/expert/details{id}',[UiHomePageController::class,'Expert_details'])->name('expert/details');
Route::get('/expert/city/{id}',[UiHomePageController::class,'Expert_City']);
Route::get('/all-news',[UiHomePageController::class,'News'])->name('all-news');
Route::POST('/subscriber_store',[UiHomePageController::class,'Subscriber'])->name('subscriber_store');
Route::get('/product_categories', [UiHomePageController::class,'Product_Categories'])->name('product/categories');
Route::get('/products_cat/{id}', [UiHomePageController::class,'Product_Cat'])->name('product/cat');
Route::get('/products/{id}',[UiHomePageController::class,'Product_Details'])->name('product/details');
Route::get('/products/{id}/{ref}',[UiHomePageController::class,'Product_Details_U'])->name('product/details_u');
Route::get('/all-listing/{id}',[UiHomePageController::class,'Listing_details'])->name('all-listings');
Route::get('/all-listing/{id}/{sub}',[UiHomePageController::class,'Listing_sub_Details'])->name('all_listing');
Route::get('/all-listings/{id}',[UiHomePageController::class,'Listing'])->name('all-listinged');
Route::get('/news/details/{id}',[UiHomePageController::class,'News_details'])->name('news-details');
Route::get('/news-all/{id}',[UiHomePageController::class,'News_all'])->name('news-all');
Route::get('/event/details/{id}',[UiHomePageController::class,'Event_details'])->name('event/details');
Route::get('login',[UiHomePageController::class,'Login'])->name('ui_login');
Route::get('profile/{id}',[UiHomePageController::class,'Profile'])->name('profile');
Route::get('places',[UiHomePageController::class,'places'])->name('places');
Route::get('places/details/{id}',[UiHomePageController::class,'places_Details'])->name('places_details');
Route::POST('Queation', [UiHomePageController::class,'Enquery'])->name('enquery');
Route::POST('claim', [UiHomePageController::class,'claim']);
Route::POST('product_enquery',[UiHomePageController::class,'Product_Enquery']);
Route::GET('search', [UiHomePageController::class,'Search'])->name('search');
Route::GET('follower/{id}',[UiHomePageController::class,'Follow']);
Route::POST('applied_job',[UiHomePageController::class,'Applied_JOB'])->name('applied_job');
Route::get('expert_profile/{id}',[UiHomePageController::class,'Expert_Profile'])->name('expert_profile');
Route::POST('expert_enquery',[UiHomePageController::class,'Expert_enquery']);
Route::GET('/coupons', [UiHomePageController::class,'Coupon'])->name('coupons');
Route::GET('/company-profile/{id}', [UiHomePageController::class,'Company'])->name('company-profile');

// Users
Route::prefix('users')->name('users.')->group(function() {
    Route::get('/places', [UiHomePageController::class,'UserPlacesIndex'])->name('places.index');
    Route::get('/place/create', [UiHomePageController::class,'UserPlacesCreate'])->name('places.create');
    Route::get('/place/edit{id}', [UiHomePageController::class,'UserPlacesEdit'])->name('places.edit');
    Route::get('/place/delete{id}', [UiHomePageController::class,'UserPlacesDelete'])->name('places.delete');
});


Route::get('razorpay', [RazorpayController::class, 'razorpay'])->name('razorpay');
Route::post('razorpaypayment', [RazorpayController::class, 'payment'])->name('payment');
Route::POST('expert_reviwe',[UiHomePageController::class,'Expert_reviwe']);
Route::POST('listing_reviwe',[UiHomePageController::class,'Listing_Reviwe'])->name('listing_reviwe');
Route::POST('like_listing',[UiHomePageController::class,'like_listing']);
Route::POST('/place_request',[UiHomePageController::class,'Place_request']);
Route::POST('product_filter',[ProductFilterController::class,'Filter']);
Route::POST('listing_filter',[ListingFilterdController::class,'Filter']);
Route::POST('coupon_filter',[CouponFilterController::class,'Filter']);
// Route::get('/news/details', function () {
//     return view('ui.new-ui.news-details.iwp-index');
// })->name('news-details');
// Route::get('/job', function () {
//     return view('ui.new-ui.jobs.iwp-index');
// })->name('jobs');

// Route::get('/all-job', function () {
//     return view('ui.new-ui.all-jobs.iwp-job');
// })->name('all-jobs');

Route::get('/admin/all-listing', function () {
    return view('ui.new-ui.up-listing.iwp-listing');
})->name('all-listing');

Route::get('/admin/all-listing/phonebook', function () {
    return view('ui.new-ui.all-listing.iwp-listing');
})->name('all-listing/phonebook');

// Route::get('/event/details', function () {
//     return view('ui.new-ui.event.iwp-index');
// })->name('event/details');

// Route::get('/profile', function () {
//     return view('ui.old-ui.profile');
// })->name('user_profile');
Route::GET('company_profile_edit', [BusinessController::class,'Edit'])->name('company_profile_edit');
Route::POST('company_profile_update/{id}', [BusinessController::class,'Update'])->name('company_profile_update');
// Route::get('/places', function () {
//     return view('ui.new-ui.places.iwp-index');
// })->name('places');



// Route::get('/login{id}', function () {
//     return view('ui.new-ui.iwp-login'['id']);
// })->name('ui_login');





// Route::get('/product-details', function () {
//     return view('ui.product-details');
// })->name('product-details');

Route::get('/about', function () {
    return view('ui.new-ui.about');
})->name('about');
Route::get('/contact', function () {
    return view('ui.new-ui.contact-us');
})->name('contact');
Route::get('/faq', function () {
    return view('ui.new-ui.faq');
})->name('faq');
Route::get('/feedback', function () {
    return view('ui.new-ui.feedback');
})->name('feedback');
Route::get('/privacy', function () {
    return view('ui.new-ui.iwp-privacy-policy');
})->name('privacy');
Route::get('/terms', function () {
    return view('ui.new-ui.iwp-terms-of-use');
})->name('terms');
// Route::get('/expert/details', function () {
//     return view('ui.new-ui.iwp-expert');
// })->name('expert/details');
Route::get('/blog-details', function () {
    return view('ui.blog-details');
})->name('blog-details');
// Route::get('/blog-details', function () {
//     return view('ui.blog-details');
// })->name('blog-details');
// Route::get('/blog-details', function () {
//     return view('ui.blog-details');
// })->name('blog-details');

Route::get('/sign-up', function () {
    return view('ui.login');
})->name('sign-up');



Route::get('/ads/post', function () {
    return view('ui.new-ui.iwp-ads-post');
})->name('ads_post');
// Route::get('all-product', function () {
//     return view('product.admin-add-new-product');
// });

Route::get('/admin/invoice', function () {
    return view('payment.invoice.create_invoice');
})->name('invoice');
use App\Http\Controllers\UserListingController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\UserJobController;
use App\Http\Controllers\UserProductController;
Route::GET('/payment_R/{id}/{user}', [UserViewController::class,'Payment'])->name('payment_R');
Route::POST('/payment_store/{id}', [UserViewController::class,'Payment_Store'])->name('payment_store');
Route::GET('/dashboard', [UserViewController::class,'Dashboard'])->name('user/dasboard');
Route::GET('/user_logout', [UserViewController::class,'Logout'])->name('user_logout');
Route::GET('/register', [UserViewController::class,'Show'])->name('register');
Route::POST('/user_register', [UserViewController::class,'Register'])->name('user_register');
Route::POST('/forget_password', [UserViewController::class,'Forget'])->name('forget_password');
Route::GET('/all-listing', [UserListingController::class,'Index'])->name('user_all_listing');
Route::POST('/add-listing-store', [UserListingController::class,'Store'])->name('user_listing_store');
Route::GET('/add-listing-step-1', [UserListingController::class,'Listing'])->name('user_add_listing_step_1');
Route::GET('/listing_delete/{id}', [UserListingController::class,'Delete'])->name('user_listing_delete');
Route::GET('/listing_edit/{id}/{step}', [UserListingController::class,'Edit'])->name('edit_listing_step_1');
Route::POST('/add-listing-update/{id}', [UserListingController::class,'Update'])->name('user_listing_update');
Route::POST('/duplicate_listing_create', [UserListingController::class,'Duplicate'])->name('duplicate_listing_create');

Route::GET('/my-order', [UserOrderController::class,'Index'])->name('my-order');
Route::GET('/order-viwe/{id}', [UserOrderController::class,'View'])->name('order-viwe');
Route::GET('/order.delete/{id}', [UserOrderController::class,'delete'])->name('order.delete');
Route::GET('/db-all-job', [UserJobController::class,'Index'])->name('db-all-job');
Route::GET('/db-job/{id}', [UserJobController::class,'Delete'])->name('db-job-delete');
Route::GET('/add-job', [UserJobController::class,'Job'])->name('add-job');
Route::POST('/add-job-store', [UserJobController::class,'Store'])->name('user_job_store');
Route::GET('/edit-job/{id}', [UserJobController::class,'Edit'])->name('edit-job');
Route::POST('/add-job-update/{id}', [UserJobController::class,'Update'])->name('user_job_update');
Route::GET('/db-all-product', [UserProductController::class,'Index'])->name('db-all-product');
Route::GET('/add-product', [UserProductController::class,'product'])->name('add-product');
Route::POST('/product-store', [UserProductController::class,'Store'])->name('product-store');
Route::GET('/edit-product/{id}', [UserProductController::class,'Edit'])->name('edit-product');
Route::POST('/product-update/{id}', [UserProductController::class,'Update'])->name('user_product_update');
Route::get('/getSubCatByCatIdUser/{id}', [UserProductController::class,'getSubCatByCatId']);
use App\Http\Controllers\UserCouponController;
use App\Http\Controllers\UserEnqueryController;
use App\Http\Controllers\UserPlanController;
use App\Http\Controllers\UserPromotionController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\UserAdsController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\UserProductAffiliationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserExpertController;
use App\Http\Controllers\UserJobProfileCOntroller;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\UserListingLikeController;
use App\Http\Controllers\UserSeoController;
Route::get('/add-coupon', [UserCouponController::class,'Coupon'])->name('add-coupon');
Route::GET('/db-coupons', [UserCouponController::class,'Index'])->name('db-coupons');
Route::POST('/db-coupon-store', [UserCouponController::class,'Store'])->name('db-coupon-store');
Route::GET('/db-coupon-edit/{id}', [UserCouponController::class,'Edit'])->name('db-coupon-edit');
Route::POST('/db-coupon-update/{id}', [UserCouponController::class,'Update'])->name('db-coupon-update');
Route::GET('/coupon_view_process/{id}', [UserCouponController::class,'Viwe']);

Route::GET('/db-enquiry', [UserEnqueryController::class,'Index'])->name('db-enquiry');
Route::GET('/db-enquiry/{id}', [UserEnqueryController::class,'Delete'])->name('db-enquiry-delete');
Route::GET('/all-service-expert', [UserEnqueryController::class,'S_Index'])->name('db-service-expert');
Route::GET('/all-service-expert/{id}', [UserEnqueryController::class,'S_Delete'])->name('all-service-expert-delete');
Route::GET('/db-payment', [UserPlanController::class,'Index'])->name('db-payment');
Route::GET('/plan-change', [UserPlanController::class,'Plan'])->name('plan-change');
Route::GET('/plan_store/{id?}/{plan?}', [UserPlanController::class,'Store'])->name('plan_store');
Route::GET('/buy_point_request/{id}/{point}', [UserPlanController::class,'Buy'])->name('buy_point_request');
Route::GET('/point_delete/{id}', [UserPlanController::class,'Point_D'])->name('point_delete');
Route::GET('/db-promote', [UserPromotionController::class,'Index'])->name('db-promote');
Route::GET('/add-promote', [UserPromotionController::class,'Listing'])->name('add-promote');
Route::POST('/add-promote-store', [UserPromotionController::class,'Store'])->name('add-promote-store');
Route::get('/promotion_delete{id}', [UserPromotionController::class,'Delete'])->name('user_promotion_delete');

Route::GET('/db-events', [UserEventController::class,'Index'])->name('db-events');
Route::GET('/add_event', [UserEventController::class,'Event'])->name('add_event');
Route::POST('/add-event-store', [UserEventController::class,'Store'])->name('add-event-store');

Route::GET('/delete-event/{id}', [UserEventController::class,'Delete'])->name('delete-event');
Route::GET('/edit-event/{id}', [UserEventController::class,'Edit'])->name('edit-event');
Route::POST('/add-event-update/{id}', [UserEventController::class,'Update'])->name('add-event-update');
Route::GET('/db-post-ads', [UserAdsController::class,'Index'])->name('db-post-ads');
Route::GET('/post-your-ads', [UserAdsController::class,'Ads'])->name('post-your-ads');
Route::POST('/ads_post_store', [UserAdsController::class,'Store'])->name('ads_post_store');
Route::GET('/db-invoice', [UserPaymentController::class,'Index'])->name('db-invoice');
Route::GET('/db-affilate-dashboard', [UserProductAffiliationController::class,'Wallet'])->name('db-affilate-dashboard');
Route::get('/affiliate-withdrawal-history', [UserProductAffiliationController::class,'Index'])->name('affiliate-withdrawal-history');
Route::get('/product_wallet/pending', [UserProductAffiliationController::class,'Padding'])->name('user_product_wallet_pending');
Route::get('/product_wallet/approve', [UserProductAffiliationController::class,'Approved'])->name('user_product_wallet_approve');
Route::get('/product_wallet/rejected', [UserProductAffiliationController::class,'Rejected'])->name('user_product_wallet_rejected');
Route::get('/product_wallet/delivered', [UserProductAffiliationController::class,'Sent'])->name('user_product_wallet_sent');
Route::get('/affiliate-withdrawal-request', [UserProductAffiliationController::class,'Request'])->name('affiliate-withdrawal-request');
Route::POST('/request_store', [UserProductAffiliationController::class,'Store'])->name('user_request_store');
Route::get('/affiliate-commission-history', [UserProductAffiliationController::class,'C_Index'])->name('affiliate-commission-history');
Route::GET('/db-profile', [UserProfileController::class,'Index'])->name('db-profile');

Route::POST('/profile-update', [UserProfileController::class,'Update'])->name('profile-update');
Route::GET('/service-expert', [UserExpertController::class,'Expert'])->name('service-expert');
Route::POST('/expert_store', [UserExpertController::class,'Store'])->name('user_expert_store');
Route::POST('/enquery_manage', [UserExpertController::class,'Manage']);
Route::POST('/avaliability', [UserExpertController::class,'Avaliability']);
Route::GET('/booking_expert/{id}', [UserExpertController::class,'Booking'])->name('booking_expert');

Route::GET('/edit-profile', [UserProfileController::class,'Edit'])->name('edit-profile');
Route::POST('/setting-update', [UserProfileController::class,'Setting'])->name('setting-update');

Route::GET('/job-profile/{id}', [UserJobProfileCOntroller::class,'Job_Profile'])->name('user-job-profile');
Route::GET('/all-applied-profile/{id}', [UserJobProfileCOntroller::class,'Applied_Profile'])->name('all-applied-profile');
Route::GET('/all-applied-delete/{id}', [UserJobProfileCOntroller::class,'Delete'])->name('all-applied-delete');
Route::GET('/job-profile-edit', [UserJobProfileCOntroller::class,'Profile'])->name('job-profile');
Route::POST('/job-profile-store', [UserJobProfileCOntroller::class,'Store'])->name('job-profile-store');
Route::GET('/db-applied-job', [UserJobProfileCOntroller::class,'Job_Applied'])->name('db-applied-job');
Route::GET('/db-service-bookings', [UserExpertController::class,'Service'])->name('db-service-bookings');
Route::GET('/db-review', [UserReviewController::class,'Index'])->name('db-review');
Route::GET('/db-review_sent', [UserReviewController::class,'Index_A'])->name('db-review_A');
Route::GET('/db-review_delete/{id}', [UserReviewController::class,'Delete'])->name('db-review-delete');
Route::GET('/db-like-listing', [UserListingLikeController::class,'Index'])->name('db-like-listing');
Route::GET('/db-like-listing_delete/{id}', [UserListingLikeController::class,'Delete'])->name('db-like-listing-delete');
Route::GET('/db-seo', [UserSeoController::class,'Index'])->name('db-seo');
Route::GET('/db-seo-edit/{type}/{id}', [UserSeoController::class,'Edit'])->name('db-seo-edit');
Route::POST('/user-seo-update/{type}/{id}', [UserSeoController::class,'Update'])->name('user-seo-update');
Route::get('/add-listing', function () {
    return view('ui.old-ui.iwp-add-listing-start');
})->name('user_add_listing');
Route::get('/add-listing-step-2', function () {
    return view('ui.old-ui.iwp-add-listing-step-2');
})->name('user_add_listing_step_2');
Route::get('/add-listing-step-3', function () {
    return view('ui.old-ui.iwp-add-listing-step-3');
})->name('user_add_listing_step_3');
Route::get('/add-listing-step-4', function () {
    return view('ui.old-ui.iwp-add-listing-step-4');
})->name('user_add_listing_step_4');
Route::get('/add-listing-step-5', function () {
    return view('ui.old-ui.iwp-add-listing-step-5');
})->name('user_add_listing_step_5');
Route::get('/add-listing-step-6', function () {
    return view('ui.old-ui.iwp-add-listing-step-6');
})->name('user_add_listing_step_6');

Route::get('/db-points-history', function () {
    return view('ui.old-ui.iwp-db-points-history');
})->name('db-points-history');

use App\Http\Controllers\UserFollowerController;
Route::GET('/db-following', [UserFollowerController::class,'Index'])->name('db-following');





Route::get('/db-notification', function () {
    return view('ui.old-ui.iwp-db-notifications');
})->name('db-notification');
Route::get('/db-blog', function () {
    return view('ui.old-ui.db-blog-posts');
})->name('db-blog');

Route::get('/db-setting', function () {
    return view('ui.old-ui.iwp-db-setting');
})->name('db-setting');
Route::get('/db-how-to', function () {
    return view('ui.old-ui.iwp-how-to');
})->name('db-how-to');






Route::get('/edit-blog', function () {
    return view('ui.old-ui.edit-blog-post');
})->name('edit-blog-post');

// Route::GET('/add-coupon', [UserCouponController::class,'addCoupon'])->name('add-coupon');

Route::get('all-user', function () {
    return view('ui.old-ui.iwp-db-all-users');
})->name('all-user');

Route::get('ad-details', function () {
    return view('ui.old-ui.iwp-ad-details');
})->name('ad-details');

Route::get('buy-point', function () {
    return view('ui.old-ui.iwp-buy-points');
})->name('buy-point');


Route::get('expert-profile', function () {
return view('ui.old-ui.iwp-expert-profile');
})->name('user-expert-profile');

Route::get('seo_general', function () {
    return view('seo.seo-general');
    })->name('seo_general_all');
Route::get('seo_option', function () {
    return view('seo.seo-option');
    })->name('seo_option');

Route::get('seo_target', function () {
    return view('seo.seo-target');
    })->name('seo_target');

Route::get('seo_terget', function () {
    return view('seo.admin-seo-target-promotion-add-new-page');
    })->name('');

Route::get('seo_xml', function () {
    return view('seo.admin-seo-xml-sitemap');
    })->name('seo_xml');    

Route::get('google-analytics', function () {
    return view('seo.admin-seo-google-analytics-code');
    })->name('google-analytics');  

Route::get('seo_ebook', function () {
    return view('seo.seo-ebook');
    })->name('seo_ebook');


Route::get('all_page', function () {
    return view('seo.all-page');
    })->name('all_page');    

Route::get('seo_listing', function () {
    return view('seo.seo-listing');
    })->name('seo_listing');  

Route::get('seo_blog', function () {
    return view('seo.blog-seo');
    })->name('seo_blog');  

Route::get('seo_event', function () {
    return view('seo.seo-event');
    })->name('seo_event');  
    
Route::get('seo_product', function () {
    return view('seo.seo-product');
    })->name('seo_product'); 
Route::get('seo_job', function () {
    return view('seo.seo-job');
    })->name('seo_job'); 
Route::get('seo_expert', function () {
    return view('seo.seo-expert');
    })->name('seo_expert');    
    

Route::get('search_list_add', function () {
    return view('seo.admin-search-lists-add-new');
    })->name('search_list_add');   
use App\Http\Controllers\SEOController;
use App\Http\Controllers\SEOTargetController;
use App\Http\Controllers\SEOGeneralController;
use App\Http\Controllers\SEOEbookController;
use App\Http\Controllers\SEOMetaTagController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\FbController;
Route::POST('/seo_general_store', [SEOController::class,'General'])->name('seo_general_store');
Route::get('/seo_listing_edit/{id}', [SEOController::class,'Edit'])->name('seo_listing_edit');
Route::POST('/seo_listing_Update/{id}', [SEOController::class,'Update'])->name('seo_listing_Update');
 
Route::get('/add_seo_target', [SEOTargetController::class,'Target'])->name('seo_terget');
Route::get('/seo_target_edit/{id}', [SEOTargetController::class,'Edit'])->name('seo_target_edit');
Route::POST('/seo_target_Update/{id}', [SEOTargetController::class,'Update'])->name('seo_target_Update');
Route::POST('/seo_target_Store', [SEOTargetController::class,'Store'])->name('seo_target_Store');
Route::get('/seo_target_delete/{id}', [SEOTargetController::class,'Delete'])->name('seo_target_delete');

Route::get('/add_seo_general', [SEOGeneralController::class,'Target'])->name('seo_general');
Route::get('/seo_general_edit/{id}', [SEOGeneralController::class,'Edit'])->name('seo_general_edit');
Route::POST('/seo_general_Update/{id}', [SEOGeneralController::class,'Update'])->name('seo_general_Update');
Route::POST('/seo_general_Store', [SEOGeneralController::class,'Store'])->name('seo_general_Store');

Route::get('/add_seo_ebook', [SEOEbookController::class,'Target'])->name('add_seo_ebook');
Route::get('/seo_ebook_edit/{id}', [SEOEbookController::class,'Edit'])->name('seo_ebook_edit');
Route::POST('/seo_ebook_Update/{id}', [SEOEbookController::class,'Update'])->name('seo_ebook_Update');
Route::POST('/seo_ebook_Store', [SEOEbookController::class,'Store'])->name('seo_ebook_Store');
Route::POST('/xml_store', [SEOEbookController::class,'XML'])->name('xml_store');

Route::get('/all_page_edit/{id}', [SEOMetaTagController::class,'ALL_PAGE'])->name('all_page_edit');
Route::POST('/all_page_update/{id}', [SEOMetaTagController::class,'ALL_PAGE_UPDATE'])->name('all_page_update');

Route::get('/all_listing_edit/{id}', [SEOMetaTagController::class,'ALL_LISTING'])->name('all_listing_edit');
Route::POST('/all_listing_update/{id}', [SEOMetaTagController::class,'ALL_LISTING_UPDATE'])->name('all_listing_update');

Route::get('/all_blog_edit/{id}', [SEOMetaTagController::class,'ALL_BLOG'])->name('all_blog_edit');
Route::POST('/all_blog_update/{id}', [SEOMetaTagController::class,'ALL_BLOG_UPDATE'])->name('all_blog_update');

Route::get('/all_event_edit/{id}', [SEOMetaTagController::class,'ALL_EVENT'])->name('all_event_edit');
Route::POST('/all_event_update/{id}', [SEOMetaTagController::class,'ALL_EVENT_UPDATE'])->name('all_event_update');

Route::get('/all_product_edit/{id}', [SEOMetaTagController::class,'ALL_PRODUCT'])->name('all_product_edit');
Route::POST('/all_product_update/{id}', [SEOMetaTagController::class,'ALL_PRODUCT_UPDATE'])->name('all_product_update');

Route::get('/all_job_edit/{id}', [SEOMetaTagController::class,'ALL_JOB'])->name('all_job_edit');
Route::POST('/all_job_update/{id}', [SEOMetaTagController::class,'ALL_JOB_UPDATE'])->name('all_job_update');

Route::get('/all_expert_edit/{id}', [SEOMetaTagController::class,'ALL_EXPERT'])->name('all_expert_edit');
Route::POST('/all_expert_update/{id}', [SEOMetaTagController::class,'ALL_EXPERT_UPDATE'])->name('all_expert_update');

Route::get('search_list', [SEOMetaTagController::class,'search_list'])->name('search_list');    
Route::get('/all_search_edit/{id}', [SEOMetaTagController::class,'ALL_search'])->name('all_search_edit');
Route::POST('/all_search_update/{id}', [SEOMetaTagController::class,'ALL_search_UPDATE'])->name('all_search_update');
Route::POST('/all_search_store', [SEOMetaTagController::class,'ALL_search_Store'])->name('all_search_store');
Route::get('/admin/search/position', [SEOMetaTagController::class,'Position'])->name('search_position');
Route::GET('/search_prosition_store/{id}', [SEOMetaTagController::class,'Position_Store']);

Route::GET('show_to_cart', [AddToCartController::class,'cartList'])->name('show_to_cart');
Route::GET('add_to_cart/{id}', [AddToCartController::class,'addToCart'])->name('add_to_cart');
Route::GET('add_to_cart/{id}/{ref}', [AddToCartController::class,'addToCarts'])->name('add_to_carts');
Route::GET('/remove_cart/{id}', [AddToCartController::class,'removeCart'])->name('remove_cart');
Route::POST('/add_payment', [AddToCartController::class,'Payment'])->name('add_payment');

Route::POST('/fblogin', [AddToCartController::class,'Facebook']);
