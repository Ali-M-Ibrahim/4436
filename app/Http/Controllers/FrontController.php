<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(){

//          method 1 to send data to view

//        $greeting = "Hello class";
//        $message = "This is my data sent from controller to view";
//        return View("FirstView",["greet"=>$greeting, "msg"=>$message]);

//          method 2 to send data to view

//        $greet = "Hello class";
//        $msg = "This is my data sent from controller to view";
//        return View("FirstView",compact("greet","msg"));

//         method 3 to send data to view
        $greeting = "Hello class";
        $message = "This is my data sent from controller to view";
        $nulldata= "!";
        $this->prepareData();
        return View("FirstView")
            ->with("greet",$greeting)
            ->with("msg",$message)
            ->with("nullable",$nulldata);
    }

    function prepareData()
    {
        $data1FromFunction = "this is my first variable";
        $data2FromFunction = "this is my first variable";
        \View::share(["data1"=>$data1FromFunction,
                "data2"=>$data2FromFunction]);
    }
    public function index2(){
        $this->prepareData();
        return View("SecondView");
    }

    public function dbData(){
        // select * from customer where id=2
        $obj = Customer::find(2);
        return View("CustomerView")->with("data",$obj);

    }

    public function ArrayData(){
        $data = Customer::all();
        return View("ListView")->with("data",$data);
    }
}
