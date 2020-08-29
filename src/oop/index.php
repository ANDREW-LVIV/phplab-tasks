<?php

///
// SHOW all errors:
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// HIDE all errors:
// error_reporting(0);
// ini_set('display_errors', 0);
///

session_start();
include_once("Request.php");
$request = new Request();
include_once("Session.php");
$session = new Session();
include_once("Cookies.php");
$cookies = new Cookies();

//set cookie
if ($request->has('cookie_key') && $request->has('cookie_value')) {
	$cookies->set($request->post('cookie_key'), $request->post('cookie_value'));
	header('Location: //'.$request->requestURI());
}
//unset cookie
if ($request->has('cookie_key_unset') && $cookies->has($request->post('cookie_key_unset'))) {
	$cookies->remove($request->post('cookie_key_unset'));
	header('Location: //'.$request->requestURI());
}
//unset all cookies
if ($request->has('unset_cookies')) {
	$cookies->remove_all();
	header('Location: '.$request->refererURL());
}

//set session
if ($request->has('session_key') && $request->has('session_value')) {
	$session->set($request->post('session_key'), $request->post('session_value'));
	header('Location: //'.$request->requestURI());
}
//unset session
if ($request->has('session_key_unset') && $session->has($request->post('session_key_unset'))) {
	$session->remove($request->post('session_key_unset'));
	header('Location: //'.$request->requestURI());
}
//unset all sessions
if ($request->has('unset_session')) {
	$session->clear();
	header('Location: '.$request->refererURL());
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<title>PHP OOP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style type="text/css">
		* { font-size: 14px;}
		p { margin: 0; }
		pre { margin: 0; }
		.table tr td { padding: 3px 10px; }
		.table td { vertical-align: middle; }
		.table-bordered td, .table-bordered th { border: 2px solid #c9e9ee; }
		.table-bordered { border: 4px solid #bee5eb; }
	</style>
</head>

<body class="bg-light">
	<main role="main" class="container-fluid container-xl">

		<h3 class="text-info text-center p-3">PHP7 OOP</h3>
		<?php include("table-request.php") ?>
		<?php include("table-cookies.php") ?>
		<?php include("table-session.php") ?>

	</main>
	<footer class="container-fluid container-xl mt-3">
		<div class="footer-copyright text-center p-2">
			© 2020 <a href="https://github.com/ANDREW-LVIV" target="_blank">::ANDREW-LVIV::</a>
		</div>	
	</footer>

</body>
</html>
