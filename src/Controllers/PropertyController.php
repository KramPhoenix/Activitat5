<?php

namespace Rentit\Controllers;

use Rentit\Controller;
use Rentit\Models\Property;
use Rentit\Session;

final class PropertyController extends Controller{

    public function __construct($request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $properties = Property::all();

        $data = [
            'title' => 'User',
            'properties' => $properties
        ];

        $this->render($data);
    }

    private function create_property($title, $price, $desc)
    {
        $property = Property::create([
            'title' => $title,
            'price' => $price,
            'description' => $desc,
            'user_id' => Session::get('user')]);

        return $property;
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
                header('location:/property/myproperties');
            } catch (\PDOException $e) {
                $this->error($e->getMessage());
            }
        } else {
            $this->error("Completa los campos del formulario");
        }
    }

    public function myproperties(){
        $user = Session::get('user');
        $properties = Property::where('user_id', '=', $user)->get();

        $data = [
          'properties' => $properties
        ];

        $this->render($data, 'myproperties');
    }

    public function edit(){
        $id = $_REQUEST['id'];
        $property = Property::where('id', '=', $id)->first();

        $data = [
            'id' => $id,
            'property' => $property
        ];

        $this->render($data, 'property_edit');
    }

    public function update(){

       $id = $_REQUEST['id'];
       $property = Property::where('id', '=', $id)->first();

       if (!empty($_REQUEST['nombre']) && !empty($_REQUEST['desc']) && !empty($_REQUEST['precio'])){

           $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
           $descripcion = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
           $precio = filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_STRING);

           $data = [
               'title' => $nombre,
               'price' => $precio,
               'description' => $descripcion
           ];

           $property->update($data);
           header('location:/property/myproperties');

       } else {
           $this->error("Completa los campos del formulario");
       }
    }

    public function remove(){
        $id = $_REQUEST['id'];
        $property = Property::where('id', '=', $id)->first();

        $property->delete();
        header('location:/property/myproperties');
    }

    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}