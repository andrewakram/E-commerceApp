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




Route::get('/cp','adminpController@content');
////////////////////
//get_all_products
Route::get('/products','ProductsController@get_all_products');

//add_product
Route::get('/add_product','ProductsController@add_product');

//edit_product page
Route::get('/edit_page/{product_id}','ProductsController@edit_page');

//update_product
Route::post('/update_product/{product_id}','ProductsController@update_product');

//insert_product
Route::post('/insert_product','ProductsController@insert_product');

//delete_product
Route::get('/delete_product/{product_id}','ProductsController@delete_product');

//get_all_categories
Route::get('/categories','CategoriesController@get_all_categories');

//add_category
Route::get('/add_category','CategoriesController@add_category');

//insert_category
Route::post('/insert_category','CategoriesController@insert_category');

//delete_category
Route::get('/delete_category/{cat_id}','CategoriesController@delete_category');

//edit_category page
Route::get('/edit_cat_page/{cat_id}','CategoriesController@edit_cat_page');

//update_category
Route::post('/update_category/{cat_id}','CategoriesController@update_category');

//get_all_brands
Route::get('/brands','BrandsController@get_all_brands');

//add_brand
Route::get('/add_brand','BrandsController@add_brand');

//insert_brand
Route::post('/insert_brand','BrandsController@insert_brand');

//delete_brand
Route::get('/delete_brand/{brand_id}','BrandsController@delete_brand');

//edit_brand page
Route::get('/edit_brand_page/{brand_id}','BrandsController@edit_brand_page');

//update_brand
Route::post('/update_brand/{brand_id}','BrandsController@update_brand');

//////////////////////////////////////////////////////////////////
///
///
///
Route::get('/','EmporsController@empor');

Route::get('/show_hot/{product_id}','EmporsController@show_hot_product');