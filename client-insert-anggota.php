<?php
	require_once('nusoap/lib/nusoap.php');
	//mendefinisikan alamat url service yang disediakan oleh client
	$client = new nusoap_client('http://localhost/TugasAkhirSit/sit_baru/server.php?wsdl',true);
	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$alamat=$_POST['alamat'];
	$noT=$_POST['noTelp'];
	$jId=$_POST['jId'];
	$noId=$_POST['noId'];
	$result = $client->call('insertAnggota',array('nama' =>$nama,'jk'=>$jk,'alamat'=>$alamat,'notelp'=>$noT,'jenisId'=>$jId,'noId'=>$noId)); //parameters);
	if($result == true) header ("location:transaksisewa.php");
?>