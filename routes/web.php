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

//Route::get('/', function () {
//    return view('welcome');
//});
//基础路由
//Route::get('hello', function () {
//    return "hello world";
//});
//
//Route::post('log', function () {
//    return "hello post";
//});
////多路由
//Route::match(['post', 'get'], 'match', function () {
//    return "match request";
//});

//全部
//Route::any('any', function () {
//    return 'any';
//});

//路由参数
//Route::get('user/{id}', function ($id) {
//    return 'user - ' . $id;
//});
//路由正则匹配
//Route::get('user/{username?}', function ($username = 'hujie') {
//    return 'user:' . $username;
//})->where('username', '[a-z]+');
//多参数
//Route::get('{username}/{id}', function ($username, $id) {
//    return $username . 'of' . $id;
//});
//路由别名
//Route::get('login/test', ['as' => 'login_test', function () {
//    return route('login_test');
//}]);
//路由群组
//Route::group
//路由模板
//路由控制器
//Route::get('index/test','IndexController@test');
//Route::any('index/test', [
//    'uses' => 'IndexController@test',
//    'as' => 'test'
//    ]);

//Route::any('test1', ['uses' => 'StudentController@test1']);
//Route::any('query1', ['uses' => 'StudentController@query1']);
//Route::any('query2', ['uses' => 'StudentController@query2']);
//Route::any('query3', ['uses' => 'StudentController@query3']);
//Route::any('query4', ['uses' => 'StudentController@query4']);
//Route::any('query5', ['uses' => 'StudentController@query5']);
//Route::any('orm1', ['uses' => 'StudentController@orm1']);
//Route::any('orm2', ['uses' => 'StudentController@orm2']);
//Route::any('orm3', ['uses' => 'StudentController@orm3']);
//Route::any('blade', ['uses' => 'StudentController@blade']);
//Route::any('request1', ['uses' => 'StudentController@request1']);
//Route::group(['middleware' => ['web']], function () {
//    Route::any('session1', ['uses' => 'StudentController@session1']);
//    Route::any('session2', ['uses' => 'StudentController@session2']);
//});
//Route::any('response1', ['uses' => 'StudentController@response1']);
//Route::any('activity0', ['uses' => 'StudentController@activity0']);
//Route::any('activity1', ['uses' => 'StudentController@activity1']);
//Route::any('mail', ['uses' => 'StudentController@mail']);
//
//
//Route::group(['middleware' => ['activity']], function () {
//    Route::any('activity1', ['uses' => 'StudentController@activity1']);
//});
//
//
//Auth::routes();


/*
 * Auth for admin
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/admin', 'HomeController@index')->name('admin');

//Route::get('api/students/{student}',function(\App\Student $student){
//    return response()->json($student->getAttributes());
//});

/*
 *  front for everyone
 */

Route::get('', 'IndexController@index');
Route::get('article/{id?}', 'IndexController@article');
Route::get('archives', 'IndexController@archives');
Route::get('cats', 'IndexController@cats');
Route::get('cat/{id?}', 'IndexController@cat');
Route::get('tags', 'IndexController@tags');
Route::get('tag/{id?}', 'IndexController@tag');
Route::get('search', 'IndexController@search')->name('search');

/*
 * article's CURD for admin
 */

Route::group(['prefix' => 'admin'], function () {
    Route::match(['post', 'get'], 'articles/create', 'HomeController@createArticle')->name('article_create');
    Route::match(['post', 'get'], 'articles/update/{id?}', 'HomeController@updateArticle')->name('article_update');
    Route::post('articles/delete/{id?}', 'HomeController@deleteArticle')->name('article_delete');
    Route::match(['post', 'get'], 'articles/index', 'HomeController@selectArticle')->name('article');

    /*
     * cat's CURD for admin
     */
    Route::match(['post', 'get'], 'cats/create', 'HomeController@createCat')->name('cat_create');
    Route::match(['post', 'get'], 'cats/update/{id}', 'HomeController@updateCat')->name('cat_update');
    Route::post('cats/delete/{id}', 'HomeController@deleteCat')->name('cat_delete');
    Route::match(['post', 'get'], 'cats/index', 'HomeController@selectCat')->name('cat');

    /*
     * tag's CURD for admin
     */
    Route::match(['post', 'get'], 'tags/create', 'HomeController@createTag')->name('tag_create');
    Route::match(['post', 'get'], 'tags/update/{id}', 'HomeController@updateTag')->name('tag_update');
    Route::post('/tags/delete/{id}', 'HomeController@deleteTag')->name('tag_delete');
    Route::match(['post', 'get'], 'tags/index', 'HomeController@selectTag')->name('tag');

});

Route::group(['prefix' => 'chat'], function () {
    Route::get('index','ChatController@index')->name('chat');
});