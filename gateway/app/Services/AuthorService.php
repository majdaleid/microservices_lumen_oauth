<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;


class AuthorService
{
use ConsumesExternalService;

public $baseUri;
public $secret;
public function  __construct()
{
$this->baseUri=config('services.authors.base_uri');
$this->secret=config('services.authors.secret');
//$this->secret=7MHhCJf3xbMPjXPJqOdlLvqRtabav02K;
}

public function obtainAuthors()
{
  return $this->performRequest('GET', '/authors');
}

/*PARAMETERS name , gender ,country */
public function createAuthor($data)
{
  return $this->performRequest('POST', '/authors',$data);
}

public function obtainAuthor($author)
{
  return $this->performRequest('GET', "/authors/{$author}");
}

public function editAuthor($data,$author)
{
  return $this->performRequest('PUT', "/authors/{$author}",$data);

}


public function deleteAuthor($author)
{
  return $this->performRequest('DELETE', "/authors/{$author}");

}



}
