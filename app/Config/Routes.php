<?php
/**
 * PHP Version 8.2.21
 *
 * @category Routes
 * @package  App
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

use CodeIgniter\Router\RouteCollection;

/**
 * Routes
 *
 * @category Routes
 * @package  App
 * @author   Zilki Pradita <mr.zilkipradita@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     ---
 */

$routes->get('/', 'Home::index');
$routes->post('/login/process', 'Home::doLogin');
$routes->get('/logout', 'Home::logout', ['filter' => 'userAuth']);

$routes->get('dashboard', 'Dashboard::index', ['filter' => 'userAuth']);

$routes->get('userlevel', 'UserLevel::index', ['filter' => 'userAuth']);
$routes->get('userlevel/edit/(:any)', 'UserLevel::edit/$1', ['filter' => 'userAuth']);
$routes->get('userlevel/edit', 'UserLevel::index', ['filter' => 'userAuth']);
$routes->post('userlevel/update', 'UserLevel::update', ['filter' => 'userAuth']);
$routes->get('userlevel/json', 'UserLevel::json', ['filter' => 'userAuth']);

$routes->get('user', 'User::index', ['filter' => 'userAuth']);
$routes->get('user/edit/(:any)', 'User::edit/$1', ['filter' => 'userAuth']);
$routes->get('user/edit', 'User::index', ['filter' => 'userAuth']);
$routes->post('user/update', 'User::update', ['filter' => 'userAuth']);
$routes->get('user/delete/(:any)', 'User::delete/$1', ['filter' => 'userAuth']);
$routes->get('user/delete', 'User::index', ['filter' => 'userAuth']);
$routes->post('user/save', 'User::save', ['filter' => 'userAuth']);
$routes->get('user/add', 'User::add', ['filter' => 'userAuth']);
$routes->get('user/json', 'user::json', ['filter' => 'userAuth']);

$routes->get('barang', 'Barang::index', ['filter' => 'userAuth']);
$routes->get('barang/edit/(:any)', 'Barang::edit/$1', ['filter' => 'userAuth']);
$routes->get('barang/edit', 'Barang::index', ['filter' => 'userAuth']);
$routes->post('barang/update', 'Barang::update', ['filter' => 'userAuth']);
$routes->get('barang/delete/(:any)', 'Barang::delete/$1', ['filter' => 'userAuth']);
$routes->get('barang/delete', 'Barang::index', ['filter' => 'userAuth']);
$routes->post('barang/save', 'Barang::save', ['filter' => 'userAuth']);
$routes->get('barang/add', 'Barang::add', ['filter' => 'userAuth']);
$routes->get('barang/json', 'Barang::json', ['filter' => 'userAuth']);

$routes->get('transaksi', 'Transaksi::index', ['filter' => 'userAuth']);
$routes->get('transaksi/edit/(:any)', 'Transaksi::edit/$1', ['filter' => 'userAuth']);
$routes->get('transaksi/edit', 'Transaksi::index', ['filter' => 'userAuth']);
$routes->post('transaksi/update', 'Transaksi::update', ['filter' => 'userAuth']);
$routes->get('transaksi/delete/(:any)', 'Transaksi::delete/$1', ['filter' => 'userAuth']);
$routes->get('transaksi/deleteDetail/(:any)/(:any)', 'Transaksi::deleteDetail/$1/$2', ['filter' => 'userAuth']);
$routes->get('transaksi/delete', 'Transaksi::index', ['filter' => 'userAuth']);
$routes->post('transaksi/save', 'Transaksi::save', ['filter' => 'userAuth']);
$routes->post('transaksi/saveDetail', 'Transaksi::saveDetail', ['filter' => 'userAuth']);
$routes->get('transaksi/add', 'Transaksi::add', ['filter' => 'userAuth']);
$routes->get('transaksi/json', 'Transaksi::json', ['filter' => 'userAuth']);
$routes->get('transaksi/jsonDetail/(:any)', 'Transaksi::jsonDetail/$1', ['filter' => 'userAuth']);

$routes->get('setting', 'Setting::index', ['filter' => 'userAuth']);
$routes->post('setting/update', 'Setting::update', ['filter' => 'userAuth']);
