<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use App\Author;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Services\AuthorService;

class AuthorController extends Controller
{
  use ApiResponser;

   public $authorService;
    public function __construct(AuthorService $authorService)
    {
      $this->authorService=$authorService;
    }


  public function index()
  {
      return $this->successResponse($this->authorService->obtainAuthors());
  }

  public function store(Request $request)
  {
    return $this->successResponse($this->authorService->createAuthor($request->all(),Response::HTTP_CREATED));



  }
  public function  show($author)
  {
    return $this->successResponse($this->authorService->obtainAuthor($author));


  }

  public function update(Request $request,$author)
  {

    return $this->successResponse($this->authorService->editAuthor($request->all(),$author));



  }



  public function destroy($author)
  {
    return $this->successResponse($this->authorService->deleteAuthor($author));

  }

}
