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
  <meta name="viewport" content="width=device-width" />
  <script src="/moo.js" type="text/javascript" charset="utf-8"></script>
  <script src="/myday.js" type="text/javascript" charset="utf-8"></script>
	<title>MyDay</title>
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" title="Default" charset="utf-8"/>
  <?php
  $agent = $_SERVER['HTTP_USER_AGENT'];
  if (eregi("BlackBerry", $agent) || eregi("iPhone", $agent) || eregi("iPod", $agent) || eregi("Android", $agent))
  { ?>
  <link rel="stylesheet" href="mobile.css" type="text/css" media="screen" title="Default" charset="utf-8"/>
  <?php } ?>
  <?php
  $agent = $_SERVER['HTTP_USER_AGENT'];
  if (eregi("iPhone", $agent) || eregi("iPod", $agent))
  { ?>
  <style type="text/css" media="screen">
    div#site div.category ul li input.new_task, div#site div.category input.new_category
    {
      width: 62%;
      margin-right: 10px
    }
  </style>
  <?php } ?>
  <?php
  $agent = $_SERVER['HTTP_USER_AGENT'];
  if (eregi("Android", $agent))
  { ?>
  <style type="text/css" media="screen">
    div#site div.category ul li input.new_task, div#site div.category input.new_category
    {
      width: 70%;
    }
  </style>
  <?php } ?>
</head>

<body>
<div id="site">