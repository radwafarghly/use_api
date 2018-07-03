<?php

namespace App\Http\Controllers;

use App\Aboutus;
use Illuminate\Http\Request;
use JWTAuth;
use Validator;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us=Aboutus::all();
        return response()->json(['about_us'=>$about_us],201);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about=Aboutus::find($id);
        return response()->json(['about'=>$about],201);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if(! $user =JWTAuth::parseToken()->authenticate()){
//            return response()->json(['message'=>"User Not Found"],401);
//        }
       // $user=JWTAuth::parseToken()->toUser();
        $credentials = $request->only('details');
        $rules = [
            'details'=>'required',
        ];
        //validate
        $this->validate($request, [
            "details"=>"required",

        ]);

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json([
                'message'=> $validator->messages(),
            ]);
        }

        //insert into aboutus table
        $aboutUs=new Aboutus([
            "details"=>$request->input('details'),
        ]);


        $aboutUs->save();
        return response()->json(['message'=>"Add About us successfully",'user'=>$user],201);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $about_us = Aboutus::find($id);
        return response()->json(['about'=>$about_us],201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $credentials = $request->all();
        $rules = [
            "details"=>"required",
        ];
        //validate
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json([
                'response' => 'error',
                'message'=> $validator->messages(),
            ],400);
        }
        $about_us = Aboutus::find($id);
        $about_us->details=$request->input('details');
        $about_us->save();

        return response()->json([
            'response'=>'success',
            'message' => 'About us Updated Succesfully',

        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $about_us = Aboutus::find($id);
        $about_us->delete();


        return response()->json([
            'response'=>'success',
            'message' => 'About us delete Succesfully',
        ],200);


    }
}
