<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* @START: Front End Routes */
Route::get('/clear', function(){
  Artisan::call('cache:clear');
  Artisan::call('config:clear');
  Artisan::call('config:cache');
  Artisan::call('view:clear');
  return "Cleared!";
});


/*********************************@BHUSHUAN FRONT ROUTES@**************************************/
Route::get('/','HomeController@index');
Route::get('/our-menu','MenuController@index');
Route::get('/blog','BlogController@index');
Route::get('blog_detail/{str}','BlogController@blog_detail');
Route::get('category/{str}','BlogController@blog_catwise');
Route::post('store_comment','BlogController@store_comment');
Route::get('/our-store','StoreController@index');
Route::get('/contact','HomeController@contact');

Route::get('admin/','Admin\AuthController@login');
Route::get('admin/login','Admin\AuthController@login');
Route::post('admin/login_process','Admin\AuthController@login_process');
Route::get('admin/forget_password','Admin\AuthController@forget_password');
Route::post('admin/forget_password_process','Admin\AuthController@forget_password_process');
Route::get('admin/logout','Admin\AuthController@logout');
Route::get('/admin/change_password','Admin\AuthController@change_password');
Route::post('/admin/change_password_process','Admin\AuthController@change_password_process');
Route::post('get_city_list','Admin\AuthController@get_city_list');
Route::get('public/admin/login','Admin\AuthController@login');

/*********************************@BHUSHUAN ADMIN ROUTES@**************************************/

 Route::group(['prefix' => 'admin','middleware' => 'admin'], function () 
 {
	
	Route::get('/dashbord',		 	      'Admin\DashboardController@dashbord');
	Route::post('/kitchen_month_progress', 'Admin\DashboardController@kitchen_target_progressbar');
	Route::post('/getSubscriberDatadash', 'Admin\DashboardController@get_expiry_subcriber');
	Route::post('/kitchen_chart', 'Admin\DashboardController@get_subscriber_chart_kichenwise');
	//notification show
	Route::post('/notification_data',  'Admin\NotificationController@dbnotification');
	Route::get('/notification/{id}',   'Admin\NotificationController@notification');
	Route::get('/manage_notification', 'Admin\NotificationController@index');
	//Module Master Routes
	Route::get('/manage_module',		 'Admin\ModuleController@index');
	Route::get('/add_module',		 	 'Admin\ModuleController@add');
	Route::post('/store_module',		 'Admin\ModuleController@store');
	Route::get('/edit_module/{id}',	 	 'Admin\ModuleController@edit');
	Route::post('/update_module/{id}', 	 'Admin\ModuleController@update');
	Route::get('/delete_module/{id}',	 'Admin\ModuleController@delete');
	//Role Master Routes
	Route::get('/manage_role',		 'Admin\RoleController@index');
	Route::get('/add_role',		 	 'Admin\RoleController@add');
	Route::post('/store_role',		 'Admin\RoleController@store');
	Route::get('/edit_role/{id}',	 'Admin\RoleController@edit');
	Route::post('/update_role/{id}', 'Admin\RoleController@update');
	Route::get('/delete_role/{id}',	 'Admin\RoleController@delete');
	Route::post('/status_role',	     'Admin\RoleController@status');
	//gst Master Routes	
	Route::get('/manage_gst',		 'Admin\GstController@index');
	Route::get('/add_gst',		 	 'Admin\GstController@add');
	Route::post('/store_gst',		 'Admin\GstController@store');
	Route::get('/edit_gst/{id}',	 'Admin\GstController@edit');
	Route::post('/update_gst/{id}',  'Admin\GstController@update');
	Route::get('/delete_gst/{id}',	 'Admin\GstController@delete');
	//Role Permisssions	
	Route::get('/manage_permission',		 'Admin\PermissionController@index');
	Route::get('/add_permission',		 	 'Admin\PermissionController@add');
	Route::post('/store_permission',		 'Admin\PermissionController@store');
	Route::get('/edit_permission/{id}',	     'Admin\PermissionController@edit');
	Route::post('/update_permission/{id}',   'Admin\PermissionController@update');
	Route::get('/delete_permission/{id}',	 'Admin\PermissionController@delete');
	Route::post('/getmenu',	 				 'Admin\PermissionController@get_menu');
	Route::post('/getmenulist',	 			 'Admin\PermissionController@get_menu_list');
    //ajax state city routes
	Route::post('/getCity',	 			 'Admin\AjaxController@getCity');
	Route::post('/getArea',	 			 'Admin\AjaxController@getArea');
	Route::post('/getAreamultiarea',	 'Admin\AjaxController@getAreamultiarea');
	Route::post('/getSubscriber',	 	 'Admin\AjaxController@getSubscriber');
	//Subscription master routes
	 Route::get('/manage_subscription_plan',	   'Admin\SubscriptionController@index');
	 Route::get('/add_subscription_plan',		   'Admin\SubscriptionController@add');
	 Route::post('/store_subscription_plan',	   'Admin\SubscriptionController@store');
	 Route::get('/edit_subscription_plan/{id}',	   'Admin\SubscriptionController@edit');
	 Route::post('/update_subscription_plan/{id}', 'Admin\SubscriptionController@update');
	 Route::get('/delete_subscription_plan/{id}',  'Admin\SubscriptionController@delete');
	 Route::post('/status_subscription_plan',	   'Admin\SubscriptionController@status');
	 Route::post('/status_duration_plan',	       'Admin\SubscriptionController@status_duration');
	 Route::post('/subscription_plan_details',	   'Admin\SubscriptionController@detail');
	//user manager  routes
	 Route::get('/manage_user_manager',	      'Admin\OperationManagerController@index');
	 Route::get('/add_user_manager',		  'Admin\OperationManagerController@add');
	 Route::post('/store_user_manager',	      'Admin\OperationManagerController@store');
	 Route::get('/edit_user_manager/{id}',	  'Admin\OperationManagerController@edit');
	 Route::post('/update_user_manager/{id}', 'Admin\OperationManagerController@update');
	 Route::get('/delete_user_manager/{id}',  'Admin\OperationManagerController@delete');
	 Route::post('/status_user_manager',	  'Admin\OperationManagerController@status');
	//operation manager routes
	 Route::get('/manage_location',		  'Admin\LocationsController@index');
	 Route::get('/add_location',		  'Admin\LocationsController@add');
	 Route::post('/store_location',		  'Admin\LocationsController@store');
	 Route::get('/edit_location/{id}',	  'Admin\LocationsController@edit');
	 Route::post('/update_location/{id}', 'Admin\LocationsController@update');
	 Route::get('/delete_location/{id}',  'Admin\LocationsController@delete');
	 Route::post('/status_location',	  'Admin\LocationsController@status');
	// Menu category routes
	 Route::get('/manage_menucategory',		  'Admin\MenuCategoryController@index');
	 Route::get('/add_menucategory',		  'Admin\MenuCategoryController@add');
	 Route::post('/store_menucategory',		  'Admin\MenuCategoryController@store');
	 Route::get('/edit_menucategory/{id}',	  'Admin\MenuCategoryController@edit');
	 Route::post('/update_menucategory/{id}', 'Admin\MenuCategoryController@update');
	 Route::get('/delete_menucategory/{id}',  'Admin\MenuCategoryController@delete');
	 Route::post('/status_menu_category',	  'Admin\MenuCategoryController@status');
	// Menu Specification routes
	 Route::get('/manage_menu_specification', 		'Admin\MenuSpecificationController@index');
	 Route::get('/add_menu_specification',	 		'Admin\MenuSpecificationController@add');
	 Route::post('/store_menu_specification', 		'Admin\MenuSpecificationController@store');
	 Route::get('/edit_menu_specification/{id}',	'Admin\MenuSpecificationController@edit');
	 Route::post('/update_menu_specification/{id}',	'Admin\MenuSpecificationController@update');
	 Route::get('/delete_menu_specification/{id}', 	'Admin\MenuSpecificationController@delete');
	 Route::post('/status_menu_specification',	     'Admin\MenuSpecificationController@status');
	// Menu Routes
	 Route::get('/manage_menu', 		'Admin\MenuController@index');
	 Route::get('/add_menu',	 		'Admin\MenuController@add');
	 Route::post('/store_menu', 		'Admin\MenuController@store');
 	 Route::get('/edit_menu/{id}',		'Admin\MenuController@edit');
 	 Route::post('/update_menu/{id}',	'Admin\MenuController@update');
	 Route::get('/delete_menu/{id}', 	'Admin\MenuController@delete');
     Route::post('/status_menu',	    'Admin\MenuController@status');
     Route::post('/status_menu_home',	    'Admin\MenuController@status_menu_home');
     Route::post('/menu_details',	    'Admin\MenuController@details');
	
	// Assign location wise menu Routes  
	Route::get('/manage_assign_location_menu', 		 'Admin\AssignLocationMenuController@index');
	Route::get('/add_assign_location_menu',	 		 'Admin\AssignLocationMenuController@add');
	Route::post('/store_assign_location_menu', 		 'Admin\AssignLocationMenuController@store');
	Route::get('/edit_assign_location_menu/{id}',	 'Admin\AssignLocationMenuController@edit');
	Route::post('/update_assign_location_menu/{id}', 'Admin\AssignLocationMenuController@update');
	Route::get('/delete_assign_location_menu/{id}',  'Admin\AssignLocationMenuController@delete');
	Route::post('/status_assign_menu',	  		     'Admin\AssignLocationMenuController@status');
	Route::post('/assign_menu_details',	  		     'Admin\AssignLocationMenuController@detail');

	//Kitchen Routes
	Route::get('/manage_kitchen',	      'Admin\KitchenController@index');
	Route::get('/add_kitchen',		      'Admin\KitchenController@add');
	Route::post('/store_kitchen',	 	  'Admin\KitchenController@store');
	Route::get('/edit_kitchen/{id}',	  'Admin\KitchenController@edit');
	Route::post('/update_kitchen/{id}',   'Admin\KitchenController@update');
	Route::get('/delete_kitchen/{id}',    'Admin\KitchenController@delete');
	Route::post('/status_kitchen',	      'Admin\KitchenController@status');
	Route::post('/kitchen_details',	      'Admin\KitchenController@detail');
	Route::post('/kitchen_target',	      'Admin\KitchenController@kitchen_target');
	Route::post('/store_target',	      'Admin\KitchenController@store_target');
	Route::get('/manage_target/{id}',	  'Admin\KitchenController@view_target');
	Route::get('/delete_target/{id}',     'Admin\KitchenController@delete_target');


	//Referal Routes
	Route::get('/manage_referal',	      'Admin\ReferalController@index');
	Route::get('/add_referal',		      'Admin\ReferalController@add');
	Route::post('/store_referal',	 	  'Admin\ReferalController@store');
	Route::get('/edit_referal/{id}',	  'Admin\ReferalController@edit');
	Route::post('/update_referal/{id}',   'Admin\ReferalController@update');
	Route::get('/delete_referal/{id}',    'Admin\ReferalController@delete');
	Route::post('/status_referal',	      'Admin\ReferalController@status');
	Route::post('/referal_details',	      'Admin\ReferalController@detail');


	//Assign Nutritionist Routes
	Route::get('/manage_assign_nutritionist',	      'Admin\AssignNutritionistController@index');
	Route::get('/add_assign_nutritionist',		      'Admin\AssignNutritionistController@add');
	Route::post('/store_assign_nutritionist',	 	  'Admin\AssignNutritionistController@store');
	Route::get('/edit_assign_nutritionist/{id}',	  'Admin\AssignNutritionistController@edit');
	Route::post('/update_assign_nutritionist/{id}',   'Admin\AssignNutritionistController@update');
	Route::get('/delete_assign_nutritionist/{id}',    'Admin\AssignNutritionistController@delete');
	Route::post('/status_assign_nutritionist',	      'Admin\AssignNutritionistController@status');
	Route::post('/assign_nutritionist_details',	      'Admin\AssignNutritionistController@detail');
	Route::post('/get_user_list',	                  'Admin\AssignNutritionistController@get_user_list');
	Route::post('/assign_users_details',	          'Admin\AssignNutritionistController@assign_users_details');
	
	//subscriber Routes 
	Route::get('/manage_subscriber',	    		  'Admin\SubscriberController@index');
	Route::post('/getSubscriberData',	              'Admin\SubscriberController@getSubscriberData');
	Route::get('/manage_new_subscriber',	    	  'Admin\SubscriberController@newindex');
	Route::post('/getNewSubscriberData',	    	  'Admin\SubscriberController@getNewSubscriberData');
	Route::get('/manage_expire_subscriber',	    	  'Admin\SubscriberController@expindex');
	Route::post('/getExpireSubscriberData',	  'Admin\SubscriberController@getExpireSubscriberData');

	Route::get('/add_subscriber',		    'Admin\SubscriberController@add');
	Route::post('/store_subscriber',	    'Admin\SubscriberController@store');
	Route::get('/edit_subscriber/{id}',	    'Admin\SubscriberController@edit');
	Route::post('/update_subscriber/{id}',  'Admin\SubscriberController@update');
	Route::get('/delete_subscriber/{id}',   'Admin\SubscriberController@delete');
	Route::post('/getDuration',             'Admin\SubscriberController@no_of_days');
	Route::post('/getplan_price',           'Admin\SubscriberController@getplan_price');
	Route::post('/getKitchen',              'Admin\SubscriberController@getKitchen');


	
	Route::post('/verify_subscriber',	    'Admin\SubscriberController@verify_subscriber');
	Route::post('/subscriber_details',	    'Admin\SubscriberController@subscriber_details');
	Route::get('/subscriber_pdf/{id}',	    'Admin\SubscriberController@subscriber_pdf');
	Route::get('/subscriber_bill_pdf/{id}', 'Admin\SubscriberController@subscriber_bill_pdf');

	//Meal Program Subscriber 
	Route::get('/add_subscriber_meal_program/{id}',   'Admin\SubscriberMealProgramController@add');
	Route::post('/view_subscriber_meal_program',      'Admin\SubscriberMealProgramController@view_details');
	Route::post('/store_subscriber_health_details',	  'Admin\SubscriberMealProgramController@store');
	Route::post('/edit_subscriber_default_menu',	  'Admin\SubscriberMealProgramController@menu_edit');
	Route::post('/get_menu_dropdown',				  'Admin\SubscriberMealProgramController@get_menu');
	Route::post('/get_menu_macros',					  'Admin\SubscriberMealProgramController@get_menu_macros');
	Route::post('/store_change_menu',				  'Admin\SubscriberMealProgramController@store_change_menu');
   
    //set additional meal routes 
	Route::post('/set_additional_meal1',   'Admin\SubscriberController@set_additional_meal');
 	Route::post('/store_additional_menu1', 'Admin\SubscriberController@store_additional_menu');
	Route::post('/get_menu_macros1',       'Admin\SubscriberController@get_menu_macros');


    //Subscriber Calender
	Route::get('/manage_subscriber_calender', 'Admin\SubscriberCalenderController@index');
	Route::post('/getMealDetails',			  'Admin\SubscriberCalenderController@getMealDetails');
	Route::get('/traits', 'Admin\DashboardController@traits');

    //Order History 
	Route::get('/manage_order',   'Admin\OrderHistoryController@index');
	Route::post('/order_details', 'Admin\OrderHistoryController@details');
	Route::post('/order_resend',  'Admin\OrderHistoryController@order_resend');

	//feedback module
	Route::get('/manage_feedback', 'Admin\FeedbackController@index');
	Route::post('/feedback_details','Admin\FeedbackController@details');
	Route::post('/feedback_replay','Admin\FeedbackController@replay');
	Route::post('/send_replay','Admin\FeedbackController@send_replay');

	//Push notification module
	
	Route::get('/manage_push_notification',		  'Admin\PushNotificationController@index');
	Route::get('/add_push_notification',		 	  'Admin\PushNotificationController@add');
	Route::post('/store_push_notification',		  'Admin\PushNotificationController@store');
	Route::get('/edit_push_notification/{id}',	  'Admin\PushNotificationController@edit');
	Route::post('/update_push_notification/{id}',  'Admin\PushNotificationController@update');
	Route::get('/delete_push_notification/{id}',	  'Admin\PushNotificationController@delete');
	Route::post('/push_notification_status',	      'Admin\PushNotificationController@status');

	//plan master routes
	
	Route::get('/manage_story_type',		  'Admin\StoryController@index');
	Route::get('/add_story_type',		 	  'Admin\StoryController@add');
	Route::post('/store_story_type',		  'Admin\StoryController@store');
	Route::get('/edit_story_type/{id}',	 	  'Admin\StoryController@edit');
	Route::post('/update_story_type/{id}',    'Admin\StoryController@update');
	Route::get('/delete_story_type/{id}',	  'Admin\StoryController@delete');
	Route::post('/story_type_status',	      'Admin\StoryController@status');

	//link 
	Route::get('/manage_link',		  'Admin\LinkController@index');
	Route::get('/add_link',		 	  'Admin\LinkController@add');
	Route::post('/store_link',		  'Admin\LinkController@store');
	Route::get('/edit_link/{id}',	  'Admin\LinkController@edit');
	Route::post('/update_link/{id}',  'Admin\LinkController@update');
	Route::get('/delete_link/{id}',	  'Admin\LinkController@delete');
	Route::post('/link_status',	      'Admin\LinkController@status');
	
	//pincode location find
	Route::get('/latlong',	      'Admin\KitchenController@getlatlong');
	Route::post('/nearKitchen',	  'Admin\KitchenController@nearest_kitchen');

	//Add booklet
	Route::get('/add_booklet',	      'Admin\BookletController@add');
	
  //blog
	Route::get('manage_blog','Admin\BlogController@index');
	Route::post('store_blog','Admin\BlogController@store');
	Route::get('add_blog','Admin\BlogController@create');
	Route::get('comment/{id}','Admin\BlogController@comment');
	Route::get('edit_blog/{id}','Admin\BlogController@edit');
	Route::post('update_blog/{id}','Admin\BlogController@update');
	Route::get('delete_blog/{id}','Admin\BlogController@delete');
	Route::post('/status_blog',	  'Admin\BlogController@status');
	
	/* Route::get('blog/view-benefits/{id}''Admin\BlogController@view_benefits');
	Route::post('benefits_store','Admin\BlogController@benefits_store');
	Route::post('benefits_update/{id}','Admin\BlogController@benefits_update');
	Route::get('benefits_delete/{id}','Admin\BlogController@benefits_delete');
	Route::get('view-comments/{id}','Admin\BlogController@view_comments');
	Route::post('comment_update/{id}''Admin\BlogController@comment_update');
	Route::get('comment_delete/{id}','Admin\BlogController@comment_delete');
	Route::post('approve_comments/{id}','Admin\BlogController@approve_comments');
	Route::post('disapprove_comments/{id}','Admin\BlogController@disapprove_comments');*/

	//catyegory
	 Route::get('/manage_blogcategory',		  'Admin\BlogCategoryController@index');
	 Route::get('/add_blogcategory',		  'Admin\BlogCategoryController@add');
	 Route::post('/store_blogcategory',		  'Admin\BlogCategoryController@store');
	 Route::get('/edit_blogcategory/{id}',	  'Admin\BlogCategoryController@edit');
	 Route::post('/update_blogcategory/{id}', 'Admin\BlogCategoryController@update');
	 Route::get('/delete_blogcategory/{id}',  'Admin\BlogCategoryController@delete');
	 Route::post('/status_blogcategory',	  'Admin\BlogCategoryController@status');

	 //store
	 Route::get('/manage_store',		  'Admin\StoreController@index');
	 Route::get('/add_store',		  'Admin\StoreController@add');
	 Route::post('/store_store',		  'Admin\StoreController@store');
	 Route::get('/edit_store/{id}',	  'Admin\StoreController@edit');
	 Route::post('/update_store/{id}', 'Admin\StoreController@update');
	 Route::get('/delete_store/{id}',  'Admin\StoreController@delete');
	 Route::post('/status_store',	  'Admin\StoreController@status');
	
	//Testimonial 
	 Route::get('/manage_testimonial','Admin\TestimonialController@index');
	 Route::get('/add_testimonial','Admin\TestimonialController@add');
	 Route::post('/store_testimonial','Admin\TestimonialController@store');
	 Route::get('/edit_testimonial/{id}','Admin\TestimonialController@edit');
	 Route::post('/update_testimonial/{id}','Admin\TestimonialController@update');
	 Route::get('/delete_testimonial/{id}','Admin\TestimonialController@delete');
	 Route::post('/status_testimonial','Admin\TestimonialController@status');
	
	 //Slider
	Route::get('/manage_slider',		  			'Admin\SliderController@index');
	Route::get('/add_slider',		 	  			'Admin\SliderController@add');
	Route::post('/store_slider',		  			'Admin\SliderController@store');
	Route::get('/view_slider/{id}',	 	  			'Admin\SliderController@view');
	Route::get('/edit_slider/{id}',		  			'Admin\SliderController@edit');
	Route::post('/update_slider/{id}',	  			'Admin\SliderController@update');
	Route::post('/update_order_no/{id}',	  		'Admin\SliderController@order_no');
	Route::get('/delete_slider/{id}',	  			'Admin\SliderController@delete'); 
	Route::post('/status_banner',	  'Admin\SliderController@status');
		 //Slider
	Route::get('/manage_offer',		  			'Admin\OfferController@index');
	Route::get('/add_offer',		 	  			'Admin\OfferController@add');
	Route::post('/store_offer',		  			'Admin\OfferController@store');
	Route::get('/view_offer/{id}',	 	  			'Admin\OfferController@view');
	Route::get('/edit_offer/{id}',		  			'Admin\OfferController@edit');
	Route::post('/update_offer/{id}',	  			'Admin\OfferController@update');
	Route::post('/update_order_no1/{id}',	  		'Admin\OfferController@order_no');
	Route::get('/delete_offer/{id}',	  			'Admin\OfferController@delete'); 
	Route::post('/status_offer',	  'Admin\OfferController@status');
	
});
/*********************************************************************************************