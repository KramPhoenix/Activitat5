<?php

namespace Rentit\Controllers;

use Rentit\Controller;


final class DefaultController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);


    }
    public function index(){
        $data=['title'=>'Default'];
        $this->render($data, "");
    }


    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}