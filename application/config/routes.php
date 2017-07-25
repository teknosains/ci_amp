<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'frontend/home';
//$route['404_override'] = 'errors/index';
$route['translate_uri_dashes'] = FALSE;

$route['/']['GET'] = function() {
    return 'frontend/home';
};

$route['read/(:any)']['GET'] = function($slug) {
    return 'frontend/home/read/' . $slug;
};


/*-----------------------------ADMIN PAGE---------------------------------------*/

//sign In
$route['backend']['get'] = function() {
    return 'backend/signin/index';
};

//do sign in
$route['backend']['post'] = function() {
    return 'backend/signin/check';
};

//logout
$route['backend/signout']['get'] = function() {
    return 'backend/signin/signout';
};


//list posts
$route['backend/post']['GET'] = function() {
    return 'backend/post/index';
};
//create post
$route['backend/post/create_post']['GET'] = function() {
    return 'backend/post/create_post';
};
//save post
$route['backend/post/save_post']['POST'] = function() {
    return 'backend/post/savePost';
};
//publish post
$route['backend/post/publish']['POST'] = function() {
    return 'backend/post/publish';
};
// Set feautered
$route['backend/post/unPublish']['POST'] = function() {
    return 'backend/post/unPublish';
};
//edit post
$route['backend/post/edit/(:any)']['GET'] = function($article_id) {
    return 'backend/post/edit/' . $article_id;
};
// save_edit_post
$route['backend/post/save_edit_post/(:any)']['POST'] = function($article_id) {
    return 'backend/post/updatePost/' . $article_id;
};


//erros -------------------------------------------------------
$route['errors/not_found']['GET'] = function() {
    return 'errors/index';
};
