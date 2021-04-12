<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public function showAdminName(){
        return 'ahmed hamdy';
    }
    public function getIndex(){
        //$data=[];
        //$data['name'] = 'ahmed hamdy';
        //$data['id']= 5;

        $obj = new \stdClass();

        $obj -> name = 'ahmed';
        $obj -> id =5;
        $obj -> gender = 'male';
        $data = ['ahmed','playstation'];

        return view('welcome',compact('data'));
    }
}
