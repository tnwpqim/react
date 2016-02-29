<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReactController extends Controller
{
    public function reactMain()
    {
 	  	return view('public/react_main');
    }

    public function reactData()
    {
    	$data1 = array('id' => 1, 'str_name' => 'random string one', 'str_content' => str_random(10)); 
    	$data2 = array('id' => 2, 'str_name' => 'random string two', 'str_content' => str_random(10)); 
    	$data = array($data1, $data2);
    	echo json_encode($data);
    }
}
