<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as Controller;
use App\Models\Disability;
use Illuminate\Http\Request;

class DisabilityController extends Controller
{
    public function index(){
        return response()->json(Disability::all());
    }

     public function showOneDisability (Request $request)
     {
    
        $id = $request->input('ORG_ID');

        $disability = new Disability(); 
        $response = ["status" => 'failed'];

         if($id != null){
            $result = $disability->getDocTypeCount($id);
         }   

       $result = $disability->getDocTypeCount($id);

       $uidresult = $disability->getUidCount($id);

       $Response =[$result, $uidresult];

       return response()->json($Response);
        

        // $id = $request->input('AADHAAR_NO');
        // $disability = Disability::where('AADHAAR_NO',$id)->groupBy('DOC_TYPE')->aggregate('count',['DOC_TYPE'])
        // ->get();
        // return $disability;
}   
}