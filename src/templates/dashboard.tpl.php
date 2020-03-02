<?php
 include 'header.tpl.php';

 if (Rentit\Session::get('logged')) {
     $user = Rentit\Session::get('user');

     if (($user->is_admin())){
         include "dashboard-admin.tpl.php";
     } else {
         include "dashboard-client.tpl.php";
     }
 }