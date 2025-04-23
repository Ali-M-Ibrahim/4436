<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniResource;
use App\Models\Uni;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UniApiController extends Controller
{
    use ApiResponse;

    function index()
    {
        $data = Uni::all();
        $resourceData = UniResource::collection($data);
        return $this->sendResponse($resourceData,"All Universities are retrieved successfully", Response::HTTP_OK);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->sendError("Failure",$errors,Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $obj = new Uni();
        $obj->name = $request->name;
        $obj->save();

        return $this->sendResponse(new UniResource($obj),"Uni created successfully",Response::HTTP_CREATED);

    }

    function show($id)
    {
        $data = Uni::find($id);
        if(!$data){
            return $this->sendError("Id not found",[],Response::HTTP_NOT_FOUND);
        }
        return $this->sendResponse(new UniResource($data),"university retrieved");
    }

    function update($id,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->sendError("Failure",$errors,Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $data = Uni::find($id);
        if(!$data){
            return $this->sendError([],"Failure",Response::HTTP_NOT_FOUND);
        }
        $data->name = $request->name;
        $data->save();
        return $this->sendResponse(new UniResource($data),"Uni updated successfully",Response::HTTP_CREATED);
    }

    function delete($id)
    {
        $data = Uni::find($id);
        if(!$data){
            return $this->sendError("Id not found",[],Response::HTTP_NOT_FOUND);
        }
        $data->delete();
        return $this->sendResponse([],"Uni deleted successfully");
    }
}
