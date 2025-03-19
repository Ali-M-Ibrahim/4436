<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Credential;
use App\Models\Customer;
use App\Models\CustomerService;
use App\Models\Service;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create(){
        $customer = new Customer();
        $customer->name= "Ali Ibrahim";
        $customer->address= "Baabda";
        $customer->dob = "2025-03-19";
        $customer->save();

        $credential = new Credential();
        $credential->email= "Ali.ibrahim@ua.edu.lb";
        $credential->password = "123456";
        $credential->customer_id= $customer->id;
        $credential->save();
        return response()->json(["msg"=>"Data created successfully"]);
    }

    public function getCustomerById($id){
        // SELECT * FROM CUSTOMER WHERE ID= ?
        // TO RETRIEVE MODEL BY ID
        //USE FIND
        $customer = Customer::find($id);
        $relatedCredentials = $customer->getCredential;
        $relatedAccounts = $customer->getAccounts;
        $relatedServices = $customer->getServices;
        return $customer;
    }

    public function getCredentialsById($id){
        $credential = Credential::find($id);
        $relatedCustomer = $credential->getCustomer;
        return $credential;
    }
    public function create2(){
        $customer = new Customer();
        $customer->name= "Ali Masri";
        $customer->address= "Mejdlaya";
        $customer->dob = "2025-03-19";
        $customer->save();

        $credential = new Credential();
        $credential->email= "Ali.massri@ua.edu.lb";
        $credential->password = "123456";
        $credential->customer_id= $customer->id;
        $credential->save();

        $account1 = new Account();
        $account1->currency="USD";
        $account1->iban="12345";
        $account1->customer_id = $customer->id;
        $account1->save();

        $account2 = new Account();
        $account2->currency="LBP";
        $account2->iban="6789";
        $account2->customer_id = $customer->id;
        $account2->save();

        return response()->json(["msg"=>"Data created successfully"]);
    }

    public function getAccountById($id){
        $account = Account::find($id);
        $relatedCustomer = $account->getCustomer;
        return $account;
    }

    public function create3(){
        $customer = new Customer();
        $customer->name= "Cynthia Sindian";
        $customer->address= "Mejdlaya";
        $customer->dob = "2025-03-19";
        $customer->save();

        $credential = new Credential();
        $credential->email= "cynthia.sindian@ua.edu.lb";
        $credential->password = "123456";
        $credential->customer_id= $customer->id;
        $credential->save();

        $account1 = new Account();
        $account1->currency="USD";
        $account1->iban="1111";
        $account1->customer_id = $customer->id;
        $account1->save();

        $account2 = new Account();
        $account2->currency="LBP";
        $account2->iban="2222";
        $account2->customer_id = $customer->id;
        $account2->save();


        $service1 = new Service();
        $service1->name = "Service 1";
        $service1->save();

        $service2 = new Service();
        $service2->name = "Service 2";
        $service2->save();


        //to link customer to service
        // method 1
            $link= new CustomerService();
            $link->customer_id=$customer->id;
            $link->service_id = $service1->id;
            $link->save();

            //method 2
        $customer->getServices()->attach($service2->id);
        $customer->save();

        return response()->json(["msg"=>"Data created successfully"]);
    }

    public function getServiceById($id){
        $service = Service::find($id);
        $relatedCustomers = $service->getCustomers;
        return $service;
    }

    public function getAllCustomers(){
        // SELECT * FROM CUSTOMERS
        $customers = Customer::all();
        return $customers;
    }

    public function getCustomerByIdOrFail($id){
        //select * from customers where id=?
        $customer = Customer::findOrFail($id);
        $relatedCredentials = $customer->getCredential;
        return $customer;
    }

    public function getCustomerByIdOr($id){
        //select * from customers where id=?
        $customer = Customer::findOr($id,function(){
           return "customer does not exist";
        });
        return $customer;
    }

    public function getCustomersByAddress($address){
        // SELECT * FROM CUSTOMERS WHERE ADDRESS=?;
        $customers = Customer::where('address',$address)
            ->get(); // get is used to return an array
        return $customers;
    }

    public function getCustomersByAddressFirst($address){
        // SELECT * FROM CUSTOMERS WHERE ADDRESS=?;
        $customers = Customer::where('address',$address)
            ->first(); // get first element having the condition
        return $customers;
    }

    public function getCustomerByConditions(){
        // SELECT * FROM CUSTOMERS WHERE ADDRESS="MEJDLAYA" AND DOB > "2023-01-01";
        $customers = Customer::where('address','Mejdlaya')
            ->where("dob",'>',"2019-01-01")
            ->get();
        return $customers;
    }

    public function getCustomerByConditionsOr(){
        // SELECT * FROM CUSTOMERS WHERE ADDRESS="MEJDLAYA" Or DOB > "2019-01-01";
        $customers = Customer::where('address','Mejdlaya')
            ->Orwhere("dob",'>',"2024-01-01")
            ->get();
        return $customers;
    }

    public function getCustomerIn(){
        //select * from customers where id in (1,2,3,4,5,6,7)
    $customers = Customer::whereIn("id",[1,2,3,4,5,6,7])
    ->get();
    return $customers;
    }
    public function getCustomerBetween(){
        //select * from customers where id between 1 and 4
        $customers = Customer::WhereBetween("id",[1,7])
            ->get();
        return $customers;
    }


    public function getCustomerByNameLike(){
        //select * from customers where name like "%Ali%"
        $customers = Customer::Where("name",'LIKE',"%Ali%")
            ->get();
        return $customers;
    }

    public function getCustomerByAddressIn(){
        //select * from customers where name like "%Ali%"
        $customers = Customer::WhereIn("address",["Baabda","Mejdlaya"])
            ->get();
        return $customers;
    }

    public function getAllCustomerswithlimit(){
        // SELECT * FROM CUSTOMERS limit 2
        $customers = Customer::take(1)->get();
        return $customers;
    }

    public function getNameCustomers(){
        // select name from customers;
        $names = Customer::select(["name","dob"])->get();
        return $names;
    }

    public function getCustomersOderByDob(){
        // select * from customers order by dob asc
        $customers = Customer::OrderBy("dob")->get();

        // select * from customers order by dob desc
        $customers = Customer::OrderBy("dob",'desc')->get();
        return $customers;
    }


    public function mix(){
        $customers = Customer::where('dob','>','2019-01-01')
            ->OrderBy("dob")
            ->take(2)
            ->get();

        return $customers;
    }

    public function Statistics(){
        $count = Customer::count();
        $maxId = Customer::max("id");
        $minDob = Customer::min("dob");
        $avgId= Customer::avg("Id");
        return $avgId;
    }

}
