<?php

namespace App\Http\Controllers\Api\Util;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Facades\Log;

class ApiConsume extends Controller
{
    private $host;

    private $route;
    private $consume_route;

    private $headers = [];
    private $status = [];

    private $error;
    private $response;
    private $download = false;

    public function __construct($host=null, $token=null)
    {
        if($token) {
            $this->tokenHeader($token);
        }
        if($host) {
            $this->host = $host;
        } else {
            $this->host = env('SIEP_LARAVEL_API');
        }

        $this->cakeHeader();
    }

    public function forceDownload() {
        $this->download = true;
    }

    public function hasError() {
        if($this->error!=null) {
            Log::error([$this->consume_route,$this->error]);
            return true;
        } else {
            return false;
        }
    }
    public function getError() {
        return $this->error;
    }
    public function getResponse() {
        return $this->response;
    }
    public function response() {
        return $this->response;
    }

    public function cakeHeader() {
        $this->headers['headers'][env('XHOSTCAKE')] = 'do';
    }
    public function tokenHeader($token) {
        $this->headers['headers']['Authorization'] = "Bearer {$token}";
    }

    private function generateUri($route) {
        $this->route = $route;

        $this->consume_route = join('/',[
            $this->host,
            $this->route
        ]);
    }

    public function request($method,$route,$params=[]) {
        $this->generateUri($route);

        // Consume API lista de inscripciones
        try {
            $guzzle = new Client($this->headers);
            $consumeApi = $guzzle->request($method,$this->consume_route,['query' => $params]);

            $content = $consumeApi->getBody()->getContents();

            if($this->download) {
                $req = $content;
            } else {
                // Obtiene el contenido de la respuesta, la transforma a json
                $req = json_decode($content,true);
            }
        } catch (BadResponseException $ex) {
            $content = $ex->getResponse();
            $jsonBody = json_decode($content->getBody(), true);

            $this->error =  $jsonBody;

            return $this;
        }


        if(isset($req['error'])) {
            $this->status = 'error';
            $this->error = $req;
        } else {
            $this->status = 'done';
            $this->response = $req;
        }

        return $this;
    }

    public function get($uri,$params=[])
    {
        return $this->request('GET',$uri,$params);
    }

    public function post($uri,$params=[])
    {
        return $this->request('POST',$uri,$params);
    }

    public function delete($uri,$params=[])
    {
        return $this->request('DELETE',$uri,$params);
    }
}