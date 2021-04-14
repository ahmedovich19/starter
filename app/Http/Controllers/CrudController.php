<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    
    public function __construct()
    {
        
    }
    public function getOffers(){
        return Offer::get();
        // return Offer::select('id','name')->get();
    }
    /*
    public function store(){
        Offer::create([
            'name'=>'Offer4',
            'price'=>'2000',
            'details'=>'offer1 details',
        ]);
    }
    */
    public function create(){
        return view('offers.create');
    }
    public function store(Request $request){
       
        $rules =$this->getRules();
        $messages = $this->getMessages();
        //validate data before insert to database
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        //insert

        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details
        ]);
        return redirect()->back()->with(['success'=>'تم اضافة العرض بنجاح']);
        
    }

    protected function getMessages(){
        return $messages = [
            'name.unique' => __('messages.offer name required'),
            'name.required' => __('messages.offer name must be unique'),
            'price.numeric' => __('messages.Offer Price Numeric'),
            'price.required' => __('messages.Offer Price Required'),
            'details.required' => __('messages.Offer details Required'),

        ];
    }
    protected function getRules(){
        return  $rules=[
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required',
        ];
    }

    
}
