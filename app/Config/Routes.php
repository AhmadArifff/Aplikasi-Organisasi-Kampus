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
// Prodi Select Otomatis
$routes->post('Prodi', 'SuperAdminControllers::Prodi');
$routes->post('ProdiAdmin', 'AdminControllers::Prodi');
//admin Routes
$routes->group("SuperAdmin", ["filter" => "auth"], function ($routes) {
    //Dashboard
    $routes->get("dashboard", "SuperAdminControllers::dashboard", ['as' => 'superadmin.dashboard']);
    // get event by id
    $routes->add('viewevent/(:segment)', 'SuperAdminControllers::vieweventbyid/$1', ['as' => 'superadmin.vieweventbyid']);
    // get event all
    $routes->get("viewevent", "SuperAdminControllers::viewevent", ['as' => 'superadmin.viewevent']);
    // $routes->get("morelkok", "SuperAdminControllers::morelkok");
    $routes->add("morelkok/(:segment)", "SuperAdminControllers::morelkok/$1", ['as' => 'superadmin.morelkok']);
    // Register Visi
    $routes->add("morelkok/visi/(:segment)/edit", "SuperAdminControllers::visiedit/$1", ['as' => 'superadmin.visiedit']);
    $routes->add("morelkok/visi/(:segment)/register", "SuperAdminControllers::visiregister/$1", ['as' => 'superadmin.visiregister']);
    $routes->post("morelkok/visi/registerproses", "SuperAdminControllers::visiregisterproses", ['as' => 'superadmin.visiregisterproses']);
    $routes->get("morelkok/visi/registerproses", "SuperAdminControllers::visiregisterproses");
    // Register Misi
    $routes->add("morelkok/misi/(:segment)/edit", "SuperAdminControllers::misiedit/$1", ['as' => 'superadmin.misiedit']);
    $routes->add("morelkok/misi/(:segment)/register", "SuperAdminControllers::misiregister/$1", ['as' => 'superadmin.misiregister']);
    $routes->post("morelkok/misi/registerproses", "SuperAdminControllers::misiregisterproses", ['as' => 'superadmin.misiregisterproses']);
    $routes->get("morelkok/misi/registerproses", "SuperAdminControllers::misiregisterproses");
    //Register User
    $routes->get('datauser', 'SuperAdminControllers::listdatauser', ['as' => 'superadmin.listdatauser']);
    $routes->get('datauser/registeruser', 'SuperAdminControllers::registeruser', ['as' => 'superadmin.registeruser']);
    $routes->post('datauser/registeruser/process', 'SuperAdminControllers::registeruserprocess', ['as' => 'superadmin.registeruserprocess']);
    $routes->get('datauser/registeruser/process', 'SuperAdminControllers::registeruserprocess');
    $routes->add('datauser/(:segment)/edit', 'SuperAdminControllers::edituser/$1', ['as' => 'superadmin.edituser']);
    $routes->get('datauser/(:segment)/delete', 'SuperAdminControllers::deleteuser/$1', ['as' => 'superadmin.deleteuser']);
    //Register Fakultas
    $routes->get('datafakultas', 'SuperAdminControllers::listdatafakultas', ['as' => 'superadmin.listdatafakultas']);
    $routes->get('datafakultas/registerfakultas', 'SuperAdminControllers::registerfakultas', ['as' => 'superadmin.registerfakultas']);
    $routes->post('datafakultas/registerfakultas/process', 'SuperAdminControllers::registerfakultasprocess', ['as' => 'superadmin.registerfakultasprocess']);
    $routes->get('datafakultas/registerfakultas/process', 'SuperAdminControllers::registerfakultasprocess');
    $routes->add('datafakultas/(:segment)/edit', 'SuperAdminControllers::editfakultas/$1', ['as' => 'superadmin.editfakultas']);
    $routes->get('datafakultas/(:segment)/delete', 'SuperAdminControllers::deletefakultas/$1', ['as' => 'superadmin.deletefakultas']);
    //Register LK/OK
    $routes->get('dataLK-OK', 'SuperAdminControllers::listdataLKOK', ['as' => 'superadmin.listdataLKOK']);
    $routes->get('dataLK-OK/registerLK-OK', 'SuperAdminControllers::registerLKOK', ['as' => 'superadmin.registerLKOK']);
    $routes->post('dataLK-OK/registerLK-OK/process', 'SuperAdminControllers::registerLKOKprocess', ['as' => 'superadmin.registerLKOKprocess']);
    $routes->get('dataLK-OK/registerLK-OK/process', 'SuperAdminControllers::registerLKOKprocess');
    $routes->add('dataLK-OK/(:segment)/edit', 'SuperAdminControllers::editLKOK/$1', ['as' => 'superadmin.editLKOK']);
    $routes->get('dataLK-OK/(:segment)/delete', 'SuperAdminControllers::deleteLKOK/$1', ['as' => 'superadmin.deleteLKOK']);
    //Register Anggota LK/OK
    $routes->get('dataanggotaLK-OK', 'SuperAdminControllers::listdataanggotaLKOK', ['as' => 'superadmin.listdataanggotaLKOK']);
    $routes->get('dataanggotaLK-OK/registeranggotaLK-OK', 'SuperAdminControllers::registeranggotaLKOK', ['as' => 'superadmin.registeranggotaLKOK']);
    $routes->post('dataanggotaLK-OK/registeranggotaLK-OK/process', 'SuperAdminControllers::registeranggotaLKOKprocess', ['as' => 'superadmin.registeranggotaLKOKprocess']);
    $routes->get('dataanggotaLK-OK/registeranggotaLK-OK/process', 'SuperAdminControllers::registeranggotaLKOKprocess');
    $routes->add('dataanggotaLK-OK/(:segment)/edit', 'SuperAdminControllers::editanggotaLKOK/$1', ['as' => 'superadmin.editanggotaLKOK']);
    $routes->get('dataanggotaLK-OK/(:segment)/delete', 'SuperAdminControllers::deleteanggotaLKOK/$1', ['as' => 'superadmin.deleteanggotaLKOK']);
    //Register Event
    $routes->get('dataevent', 'SuperAdminControllers::listdataevent', ['as' => 'superadmin.listdataevent']);
    $routes->get('dataevent/registerevent', 'SuperAdminControllers::registerevent', ['as' => 'superadmin.registerevent']);
    $routes->post('dataevent/registerevent/process', 'SuperAdminControllers::registereventprocess', ['as' => 'superadmin.registereventprocess']);
    $routes->get('dataevent/registerevent/process', 'SuperAdminControllers::registereventprocess');
    $routes->add('dataevent/(:segment)/edit', 'SuperAdminControllers::editevent/$1', ['as' => 'superadmin.editevent']);
    $routes->get('dataevent/(:segment)/delete', 'SuperAdminControllers::deleteevent/$1', ['as' => 'superadmin.deleteevent']);
    //Approve check
    $routes->add('dataevent/approved/(:segment)', 'SuperAdminControllers::approved/$1', ['as' => 'superadmin.approved']);
    //logout
    $routes->get('logout', 'LoginControllers::logout', ['as' => 'superadmin.logout']);
});

$routes->group("AdminLK-OK", ["filter" => "auth"], function ($routes) {
    //Dashboard
    $routes->get("dashboard", "AdminControllers::dashboard", ['as' => 'admin.dashboard']);
    // get event by id
    $routes->add('viewevent/(:segment)', 'AdminControllers::vieweventbyid/$1', ['as' => 'admin.vieweventbyid']);
    // get event all
    $routes->get("viewevent", "AdminControllers::viewevent", ['as' => 'admin.viewevent']);
    // $routes->get("morelkok", "AdminControllers::morelkok");
    $routes->add("morelkok/(:segment)", "AdminControllers::morelkok/$1", ['as' => 'admin.morelkok']);
    // Register Visi
    $routes->add("morelkok/visi/(:segment)/edit", "AdminControllers::visiedit/$1", ['as' => 'admin.visiedit']);
    $routes->add("morelkok/visi/(:segment)/register", "AdminControllers::visiregister/$1", ['as' => 'admin.visiregister']);
    $routes->post("morelkok/visi/registerproses", "AdminControllers::visiregisterproses", ['as' => 'admin.visiregisterproses']);
    $routes->get("morelkok/visi/registerproses", "AdminControllers::visiregisterproses");
    // Register Misi
    $routes->add("morelkok/misi/(:segment)/edit", "AdminControllers::misiedit/$1", ['as' => 'admin.misiedit']);
    $routes->add("morelkok/misi/(:segment)/register", "AdminControllers::misiregister/$1", ['as' => 'admin.misiregister']);
    $routes->post("morelkok/misi/registerproses", "AdminControllers::misiregisterproses", ['as' => 'admin.misiregisterproses']);
    $routes->get("morelkok/misi/registerproses", "AdminControllers::misiregisterproses");
    //Register LK/OK
    $routes->get('dataLK-OK', 'AdminControllers::listdataLKOK', ['as' => 'admin.listdataLKOK']);
    //Register Anggota LK/OK
    $routes->get('dataanggotaLK-OK', 'AdminControllers::listdataanggotaLKOK', ['as' => 'admin.listdataanggotaLKOK']);
    $routes->get('dataanggotaLK-OK/registeranggotaLK-OK', 'AdminControllers::registeranggotaLKOK', ['as' => 'admin.registeranggotaLKOK']);
    $routes->post('dataanggotaLK-OK/registeranggotaLK-OK/process', 'AdminControllers::registeranggotaLKOKprocess', ['as' => 'admin.registeranggotaLKOKprocess']);
    $routes->get('dataanggotaLK-OK/registeranggotaLK-OK/process', 'AdminControllers::registeranggotaLKOKprocess');
    $routes->add('dataanggotaLK-OK/(:segment)/edit', 'AdminControllers::editanggotaLKOK/$1', ['as' => 'admin.editanggotaLKOK']);
    $routes->get('dataanggotaLK-OK/(:segment)/delete', 'AdminControllers::deleteanggotaLKOK/$1', ['as' => 'admin.deleteanggotaLKOK']);
    //Register Event
    $routes->get('dataevent', 'AdminControllers::listdataevent', ['as' => 'admin.listdataevent']);
    $routes->get('dataevent/registerevent', 'AdminControllers::registerevent', ['as' => 'admin.registerevent']);
    $routes->post('dataevent/registerevent/process', 'AdminControllers::registereventprocess', ['as' => 'admin.registereventprocess']);
    $routes->get('dataevent/registerevent/process', 'AdminControllers::registereventprocess');
    $routes->add('dataevent/(:segment)/edit', 'AdminControllers::editevent/$1', ['as' => 'admin.editevent']);
    $routes->get('dataevent/(:segment)/delete', 'AdminControllers::deleteevent/$1', ['as' => 'admin.deleteevent']);
    //logout
    $routes->get('logout', 'LoginControllers::logout', ['as' => 'admin.logout']);
});

//coordinator Routes
$routes->group("Mahasiswa", ["filter" => "auth"], function ($routes) {
    $routes->get("dashboard", "MahasiswaControllers::dashboard", ['as' => 'mahasiswa.dashboard']);
    // $routes->get("morelkok", "MahasiswaControllers::morelkok");
    $routes->add("morelkok/(:segment)", "MahasiswaControllers::morelkok/$1");
    //Register Anggota LK/OK
    $routes->get('dataLK-OK', 'MahasiswaControllers::listdataLKOK', ['as' => 'mahasiswa.listdataLKOK']);
    //Register Event
    $routes->get('dataevent', 'MahasiswaControllers::listdataevent', ['as' => 'mahasiswa.listdataevent']);
    $routes->get('logout', 'LoginControllers::logout', ['as' => 'mahasiswa.logout']);
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
