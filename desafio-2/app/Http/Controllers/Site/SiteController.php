<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $page = 1, $search = false)
    {
       if(count($request->query()) >= 1)
       {
        
           if(array_key_exists('page', $request->query()))
           {
             $page = $request->query()['page'];
           }

           if(array_key_exists('pesquisa', $request->query()))
           {
            $search = $request->query()['pesquisa'];
           }

       }

       $title = 'CNM - Desafio 2 - Noticias';
       $news = $this->getNews($page, $search);
       $pages = ceil($news->total_noticias / 15);
       return view('site.index', compact('title', 'news', 'pages', 'page'  ));
    }

   public function getNews(int $page, $search = false)
   {
        $url = ( $search ? "/webservice/noticias?pesquisa={$search}" : "/webservice/noticias?page={$page}");
       
        $client = new Client(['base_uri' => 'http://www.marcha.cnm.org.br']);
        $request = $client->request('GET', $url, 
        [
            ['http_errors' =>false],
        ]);

       $response =  $request;
       $statusCode = $request->getStatusCode();//status
       $responseBody = json_decode($response->getBody());//body in json 
       $responseReason = $response->getReasonPhrase();//ok
      
       if ($statusCode != 200)
       {
            $error['message'] = "A requisição não foi bem sucedida status code: {$statusCode}!";
            $error['error']   = true;
        
            return $error;
       }
   
       return $responseBody;
   }
}
