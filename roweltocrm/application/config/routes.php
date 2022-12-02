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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['login'] = 'logincontroller/login';
$route['logout'] = 'logincontroller/logout';
$route['loginprocess'] = 'logincontroller/loginprocess';
$route['forgotpassword'] = 'logincontroller/forgotpassword';
$route['dashboard'] = 'logincontroller/dashboard';
$route['addlead'] = 'maincontroller/addlead';
$route['deletelead'] = 'maincontroller/deletelead';
$route['todayleads'] = 'maincontroller/todayleads';
$route['addLeadThroghWebsite'] = 'Websiteleadcontroller/addLeadThroghWebsite';
$route['updatelead'] = 'maincontroller/updatelead';
//$route['workinglead'] = 'maincontroller/workinglead';
$route['updateflag'] = 'maincontroller/updateflag';
$route['createXLS'] = 'excelcontroller/createXLS';
$route['addjunk'] = 'maincontroller/addjunk';
//$route['buylead'] = 'maincontroller/buylead';
$route['buycreatexls'] = 'excelcontroller/buycreatexls';
//$route['nointerest'] = 'maincontroller/nointerest';
$route['nointercreatexls'] = 'excelcontroller/nointercreatexls';
$route['excelallleads'] = 'excelcontroller/excelallleads';
$route['todayexel'] = 'excelcontroller/todayexel';
$route['regionassign'] = 'maincontroller/regionassign';
$route['editregion'] = 'maincontroller/editregion';
$route['updateregion'] = 'maincontroller/updateregion';
$route['deleteregionassign'] = 'maincontroller/deleteregionassign';
//$route['regionwiselead'] = 'maincontroller/regionwiselead';
$route['allusers'] = 'maincontroller/allusers';
$route['edituser'] = 'maincontroller/edituser';
$route['updateuser'] = 'maincontroller/updateuser';
$route['deleteuser'] = 'maincontroller/deleteuser';
$route['adduser'] = 'maincontroller/adduser';
$route['leaddetails'] = 'maincontroller/leaddetails';
$route['updatestatus'] = 'maincontroller/updatestatus';
$route['leadedit'] = 'maincontroller/leadedit';
$route['addreminder'] = 'remindercontroller/addreminder';
$route['viewreminders'] = 'remindercontroller/viewreminders';
$route['updatereminders'] = 'remindercontroller/updatereminders';
$route['deleteleadreminder'] = 'remindercontroller/deleteleadreminder';
$route['addchat'] = 'chatcontroller/addchat';
$route['forgotpassprocess'] = 'logincontroller/forgotpassprocess';
$route['fetchnointerest_lead'] = 'nointerestlead/fetchnointerest_lead';
$route['fetchregion_lead'] = 'Regionwiselead/fetchregion_lead';
$route['fetchbuy_lead'] = 'buylead/fetchbuy_lead';
$route['fetch_lead'] = 'workinglead/fetch_lead';
$route['default_controller'] = 'logincontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
