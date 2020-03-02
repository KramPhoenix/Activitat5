<?php

namespace Rentit\Controllers;

use Rentit\Controller;
use Rentit\Models\Property;

final class PropertyController extends Controller{

    public function __construct($request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $data = ['title' => 'User'];
        $this->render($data);
    }

    private function create_property($title, $price, $desc)
    {

        $property = Property::create([
            'title' => $title,
            'price' => $price,
            'description' => $desc,
            'user_id' => 1]);

        return $property;
    }

    public function buy()
    {
        $this->render(null, 'buy');
    }

    public function sell()
    {
        $this->render(null, 'sell');
    }

    public function new_property()
    {
        if (!empty($_REQUEST['title']) &&
            !empty($_REQUEST['price']) &&
            !empty($_REQUEST['description'])
        ) {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            try {
                $property = $this->create_property($title, $price, $description);
                header('location:/');
            } catch (\PDOException $e) {
                $this->error($e->getMessage());
            }
        } else {
            $this->error("Completa los campos del formulario");
        }
    }

    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}