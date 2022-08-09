<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CoupenController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\AboutusController;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\ProcessUtils;

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
// Route for front end controllers
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('about-us', [HomeController::class, 'about'])->name('about');
Route::get('products', [ProductsController::class, 'allProducts'])->name('all.products');
Route::post('search-products', [ProductsController::class, 'searchProducts'])->name('search.products');
Route::get('products/{url}', [ProductsController::class, 'products'])->name('products');
Route::get('product/{url?}', [ProductsController::class, 'product'])->name('product');
Route::get('product-item-price', [ProductsController::class, 'productItemPrice'])->name('product-item-price');

Route::post('add-cart', [ProductsController::class, 'addCart'])->name('add.cart');
Route::group(['middleware'=>'auth'],function(){
    // route for cart
    Route::get('wish-list', [ProductsController::class, 'wishList'])->name('wish.list');
    Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
    Route::post('ajax-upate-cart-quantity', [ProductsController::class, 'ajaxUpdateCartQuantity']);
    Route::get('delete-cart-record/{id}', [ProductsController::class, 'deleteCart'])->name('delete.cart');
    Route::get('delete-wish-list-record/{id}', [ProductsController::class, 'deleteWishList'])->name('delete.wish.list');

    // route for checkout
    Route::match(['get', 'post'], 'checkout', [ProductsController::class, 'checkout'])->name('checkout');
    Route::match(['get', 'post'], 'order-review', [ProductsController::class, 'orderReview'])->name('order.review');
    Route::post('place-order', [ProductsController::class, 'placeOrder'])->name('place.order');

    // route for account 
    Route::get('account', [UserController::class, 'account'])->name('account');
    Route::post('update-user-detail', [UserController::class, 'updateUserDetails'])->name('update.user.detail');
    Route::post('update-shipping-billing-detail', [UserController::class, 'updateShippingBillingDetail'])->name('update.shipping.billing.detail');
    Route::post('update-current-password', [UserController::class, 'updateCurrentPassword'])->name('update.current.password');
    Route::get('order-detail/{id}', [UserController::class, 'orderDetail'])->name('order.detail');
    Route::get("logout", [UserController::class, 'logout'])->name('logout');

    // route for add comment and rating to product 
    Route::post('add.comment',[ProductsController::class, 'addComment'])->name('add.comment');
    Route::post('contact-us',[ContactController::class, 'addContact'])->name('add.contact');
});

// route for login and register 
Route::match(['get', 'post'],'register', [UserController::class, 'register'])->name('register');
Route::match(['get', 'post'],'login', [UserController::class, 'login'])->name('login');


// route for backend controller
Route::group(['prefix' => 'admin', 'namespace'=>'App\Http\Controllers\Admin', 'as' => 'admin.'],function() {
    Route::match(['get', 'post'], 'logins',  [AdminController::class, 'login'])->name('login'); 
    Route::match(['get', 'post'], 'register',  [AdminController::class, 'register'])->name('register'); 
    Route::group(['middleware' => 'admin'], function() {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::match(['get', 'post'],'update-admin-password', [AdminController::class, 'updateAdminPassword'])->name('update.admin.password');
        Route::match(['get', 'post'],'update-admin-detail', [AdminController::class, 'updateAdminDetail'])->name('update.admin.detail');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');
        
        // route for brand 
        Route::get('banner', [BannerController::class, 'banner'])->name('banner');
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', [BannerController::class, 'addeditBanner'])->name('add.edit.banner');
        Route::post('update-banner-status', [BannerController::class, 'updateBannerStatus'])->name('update.banner.status');
        Route::get('delete-banner/{id}', [BannerController::class, 'deteteBanner'])->name('delete.banner');
        
        // route for brand 
        Route::get('brand', [BrandController::class, 'brand'])->name('brand');
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', [BrandController::class, 'addeditBrand'])->name('add.edit.brand');
        Route::post('update-brand-status', [BrandController::class, 'updateBrandStatus'])->name('update.brand.status');
        Route::get('delete-brand/{id}', [BrandController::class, 'deteteBrand'])->name('decllete.brand');

        // category
        Route::get('categories', [CategoryController::class, 'categories'])->name('categories');
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('category.status');
        Route::match(['get', 'post'], 'add-edit-category/{id?}',[CategoryController::class, 'addEditCategory'])->name('add.edit.category');
        Route::get('delete-category/{id?}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
        Route::get('add-edit-category/delete-category-image/{id?}', [CategoryController::class, 'deletImageCategory'])->name('delete.category.image');

        // product
        Route::get('products', [ProductController::class, 'products'])->name('product');
        Route::post('update-product-status', [ProductController::class, 'updateProductStatus'])->name('product.status');
        Route::match(['get', 'post'], 'add-edit-product/{id?}',[ProductController::class, 'addEditProduct'])->name('add.edit.product');
        Route::get('delete-product/{id?}', [ProductController::class, 'deleteProduct'])->name('delete.category');
        Route::get('add-edit-product/delete-product-image/{id?}', [ProductController::class, 'deletImageProduct'])->name('delete.product.image');

        // product attribute  stock
        Route::get('product-attribute/{id?}', [ProductAttributeController::class,  'productAttribute'])->name('product.attribute');
        Route::post('add-product-attribute/{id}', [ProductAttributeController::class, 'addProductAttribute'])->name('add.procut.attributes');
        Route::post('edit-product-attribute/{id}', [ProductAttributeController::class, 'editProductAttribute'])->name('edit.procut.attributes');
        Route::get('product-attribute/delete-product-attribue/{id}', [ProductAttributeController::class, 'deleteProductAttribute'])->name('delete.procut.attributes');

        // order 
        Route::get('orders', [OrderController::class, 'orders'])->name('orders');
        Route::get('view-order-details/{id}', [OrderController::class, 'viewOrderDetails'])->name('view.order.details');
        Route::get('view-order-invoice/{id}', [OrderController::class, 'viewOrderInvoice'])->name('view.order.invoice');
        Route::post('update-order-status/{id}', [OrderController::class, 'updateOrderStatus'])->name('update.order.status');
        Route::get('delete-order/{id}', [OrderController::class, 'deteteOrder'])->name('delete.order');

        
        // route for brand 
        Route::get('testimonial', [TestimonialController::class, 'testimonial'])->name('testimonial');
        Route::match(['get', 'post'], 'add-edit-testimonial/{id?}', [TestimonialController::class, 'addeditTestimonial'])->name('add.edit.testimonial');
        Route::post('update-testimonial-status', [TestimonialController::class, 'updateTestimonialStatus'])->name('update.testimonial.status');
        Route::get('delete-testimonial/{id}', [TestimonialController::class, 'deteteTestimonial'])->name('delete.testimonial');

        // route for coupen
        Route::get('coupen', [CoupenController::class, 'coupen'])->name('coupen');
        Route::match(['get', 'post'], 'add-edit-coupen/{id?}', [CoupenController::class, 'addeditCoupen'])->name('add.edit.coupen');
        Route::post('update-coupen-status', [CoupenController::class, 'updateCoupenStatus'])->name('update.coupen.status');
        Route::get('delete-coupen/{id}', [CoupenController::class, 'deteteCoupen'])->name('delete.coupen');
        

           //route for footer
        Route::match(['get', 'post'], 'edit-contact/{id?}', [FooterController::class, 'editFooter'])->name('edit.footer');

        // route for contactmessages 
        Route::get('contact-message', [AdminContactController::class, 'contactmessage'])->name('contactmessage');
        Route::get('delete-contactmessage/{id}', [AdminContactController::class, 'detetecontactmessage'])->name('detete.contactmessage');

         // route for contactmessages 
         Route::get('user-register', [AdminUserController::class, 'userregister'])->name('userregister');

         //Route for aboutus
         Route::match(['get', 'post'], 'edit-aboutus/{id?}', [AboutusController::class, 'editAboutus'])->name('edit.aboutus');

    });


});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
