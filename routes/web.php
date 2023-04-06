<?php

use App\Http\Controllers\AboutBrandAreaController;
use App\Http\Controllers\AboutFeatureAreaController;
use App\Http\Controllers\AboutIntroAreaController;
use App\Http\Controllers\AboutServiceAreaController;
use App\Http\Controllers\AboutTeamAreaController;
use App\Http\Controllers\AboutTestimonialAreaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FeatureController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HomeBlogAreaController;
use App\Http\Controllers\HomeDealAreaController;
use App\Http\Controllers\Logo_and_offer_updateController;
use App\Http\Controllers\SslCommerzPaymentController;


Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('about',[FrontendController::class,'about'])->name('about');
Route::get('shop',[FrontendController::class,'shop'])->name('shop');
Route::get('contact',[FrontendController::class,'contact'])->name('contact');
Route::get('product/details/{slug}',[FrontendController::class,'productDetails'])->name('product.details');
Route::post('get/sizes',[FrontendController::class,'get_sizes'])->name('get.sizes');
Route::post('get/inventory',[FrontendController::class,'get_inventory'])->name('get.inventory');
Route::get('blog/details/{blog_details_id}',[FrontendController::class,'blog_details'])->name('blog.details');
Route::post('blog/comment/area', [FrontendController::class, 'blog_comment_area'])->name('blog_comment_area');

// logo and offer update route start here
Route::get('logo/page/{project_logo_id}',[Logo_and_offer_updateController::class,'logo_page'])->name('logo.page');
Route::post('logo/update/{project_logo_id}',[Logo_and_offer_updateController::class,'logo_update'])->name('logo.update');
Route::get('favicon/page/{favicon_id}',[Logo_and_offer_updateController::class,'favicon_page'])->name('favicon.page');
Route::post('favicon/update/{favicon_id}',[Logo_and_offer_updateController::class,'favicon_update'])->name('favicon.update');
Route::get('offer/pagee/{offer_data_id}',[Logo_and_offer_updateController::class,'offer_page'])->name('offer.page');
Route::post('offer/data/update/{offer_data_id}',[Logo_and_offer_updateController::class,'offer_data_update'])->name('offer_data.update');
// logo and offer update route end here

// login and dashboard home route start here
Auth::routes(['login'=>false]);
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login/post', [LoginController::class, 'login'])->name('login.post');
// home controller route start here
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::post('change/about', [HomeController::class, 'changeAbout'])->name('change_about');
Route::post('change/password', [HomeController::class, 'changePassword'])->name('change_password');
//  this route for shopping charge chart
Route::get('shopping', [HomeController::class, 'shopping'])->name('shopping');
Route::post('add/shopping', [HomeController::class, 'add_shopping'])->name('add.shopping');
Route::get('shopping/remove/{shopping_id}', [HomeController::class, 'shopping_remove'])->name('shopping.remove');
Route::get('coupon', [HomeController::class, 'coupon'])->name('coupon');
Route::post('coupon/insert', [HomeController::class, 'coupon_insert'])->name('coupon.insert');
Route::get('coupon/remove/{coupon_id}', [HomeController::class, 'coupon_remove'])->name('coupon.remove');
Route::get('orders', [HomeController::class, 'orders'])->name('orders');
Route::post('delete/customer/order/{customer_order_id}', [HomeController::class, 'delete_customer_order'])->name('delete.customer_order');
Route::post('order/status/change/{order_summary_id}', [HomeController::class, 'order_status_change'])->name('order.status.change');
Route::get('admin/info/{admin_parsonal_info_id}', [HomeController::class, 'admin_info'])->name('admin.info');
Route::post('admin/info/update/{admin_parsonal_info_id}', [HomeController::class, 'admin_info_update'])->name('admin_info.update');
Route::post('change/cover/photo/{cover_photo_id}', [HomeController::class, 'change_cover_photo'])->name('change_cover.photo');
Route::get('admin/customer/data', [HomeController::class, 'admin_customer_data'])->name('admin_customer_data');
Route::post('account/delete/{user_account_id}', [HomeController::class, 'account_delete'])->name('account.delete');
// home controller route end here
// login and dashboard home route end here

// customer all route start here
Route::get('login', [CustomerController::class, 'customer_login'])->name('customer.login');
Route::post('customer/register/post', [CustomerController::class, 'customerRegisterpost'])->name('customer_register_post');
Route::get('customer/dashboard', [CustomerController::class, 'customer_dashboard'])->name('customer.dashboard');
Route::post('delete/order/{order_id}', [CustomerController::class, 'delete_order'])->name('delete.order');
Route::get('view/invoice/{order_summary}', [CustomerController::class, 'view_invoice'])->name('view.invoice');
Route::get('download/invoice/{order_summary}', [CustomerController::class, 'download_invoice'])->name('download.invoice');
Route::get('later/pay/{grand_total}/{order_summary_id}', [CustomerController::class, 'later_pay'])->name('later.pay');
Route::get('review/{order_summary_id}', [CustomerController::class, 'review'])->name('review');
Route::post('add/review/{order_details_id}', [CustomerController::class, 'add_review'])->name('add.review');
Route::post('insert/cart', [CustomerController::class, 'insert_cart'])->name('insert.cart');
Route::get('cart', [CustomerController::class, 'cart'])->name('cart');
Route::post('cart/remove', [CustomerController::class, 'cart_remove'])->name('cart.remove');
Route::post('cart/update', [CustomerController::class, 'cart_update'])->name('cart.update');
Route::post('cart/decrement', [CustomerController::class, 'cart_decrement'])->name('cart.decrement');
Route::post('get/cityies', [CustomerController::class, 'get_cityies'])->name('get.cityies');
Route::post('check/coupon', [CustomerController::class, 'check_coupon'])->name('check.coupon');
Route::get('checkout', [CustomerController::class, 'checkout'])->name('checkout');
Route::post('checkout/post', [CustomerController::class, 'checkout_post'])->name('checkout.post');
Route::post('set/country/city', [CustomerController::class, 'set_country_city'])->name('set.country.city');
// customer all route end here



// category project all route start here
Route::resource('category', CategoryController::class);
Route::get('category/restore/{id}', [CategoryController::class, 'category_restore'])->name('category_restore');
Route::get('category/force/delete/{id}', [CategoryController::class, 'category_force_delete'])->name('category_force_delete');
// category project all route end here

// subcategory project all route start here
Route::resource('subcategory', SubcategoryController::class);
// subcategory project all route end here

// Product project all route start here
Route::resource('product', ProductController::class);
Route::post('get/subcategory', [ProductController::class, 'getSubcategory'])->name('get_subcategory');
Route::get('add/feature/photo/{product_id}', [ProductController::class, 'add_feature_photo'])->name('add_feature.photo');
Route::post('add/feature/photo/post/{product_id}', [ProductController::class, 'add_feature_photo_post'])->name('add_feature_photo.post');
Route::get('product/feature/photo/delete{product_feature_photo_id}', [ProductController::class, 'productFeaturePhotoDelete'])->name('product_feature_photo_delete');
Route::get('variation/index', [ProductController::class, 'variationIndex'])->name('variation.index');
Route::post('variation/color/post', [ProductController::class, 'variation_color_post'])->name('variation_color.post');
Route::get('color/delete/{color_id}', [ProductController::class, 'colorDelete'])->name('color.delete');
Route::post('variation/size/post', [ProductController::class, 'variation_size_post'])->name('variation_size.post');
Route::get('size/delete/{size_id}', [ProductController::class, 'sizeDelete'])->name('size.delete');
Route::get('add/inventories/{product_id}', [ProductController::class, 'addInventories'])->name('add.inventories');
Route::post('add/inventories/post/{product_id}', [ProductController::class, 'add_inventories_post'])->name('add_inventories.post');
Route::get('inventory/delete/{inventorie_id}', [ProductController::class, 'inventoryDelete'])->name('inventory.delete');
// product project all route end here

// banner project all route start here
Route::resource('banner', BannerController::class);
Route::get('restore/{id}', [BannerController::class, 'restore'])->name('restore');
Route::get('force/delete/{id}', [BannerController::class, 'forcedelete'])->name('force_delete');
// banner project all route end here

// feature project all route start here
Route::resource('feature', FeatureController::class);
// feature project all route end here

// deal_area project all route start here
Route::resource('deal_area', HomeDealAreaController::class);
Route::get('deal/restore/{id}', [HomeDealAreaController::class, 'deal_restore'])->name('deal_restore');
Route::get('deal/force_delete/{id}', [HomeDealAreaController::class, 'deal_force_delete'])->name('deal_force_delete');
Route::post('deal/area/background/{deal_background_id}', [HomeDealAreaController::class, 'deal_area_background'])->name('deal_area_background');
// deal_area project all route end here

// blog area project all route start here
Route::resource('blog_area', HomeBlogAreaController::class);
Route::get('blog_restore/{id}', [HomeBlogAreaController::class, 'blog_restore'])->name('blog_restore');
Route::get('blog_force_delete/{id}', [HomeBlogAreaController::class, 'blog_force_delete'])->name('blog_force_delete');
Route::post('blog/display/photo/{blog_display_photo_id}', [HomeBlogAreaController::class, 'blog_display_photo'])->name('blog_display_photo');
Route::post('blog/photo/update/{blog_photo_id}', [HomeBlogAreaController::class, 'blog_photo_update'])->name('blog_photo.update');
Route::post('blog/head/update/{blog_head_id}', [HomeBlogAreaController::class, 'blog_head_update'])->name('blog_head.update');
Route::get('social/icon/create', [HomeBlogAreaController::class, 'social_icon_create'])->name('social_icon.create');
Route::post('social/icon/post', [HomeBlogAreaController::class, 'social_icon_post'])->name('social.icon.post');
Route::get('blog/icon/editpage/{blog_icon_id}', [HomeBlogAreaController::class, 'blog_icon_editpage'])->name('blog_icon.editpage');
Route::post('blog/social/icon/update/{blog_icon_id}', [HomeBlogAreaController::class, 'blog_social_icon_update'])->name('blog_social.icon_update');
Route::post('blog/icon/delete/{blog_icon_id}', [HomeBlogAreaController::class, 'blog_icon_delete'])->name('blog.icon_delete');
Route::get('restore/blog/social/icon/{id}', [HomeBlogAreaController::class, 'restore_blog_social_icon'])->name('restore.blog_social_icon');
Route::get('blog/social/icon/forceDelete/{id}', [HomeBlogAreaController::class, 'blog_social_icon_forceDelete'])->name('blog_social_icon.forceDelete');
Route::get('blog/comment/data/list', [HomeBlogAreaController::class, 'blog_comment_data'])->name('blog_comment_data');
Route::post('blog/comment/data/delete/{id}', [HomeBlogAreaController::class, 'blog_comment_data_delete'])->name('blog_comment_data.delete');
Route::get('blog/comment/data/restore/{id}', [HomeBlogAreaController::class, 'blog_comment_data_restore'])->name('blog_comment_data_restore');
Route::get('blog/comment/data/force/delete/{id}', [HomeBlogAreaController::class, 'blog_comment_data_force_delete'])->name('blog_comment_data_force_delete');
// blog area project all route end here

// Intro area project all route start here
Route::resource('intro_area', AboutIntroAreaController::class);
Route::get('intro/restore/{id}', [AboutIntroAreaController::class, 'intro_restore'])->name('intro_restore');
Route::get('intro/force/delete/{id}', [AboutIntroAreaController::class, 'intro_force_delete'])->name('intro_force_delete');
// Intro area project all route end here

// about_service_area project all route start here
Route::resource('service_area', AboutServiceAreaController::class);
Route::get('service/restore/{id}', [AboutServiceAreaController::class, 'service_restore'])->name('service_restore');
Route::get('service/force_delete/{id}', [AboutServiceAreaController::class, 'service_force_delete'])->name('service_force_delete');
// about_service_area project all route end here

// about_team_area project all route start here
Route::resource('team_area', AboutTeamAreaController::class);
Route::get('team/restore/{id}', [AboutTeamAreaController::class, 'team_restore'])->name('team_restore');
Route::get('team/force_delete/{id}', [AboutTeamAreaController::class, 'team_force_delete'])->name('team_force_delete');
Route::get('team/social/icon/create', [AboutTeamAreaController::class, 'team_social_icon_create'])->name('team_social_icon.create');
Route::post('team/social/icon/post', [AboutTeamAreaController::class, 'team_social_icon_post'])->name('team_social.icon.post');
Route::get('team/icon/editpage/{social_icon_id}', [AboutTeamAreaController::class, 'team_icon_editpage'])->name('team_icon.editpage');
Route::post('team/social/icon/update/{social_icon_id}', [AboutTeamAreaController::class, 'team_social_icon_update'])->name('team_social.icon_update');
Route::post('team/icon/delete/{social_icon_id}', [AboutTeamAreaController::class, 'team_icon_delete'])->name('team.icon_delete');
Route::get('restore/team/social/icon/{id}', [AboutTeamAreaController::class, 'restore_team_social_icon'])->name('restore.team_social_icon');
Route::get('team/social/icon/forceDelete/{id}', [AboutTeamAreaController::class, 'team_social_icon_forceDelete'])->name('team_social_icon.forceDelete');
// about_team_area project all route end here

// about_feature_area project all route start here
Route::resource('about_feature', AboutFeatureAreaController::class);
// about_feature_area project all route end here

// about_testimonial_area project all route start here
Route::resource('about_testimonial', AboutTestimonialAreaController::class);
Route::get('testimonial/restore/{id}', [AboutTestimonialAreaController::class, 'testimonial_restore'])->name('testimonial_restore');
Route::get('testimonial/force/delete/{id}', [AboutTestimonialAreaController::class, 'testimonial_force_delete'])->name('testimonial_force_delete');
Route::post('testimonial/reating/add', [AboutTestimonialAreaController::class, 'testimonial_reating_add'])->name('testimonial_reating.add');
Route::post('testimonial_reating/delete/{reating_id}', [AboutTestimonialAreaController::class, 'testimonial_reating_delete'])->name('testimonial_reating.delete');
// about_testimonial_area project all route end here

// About_brand_area project all route start here
Route::resource('about_brand', AboutBrandAreaController::class);
// About_brand_area project all route end here

// contact_area project all route start here
Route::get('contact/head/page/{contact_head_id}', [ContactController::class, 'contact_head_page'])->name('contact_head.page');
Route::post('contact/head/update/{contact_head_id}', [ContactController::class, 'contact_head_update'])->name('contact_head.update');
Route::post('contact/data/add', [ContactController::class, 'contact_data_add'])->name('contact_data.add');
Route::get('contact/from/data/show', [ContactController::class, 'contact_from_data_show'])->name('contact_from_data.show');
Route::post('contact/from/delete/{contact_id}', [ContactController::class, 'contact_from_delete'])->name('contact_from.delete');
Route::get('contact/embed/page/{contact_map_id}', [ContactController::class, 'contact_embed_page'])->name('contact_embed.page');
Route::post('contact/embed/link/update/{contact_map_id}', [ContactController::class, 'contact_embed_link_update'])->name('contact_embed_link.update');
// contact_area project all route end here

// footer_area project all route start here
Route::get('footer/describe/page/{footer_info_id}', [FooterController::class, 'footer_describe_page'])->name('footer_describe_page');
Route::post('footer/describe/update/{footer_info_id}', [FooterController::class, 'footer_describe_update'])->name('footer_describe.update');
Route::get('footer/social/icon/create', [FooterController::class, 'footer_social_icon_create'])->name('footer_social_icon.create');
Route::post('footer/social/icon/post', [FooterController::class, 'footer_social_icon_post'])->name('footer_social.icon.post');
Route::get('footer/icon/editpage/{footer_icon_id}', [FooterController::class, 'footer_icon_editpage'])->name('footer_icon.editpage');
Route::post('footer/social/icon/update/{footer_icon_id}', [FooterController::class, 'footer_social_icon_update'])->name('footer_social.icon_update');
Route::post('footer/icon/delete/{footer_icon_id}', [FooterController::class, 'footer_icon_delete'])->name('footer.icon_delete');
Route::get('restore/footer/social/icon/{footer_icon_id}', [FooterController::class, 'restore_footer_social_icon'])->name('restore.footer_social_icon');
Route::get('footer/social/icon/forceDelete/{footer_icon_id}', [FooterController::class, 'footer_social_icon_forceDelete'])->name('footer_social_icon.forceDelete');
// footer_area project all route end here


// SSLCOMMERZ Start
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

