<?php
	require_once('nusoap/lib/nusoap.php');
	//mendefinisikan alamat url service yang disediakan oleh client
	$client = new nusoap_client('http://localhost/TugasAkhirSit/sit_baru/server.php?wsdl',true);
	$berdasarkan = $_GET['cariBerdasarkan'];
	$cariAnggota = $_GET['cariAnggota'];
		$result = $client->call('getAnggota',array('cariBerdasarkan'=>$berdasarkan,'data' =>$cariAnggota)); //parameters);
?>