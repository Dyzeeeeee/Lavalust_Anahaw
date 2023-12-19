<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 * 
 * Copyright (c) 2020 Ronald M. Marasigan
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @copyright Copyright 2020 (https://ronmarasigan.github.io)
 * @since Version 1
 * @link https://lavalust.pinoywap.org
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

// $router->get('/', 'Welcome::index');
$router->get('/website/home', 'Website_controller::index');
$router->get('/website', 'Website_controller::index');
$router->get('', 'Website_controller::index');
$router->get('/website/about', 'Website_controller::about');
$router->get('/website/service', 'Website_controller::service');
$router->get('/website/event', 'Website_controller::event');
$router->get('/website/menu', 'Website_controller::menu');
$router->get('/website/book', 'Website_controller::book');
$router->get('/website/blog', 'Website_controller::blog');
$router->get('/website/team', 'Website_controller::team');
$router->get('/website/testimonial', 'Website_controller::testimonial');


$router->get('/register', 'Register_controller::index');
$router->post('/register', 'Register_controller::register');


$router->get('/login', 'Login_controller::index');
$router->post('/login', 'Login_controller::login');
$router->post('/logout', 'Login_controller::logout');


$router->get('/admin', 'Admin_controller::dashboard');
$router->get('/admin/dashboard', 'Admin_controller::dashboard');
$router->get('/admin/menu', 'Admin_controller::menu');
$router->get('/admin/pos/session', 'Admin_controller::session');
$router->get('/admin/pos/payment', 'Admin_controller::payment');


$router->get('/admin/inventory/food-stocks', 'Admin_controller::food_stocks');


$router->post('/admin/menu/edit/(:num)', 'Menu_controller::edit');
$router->post('/admin/menu/delete/(:num)', 'Menu_controller::delete');
$router->post('/admin/menu/add', 'Menu_controller::add');
$router->post('/admin/menu/filter', 'Menu_controller::filterMenu');



$router->post('/admin/inventory/food-stocks/edit/(:num)', 'FoodStock_controller::edit');
$router->post('/admin/inventory/food-stocks/delete/(:num)', 'FoodStock_controller::delete');
$router->post('/admin/inventory/food-stocks/add', 'FoodStock_controller::add');


$router->get('/chats/(:num)', 'Chat_controller::chats');
$router->post('/sendmessage', 'Chat_controller::sendmessage');  


$router->get('/email-sender', 'Welcome::email');
$router->post('/send_mail', 'Welcome::send_mail');
