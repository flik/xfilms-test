<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Film; 
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Resources\Json\Resource;

class FilmsController extends Controller
{
     
    public function index()
    {
		$returnData = array(); 
        $films = Film::paginate(1); 
        $generes = $films[0]->genres->toArray();
        $generesNames = '';
        //print_r(count($generes)); exit;
        foreach($generes as $i=>$genre) {
            
            if(count($generes) == $i+1)
                $generesNames .= $genre['name'] ;
            else
                $generesNames .= $genre['name'].', ' ;
           // $generes += $genre !== $films[0]->genres->last() ? ', ' : '';
        }
       // echo $generesNames; exit;
        $returnData['films'] = $films; 
        $returnData['films']['genres'] = $generesNames;
        return response()->json([
            'data' => $returnData,
            'status' => 200
        ]); 
        
        return $films; 
    }
}
