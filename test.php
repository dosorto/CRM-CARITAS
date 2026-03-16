<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;

// Inicializar el facade
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
Facade::setFacadeApplication($app);

echo "\n", Hash::make('admin123'), "\n\n";