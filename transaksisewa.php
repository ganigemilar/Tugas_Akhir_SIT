<!DOCTYPE html>
<html lang="en">
<?php
//memulai session
session_start();
//cek adanya session 
if(ISSET($_SESSION['username']))
{
	$namaAdmin = $_SESSION['username'];
//jika tidak ada session
} else
header("location:login.php");
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rental Kendaraan - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $namaAdmin;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Pengaturan</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li>
						<a href="index.php"><i class="fa fa-fw fa-home"></i> Beranda</a>
					</li>
                    <!--<li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>-->
					<li>
                        <a href="anggotabaru.php"><i class="fa fa-fw fa-user"></i> Anggota Baru</a>
                    </li>
					<li>
                        <a href="anggotalama.php"><i class="fa fa-fw fa-user"></i> Anggota Lama</a>
                    </li>
					<li class="active">
                        <a href="transaksisewa.php"><i class="fa fa-fw fa-edit"></i> Peminjaman</a>
                    </li>
					<li>
                        <a href="transaksikembali.php"><i class="fa fa-fw fa-edit"></i> Pengembalian</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Peminjaman
                        </h1>
						<div class="col-lg-8">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Peminjaman Kendaraan</h3>
							</div>
							<div class="panel-body">
								<form class="form col-lg-6" method="POST" action="client-get-kendaraan.php">
									<div class="form-group">
										<label>Jenis Kendaraan </label>
										<label class="radio-inline">
											<input id="optionsRadiosInline1" type="radio" checked="" value="motor" name="optionsRadiosInline">
											Motor
										</label>
										<label class="radio-inline">
											<input id="optionsRadiosInline2" type="radio" value="mobil" name="optionsRadiosInline">
											Mobil
										</label>
									</div>
									<!--<form class="form " method="POST" action="client-get-kendaraan.php">
									<div class="form-group">
										<button class="active btn btn-success" type="submit">Konfirmasi</button>
										<button class="btn btn-success" type="submit">Konfirmasi</button>
									</div>
									</form>-->
									<div class="form-group">
										<select name="kendaraan" class="form-control">
										</select>
									</div>
									<div class="form-group">
										<label>ID Kendaraan</label>
										<input name="idken" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Merek</label>
										<input name="merek" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Tipe</label>
										<input name="tipe" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Warna</label>
										<input name="warna" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Nomor Polisi</label>
										<input name="noPolisi" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Tahun</label>
										<input name="thn" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Status</label>
										<input name="status" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Biaya Sewa</label>
										<input name="biaya" class="form-control" placeholder="Enter text">
									</div>
									<div class="form-group">
										<button class="btn btn-success" type="submit">Konfirmasi</button>
									</div>
									<?php
									/*
										include('soapClientNG.php');
										$options = array('location' => "http://localhost/TugasAkhirSit/soap-server.php",'uri' => "http://localhost",);
										if(isset($_POST['nama']))
									{
									$anggotaBaru = array(
										'nama'=>$_POST['nama'],
										'jk'=>$_POST['jk'],
										'alamat'=>$_POST['alamat'],
										'no_telp'=>$_POST['noTelp'],
										'jenis_id'=>$_POST['jid'],
										'no_id'=>$_POST['noId']
									);
									try
									{
									$client = new SoapClientNG(null,$options);
									$addAnggota = $client->insert_anggota($anggotaBaru);
									//header('Location:soap-client.php');		
									}
									catch(SoapFault $e)
								{				
		
									}
									}*/
									?>
								</form>
							</div>
						</div>
						</div><!--col-lg-8-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
