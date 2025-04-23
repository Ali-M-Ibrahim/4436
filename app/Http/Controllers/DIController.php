<?php

namespace App\Http\Controllers;

use App\Services\LoggerService;
use Illuminate\Http\Request;

class DIController extends Controller
{
    private $globalLogging;

    public function __construct(LoggerService $logService){
        $this->globalLogging = $logService;
     }

    public function before(){
        $logService = new LoggerService();
        $logService->log("this is my message in before function");
        return "ok i am before function";
    }
    public function DIMethod(LoggerService $logService){
        $logService->log("this is my message using dependency injection at the level of thee method");
        return "ok i am DI Method";
    }
    public function DIC1(){
        $this->globalLogging->log("this is my message using constructor DI in DCI1");
        return "ok i am dic1";
    }
    public function DIC2(){
        $this->globalLogging->log("this is my message using constructor DI in DCI2");
        return "ok i am dic2";
    }
}
