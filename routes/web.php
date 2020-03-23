<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


//$router->group(['prefix' => 'api', 'middleware' => 'auth:api'], function () use ($router) {
//    $router->get('/a', function () use ($router) {
//        echo phpinfo();
//    });
//});

//Group 0
$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->post('login', 'AuthController@login');
$router->post('logout', 'AuthController@logout');

//Group 1
//User
$router->post('create_user', 'UserController@create');
$router->patch('reset_user_password', 'UserController@reset_password');
$router->patch('deactivate_user', 'UserController@deactivate');
$router->patch('reactivate_user', 'UserController@reactivate');
$router->patch('change_user_workplace', 'UserController@change_workplace');
//Device
$router->post('register_device', 'DeviceController@register');
$router->delete('delete_device', 'DeviceController@delete');
//Workplace
$router->post('create_workplace', 'WorkplaceController@create');
$router->delete('delete_workplace', 'WorkplaceController@delete');

//Group 2
//Customer
$router->post('create_customer', 'CustomerValidator@create');
$router->patch('edit_customer', 'CustomerController@edit');
$router->delete('delete_customer', 'CustomerController@delete');
$router->patch('deactivate_customer', 'CustomerController@deactivate');
$router->patch('reactivate_customer', 'CustomerController@reactivate');
//Supplier
$router->post('create_supplier', 'SupplierController@create');
$router->patch('edit_supplier', 'SupplierController@edit');
$router->delete('delete_supplier', 'SupplierController@delete');
$router->patch('deactivate_supplier', 'SupplierController@deactivate');
$router->patch('reactivate_supplier', 'SupplierController@reactivate');
//Accessory
$router->post('create_accessory', 'AccessoryController@create');
$router->delete('delete_accessory', 'AccessoryController@delete');
$router->patch('deactivate_accessory', 'AccessoryController@deactivate');
$router->patch('reactivate_accessory', 'AccessoryController@reactivate');
$router->patch('upload_accessory_photo', 'AccessoryController@upload_photo');
$router->patch('delete_accessory_photo', 'AccessoryController@delete_photo');
//Conception
$router->post('create_conception', 'ConceptionController@create');
$router->delete('delete_conception', 'ConceptionController@delete');
$router->patch('deactivate_conception', 'ConceptionController@deactivate');
$router->patch('reactivate_conception', 'ConceptionController@reactivate');
$router->post('link_conception_accessory', 'ConceptionController@link_accessory');
$router->delete('unlink_conception_accessory', 'ConceptionController@unlink_accessory');

//Group 3
//Case
$router->post('create_case', 'CaseController@create');
$router->patch('disable_case', 'CaseController@disable');
//Shelf
$router->post('create_shelf', 'ShelfController@create');
$router->delete('delete_shelf', 'ShelfController@delete');
//Block
$router->patch('open_block', 'BlockController@open');
$router->patch('close_block', 'BlockController@close');

//Group 4
//Order
$router->post('create_order', 'OrderController@create');
$router->post('edit_order', 'OrderController@edit');
$router->delete('delete_order', 'OrderController@delete');
$router->patch('turn_off_order', 'OrderController@turn_off');
$router->patch('turn_on_order', 'OrderController@turn_on');
//Import
$router->post('create_import', 'ImportController@create');
$router->post('edit_import', 'ImportController@edit');
$router->delete('delete_import', 'ImportController@delete');
$router->patch('turn_off_import', 'ImportController@turn_off');
$router->patch('turn_on_import', 'ImportController@turn_on');
$router->post('receive_import', 'ImportController@receive');
$router->post('edit_imported_receiving', 'ImportController@edit_receiving');
$router->delete('delete_imported_receiving', 'ImportController@delete_receiving');
//Restoration
$router->post('register_restoration', 'RestorationController@register');
$router->delete('delete_restoration', 'RestorationController@delete');
$router->patch('confirm_restoration', 'RestorationController@confirm');
$router->delete('cancel_restoration', 'RestorationController@cancel');
$router->post('receive_restoration', 'RestorationController@receive');

//Group 5
//Received Group
$router->post('count', 'ReceivedGroupController@count');
$router->patch('edit_counting', 'ReceivedGroupController@edit_counting');
$router->delete('delete_counting', 'ReceivedGroupController@delete_counting');
$router->post('check', 'ReceivedGroupController@check');
$router->patch('edit_checking', 'ReceivedGroupController@edit_checking');
$router->delete('delete_checking', 'ReceivedGroupController@delete_checking');
$router->post('arrange', 'ReceivedGroupController@arrange');
//Import
$router->post('classify', 'ImportController@classify');
$router->patch('reclassify', 'ImportController@reclassify');
$router->delete('delete_classification', 'ImportController@delete_classification');
$router->post('sendback', 'ImportController@sendback');

//Group 6
//Received Group
$router->post('store_received_groups', 'ReceivedGroupController@store');
//Entry
$router->post('adjust', 'EntryController@ajdust');
$router->post('discard', 'EntryController@discard');
$router->post('verify_adjusting', 'EntryController@verify_adjusting');
$router->post('verify_discarding', 'EntryController@verify_discarding');
$router->post('move', 'EntryController@move');
//Case
$router->post('store_case', 'CaseController@store');
$router->post('replace', 'CaseController@replace');



//$router->post('', '');
//$router->patch('', '');
//$router->delete('', '');

////Group 9
//$router->post('/login_desktop', 'AuthController@login_desktop');
//$router->post('/login_mobile', 'AuthController@login_mobile');
//$router->post('/logout','AuthController@logout');
//$router->post('/change_password','AuthController@change_password');



