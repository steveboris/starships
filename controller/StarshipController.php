<?php
require('../vendor/autoload.php');

require('BaseController.php');
require('../models/Starship.php');


use Symfony\Component\HttpClient\HttpClient;
use Karriere\JsonDecoder\JsonDecoder;

class StarshipController extends BaseController
{
    const url = 'starships/';
    public $starships;
    public $params = ['name', 'model'];

    public function __construct()
    {
        $this->init();
    }

    /*
     * Reads and create an array of starship object
     */
    public function init()
    {
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', parent::baseUrl . self::url);
        // fetch the result from the response
        $results = json_decode($response->getContent())->results;
        // Convert each object in result to jsonObj and map the jsonObj to a starship model
        $jsonDecoder = new JsonDecoder();
        $starships = [];
        foreach ($results as $result) {
            $jonObj = json_encode($result);
            // map obj to a class
            $starship = $jsonDecoder->decode($jonObj, Starship::class);
            array_push($starships, $starship);
        }
        // save the list
        $this->starships = $starships;
    }

    /*
     * Controller to list all the results sorted by name and by model
     */
    public function actionGetAll()
    {
        return $this->sortByParams($this->starships, $this->params);
    }

    /*
     * Reads the given parameter and sort the array
     */
    public function actionGetByParams()
    {
        $this->params = [];
        foreach ($_GET as $key => $value) {
            array_push( $this->params, $value);
        }

        $data = $this->starships;
        if (sizeof($this->params) == 1) {
            return $this->sortByParams($data,  $this->params);
        } else  {
            return $this->sortByParams($data,  $this->params);
        }
    }

    /*
     * Sort the array
     */
    public function sortByParams($data, $params)
    {
        $this->params = $params;
        if (sizeof($params) == 1) {
            usort($data, function ($item1, $item2) {
                $param = $this->params[0];
                return $item1->$param > $item2->$param;
            });
        } else {
            usort($data, function ($item1, $item2) {
                $param1 = $this->params[0];
                $param2 = $this->params[1];
                return $item1->$param1 > $item2->$param1 && $item1->$param2 > $item2->$param2;
            });
        }
        return $data;
    }


}