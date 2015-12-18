<?php
	session_start();

	require_once('nusoap/lib/nusoap.php');
	
	$client = new nusoap_client('http://localhost/TugasAkhirSit/sit_baru/server.php?wsdl',true);
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = $client->call('login',array('username'=>$username,'password'=>$password));

	/*echo 'Request';
	echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
	echo 'Response';
	echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
	echo 'Debug';
	echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';*/

	if($result == true){
		$_SESSION['username'] = $username;
		header ("location:index.php");
	} else{
		header ("location:login.php");
	}
?>