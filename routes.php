<?php 

Route::add('@admin/visualizr','Visualizr\Admin\Visualizr::index','visualizr_admin_index');
Route::add('@admin/visualizr/add/step/choose','Visualizr\Admin\Visualizr::step','visualizr_step');
Route::add('@admin/visualizr/add/step/choose/pie','Visualizr\Admin\Visualizr::step','visualizr_pie');
Route::add('@admin/visualizr/add/step/choose/bar','Visualizr\Admin\Visualizr::step','visualizr_bar');
Route::add('@admin/visualizr/add/step/choose/column','Visualizr\Admin\Visualizr::step','visualizr_column');
Route::add('@admin/visualizr/edit/{string:id}','Visualizr\Admin\Visualizr::edit','visualizr_edit');

// Actions
Route::add('@admin/visualizr/delete/{string:id}','Visualizr\Admin\Visualizr::delete','visualizr_delete');

Route::add('@admin/visualizr/create','Visualizr\Admin\Visualizr::create','visualizr_create');

Route::add('@admin/visualizr/category','Visualizr\Admin\Category::index','visualizr_category');


Route::add('@admin/visualizr/test','Visualizr\Admin\Visualizr::test','visualizr_test');

// Frontend
Route::add('visualizr/embed/{string:id}','Visualizr\Visualizr::embed','visualizr_embed');
Route::add('visualizr/image/{string:id}','Visualizr\Visualizr::image','visualizr_image');
Route::add('visualizr','Visualizr\Visualizr::index','visualizr_index');
Route::add('visualizr/{string:id}','Visualizr\Visualizr::show','visualizr_show');
Route::add('visualizr/chart/{string:id}','Visualizr\Visualizr::chartData','visualizr_chart_data');
Route::add('visualizr/option/{string:id}','Visualizr\Visualizr::chartOption','visualizr_chart_option');

Route::add('visualizr/category/{string:id}','Visualizr\Category::show','visualizr_category_show');
// Route::add('visualizr/hi/{string:id}','Visualizr\Admin\Visualizr::hi','visualizr_hi');