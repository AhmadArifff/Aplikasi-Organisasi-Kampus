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
//admin Routes
$routes->group("SuperAdmin", ["filter" => "auth"], function ($routes) {
    //Dashboard
    $routes->get("dashboard", "SuperAdminControllers::dashboard");
    //Register User
    $routes->get('datauser', 'SuperAdminControllers::listdatauser');
    $routes->get('datauser/registeruser', 'SuperAdminControllers::registeruser');
    $routes->post('datauser/registeruser/process', 'SuperAdminControllers::registeruserprocess');
    $routes->add('datauser/(:segment)/edit', 'SuperAdminControllers::edituser/$1');
    $routes->get('datauser/(:segment)/delete', 'SuperAdminControllers::deleteuser/$1');
    //Register Fakultas
    $routes->get('datafakultas', 'SuperAdminControllers::listdatafakultas');
    $routes->get('datafakultas/registerfakultas', 'SuperAdminControllers::registerfakultas');
    $routes->post('datafakultas/registerfakultas/process', 'SuperAdminControllers::registerfakultasprocess');
    $routes->add('datafakultas/(:segment)/edit', 'SuperAdminControllers::editfakultas/$1');
    $routes->get('datafakultas/(:segment)/delete', 'SuperAdminControllers::deletefakultas/$1');
    //Register LK/OK
    $routes->get('dataLK-OK', 'SuperAdminControllers::listdataLKOK');
    $routes->get('dataLK-OK/registerLK-OK', 'SuperAdminControllers::registerLKOK');
    $routes->post('dataLK-OK/registerLK-OK/process', 'SuperAdminControllers::registerLKOKprocess');
    $routes->add('dataLK-OK/(:segment)/edit', 'SuperAdminControllers::editLKOK/$1');
    $routes->get('dataLK-OK/(:segment)/delete', 'SuperAdminControllers::deleteLKOK/$1');
    //Register Anggota LK/OK
    $routes->get('dataanggotaLK-OK', 'SuperAdminControllers::listdataanggotaLKOK');
    $routes->get('dataanggotaLK-OK/registeranggotaLK-OK', 'SuperAdminControllers::registeranggotaLKOK');
    $routes->post('dataanggotaLK-OK/registeranggotaLK-OK/process', 'SuperAdminControllers::registeranggotaLKOKprocess');
    $routes->add('dataanggotaLK-OK/(:segment)/edit', 'SuperAdminControllers::editanggotaLKOK/$1');
    $routes->get('dataLK-OK/(:segment)/delete', 'SuperAdminControllers::deleteanggotaLKOK/$1');
    //Register Event
    $routes->get('dataevent', 'SuperAdminControllers::listdataevent');
    $routes->get('dataevent/registerevent', 'SuperAdminControllers::registerevent');
    $routes->post('dataevent/registerevent/process', 'SuperAdminControllers::registereventprocess');
    $routes->add('dataevent/(:segment)/edit', 'SuperAdminControllers::editevent/$1');
    $routes->get('dataevent/(:segment)/delete', 'SuperAdminControllers::deleteevent/$1');
    //logout
    $routes->get('logout', 'LoginControllers::logout');
});
$routes->group("AdminLK/OK", ["filter" => "auth"], function ($routes) {
    //Dashboard
    $routes->get("dashboard", "AdminControllers::dashboard");
    //Register User
    $routes->get('datauser', 'AdminControllers::listdatauser');
    $routes->get('datauser/registeruser', 'AdminControllers::registeruser');
    $routes->post('datauser/registeruser/process', 'AdminControllers::registeruserprocess');
    $routes->add('datauser/(:segment)/edit', 'AdminControllers::edituser/$1');
    $routes->get('datauser/(:segment)/delete', 'AdminControllers::deleteuser/$1');
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
$routes->group("Mahasiswa", ["filter" => "auth"], function ($routes) {
    $routes->get("dashboard", "MahasiswaControllers::dashboard");
    //Register User
    $routes->get('databaseuser/datauser', 'MahasiswaControllers::listdatauser');
    $routes->get('databaseuser/registeruser', 'MahasiswaControllers::registeruser');
    $routes->post('databaseuser/registeruser/process', 'MahasiswaControllers::registeruserprocess');
    $routes->add('databaseuser/datauser/(:segment)/edit', 'MahasiswaControllers::edituser/$1');
    $routes->get('databaseuser/datauser/(:segment)/delete', 'MahasiswaControllers::deleteuser/$1');
    $routes->match(['get', 'post'], 'coordinatorcontrollers/importfileexceluser', 'MahasiswaControllers::ImportFileExcelUser');
    $routes->get('coordinatorcontrollers/exportfileexceluser', 'MahasiswaControllers::ExportDataExcelUser');
    $routes->get('coordinatorcontrollers/exporttemplatefileexceluser', 'MahasiswaControllers::ExportTemplateDataExcelUser');
    //Register Data transaksi Pembayaran
    $routes->get('datatransaksi/datatransaksi', 'MahasiswaControllers::listdatatransaksi');
    $routes->get('datatransaksi/transaksi', 'MahasiswaControllers::transaksi');
    $routes->post('datatransaksi/transaksi/process', 'MahasiswaControllers::transaksiprocess');
    $routes->add('datatransaksi/transaksi/(:segment)/edit', 'MahasiswaControllers::edittransaksi/$1');
    $routes->add('datatransaksi/approvedtransaksi/(:segment)/approved', 'MahasiswaControllers::editapprovedtransaksi/$1');
    $routes->add('datatransaksi/noapprovedtransaksi/(:segment)/noapproved', 'MahasiswaControllers::editnoapprovedtransaksi/$1');
    $routes->get('datatransaksi/transaksi/(:segment)/delete', 'MahasiswaControllers::deletetransaksi/$1');
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
