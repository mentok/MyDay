<?php
require('loader.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
	<title>MyDay</title>

  <style type="text/css" media="screen">
    body
    {
      margin: 0;
      padding: 0;
    }
    div#site
    {
      width: 900px;
      margin: 0 auto 0;
      font: 14px Arial, sans-serif;
    }
    div#site.blackberry
    {
      width: 400px;
      margin: 0 auto 0;
      font: 18px Arial, sans-serif;
    }
    div.category
    {
      width: 300px;
      float: left;
      margin-bottom: 20px;
    }
    div#site.blackberry div.category
    {
      width: 400px;
    }
    div.category ul
    {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    div.category ul li
    {
      padding: 6px;
      background-color:#eee;
      margin: 5px 10px 5px 0;
      word-wrap: break-word;
    }
    div.category ul li.finished
    {
      background-color:#f9f9f9;
      color:#999;
    }
    div.category ul li input.new_task, div.category input.new_category
    {
      font-size:1.1em;
      width: 205px;
      padding: 5px;
    }
    div#site.blackberry div.category ul li input.new_task, div#site.blackberry div.category input.new_category
    {
      width: 305px;
    }
    div.category ul li input.submit_task
    {
      margin-left: 12px;
    }
    div#site.blackberry input.submit_task, div#site.blackberry input.submit_category
    {
      margin-left: 0;
      font-size: 1.1em;
    }
    div.category ul li a
    {
      font-weight: bold;
      color: #000;
      text-decoration: none;
      font-size: 1.2em;
    }
    div.category ul li a img
    {
      vertical-align: middle;
      margin-bottom: 1px;
      float: right;
      border: none;
    }
    div.category b a img
    {
      vertical-align: bottom;
      border: none;
    }
  </style>
</head>

<body>
<div id="site" class="<?php
$agent = $_SERVER['HTTP_USER_AGENT'];
if (eregi("BlackBerry", $agent)) {
echo "blackberry";
}
?>">