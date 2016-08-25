<?php
/*
 * Services URL
 */

define("URL_OTENTIFIKASI_LOGIN", "service/otentifikasi/login.php" );
define("URL_OTENTIFIKASI_LOGOUT", "service/otentifikasi/logout.php" );
define("URL_USERPROFILE", "application/user/profile.php" );
define("URL_USERPROFILE_CHANGEPASSWORD", "application/user/changepassword.php" );
define("URL_USERPROFILE_FAVORITES", "application/user/favorites.php" );
define("URL_MENU_FAVORITES", "service/user/favorites/listall.php" );
define("URL_EXEC_IDMENU", "application/Menu/geturlbyidmenu.php" );
define("URL_MAIN_REFRESH", "service/menu/getrootid.php" );
define("URL_PROFILE_SAVE", "service/user/profile/saveprofile.php" );
define("URL_CHANGEPASSWORD_SAVE", "service/user/changepassword/savechangepassword.php" );

define("URL_KATEGORI_INSERT", "service/master/md01/insert.php" );
define("URL_KATEGORI_EDIT", "service/master/md01/edit.php" );
define("URL_KATEGORI_DELETE", "service/master/md01/delete.php" );
define("URL_KATEGORI_LIST", "service/master/md01/list.php" );

define("URL_INV01_INSERT", "service/inventory/inv01/insert.php" );
define("URL_INV01_EDIT", "service/inventory/inv01/edit.php" );
define("URL_INV01_DELETE", "service/inventory/inv01/delete.php" );
define("URL_INV01_LIST", "service/inventory/inv01/list.php" );
define("URL_INV01_APPROVE", "service/inventory/inv01/approve.php" );

define("URL_INV01_DETAIL_INSERT", "service/inventory/inv01/insert_detail.php" );
define("URL_INV01_DETAIL_EDIT", "service/inventory/inv01/edit_detail.php" );
define("URL_INV01_DETAIL_DELETE", "service/inventory/inv01/delete_detail.php" );
define("URL_INV01_DETAIL_LIST", "service/inventory/inv01/list_detail.php" );
define("URL_INV01_DETAIL_CHANGEVALUE", "service/inventory/inv01/changevalue_detail.php" );

define("URL_inv02_LIST", "service/inventory/inv02/list.php" );

/*
 * SETTING MENU
 */
define("URL_MN01_LIST", "service/menu/mn01/list.php" );
define("URL_MN01_INSERT", "service/menu/mn01/insert.php" );
define("URL_MN01_EDIT", "service/menu/mn01/edit.php" );
define("URL_MN01_DELETE", "service/menu/mn01/delete.php" );

define("URL_MN02_LIST", "service/menu/mn02/list.php" );
define("URL_MN02_INSERT", "service/menu/mn02/insert.php" );
define("URL_MN02_EDIT", "service/menu/mn02/edit.php" );
define("URL_MN02_DELETE", "service/menu/mn02/delete.php" );
define("URL_MN02_LOADMENU", "service/menu/mn02/loadmenu.php" );

define("URL_ROOTID", "service/menu/getrootid.php" );
define("URL_LOADMENU", "service/menu/mn02/loadmenu.php" );

define("URL_MN03_LIST", "service/menu/mn03/list.php" );
define("URL_MN03_LISTD", "service/menu/mn03/listd.php" );
define("URL_MN03_INSERT", "service/menu/mn03/insert.php" );
define("URL_MN03_INSERTD", "service/menu/mn03/insertd.php" );
define("URL_MN03_EDIT", "service/menu/mn03/edit.php" );
define("URL_MN03_DELETE", "service/menu/mn03/delete.php" );
define("URL_MN03_DELETED", "service/menu/mn03/deleted.php" );
define("URL_MN03_LOADMENU", "service/menu/mn03/loadmenu.php" );
define("URL_MN03_LOADGROUPMENU", "service/menu/mn03/loadgroupmenu.php" );

/*
 * COMBO GRID
 */
define("URL_COMBO_THEME_LOAD", "service/combogrid/theme.php" );
define("URL_COMBO_PATRUN_LOAD", "service/combogrid/patrun.php" );
define("URL_COMBO_PRODUCT_LOAD", "service/combogrid/product.php" );
define("URL_COMBO_SATUAN_LOAD", "service/combogrid/satuan.php" );
define("URL_COMBO_SEASON_LOAD", "service/combogrid/season.php" );
define("URL_COMBO_SUPPLIER_LOAD", "service/combogrid/supplier.php" );
define("URL_COMBO_TOP_LOAD", "service/combogrid/top.php" );
define("URL_COMBO_WAREHOUSE_LOAD", "service/combogrid/warehouse.php" );
define("URL_COMBO_TCODE_LOAD", "service/combogrid/tcode.php" );

/*
 * PCARE
 */
define("URL_PCARE", "service/pcare/index.php" );
define("URL_PCARE_EXPORT", "service/pcare/export.php" );

?>