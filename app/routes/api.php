<?php
require_once 'app/Helpers/helpers.php';
require_once 'app/Config/Config.php';
require_once 'app/Config/Database.php';

require_once 'app/Controllers/HomeController.php';
require_once 'app/Controllers/TransaksiController.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
$localhost = "/detikcomtest";

$route = new RouteHelper();

$route->addRoute('GET', $localhost . '/', 'HomeController', 'index');

$route->addRoute('GET', $localhost . '/transaksi/status', 'TransaksiController', 'getStatusTransaksi');
$route->addRoute('POST', $localhost . '/transaksi/add', 'TransaksiController', 'createTransaksi');

$route->dispatch($requestMethod, $requestUri);
