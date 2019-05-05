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

Route::get('/', 'HomePageController@getHomePage')->name('home.index');
Route::get('customers/login', 'CustomerController@login')->name('home.login');
Route::post('customers/login', 'CustomerController@postLogin')->name('home.login.post');

Route::get('customers/register', 'CustomerController@register')->name('home.register');
Route::post('customers/register', 'CustomerController@postRegister')->name('home.register.post');

Route::get('customers/logout', 'CustomerController@logout')->name('home.logout');


use App\BookType;
Route::get('/tim/{id}',function($id){
	echo "$id";
});

Route::get('/admin',function(){
	return view('admin.publisher.list');
});

Route::get('/list', 'Admin\AuthorController@getAdd');

Route::get('logout', 'Auth\LoginController@logout')->name('logout.index');

Route::group(['prefix' => 'ajax'], function() {
        //
        Route::get('book-collection/{idtopic}/{isAll?}', 'AjaxController@getBookCollection');
        Route::get('cart_detail_order/{cart?}', 'AjaxController@getCartDetailOrder');
        Route::get('rating/{data?}', 'AjaxController@postRating')->name('rating');
    });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //
    Route::group(['prefix' => 'ajax'], function() {
        //
        Route::get('topic/{idtype}', 'Admin\AjaxController@getTopic');
        Route::get('content/{idtopic}', 'Admin\AjaxController@getContent');
        Route::get('cart_state', 'Admin\AjaxController@getCartState')->name('admin.cartstate');
    });
    Route::group(['prefix' => 'Type'], function() {
        //admin/Type/list
        Route::get('list', 'Admin\TypeController@getListtype');

        Route::get('add', 'Admin\TypeController@getAddtype');
        Route::post('add', 'Admin\TypeController@postAddtype');


        Route::get('edit/{id}', 'Admin\TypeController@getEdittype');
        Route::post('edit/{id}', 'Admin\TypeController@postEdittype');

        Route::get('xoa/{id}', 'Admin\TypeController@getxoatype');

    });

    Route::group(['prefix' => 'Topic'], function() {
        //admin/Type/list
        Route::get('list', 'Admin\TopicController@getListTopic');
        
        Route::get('add', 'Admin\TopicController@getAddTopic');
        Route::post('add', 'Admin\TopicController@postAddTopic');


        Route::get('edit/{id}', 'Admin\TopicController@getEditTopic');
        Route::post('edit/{id}', 'Admin\TopicController@postEditTopic');

        Route::get('xoa/{id}', 'Admin\TopicController@getDeleteTopic');

    });

    Route::group(['prefix' => 'Content'], function() {
        //admin/Type/list
        Route::get('list', 'Admin\ContentController@getListContent');
        
        Route::get('add', 'Admin\ContentController@getAddContent');
        Route::post('add', 'Admin\TypeController@postAddContent');


        Route::get('edit/{id}', 'Admin\ContentController@getEditContent');
        Route::post('edit/{id}', 'Admin\ContentController@postEditContent');

        Route::get('xoa/{id}', 'Admin\ContentController@getDeleteContent');

    });

    Route::group(['prefix' => 'book'], function() {
        //
        Route::get('list', 'Admin\BookController@getList');

        Route::get('add', 'Admin\BookController@getAdd');
        Route::post('add', 'Admin\BookController@postAdd');
        
        Route::get('edit/{id}', 'Admin\BookController@getEdit')->name('admin.edit');
        Route::post('edit/{id}', 'Admin\BookController@postEdit');
        
        Route::get('delete/{id}', 'Admin\BookController@getDelete');
        
    });
    Route::group(['prefix' => 'shoppingcart'], function(){
        Route::get('list', 'Admin\ShoppingCartController@getList');

        Route::get('delete/{id}', 'Admin\ShoppingCartController@getDelete');

        Route::group(['prefix' => 'shoppingcartdetail'], function() {
            //
            Route::get('list/{idcart}', 'Admin\ShoppingCartDetailController@getList');
        });
    });
});
// ->middleware('admin');

Route::resource('users', 'Backend\UserController');

    Route::get('profile', 'Backend\UserController@profile')->name('users.profile');

    Route::get('users', 'Backend\UserController@index')->name('users.index'); // danh sachs

    Route::post('users', 'Backend\UserController@store')->name('users.store'); // Lưu vào thêm mới
    
    Route::get('users/edit/{id}', 'Backend\UserController@edit')->name('users.edit'); // View để sửa
    Route::put('users/update/{id}', 'Backend\UserController@update')->name('users.update'); // Lưu vào sửa
    
    Route::delete('users/{id}', 'Backend\UserController@destroy')->name('users.destroy'); // XOá


Route::resource('customer', 'Backend\CustomerController');

    Route::get('customer', 'Backend\CustomerController@index')->name('customer.index'); // danh sachs

    Route::post('customer', 'Backend\CustomerController@store')->name('customer.store'); // Lưu vào thêm mới
    
    Route::get('customer/edit/{id}', 'Backend\CustomerController@edit')->name('customer.edit'); // View để sửa
    Route::put('customer/update/{id}', 'Backend\CustomerController@update')->name('customer.update'); // Lưu vào sửa
    
    Route::delete('customer/{id}', 'Backend\CustomerController@destroy')->name('customer.destroy'); // XOá

Route::group(['prefix' => 'shoppingcart'], function(){
    Route::get('list', 'Admin\ShoppingCartController@getList');
    Route::group(['prefix' => 'shoppingcartdetail'], function() {
        Route::get('list', 'Admin\ShoppingCartDetailController@getList');
    });
});

Route::group(['prefix' => 'search'], function() {
    //
    Route::post('query', 'SearchController@query')->name('query');
});

    

Route::group(['prefix' => ''], function() {
    //
    Route::get('index', 'HomePageController@getHomePage')->name('index');

    Route::group(['prefix' => 'chitiet'], function() {
        Route::get('/{slug?}', 'BookController@getBookDetail')->name('chitietsach');
        Route::post('/comment/{id_user}/{id_book}', 'CommentController@postAddComment');
        Route::post('/comment/{id_cmt?}', 'CommentController@postEditComment')->name('editcomment');
        Route::get('/delete_cmt/{id_cmt?}', 'CommentController@getDeleteComment')->name('delete_comment');
        Route::get('/delete_reply/{id_rep?}', 'CommentController@getDeleteReply')->name('delete_comment');
        Route::post('/reply/{id_rep?}/{id_user}', 'CommentController@postReplyComment');
        Route::post('/reply/{id_rep?}', 'CommentController@postEditReplyComment');
    });
    Route::group(['prefix' => 'shoppingcart'], function() {
        Route::get('/', 'ShoppingCartController@getCart');
        Route::get('/addCartDetail/{id_book}/{id_user}', 'ShoppingCartController@postCartDetail')->name('addCart');
        Route::get('/deleteCartDetail/{id_book}/{id_user}', 'ShoppingCartController@deleteCartDetail');
        Route::get('/hoantat', 'ShoppingCartController@getHoanTat')->name('shoppingcart.hoantat');

        Route::get('/thanhtoan', 'ShoppingCartController@getThanhToan')->name('shoppingcart.thanhtoan');

        Route::post('/postthanhtoan', 'ShoppingCartController@postThanhToan')->name('shoppingcart.postthanhtoan');
    });
    Route::group(['prefix' => 'danhmuc'], function() {
        //
        Route::get('theloai/{idtheloai?}', 'ClassifyBookController@getTheLoai')->name('classify.theloai');
        Route::get('chude/{idchude?}', 'ClassifyBookController@getChuDe')->name('classify.chude');
        Route::get('noidung/{idnoidung?}', 'ClassifyBookController@getNoiDung')->name('classify.noidung');
    });
    Route::group(['prefix' => 'user'], function() {
        Route::get('infor_basic', 'UserController@getInfor')->name('inforBasic');
        Route::get('my_cart', 'UserController@getMyCart')->name('user.myCart');
        Route::get('my_cart/detail/{idcart?}', 'UserController@getMyCartDetail')->name('user.myCartDetail');
    });

});

Auth::routes();


