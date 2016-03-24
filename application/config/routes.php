<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home/index';
$route['home'] = 'home/index';


/*admin*/
$route['login'] = 'root/Login/index';
$route['check_login'] = 'root/Login/aksi_login';
$route['dashbord'] = 'root/Post/kemeja';
$route['logout'] = 'root/Login/logout';
$route['tambah'] = 'root/produk/index';

// ============================== start Laki2 =================================//
$route['kemeja'] = 'root/Post/kemeja';
$route['add_kemeja'] = 'root/Post/action_kemeja';

$route['blazer'] = 'root/Post/blazer';
$route['add_blazer'] = 'root/Post/action_blazer';

$route['celana'] = 'root/Post/celana';
$route['add_celana'] = 'root/Post/action_celana';

$route['kaos'] = 'root/Post/kaos';
$route['add_kaos'] = 'root/Post/action_kaos';

$route['jaket'] = 'root/Post/jaket';
$route['add_jaket'] = 'root/Post/action_jaket';

$route['topi'] = 'root/Post/topi';
$route['add_topi'] = 'root/Post/action_topi';

$route['sepatu'] = 'root/Post/sepatu';
$route['add_sepatu'] = 'root/Post/action_sepatu';
// ============================== End Laki2 =================================//

// ============================== Start Wanita =================================//
$route['wanita_celana'] = 'root/wanita/Wanita_celana/wanita_celana';
$route['wanita_add_celana'] = 'root/wanita/Wanita_celana/action_Celana';
$route['wanita_edit_celana'] = 'root/wanita/Wanita_celana/action_edit_celana';

$route['wanita_gamis'] = 'root/wanita/Wanita_gamis/wanita_gamis';
$route['wanita_add_gamis'] = 'root/wanita/Wanita_gamis/action_gamis';
$route['wanita_edit_gamis'] = 'root/wanita/Wanita_gamis/action_edit_gamis';


$route['wanita_jaket'] = 'root/wanita/Wanita_jaket/wanita_jaket';
$route['wanita_add_jaket'] = 'root/wanita/Wanita_jaket/action_jaket';
$route['wanita_edit_jaket'] = 'root/wanita/Wanita_jaket/action_edit_jaket';


$route['wanita_atasan'] = 'root/wanita/Wanita_atasan/wanita_atasan';
$route['wanita_add_atasan'] = 'root/wanita/Wanita_atasan/action_atasan';
$route['wanita_edit_atasan'] = 'root/wanita/Wanita_atasan/action_edit_atasan';


$route['wanita_sendal_sepatu'] = 'root/wanita/Wanita_sendal_sepatu/wanita_sendal_sepatu';
$route['wanita_add_sendal_sepatu'] = 'root/wanita/Wanita_sendal_sepatu/action_sendal_sepatu';
$route['wanita_edit_sendal_sepatu'] = 'root/wanita/Wanita_sendal_sepatu/action_edit_sendal_sepatu';


$route['wanita_kerudung'] = 'root/wanita/Wanita_kerudung/wanita_kerudung';
$route['wanita_add_kerudung'] = 'root/wanita/Wanita_kerudung/action_kerudung';
$route['wanita_edit_kerudung'] = 'root/wanita/Wanita_kerudung/action_edit_kerudung';


$route['wanita_kaos'] = 'root/wanita/Wanita_kaos/wanita_kaos';
$route['wanita_add_kaos'] = 'root/wanita/Wanita_kaos/action_kaos';
$route['wanita_edit_kaos'] = 'root/wanita/Wanita_kaos/action_edit_kaos';


$route['wanita_kemeja'] = 'root/wanita/Wanita_kemeja/wanita_kemeja';
$route['wanita_add_kemeja'] = 'root/wanita/Wanita_kemeja/action_kemeja';
$route['wanita_edit_kemeja'] = 'root/wanita/Wanita_kemeja/action_edit_kemeja';
// ============================== end Wanita =================================//

//kategori pria
$route['pria'] = 'kategori/pria';
$route['celana-pria'] = 'kategori/pria_celana';
$route['kemeja-pria'] = 'kategori/pria_kemeja';
$route['blazer-pria'] = 'kategori/pria_blazer';
$route['topi-pria'] = 'kategori/pria_topi';
$route['jaket-pria'] = 'kategori/pria_jaket';
$route['kaos-pria'] = 'kategori/pria_kaos';
$route['jam-tangan-pria'] = 'kategori/pria_jam_tangan';


//kategori wanita
$route['wanita'] = 'kategori/wanita';
$route['celana-wanita'] = 'kategori/wanita_celana';
$route['kemeja-wanita'] = 'kategori/wanita_kemeja';
$route['atasan-wanita'] = 'kategori/wanita_atasan';
$route['kaos-wanita'] = 'kategori/wanita_kaos';
$route['kerudung-wanita'] = 'kategori/wanita_kerudung';
$route['sendal-wanita'] = 'kategori/wanita_sendal';
$route['gamis-wanita'] = 'kategori/wanita_gamis';
$route['jaket-wanita'] = 'kategori/wanita_jaket';


$route['404_override'] = 'Produk Tidak Ditemukan';
$route['translate_uri_dashes'] = FALSE;
