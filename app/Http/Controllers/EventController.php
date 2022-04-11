<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $json = null;
        $user = request('username');
        $qtdp = null;
        $resultu = null;
        $result = null;
        $json2 = null;


        if(isset($_GET['username'])){
            $user = $_GET['username'];

            $opts = [ 'http' => ['method' => 'GET','header' => [ 'User-Agent: PHP' ]]];

            $context = stream_context_create($opts);
            $content = file_get_contents("https://api.github.com/search/users?q=$user", false, $context);
            $json = json_decode($content, true);
            
            $resultado = count((array)$json['items']);
            $resultu = rtrim($resultado, "2");
            
        return view('welcome', ['user' => $user,'qtdp' => $qtdp, 'json' => $json, 'json2' => $json2, 'result' => $result, 'resultu' => $resultu]);
        }else{
        return view('welcome', ['user' => $user,'qtdp' => $qtdp, 'json' => $json, 'json2' => $json2, 'result' => $result, 'resultu' => $resultu]);
        }
    }

    public function repositorios() {
        $jsonrepo = null;
        $user = request('username');
        $qtdp = null;
        $resultu = null;
        $result = null;
        $json2 = null;


        if(isset($_GET['username'])){
            $user = $_GET['username'];

            $opts = [ 'http' => ['method' => 'GET','header' => [ 'User-Agent: PHP' ]]];

            $context = stream_context_create($opts);
            $content = file_get_contents("https://api.github.com/users/$user/repos", false, $context);
            $jsonrepo = json_decode($content, true);
            
            $resultu = count($jsonrepo);
            
        return view('repositorios', ['user' => $user,'qtdp' => $qtdp, 'json' => $jsonrepo, 'json2' => $json2, 'result' => $result, 'resultu' => $resultu]);
        }else{
        return view('repositorios', ['user' => $user,'qtdp' => $qtdp, 'json' => $jsonrepo, 'json2' => $json2, 'result' => $result, 'resultu' => $resultu]);
        }
        
    }

    public function repo() {
        $json = null;
        $repo = request('repo');
        $qtdp = null;
        $resultu = null;
        $result = null;
        $json2 = null;


        if(isset($_GET['repo'])){
            $repo = $_GET['repo'];

            $opts = [ 'http' => ['method' => 'GET','header' => [ 'User-Agent: PHP' ]]];

            $context = stream_context_create($opts);
            $content = file_get_contents("https://api.github.com/search/repositories?q=$repo", false, $context);
            $json = json_decode($content, true);
            
            $resultado = count((array)$json['items']);
            $resultu = rtrim($resultado, "2");
            
        return view('repo', ['repo' => $repo,'qtdp' => $qtdp, 'json' => $json, 'json2' => $json2, 'result' => $result, 'resultu' => $resultu]);
        }else{
        return view('repo', ['repo' => $repo,'qtdp' => $qtdp, 'json' => $json, 'json2' => $json2, 'result' => $result, 'resultu' => $resultu]);
        }
    }

    
}
