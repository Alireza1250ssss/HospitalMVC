<?php
require_once "../vendor/autoload.php";
require_once "../SMS/SMS.php";

session_start();
error_reporting(1);

use App\Core\App;
use App\Core\Router;


$app = new App(new Router());
$app->get("/Hospital/adminLogin",[\App\Controller\AdminAuth::class,'showLogin']);
$app->post("/Hospital/adminLogin",[\App\Controller\AdminAuth::class , 'doTheLogin']);
$app->get("/Hospital/adminDashboard",[\App\Controller\AdminController::class , 'showDashboard']);
$app->post("/Hospital/clinic",[\App\Controller\ClinicController::class , 'handle']);
$app->post("/Hospital/section",[\App\Controller\SectionController::class , 'handle']);
$app->post("/Hospital/admin",[\App\Controller\AdminController::class , 'handle']);
$app->get("/Hospital/reservation",[\App\Controller\ReservationController::class,'showReservation']);
$app->post("/Hospital/reservation",[\App\Controller\ReservationController::class,'setPatient']);
$app->post("/Hospital/paymentStep1",[\App\Controller\PaymentController::class, 'getInfo']);
$app->post("/Hospital/paymentStep2",[\App\Controller\PaymentController::class, 'completePayment']);
$app->post("/Hospital/bankAPI/",[\App\bankAPI\BankController::class, 'checkCart']);



$app->run($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

