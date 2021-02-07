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

// admin
$route['admin'] = 'login/login_admin';
$route['admin/kategori-event'] = 'admin/event/kategori_event';
$route['admin/kategori-event/tambah'] = 'admin/event/tambah_kategori_event';
$route['admin/kategori-event/ubah/(:any)'] = 'admin/event/ubah_kategori_event/$1';
$route['admin/kategori-event/hapus/(:any)'] = 'admin/event/hapus_kategori_event/$1';
$route['admin/kategori-event/hapus/(:any)'] = 'admin/event/hapus_kategori_event/$1';
$route['admin/manajemen-member'] = 'admin/member';
$route['admin/manajemen-member/validasi/(:any)'] = 'admin/member/validasi/$1';
$route['admin/manajemen-member/aktif-akun/(:any)'] = 'admin/member/aktif_akun/$1';
$route['admin/manajemen-member/nonaktif-akun/(:any)'] = 'admin/member/nonaktif_akun/$1';
$route['admin/manajemen-member/dokumen-member/(:any)'] = 'admin/member/dokumen_member/$1';
$route['admin/manajemen-member/event-member/(:any)'] = 'admin/member/event_member/$1';
// admin

// member
$route['member'] = 'user/member';
$route['member/event-saya'] = 'user/event';
$route['member/event-saya/(:any)'] = 'user/event/detail/$1';
$route['member/event-saya/unpublish/(:any)'] = 'user/event/unpublish/$1';
$route['member/event-saya/publish/(:any)'] = 'user/event/publish/$1';
$route['member/event-saya/data-pemesan/(:any)'] = 'user/event/data_pemesan/$1';
$route['member/event-saya/check-in/(:any)'] = 'user/event/check_in/$1';
$route['member/event-saya/laporan-check-in'] = 'user/event/laporan_check_in';
$route['member/event-saya/edit-event/(:any)'] = 'user/event/edit/$1';
$route['member/tiket-saya'] = 'user/tiket';
$route['member/tiket-saya/cetak-tiket/(:any)'] = 'user/tiket/cetak_tiket/$1';
$route['member/profil/informasi-dasar'] = 'user/profil/informasi_dasar';
$route['member/profil/ubah-password'] = 'user/profil/ubah_password';
$route['member/profil/informasi-legal'] = 'user/profil/informasi_legal';
$route['logout-member'] = 'login/logout_member';
$route['lupa-password'] = 'lupa_password';
$route['lupa-password/tautan-perubahan'] = 'lupa_password/tautan_perubahan';
$route['lupa-password/perbaharui-password/(:any)'] = 'lupa_password/perbaharui_password/$1';
$route['lupa-password/berhasil-diubah'] = 'lupa_password/berhasil_diubah';
$route['konfirmasi-akun/(:any)'] = 'register/konfirmasi_akun/$1';
// member

// pengunjung
$route['default_controller'] = 'beranda';
$route['acara/(:any)'] = 'detail/detail/$1';
$route['invoice/(:any)'] = 'invoice/detail/$1';
$route['beli-tiket'] = 'beli_tiket';
$route['kategori-event/semua-kategori'] = 'kategori_event';
$route['kategori-event/(:any)'] = 'kategori_event/klasifikasi/$1';
$route['buat-event'] = 'buat_event';
$route['tentang-kami'] = 'about';
$route['kebijakan-privasi'] = 'kebijakan_privasi';
$route['hubungi-kami'] = 'hubungi_kami';
// pengunjung

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
