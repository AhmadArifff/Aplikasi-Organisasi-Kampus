<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'LoginControllers::index');
$routes->get('/', 'LoginControllers::index');
$routes->match(['get', 'post'], 'login', 'LoginControllers::login', ["filter" => "noauth"]);
$routes->get('/select', 'DependentDropdownController::index');
$routes->post('AdminControllers/Kabupaten', 'AdminControllers::Kabupaten');
$routes->post('AdminControllers/Kecamatan', 'AdminControllers::Kecamatan');
$routes->post('AdminControllers/HargaPackaging', 'AdminControllers::HargaPackaging');
// $routes->get('AdminControllers/ShowItemBarang', 'AdminControllers::ShowItemBarang');
// $routes->post('AdminControllers/ShowItemBarang', 'AdminControllers::ShowItemBarang');
$routes->post('AdminControllers/myFunction', 'AdminControllers::myFunction');
$routes->post('AdminControllers/PaketCicilan', 'AdminControllers::PaketCicilan');
$routes->post('AdminControllers/PaketLogCicilan', 'AdminControllers::PaketLogCicilan');
$routes->post('AdminControllers/TotalHarga', 'AdminControllers::TotalHarga');
$routes->post('AdminControllers/ShowPayperiode', 'AdminControllers::ShowPayperiode');
$routes->post('CoordinatorControllers/PaketLogCicilan', 'CoordinatorControllers::PaketLogCicilan');
$routes->post('CoordinatorControllers/ShowPayperiode', 'CoordinatorControllers::ShowPayperiode');
$routes->post('CoordinatorControllers/Kabupaten', 'CoordinatorControllers::Kabupaten');
$routes->post('CoordinatorControllers/Kecamatan', 'CoordinatorControllers::Kecamatan');
//admin Routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    //Dashboard
    $routes->get("dashboard", "AdminControllers::index");
    //Register User
    $routes->get('databaseuser/datauser', 'AdminControllers::listdatauser');
    $routes->get('databaseuser/registeruser', 'AdminControllers::registeruser');
    $routes->post('databaseuser/registeruser/process', 'AdminControllers::registeruserprocess');
    $routes->add('databaseuser/datauser/(:segment)/edit', 'AdminControllers::edituser/$1');
    $routes->get('databaseuser/datauser/(:segment)/delete', 'AdminControllers::deleteuser/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexceluser', 'AdminControllers::ImportFileExcelUser');
    $routes->get('admincontrollers/exportfileexceluser', 'AdminControllers::ExportDataExcelUser');
    $routes->get('admincontrollers/exporttemplatefileexceluser', 'AdminControllers::ExportTemplateDataExcelUser');
    // Export By TGL
    $routes->post('export-data-excel', 'AdminControllers::exportDataExcelUserByTGL');
    // $routes->post('admin/export-data-excel', 'AdminControllers::exportDataExcel');


    //Register Data Item Barang 
    $routes->get('databasebarang/dataitembarang', 'AdminControllers::listdataitembarang');
    $routes->get('databasebarang/itembarang', 'AdminControllers::itembarang');
    $routes->post('databasebarang/itembarang/process', 'AdminControllers::itembarangprocess');
    $routes->add('databasebarang/itembarang/(:segment)/edit', 'AdminControllers::edititembarang/$1');
    $routes->get('databasebarang/itembarang/(:segment)/delete', 'AdminControllers::deleteitembarang/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexcelitembarang', 'AdminControllers::ImportFileExcelitembarang');
    $routes->get('admincontrollers/exportfileexcelitembarang', 'AdminControllers::ExportDataExcelitembarang');
    $routes->get('admincontrollers/exporttemplatefileexcelitembarang', 'AdminControllers::ExportTemplateDataExcelitembarang');
    //Register Data Packing Barang 
    $routes->get('databasebarang/datapackagingbarang', 'AdminControllers::listdatapackingbarang');
    $routes->get('databasebarang/packagingbarang', 'AdminControllers::packingbarang');
    $routes->post('databasebarang/packagingbarang/process', 'AdminControllers::packingbarangprocess');
    $routes->add('databasebarang/packagingbarang/(:segment)/edit', 'AdminControllers::editpackingbarang/$1');
    $routes->get('databasebarang/packagingbarang/(:segment)/delete', 'AdminControllers::deletepackingbarang/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexcelpackagingbarang', 'AdminControllers::ImportFileExcelpackingbarang');
    $routes->get('admincontrollers/exportfileexcelpackagingbarang', 'AdminControllers::ExportDataExcelpackingbarang');
    $routes->get('admincontrollers/exporttemplatefileexcelpackagingbarang', 'AdminControllers::ExportTemplateDataExcelpackingbarang');
    //Register Data Paket Barang 
    $routes->get('databasebarang/datapaketbarang', 'AdminControllers::listdatapaketbarang');
    $routes->get('databasebarang/paketbarang', 'AdminControllers::paketbarang');
    $routes->post('databasebarang/paketbarang/process', 'AdminControllers::paketbarangprocess');
    $routes->add('databasebarang/paketbarang/(:segment)/edit', 'AdminControllers::editpaketbarang/$1');
    $routes->get('databasebarang/paketbarang/(:segment)/delete', 'AdminControllers::deletepaketbarang/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexcelpaketbarang', 'AdminControllers::ImportFileExcelpaketbarang');
    $routes->get('admincontrollers/exportfileexcelpaketbarang', 'AdminControllers::ExportDataExcelpaketbarang');


    //Register Data Periode Pembayaran
    $routes->get('datatransaksi/dataperiodepembayaran', 'AdminControllers::listdataperiodepembayaran');
    $routes->get('datatransaksi/periodepembayaran', 'AdminControllers::periodepembayaran');
    $routes->post('datatransaksi/periodepembayaran/process', 'AdminControllers::periodepembayaranprocess');
    $routes->add('datatransaksi/periodepembayaran/(:segment)/edit', 'AdminControllers::editperiodepembayaran/$1');
    $routes->get('datatransaksi/periodepembayaran/(:segment)/delete', 'AdminControllers::deleteperiodepembayaran/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexcelperiodepembayaran', 'AdminControllers::ImportFileExcelperiodepembayaran');
    $routes->get('admincontrollers/exportfileexcelperiodepembayaran', 'AdminControllers::ExportDataExcelperiodepembayaran');
    $routes->get('admincontrollers/exporttemplatefileexcelperiodepembayaran', 'AdminControllers::ExportTemplateDataExcelperiodepembayaran');
    //Register Data transaksi Pembayaran
    $routes->get('datatransaksi/datatransaksi', 'AdminControllers::listdatatransaksi');
    $routes->get('datatransaksi/transaksi', 'AdminControllers::transaksi');
    $routes->post('datatransaksi/transaksi/process', 'AdminControllers::transaksiprocess');
    $routes->add('datatransaksi/transaksi/(:segment)/edit', 'AdminControllers::edittransaksi/$1');
    $routes->add('datatransaksi/approvedtransaksi/(:segment)/approved', 'AdminControllers::editapprovedtransaksi/$1');
    $routes->add('datatransaksi/noapprovedtransaksi/(:segment)/noapproved', 'AdminControllers::editnoapprovedtransaksi/$1');
    $routes->get('datatransaksi/transaksi/(:segment)/delete', 'AdminControllers::deletetransaksi/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexceltransaksi', 'AdminControllers::ImportFileExceltransaksi');
    $routes->get('admincontrollers/exportfileexceltransaksi', 'AdminControllers::ExportDataExceltransaksi');
    $routes->get('admincontrollers/exporttemplatefileexceltransaksi', 'AdminControllers::ExportTemplateDataExceltransaksi');
    //Register Data Cicilan Pembayaran
    $routes->get('datatransaksi/datacicilan', 'AdminControllers::listdatacicilan');
    $routes->get('datatransaksi/cicilan', 'AdminControllers::cicilan');
    $routes->post('datatransaksi/cicilan/process', 'AdminControllers::cicilanprocess');
    $routes->add('datatransaksi/cicilan/(:segment)/edit', 'AdminControllers::editcicilan/$1');
    $routes->get('datatransaksi/cicilan/(:segment)/delete', 'AdminControllers::deletecicilan/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexcelcicilan', 'AdminControllers::ImportFileExcelcicilan');
    $routes->get('admincontrollers/exportfileexcelcicilan', 'AdminControllers::ExportDataExcelcicilan');
    //Register Data Log Cicilan Pembayaran
    $routes->get('datatransaksi/datalogcicilan', 'AdminControllers::listdatalogcicilan');
    $routes->get('datatransaksi/logcicilan', 'AdminControllers::logcicilan');
    $routes->post('datatransaksi/logcicilan/process', 'AdminControllers::logcicilanprocess');
    $routes->add('datatransaksi/logcicilan/(:segment)/edit', 'AdminControllers::editlogcicilan/$1');
    $routes->get('datatransaksi/logcicilan/(:segment)/delete', 'AdminControllers::deletelogcicilan/$1');
    $routes->match(['get', 'post'], 'admincontrollers/importfileexcellogcicilan', 'AdminControllers::ImportFileExcellogcicilan');
    $routes->get('admincontrollers/exportfileexcellogcicilan', 'AdminControllers::ExportDataExcellogcicilan');
    $routes->add('datalogcicilan/approvedlogcicilan/(:segment)/approved', 'AdminControllers::editapprovedlogcicilan/$1');
    $routes->add('datalogcicilan/noapprovedlogcicilan/(:segment)/noapproved', 'AdminControllers::editnoapprovedlogcicilan/$1');
    //logout
    $routes->get('logout', 'LoginControllers::logout');
});

// Rest API Data User
// $routes->resource('databaseuser/datauser/rest', ['controller' => 'RestApiCoordinator']); //sesuai controller mencangkup CRUD 
$routes->get('databaseuser/datauser/rest', 'RestApiCoordinator::listdatauser');
$routes->post('databaseuser/registeruser/process/rest', 'RestApiCoordinator::registeruserprocess');
$routes->put('databaseuser/datauser/(:num)/edit/rest', 'RestApiCoordinator::edituser/$1');
$routes->delete('databaseuser/datauser/(:num)/delete/rest', 'RestApiCoordinator::deleteuser/$1');
// Rest API Data Transaksi
$routes->get('datatransaksi/datatransaksi/rest', 'RestApiCoordinator::listdatatransaksi');
$routes->post('datatransaksi/transaksi/process/rest', 'RestApiCoordinator::transaksiprocess');
$routes->delete('datatransaksi/transaksi/(:num)/delete/rest', 'RestApiCoordinator::deletetransaksi/$1');
// Rest API Data Transaksi Cicilan
$routes->get('datatransaksi/cicilan/rest', 'RestApiCoordinator::listdatacicilan');
$routes->delete('datatransaksi/cicilan/(:num)/delete/rest', 'RestApiCoordinator::deletecicilan/$1');
// Rest API Data Transaksi Log Cicilan
$routes->get('datatransaksi/datalogcicilan/rest', 'RestApiCoordinator::listdatalogcicilan');
$routes->post('datatransaksi/logcicilan/process/rest', 'RestApiCoordinator::logcicilanprocess');
$routes->delete('datatransaksi/logcicilan/(:num)/delete/rest', 'RestApiCoordinator::deletelogcicilan/$1');
//coordinator Routes
$routes->group("coordinator", ["filter" => "auth"], function ($routes) {
    $routes->get("dashboard", "CoordinatorControllers::index");
    //Register User
    $routes->get('databaseuser/datauser', 'CoordinatorControllers::listdatauser');
    $routes->get('databaseuser/registeruser', 'CoordinatorControllers::registeruser');
    $routes->post('databaseuser/registeruser/process', 'CoordinatorControllers::registeruserprocess');
    $routes->add('databaseuser/datauser/(:segment)/edit', 'CoordinatorControllers::edituser/$1');
    $routes->get('databaseuser/datauser/(:segment)/delete', 'CoordinatorControllers::deleteuser/$1');
    $routes->match(['get', 'post'], 'coordinatorcontrollers/importfileexceluser', 'CoordinatorControllers::ImportFileExcelUser');
    $routes->get('coordinatorcontrollers/exportfileexceluser', 'CoordinatorControllers::ExportDataExcelUser');
    $routes->get('coordinatorcontrollers/exporttemplatefileexceluser', 'CoordinatorControllers::ExportTemplateDataExcelUser');
    //Register Data transaksi Pembayaran
    $routes->get('datatransaksi/datatransaksi', 'CoordinatorControllers::listdatatransaksi');
    $routes->get('datatransaksi/transaksi', 'CoordinatorControllers::transaksi');
    $routes->post('datatransaksi/transaksi/process', 'CoordinatorControllers::transaksiprocess');
    $routes->add('datatransaksi/transaksi/(:segment)/edit', 'CoordinatorControllers::edittransaksi/$1');
    $routes->add('datatransaksi/approvedtransaksi/(:segment)/approved', 'CoordinatorControllers::editapprovedtransaksi/$1');
    $routes->add('datatransaksi/noapprovedtransaksi/(:segment)/noapproved', 'CoordinatorControllers::editnoapprovedtransaksi/$1');
    $routes->get('datatransaksi/transaksi/(:segment)/delete', 'CoordinatorControllers::deletetransaksi/$1');
    $routes->match(['get', 'post'], 'coordinatorcontrollers/importfileexceltransaksi', 'CoordinatorControllers::ImportFileExceltransaksi');
    $routes->get('coordinatorcontrollers/exportfileexceltransaksi', 'CoordinatorControllers::ExportDataExceltransaksi');
    $routes->get('coordinatorcontrollers/exporttemplatefileexceltransaksi', 'CoordinatorControllers::ExportTemplateDataExceltransaksi');
    //Register Data Cicilan Pembayaran
    $routes->get('datatransaksi/datacicilan', 'CoordinatorControllers::listdatacicilan');
    $routes->get('datatransaksi/cicilan', 'CoordinatorControllers::cicilan');
    $routes->post('datatransaksi/cicilan/process', 'CoordinatorControllers::cicilanprocess');
    $routes->add('datatransaksi/cicilan/(:segment)/edit', 'CoordinatorControllers::editcicilan/$1');
    $routes->get('datatransaksi/cicilan/(:segment)/delete', 'CoordinatorControllers::deletecicilan/$1');
    $routes->match(['get', 'post'], 'coordinatorcontrollers/importfileexcelcicilan', 'CoordinatorControllers::ImportFileExcelcicilan');
    $routes->get('coordinatorcontrollers/exportfileexcelcicilan', 'CoordinatorControllers::ExportDataExcelcicilan');
    //Register Data Log Cicilan Pembayaran
    $routes->get('datatransaksi/datalogcicilan', 'CoordinatorControllers::listdatalogcicilan');
    $routes->get('datatransaksi/logcicilan', 'CoordinatorControllers::logcicilan');
    $routes->post('datatransaksi/logcicilan/process', 'CoordinatorControllers::logcicilanprocess');
    $routes->add('datatransaksi/logcicilan/(:segment)/edit', 'CoordinatorControllers::editlogcicilan/$1');
    $routes->get('datatransaksi/logcicilan/(:segment)/delete', 'CoordinatorControllers::deletelogcicilan/$1');
    $routes->match(['get', 'post'], 'coordinatorcontrollers/importfileexcellogcicilan', 'CoordinatorControllers::ImportFileExcellogcicilan');
    $routes->get('coordinatorcontrollers/exportfileexcellogcicilan', 'CoordinatorControllers::ExportDataExcellogcicilan');
    $routes->get('logout', 'LoginControllers::logout');
    $routes->get('datauser', ["RESTAPI_CoordinatorControllers" => "getdatauser"]);
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
