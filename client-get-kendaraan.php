<?php
	//memulai session
	/*error_reporting(E_All);
	ini_set('display_error', 1);*/
	session_start();
	//panggil library
	require_once('nusoap/lib/nusoap.php');
	//mendefinisikan alamat url service yang disediakan oleh client
	$client = new nusoap_client('http://localhost/TugasAkhirSit/library.php?wsdl',true);
	$jKen=$_POST['tipeKendaraan'];
	$result = $client->call('get_kendaraan',array('nama' =>$nama,'jk'=>$jk,'alamat'=>$alamat,'notelp'=>$noT,'jenisId'=>$jId,'noId'=>$noId)); //parameters);
	if($result == true)
	{
		header ("location:anggotabaru.php");
	}
	else
	{
		header ("location:transaksisewa.php");
	}
?>