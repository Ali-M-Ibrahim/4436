<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class CrudController extends Controller
{
    public function createm1(){
        $obj = new Customer();
        $obj->name="Method 1 creation";
        $obj->address= "Address 1";
        $obj->dob="2025-03-26";
        $obj->save();
        return "ok created using method 1";
    }
    public function createm2(){
        Customer::create(
            [
            "name"=>"Method 2 creation",
            "address"=>"Address from method 2",
            "dob"=>"2025-03-26"
        ]
        );
        return "ok created using method 2";
    }
    public function createm3(Request $request){
        Customer::create($request->all());
        return "ok created using method 3";
    }
    public function updatem1($id){
        // update customers
        // set etc
        //where id=?

        //select * from model where id=?
        $obj = Customer::find($id);
        $obj->name= "Updated name";
        $obj->address="Updated address";
        $obj->dob="2025-01-01";
        $obj->save();
        return "Updated method 1";
    }
    public function updatem2(Request $request,$id){
        $obj = Customer::find($id);
        $obj->fill($request->all());
        if($obj->isClean()){
            return "nothing to update, please input different values";
        }
        $obj->save();
        return "ok updated using method 2";
    }
    public function updatem3(Request $request,$id){
        $obj = Customer::find($id);
        $obj->name= $request->name;
        $obj->address=$request->address;
        $obj->dob=$request->dob;
        $obj->save();
        return "ok updated using method 2";
    }

    public function delete($id){
        $obj= Customer::find($id);
        $obj->delete();
        return "ok done";
    }

    public function massUpdate(){
        //update customer set ....
        Customer::where("id",">",0)
            ->update(["name"=>"Mass Update","Address"=>"Mass Update"]);
        return "ok all data are updated";
    }

    public function massDelete(){
        Customer::where("id",">",2)
            ->delete();
        return "ok all data having id greater than 2 are deleted";
    }

}
