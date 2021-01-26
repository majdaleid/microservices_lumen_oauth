<?php


namespace App\Traits;
use Illuminate\Http\Response;
trait ApiResponser
{

public function successResponse($data,$code=Response::HTTP_OK)
{
  return response($data,$code)->header('Content-Type','application/json');

}

public function validResponse($data,$code=Response::HTTP_OK)
{
  return response()->json(['data'=>$data],$code);

}




public function errorResponse($message,$code)
{
  //status of the $code and the body of the code inside $code variable
  return response($message,$code)->header('Content-Type','application/json');

}






public function errorResponse2($message,$code)
{
  //status of the $code and the body of the code inside $code variable
  return response()->json(['error'=>$message,'code'=>$code],$code);

}


}
