<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Order;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Helper\ResponseBuilder;
use Tymon\JWTAuth\JWTAuth;
class APIController extends Controller
{
   public function getUsers()
   {
      $data= User::all();
      $status=true;
      $info="Data Listed Successfully!";
      return ResponseBuilder::reslut($status,$info,$data);
   }

   public function order(Request $request)
   {
      print_r($request->input());
      $order=new Order;
      $order->id=$request->input('id');
      $order->order_number=$request->input('order_number');
      $order->user_id=$request->input('user_id');
      $result=$order->save();
      if ($result==1) {
         $status=true;
         $info="Data Saved Successfully!";
      }else{
         $status=false;
         $info="Data not Saved Successfully!";
      }
      return ResponseBuilder::reslut($status,$info);

    
   }
   public function register(Request $request)
   {
           $validator = Validator::make($request->all(), [
           'username' => 'required',
           'email' => 'required',
           'password' => 'required',
       ]);

       if($validator->fails()){
               return response()->json($validator->errors()->toJson(), 400);
       }

       $user = User::create([
           'username' => $request->input('username'),
           'email' => $request->input('email'),
           'password' => Hash::make($request->input('password')),
           'api_token'=>''
       ]);

       $token = JWTAuth::fromUser($user);

       return response()->json(compact('user','token'),201);
   }


}
