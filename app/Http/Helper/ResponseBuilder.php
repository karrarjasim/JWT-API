<?php
namespace App\Http\Helper;


class ResponseBuilder{
  public static function reslut($status="",$info="",$data="")
    {
       return[
           "success"=>$status,
           "information"=>$info,
           "token"=>$data
       ];
    }
}

