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
    $routes->get("dashboard", "SuperAdminControllers::dashboard");
    $routes->get("viewevent", "SuperAdminControllers::viewevent");
    // $routes->get("morelkok", "SuperAdminControllers::morelkok");
    $routes->add("morelkok/(:segment)", "SuperAdminControllers::morelkok/$1");
    $routes->add("morelkok/visi/(:segment)", "SuperAdminControllers::visi/$1");
    $routes->add("morelkok/misi/(:segment)", "SuperAdminControllers::misi/$1");
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
    $routes->get('dataanggotaLK-OK/(:segment)/delete', 'SuperAdminControllers::deleteanggotaLKOK/$1');
    //Register Event
    $routes->get('dataevent', 'SuperAdminControllers::listdataevent');
    $routes->get('dataevent/registerevent', 'SuperAdminControllers::registerevent');
    $routes->post('dataevent/registerevent/process', 'SuperAdminControllers::registereventprocess');
    $routes->add('dataevent/(:segment)/edit', 'SuperAdminControllers::editevent/$1');
    $routes->get('dataevent/(:segment)/delete', 'SuperAdminControllers::deleteevent/$1');
    //Approve check
    $routes->add('dataevent/approved/(:segment)', 'SuperAdminControllers::approved/$1');
    //logout
    $routes->get('logout', 'LoginControllers::logout');
});
$routes->group("AdminLK-OK", ["filter" => "auth"], function ($routes) {
    //Dashboard
    $routes->get("dashboard", "AdminControllers::dashboard");
    $routes->get("viewevent", "AdminControllers::viewevent");
    // $routes->get("morelkok", "AdminControllers::morelkok");
    $routes->add("morelkok/(:segment)", "AdminControllers::morelkok/$1");
    //Register LK/OK
    $routes->get('dataLK-OK', 'AdminControllers::listdataLKOK');
    //Register Anggota LK/OK
    $routes->get('dataanggotaLK-OK', 'AdminControllers::listdataanggotaLKOK');
    $routes->get('dataanggotaLK-OK/registeranggotaLK-OK', 'AdminControllers::registeranggotaLKOK');
    $routes->post('dataanggotaLK-OK/registeranggotaLK-OK/process', 'AdminControllers::registeranggotaLKOKprocess');
    $routes->add('dataanggotaLK-OK/(:segment)/edit', 'AdminControllers::editanggotaLKOK/$1');
    $routes->get('dataanggotaLK-OK/(:segment)/delete', 'AdminControllers::deleteanggotaLKOK/$1');
    //Register Event
    $routes->get('dataevent', 'AdminControllers::listdataevent');
    $routes->get('dataevent/registerevent', 'AdminControllers::registerevent');
    $routes->post('dataevent/registerevent/process', 'AdminControllers::registereventprocess');
    $routes->add('dataevent/(:segment)/edit', 'AdminControllers::editevent/$1');
    $routes->get('dataevent/(:segment)/delete', 'AdminControllers::deleteevent/$1');
    //logout
    $routes->get('logout', 'LoginControllers::logout');
});
//coordinator Routes
$routes->group("Mahasiswa", ["filter" => "auth"], function ($routes) {
    $routes->get("dashboard", "MahasiswaControllers::dashboard");
    // $routes->get("morelkok", "MahasiswaControllers::morelkok");
    $routes->add("morelkok/(:segment)", "MahasiswaControllers::morelkok/$1");
    //Register Anggota LK/OK
    $routes->get('dataLK-OK', 'MahasiswaControllers::listdataLKOK');
    //Register Event
    $routes->get('dataevent', 'MahasiswaControllers::listdataevent');
    $routes->get('logout', 'LoginControllers::logout');
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
