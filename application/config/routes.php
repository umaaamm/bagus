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
$route['default_controller'] = 'ControllerMember';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['KelolaAdmin'] ='ControllerAdmin';
$route['SimpanAdmin'] ='ControllerAdmin/simpan';
$route['HapusAdmin'] ='ControllerAdmin/hapus';

$route['SimpanMember'] ='ControllerMember/simpan';
$route['DataMember'] ='ControllerMember/data_member';

$route['LoginCek'] ='ControllerLoginP/aksi_login';
$route['LoginMember'] ='ControllerLoginP';

$route['KelolaAcc'] ='ControllerAcc';
$route['SimpanAcc'] ='ControllerAcc/simpan';

$route['KelolaMekanik'] ='ControllerMekanik';
$route['SimpanMekanik'] ='ControllerMekanik/simpan';

$route['KelolaService'] ='ControllerService';
$route['SimpanService'] ='ControllerService/simpan';

$route['Booking'] ='ControllerBooking';
$route['BookingAdmin'] ='ControllerBooking/booking_admin';
$route['SimpanBooking'] ='ControllerBooking/simpan';

$route['ChatRoom'] ='ControllerChat';
$route['ChatRoomUser'] ='ControllerChat/user';
$route['SimpanChat'] ='ControllerChat/simpan';
$route['SimpanChatUser'] ='ControllerChat/simpan_c_u';

$route['Rating'] ='ControllerRating';
$route['SimpanRating'] ='ControllerRating/simpan';

$route['Admin'] ='ControllerUtama';
$route['Login'] = 'ControllerLogin';
$route['CekLogin'] = 'ControllerLogin/aksi_login';

$route['LaporanFilter'] = 'ControllerLaporan/filter';
$route['Laporan'] = 'ControllerLaporan';

