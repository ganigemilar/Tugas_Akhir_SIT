<?php
	//call library
	include('MyLib.php');
	require_once('nusoap/lib/nusoap.php');
	require_once('adodb/adodb.inc.php');
	$server = new nusoap_server;
	$server->configureWSDL('server', 'urn:server');
	$server->wsdl->schemaTargetNamespace = 'urn:server';
	//register a function that works on server
	$server->register('login',
		array('username' => 'xsd:string','password'=>'xsd:string'), //parameters
		array('return' => 'xsd:boolean'),'urn:server','urn:server#loginServer','rpc','encoded','login');
	$server->register('insertAnggota',
		array('nama' => 'xsd:string','jk'=>'xsd:string','alamat'=>'xsd:string','notelp'=>'xsd:string','jenisId'=>'xsd:string','noId'=>'xsd:string'), //parameters
		array('return' => 'xsd: boolean'),'urn:server','urn:server#insertAnggota','rpc','encoded','crud');
	$server->register('insertKendaraan',
		array('idKen' => 'xsd:integer','jKen'=>'xsd:string','merek'=>'xsd:string','tipe'=>'xsd:string','warna'=>'xsd:string','noPol'=>'xsd:string','tahun'=>'xsd:integer','biaya'=>'xsd:integer','status'=>'xsd:string'), //parameters
		array('return' => 'xsd: boolean'),'urn:server','urn:server#insertKendaraan','rpc','encoded','crud');
	
	
	$server->register('getAnggota',
		array('cariBerdasarkan' => 'xsd:string','data'=>'xsd:string'), //parameters
		array('return' => 'xsd: string'),'urn:server','urn:server#getAnggota','rpc','encoded','crud');
	$server->register('getKendaraanByJenis',
		array('jKen'=>'xsd:string'), //parameters
		array('return' => 'xsd: boolean'),'urn:server','urn:server#CRUDServer','rpc','encoded','crud');
	
	//create function
	function login($username, $password) 
	{
		$mylib = new MyLib();
		return $result = $mylib->login($username,$password);
	}
	function insertAnggota($nama,$jk,$alamat,$noT,$jId,$noId)
	{
		$mylib = new MyLib();
		$result = $mylib->insertAnggota($nama,$jk,$alamat,$noT,$jId,$noId);
		if($result) return true;
	}
	function getAnggota($berdasarkan,$data)
	{
		$mylib = new MyLib();
		return $result = $mylib->getAnggota($berdasarkan,$data);
		
	}
	
	
//create HTTP listener
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
