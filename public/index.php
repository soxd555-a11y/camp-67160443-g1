<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// โหลด autoload ของ Composer
require __DIR__.'/../vendor/autoload.php';

// โหลด bootstrap/app.php เพื่อสร้าง Application instance
$app = require_once __DIR__.'/../bootstrap/app.php';

/** @var Kernel $kernel */
// เรียกใช้งาน HTTP Kernel
$kernel = $app->make(Kernel::class);

// สร้าง Request จาก global PHP variables ($_GET, $_POST, $_FILES, etc.)
$request = Request::capture();

// ประมวลผล Request และรับ Response
$response = $kernel->handle($request);

// ส่ง Response กลับไปยัง browser
$response->send();

// Terminate request (cleanup, middleware, etc.)
$kernel->terminate($request, $response);
