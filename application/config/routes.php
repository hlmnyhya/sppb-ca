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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'LandingPage';
$route['admin/index'] = 'admin/index';
$route['user/index'] = 'user/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Tampilan Login
$route['login']= 'Login/index';
$route['logout']= 'Login/logout';
$route['login/auth']= 'Login/process_login';

// Profil
$route['profil']= 'Admin/User/Profil';
$route['profil/gudang']= 'GUDANG/User/Profil';
$route['profil/ktu']= 'KTU/User/Profil';
$route['profil/manajer']= 'MANAJER/User/Profil';
$route['profil/users']= 'USERS/User/Profil';

// Dashboard
$route['dashboard']= 'Admin/Dashboard/index';
$route['dashboard_ktu']= 'KTU/Dashboard/index';
$route['dashboard_gudang']= 'GUDANG/Dashboard/index';
$route['dashboard_manajer']= 'MANAJER/Dashboard/index';
$route['dashboard_user']= 'USERS/Dashboard/index';

// Permohonan Admin
$route['permohonan']= 'Admin/Permohonan/index';
$route['tambah_permohonan']= 'Admin/Permohonan/tambah_data_aksi';
$route['tambah_permohonan_item']= 'Admin/Permohonan/tambah_data_aksi_item';
$route['hapus_permohonan/(:any)']= 'Admin/Permohonan/delete_data_aksi_permohonan/$1';
$route['hapus_permohonan_item/(:any)']= 'Admin/Permohonan/delete_data_aksi_permohonan_item/$1';
$route['permohonan/tambah_item/(:any)'] = 'Admin/Permohonan/Tambah_Item/$1';
$route['permohonan/detail/(:any)'] = 'Admin/Permohonan/Detail_Permohonan/$1';
$route['ubah_permohonan/(:any)']= 'Admin/Permohonan/edit_permohonan/$1';
$route['ubah_permohonan_item/(:any)']= 'Admin/Permohonan/edit_permohonan_item/$1';
$route['edit_permohonan']= 'Admin/Permohonan/update_data_aksi';
$route['edit_permohonan_item']= 'Admin/Permohonan/update_data_aksi_item';

// Permohonan Gudang
$route['gudang_permohonan_maintenance']= 'GUDANG/Permohonan/index';
$route['gudang_permohonan_proses']= 'GUDANG/Permohonan/permohonan_proses';
$route['gudang_permohonan_lab']= 'GUDANG/Permohonan/permohonan_lab';
$route['gudang_permohonan_kantor']= 'GUDANG/Permohonan/permohonan_kantor';

// Permohonan Manajer
$route['manajer_permohonan_maintenance']= 'MANAJER/Permohonan/index';
$route['manajer_permohonan_proses']= 'MANAJER/Permohonan/permohonan_proses';
$route['manajer_permohonan_lab']= 'MANAJER/Permohonan/permohonan_lab';
$route['manajer_permohonan_kantor']= 'MANAJER/Permohonan/permohonan_kantor';

// Permohonan KTU
$route['ktu_tambah_permohonan_item']= 'KTU/Permohonan/tambah_data_aksi_item';
$route['ktu_permohonan/tambah_item/(:any)'] = 'KTU/Permohonan/Tambah_Item/$1';
$route['ktu_permohonan/detail/(:any)'] = 'KTU/Permohonan/Detail_Permohonan/$1';
$route['permohonan_maintenance']= 'KTU/Permohonan/index';
$route['permohonan_proses']= 'KTU/Permohonan/permohonan_proses';
$route['permohonan_lab']= 'KTU/Permohonan/permohonan_lab';
$route['permohonan_kantor']= 'KTU/Permohonan/permohonan_kantor';

// Permohonan User
$route['users_permohonan_users']= 'USERS/Permohonan/index';
$route['users_permohonan_users/tambah_item/(:any)'] = 'USERS/Permohonan/Tambah_Item/$1';
$route['users_permohonan_users/detail/(:any)'] = 'USERS/Permohonan/Detail_Permohonan/$1';
$route['users_tambah_permohonan_users']= 'USERS/Permohonan/tambah_data_aksi';
$route['users_tambah_permohonan_item_users']= 'USERS/Permohonan/tambah_data_aksi_item';
$route['users_hapus_permohonan/(:any)']= 'USERS/Permohonan/delete_data_aksi_permohonan/$1';
$route['users_hapus_permohonan_item/(:any)']= 'USERS/Permohonan/delete_data_aksi_permohonan_item/$1';
$route['users_permohonan/tambah_item/(:any)'] = 'USERS/Permohonan/Tambah_Item/$1';
$route['users_permohonan/detail/(:any)'] = 'USERS/Permohonan/Detail_Permohonan/$1';
$route['users_ubah_permohonan/(:any)']= 'USERS/Permohonan/edit_permohonan/$1';
$route['users_ubah_permohonan_item/(:any)']= 'USERS/Permohonan/edit_permohonan_item/$1';
$route['users_edit_permohonan']= 'USERS/Permohonan/update_data_aksi';
$route['users_edit_permohonan_item']= 'USERS/Permohonan/update_data_aksi_item';


// $route['tambah_item']= 'USERS/Item/tambah_data_aksi';
// $route['tambah_sub_item']= 'USERS/Item/tambah_data_aksi';


// Item
$route['item']= 'Admin/Item/index';
$route['tambah_item']= 'Admin/Item/tambah_data_aksi';
$route['edit_item']= 'Admin/Item/update_data_aksi';
$route['hapus_item/(:any)']= 'Admin/Item/delete_data_aksi/$1';
$route['ubah_item/(:any)']= 'Admin/Item/edit_item/$1';

// Sub Item
$route['subitem']= 'Admin/Subitem/index';
$route['tambah_sub_item']= 'Admin/Subitem/tambah_data_aksi';
$route['edit_sub_item']= 'Admin/Subitem/update_data_aksi';
$route['hapus_sub_item/(:any)']= 'Admin/Subitem/delete_data_aksi/$1';
$route['ubah_sub_item/(:any)']= 'Admin/Subitem/edit_sub_item/$1';

// User
$route['user']= 'Admin/User/index';
$route['tambah_user']= 'Admin/User/tambah_data_aksi';
$route['tambah_user_tampil']= 'Admin/User/Tambah_User';
$route['user/detail/(:any)'] = 'Admin/User/Detail_User/$1';
$route['edit_user']= 'Admin/User/update_data_aksi';
$route['hapus_user/(:any)']= 'Admin/User/delete_data_aksi/$1';
$route['ubah_user/(:any)']= 'Admin/User/edit_user/$1';

// Divisi
$route['divisi']= 'Admin/Divisi/index';
$route['tambah_divisi']= 'Admin/Divisi/tambah_data_aksi';
$route['edit_divisi']= 'Admin/Divisi/update_data_aksi';
$route['hapus_divisi/(:any)']= 'Admin/Divisi/delete_data_aksi/$1';
$route['ubah_divisi/(:any)']= 'Admin/Divisi/edit_divisi/$1';

// Print KTU
$route['cetak_ktu/(:any)'] = 'KTU/Print_KTU/cetak_ktu/$1';
// Print Manajer
$route['cetak_manajer/(:any)'] = 'MANAJER/Print_MANAJER/cetak_manajer/$1';
// Print Gudang
$route['cetak_gudang/(:any)'] = 'GUDANG/Print_GUDANG/cetak_gudang/$1';



// Diperiksa KTU
$route['ktu/update_diperiksa_proses/(:num)'] = 'KTU/Permohonan/update_diperiksa_proses/$1';
$route['ktu/update_diperiksa_maintenance/(:num)'] = 'KTU/Permohonan/update_diperiksa_maintenance/$1';
$route['ktu/update_diperiksa_lab/(:num)'] = 'KTU/Permohonan/update_diperiksa_lab/$1';
$route['ktu/update_diperiksa_kantor/(:num)'] = 'KTU/Permohonan/update_diperiksa_kantor/$1';

// Disetujui Manajer
$route['manajer/update_disetujui_proses/(:num)'] = 'MANAJER/Permohonan/update_disetujui_proses/$1';
$route['manajer/update_disetujui_maintenance/(:num)'] = 'MANAJER/Permohonan/update_disetujui_maintenance/$1';
$route['manajer/update_disetujui_lab/(:num)'] = 'MANAJER/Permohonan/update_disetujui_lab/$1';
$route['manajer/update_disetujui_kantor/(:num)'] = 'MANAJER/Permohonan/update_disetujui_kantor/$1';