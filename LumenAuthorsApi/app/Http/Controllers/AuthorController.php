<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use App\Author;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


  public function index()
  {
    $authors=Author::all();

    //return $authors;
    return $this->successResponse($authors);

  }

  public function store(Request $request)
  {
   $rules=[
     'name'=>'required|max:255',
     'gender'=>'required|max:255|in:male,female',
     'country'=>'required|max:255',
   ];

   $this->validate($request,$rules);
   $author =Author::create($request->all());
 return $this->successResponse($author,Response::HTTP_CREATED);








  }
  public function  show($author)
  {
   $author=Author::findOrFail($author);
   return $this->successResponse($author);


  }

  public function update(Request $request,$author)
  {
  $rules=[
      'name'=>'max:255',
      'gender'=>'max:255|in:male,Female',
      'country'=>'max:255',
    ];

    $this->validate($request,$rules);
    $author=Author::findOrFail($author);
    $author->fill($request->all());
    if ($author->isClean())
    {
      return $this->errorResponse('At least one value must change',Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $author->save();
  return $this->successResponse($author);






  }



  public function destroy($author)
  {
    $author=Author::findOrFail($author);

   $author->delete();
   return $this->successResponse($author);

  /* $author = Author::findOrFail($author);

         $author->delete();

         return $this->successResponse($author);
*/
  }

}
