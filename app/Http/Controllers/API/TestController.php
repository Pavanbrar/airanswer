<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TestController extends BaseController
{
    public function add(Request $request)
    {
      
        $test = new Test;
        $test->test =$request->input('test');
        $test->description = $request->input('description');
        $test->instructions=$request->input('instructions');
        $test->save();
        return apiResponse(true, 200, "data added successfully"); 
    }

    public function update(Request $request,$id)
    {
        $test_update = Test::find($id);
        if($test_update)
        {
            $test_update->test =$request->input('test');
            $test_update->description = $request->input('description');
            $test_update->instructions=$request->input('instructions');
            $test_update->save();
            return apiResponse(true, 200, "data updated successfully"); 
        }else{
            return apiResponse(false, 201, "id  not found");
        }
    }

    public function delete($id)
    {
       $testDelete = Test::find($id);
         if($testDelete){
            $testDelete->delete();
            return apiResponse(true, 200, "data deleted successfully");
        }else{
            return apiResponse(false, 201, "id  not found");
        }
        
        
    }
}