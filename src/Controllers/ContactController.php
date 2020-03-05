<?php

namespace Rentit\Controllers;

use Rentit\Controller;


final class ContactController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);


    }

    public function index(){
        $data=['title'=>'Contact'];
        $this->render($data, "");
    }


    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}