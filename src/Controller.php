<?php

namespace Rentit;

abstract class Controller implements View
{
    protected $request;

    function __construct($request)
    {
        $this->request = $request;
    }

    function error($string)
    {
        $this->render(['error'=>$string], 'error');
    }

    function render(?array $dataview = null, ?string $template = null)
    {
        if ($dataview) {
            extract($dataview);
        }

        if ($template == "") {
            include 'templates/' . $this->request->getController() . '.tpl.php';
        } else {
            include 'templates/' . $template . '.tpl.php';
        }
    }

}