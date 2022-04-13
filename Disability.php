<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Disability extends Model 

{
    protected $collection = 'disabled_persons_records'; 

    public function getDocTypeCount($ORG_ID){

        $disability = Disability::where('ORG_ID',$ORG_ID)->groupBy('DOC_TYPE')->aggregate('count',['DOC_TYPE'])
        ->get();
        return $disability;
    
    }

    public function getUidCount($ORG_ID){

        $disability = Disability::where('ORG_ID',$ORG_ID)->groupBy('UID')->aggregate('count',['UID'])
        ->get();
        return $disability;

    }  
     
}