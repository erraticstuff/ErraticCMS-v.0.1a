<?php
/*
***Erratic CMS modified version****
**Thank you for using Erratic CMS**
*Made by Erratic Stuff*
Copyright Erratic Stuff 2020-2020
*/
//Proccessing the ID's from the URI
$id = $_REQUEST['id'];


$md5 = md5($id);

if(empty($id)) {
  $page = include('default.html');
} else {
  $page = include($md5 . '.html');
}
return $page;
?>
