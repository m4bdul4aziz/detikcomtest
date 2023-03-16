<?php

require_once 'app/Config/config.php';
require_once 'app/Config/Database.php';

require_once 'app/Controllers/TransaksiController.php';

// Get command line arguments

$TransaksiController = new TransaksiController();
$TransaksiController->updateTransaksiCli($argv);
