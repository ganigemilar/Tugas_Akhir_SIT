<?php
	include("adodb/adodb.inc.php");	
	include("adodb/adodb-exceptions.inc.php");		
	class MyLib
	{
		public $db = null;
		function __construct() 
		{		
			try
			{
				$this->db = &ADONewConnection('mysql');
				$this->db->Connect('localhost', 'root', '','db_sewa_kendaraan');
			}
			catch(Exception $e)
			{
				die($this->db->ErrorMsg());
			}
			
  		}
		
		public function login($username, $password) {
		//enkripsi password dengan md5
		//$password = md5($password);
				
			$login = $this->db->Execute("SELECT * FROM operator WHERE username='$username' AND password='$password'");
			if ($login->RecordCount() >= 1) //sama dengan mysql_num_rows pada php biasa	
			{
				return true;
			} else {
				return false;
			}
		}

		function insertAnggota($nama,$jk,$alamat,$noT,$jId,$noId)
		{
			$input = $this->db-> Execute("INSERT INTO anggota(nama,jenis_kelamin,alamat,no_telp,jenis_id,no_id) VALUES('$nama','$jk','$alamat','$noT','$jId','$noId')");
			if ($input === false) 
			{
			    return 'Gagal menambahkan anggota : '.$this->db->ErrorMsg().'<BR>';
			}
			else
			{
				return 'Anggota baru berhasil ditambahkan!';
			}
		}
		
		function getAnggota($cariBerdasarkan,$data)
		{
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$anggota = $this->db->Execute("SELECT * FROM anggota WHERE $cariBerdasarkan='$data'");
			if ($anggota == false) 
			{
			    print 'error : '.$this->db->ErrorMsg().'<br>';
			}
			else
			{
				return $anggota->fields;
			}
		}
		public function get_all_books()
		{
			
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$books = $this->db->Execute('SELECT * FROM books');	
			$buku = array();
			while (!$books->EOF) { 
	            $buku[$books->fields[0]]['id_buku'] = $books->fields[0];
	            $buku[$books->fields[0]]['judul'] = $books->fields[1];
	            $buku[$books->fields[0]]['penerbit'] = $books->fields[2];
	            $buku[$books->fields[0]]['tahun'] = $books->fields[3];
	            $books->MoveNext(); 
	        }  
			return $buku;
		}

		public function get_book($id_book)
		{

			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$books = $this->db->Execute('SELECT * FROM books where id_buku='.$id_book.'');
			if ($books == false) 
			{
			    print 'error getting book information : '.$this->db->ErrorMsg().'<br>';
			}
			else
			{
				return $books->fields;
			}
		}

		public function insert_book($new_book)
		{
			$title=$new_book['judul'];
			$publisher=$new_book['penerbit'];
			$year=$new_book['tahun'];
			$book = "insert into books (judul,penerbit,tahun) values ('$title','$publisher','$year')";
			$inputBook = $this->db->Execute($book);
			if ($inputBook == false) 
			{
			    return 'error adding book: '.$this->db->ErrorMsg().'<BR>';
			}
			else
			{
				return 'success adding some book';
			}
		}

		public function update_book($id_book,$edit_book)
		{
			$title=$edit_book['judul'];
			$publisher=$edit_book['penerbit'];
			$year=$edit_book['tahun'];
			
			$book="UPDATE books SET judul='$title',penerbit='$publisher',tahun='$year' WHERE id_buku='$id_book'";
			$updateBook = $this->db->Execute($book);
			if ($updateBook == false) 
			{
			    print 'error editing book: '.$this->db->ErrorMsg().'<BR>';
			}
			else
			{
				print 'success editing some book';
			}
		}

		public function destroy_book($id_book)
		{
			$book="DELETE FROM books WHERE id_buku='$id_book'";
			$deleteBook = $this->db->Execute($book);
			if ($deleteBook === false) 
			{
			    print 'error deleting book: '.$this->db->ErrorMsg().'<BR>';
							header('Location:soap-client.php');
			}
			else
			{
				header('Location: http://localhost/sit6/soap-client.php');
				die();
			}
		}

	}
	
?>