<?php

namespace Rentit\Controllers;

use Rentit\Controller;
use Rentit\Models\Property;
use Rentit\Models\User;

final class AdminController extends Controller{

    public function __construct($request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Panel',
            'users' => $this->getUsers(),
            'properties' => $this->getProperties()
        ];

        $this->render($data);
    }

    public function getProperties(){
       $properties = Property::all();

       return $properties;
    }

    public function getUsers(){
        $users = User::all();

        return $users;
    }

    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}