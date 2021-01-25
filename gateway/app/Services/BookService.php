<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
use ConsumesExternalService;



public $baseUri;
public $secret;
public function  __construct()
{
$this->baseUri=config('services.books.base_uri');
//$this->secret=config('services.books.secret');
}



public function obtainBooks()
    {
        return $this->performRequest('GET', '/books');
    }


/*public function obtainBooks()
{

  return $this->performRequest('GET', '/books');
}*/

/*PARAMETERS name , gender ,country */
public function createBook($data)
{
  return $this->performRequest('POST', '/books',$data);
}

public function obtainBook($book)
{
  return $this->performRequest('GET', "/books/{$book}");
}

public function editBook($data,$book)
{
  return $this->performRequest('PUT', "/books/{$book}",$data);

}


public function deleteBook($book)
{
  return $this->performRequest('DELETE', "/books/{$book}");

}









}
