<?php

class Api extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
	
	function api_token(){
	    return 'd4e729bcd8aab6f0a710e8ca3d31524cb5783dd1d63ddbf32fbed278c435605f';
	}



function add_berkas(){
    
   $data = json_decode(file_get_contents('php://input'), true);
   
   
   
    $berkas = $_FILES['berkas'];
   $fid_materi = $_POST['fid_materi'];
     $fid_user = $_POST['fid_user'];
     $nama = $_POST['nama'];
     $alamat = $_POST['alamat'];
    
        if($fid_materi==1){
             $nomor_surat = $_POST['nomor_surat'].'/1.755.2';
        }elseif($fid_materi==2){
             $nomor_surat = $_POST['nomor_surat'].'/-1.711.6';
        }else{
             $nomor_surat = $_POST['nomor_surat'];
        }
    
     $cek = $_POST['cek'];

     $persen = $_POST['persen'];
     $kode = sha1(date('YMDhis').$fid_materi.$fid_user);
   
   
 
   

     
    //  1 INSERT KE ARSIP
    $sql1="INSERT INTO data_arsip(kode,fid_materi,fid_user,nama,alamat,nomor_surat,persen) VALUES('$kode','$fid_materi','$fid_user','$nama','$alamat','$nomor_surat','$persen')";
    
    
  if($this->db->query($sql1)){
    //   insert cek
       
        if(count($cek)>0){
             for($i=0;$i<count($cek);$i++){
        $this->db->query("INSERT INTO data_cek(kode,fid_syarat) VALUES('$kode',$cek[$i])");
        }
        }
        
        
        // insert berkas
          if(count($berkas['name'])>0){
               for($b=0;$b<count($berkas['name']);$b++){
        
        	$target_dir = "berkas/";
    		$nama_file = $target_dir .basename($_FILES['berkas']['name'][$b]);
    		 $imageFileType = $_FILES['berkas']['type'][$b]=='application/pdf'?'pdf':'png';
    		$target_file = $target_dir .sha1(md5(date('ymdhis').$fid_user.$nama_file)).'.'.$imageFileType;
    		
    		move_uploaded_file($_FILES['berkas']['tmp_name'][$b], $target_file);
    		
    		 $this->db->query("INSERT INTO data_berkas(kode,nama_berkas,tipe_berkas,berkas_file) VALUES('$kode','$nama_file','$imageFileType','$target_file')");

    }
          }
    
  }
    

    echo 200;
  
    
}


function update_arsip(){
    $data = json_decode(file_get_contents('php://input'), true);
    $fid_user = $data['fid_user'];
    $kode = $data['kode'];
    $sql="UPDATE data_arsip SET fid_user='$fid_user' WHERE kode='$kode'";
    if($this->db->query($sql)){
        echo 200;
    }
    
    
}
function arsip(){
    $data = json_decode(file_get_contents('php://input'), true);
    $fid_user = $data['fid_user'];
    
    $sql="SELECT *,(select count(*) from data_syarat WHERE fid_materi=a.fid_materi) jml_syarat FROM data_arsip a JOIN data_materi c ON a.fid_materi = c.id_materi JOIN data_menu b ON c.fid_menu = b.id_menu JOIN data_user d ON a.fid_user = d.id ORDER BY a.id_arsip*1 DESC";

     $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
        
        array_push($arr,[
             'id'=>$r->id_arsip,
            'judul'=>$r->judul,
            'fid_user'=>$r->fid_user,
            'nama_lengkap'=>$r->nama_lengkap,
            'kode'=>$r->kode,
            'tanggal'=>$r->tanggal,
            'jam'=>$r->jam,
            'fid_materi'=>$r->fid_materi,
            'kategori'=>$r->kategori,
            'nama'=>$r->nama,
            'alamat'=>$r->alamat,
            'nomor_surat'=>$r->nomor_surat,
            'persen'=>$r->persen,
            ]);
            
    }
    
    echo json_encode($arr);
    
}
function persyaratan(){
    
     $data = json_decode(file_get_contents('php://input'), true);
     
     $fid_materi = $data['fid_materi'];
    
  
    $sql="SELECT * FROM data_syarat WHERE fid_materi='$fid_materi'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
        
        array_push($arr,[
             'id'=>$r->id_syarat,
              'nama_syarat'=>$r->nama_syarat,
              
              
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
}


function anak(){
    
     $data = json_decode(file_get_contents('php://input'), true);
     
     $fid_user = $data['fid_user'];
    
  
    $sql="SELECT * FROM data_anak WHERE fid_user='$fid_user'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
        
        array_push($arr,[
             'id'=>$r->id_anak,
              'nama'=>$r->nama,
              'tanggal_lahir'=>$r->tanggal_lahir,
              'jenis_kelamin'=>$r->jenis_kelamin,
              'orangtua'=>$r->orangtua,
            
            ]);
            
    }
    
    echo json_encode($arr);
}


function update_anak(){
    
     $data = json_decode(file_get_contents('php://input'), true);
     
    $fid_user = $data['fid_user'];
    $nama = $data['nama'];
    $tanggal_lahir = $data['tanggal_lahir'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $orangtua = $data['orangtua'];
    
  
    $sqlCek="SELECT * FROM data_anak WHERE fid_user='$fid_user'";
    
    if($this->db->query($sqlCek)->num_rows() > 0){
        $sqlUPD="UPDATE data_anak SET nama='$nama',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',orangtua='$orangtua' WHERE fid_user='$fid_user'";
    }else{
        $sqlUPD="INSERT INTO data_anak(
            nama,
            tanggal_lahir,
            jenis_kelamin,
            fid_user,
            orangtua
            
            ) VALUES(
                '$nama',
                '$tanggal_lahir',
                '$jenis_kelamin',
                '$fid_user',
                '$orangtua'
                
                )";
    }
    
    $this->db->query($sqlUPD);
  
    
   
   
    $arr = array();
    
    foreach($this->db->query($sqlCek)->result() as $r){
        
        array_push($arr,[
             'id'=>$r->id_anak,
             'fid_user'=>$r->fid_user,
              'nama'=>$r->nama,
              'tanggal_lahir'=>$r->tanggal_lahir,
              'jenis_kelamin'=>$r->jenis_kelamin,
            
            ]);
            
    }
    
    echo json_encode($arr);
}


function add_posyandu(){
    $data = json_decode(file_get_contents('php://input'), true);
    
    $berat_badan = $data['berat_badan'];
    $fid_anak = $data['fid_anak'];
    $lingkar_kepala = $data['lingkar_kepala'];
    $tanggal = $data['tanggal'];
    $tinggi_badan = $data['tinggi_badan'];
 
    $sql="INSERT INTO data_posyandu(
            berat_badan,
            fid_anak,
            lingkar_kepala,
            tanggal,
            tinggi_badan
        ) VALUES(
                '$berat_badan',
                '$fid_anak',
                '$lingkar_kepala',
                '$tanggal',
                '$tinggi_badan'
            
            )";
            
    if($this->db->query($sql)){
        echo 200;
    }
}

function posyandu(){
    
    $data = json_decode(file_get_contents('php://input'), true);
    $fid_user = $data['fid_user'];

    $sql="SELECT * FROM data_posyandu a JOIN data_anak b ON a.fid_anak = b.id_anak JOIN data_user c ON b.fid_user = c.id WHERE b.fid_user = '$fid_user'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
        
        array_push($arr,[
             'id'=>$r->id_posyandu,
                    'tanggal'=>$r->tanggal,
                    'berat_badan'=>$r->berat_badan,
                    'fid_anak'=>$r->fid_anak,
                    'lingkar_kepala'=>$r->lingkar_kepala,
                    'tanggal'=>$r->tanggal,
                    'tinggi_badan'=>$r->tinggi_badan,
                    'nama'=>$r->nama,
                    'jenis_kelamin'=>$r->jenis_kelamin,
                    'tanggal_lahir'=>$r->tanggal_lahir,
                    
                

                
                
            
            ]);
            
    }
    
    shuffle($arr);
    
    echo json_encode($arr);
}

function catatan(){
    
    $data = json_decode(file_get_contents('php://input'), true);
    $fid_user = $data['fid_user'];
    $sql="SELECT * FROM data_catatan a JOIN data_user b ON a.fid_user = b.id WHERE a.fid_user='$fid_user'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
        
        $arrDetail = array();
        
                         foreach($this->db->query("SELECT * FROM data_jawab WHERE fid_catatan='".$r->id_catatan."'")->result() as $d){
		  				     array_push($arrDetail,$d->jawaban);
		  				   }
        
        array_push($arr,[
             'id'=>$r->id_catatan,
              'catatan'=>$r->catatan,
              'fid_user'=>$r->fid_user,
              'tanggal'=>$r->tanggal,
              'jam'=>$r->jam,
              'nama_lengkap'=>$r->nama_lengkap,
              'jawaban'=>$arrDetail
              
              
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
}


function catatan_delete(){
      $data = json_decode(file_get_contents('php://input'), true);
    
     $id = $data['id'];
   
     $sql="DELETE FROM data_catatan WHERE id_catatan='$id'";
     
       if($this->db->query($sql)){
        echo 200;
    }
}

function catatan_add(){
        $data = json_decode(file_get_contents('php://input'), true);
    
     $fid_user = $data['fid_user'];
     $catatan = $data['catatan'];
     
     $sql="INSERT INTO data_catatan(fid_user,catatan) VALUES('$fid_user','$catatan')";
     
       if($this->db->query($sql)){
        echo 200;
    }
    
}

function nilai_add(){
        $data = json_decode(file_get_contents('php://input'), true);
    
    $kategori = $data['kategori'];
    $fid_user = $data['fid_user'];
    $nilai = $data['nilai'];
    
    if($kategori=='DASAR-DASAR K3'){
        $sql="UPDATE data_user SET nilai1='$nilai' WHERE id='$fid_user'";
    }elseif($kategori=='ALAT PELINDUNG DIRI'){
        $sql="UPDATE data_user SET nilai2='$nilai' WHERE id='$fid_user'";
    }
    elseif($kategori=='RAMBU-RAMBU K3'){
        $sql="UPDATE data_user SET nilai3='$nilai' WHERE id='$fid_user'";
    }
    elseif($kategori=='5 R'){
        $sql="UPDATE data_user SET nilai4='$nilai' WHERE id='$fid_user'";
    }
    elseif($kategori=='PRETEST'){
        $sql="UPDATE data_user SET nilai5='$nilai' WHERE id='$fid_user'";
    }
  
 
    if($this->db->query($sql)){
        echo 200;
    }
}	


function soal(){
    
    $data = json_decode(file_get_contents('php://input'), true);
    

    $sql="SELECT * FROM data_soal ORDER BY nomor*1 ASC";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
        
        array_push($arr,[
             'id'=>$r->id_soal,
                    'nomor'=>$r->nomor,
                'soal'=>$r->soal,
                 'a'=>$r->a,
                     'b'=>$r->b,
                         'c'=>$r->c,
                             'd'=>$r->d,
                          
                                 'jawaban'=>$r->jawaban,
  

                
                
            
            ]);
            
    }
    
    shuffle($arr);
    
    echo json_encode($arr);
}
// 	LOGIN
function login(){
        $data = json_decode(file_get_contents('php://input'), true);

        if($data['api_token']==$this->api_token()){
            // /your code fill here
        
        $username = $data['username'];
        $password = sha1($data['password']);
       
             
             $sql="SELECT * FROM data_user WHERE username='$username' AND password='$password'";
             $cek=$this->db->query($sql)->num_rows();
            
            if($cek > 0){
                     $arr = $this->db->query($sql)->row_array();
                echo json_encode(array("status"=>200,"message"=>"success","data"=>$arr));
           
            }else{
               
               
               
                echo json_encode(array("status"=>404,"message"=>"Username atau password salah !"));
            }
            
            
            
            
        }else{
            echo json_encode(array("status"=>404,"result"=>"Invalid Token"));
        }
        
	   
	}


function rekap_insert(){
        $data = json_decode(file_get_contents('php://input'), true);
        $nama_operator = $data['nama_operator'];
        $proyek = $data['proyek'];
        $jam_awal = $data['jam_awal'];
        $jam_akhir = $data['jam_akhir'];
        $tanggal = $data['tanggal'];
        $kode_unit = $data['kode_unit'];
        $hm_awal = $data['hm_awal'];
        $hm_akhir = $data['hm_akhir'];
        $jumlah_meter = $data['jumlah_meter'];
        $fid_user = $data['fid_user'];
        
        $sql="INSERT INTO data_rekap(
                nama_operator,
                proyek,
                jam_awal,
                jam_akhir,
                tanggal,
                kode_unit,
                hm_awal,
                hm_akhir,
                jumlah_meter,
                fid_user
            ) VALUES(
            
            '$nama_operator',
            '$proyek',
            '$jam_awal',
            '$jam_akhir',
            '$tanggal',
            '$kode_unit',
            '$hm_awal',
            '$hm_akhir',
            '$jumlah_meter',
            '$fid_user'
            
            )";
            
            if($this->db->query($sql)){
                
                 echo json_encode(array("status"=>200,"message"=>"Selamat data berhasil disimpan !"));
            }

}
// REGISTER
	function register(){
        $data = json_decode(file_get_contents('php://input'), true);

        if($data['api_token']==$this->api_token()){
            // /your code fill here
        
        $username = $data['username'];
        $nama_lengkap = $data['nama_lengkap'];
     
        $password = sha1($data['password']);
        
        
        
        
        

     
       
            

    
    
    
             $sql="INSERT INTO data_user(
            		username,
            		nama_lengkap,
            		password
            		
            
            ) VALUES(
             
            '$username',
            '$nama_lengkap',
            '$password'
            
            )";
            
      
             
             
             $cek=$this->db->query("SELECT * FROM data_user WHERE username='$username'")->num_rows();
            
            if($cek > 0){
                echo json_encode(array("status"=>404,"message"=>"Username sudah terdaftar !"));
                
            }else{
                $this->db->query($sql);
                echo json_encode(array("status"=>200,"message"=>"Congratulation, You have been registered!"));
            }
            
            
            
            
        }else{
            echo json_encode(array("status"=>404,"result"=>"Invalid Token"));
        }
        
	   
	}
// PENGATURAN
function company(){
        $data = json_decode(file_get_contents('php://input'), true);

      
             
                 $sql="SELECT * FROM data_company limit 1";
                 $arr = $this->db->query($sql)->row_array();
                echo json_encode(array("status"=>200,"message"=>"success","data"=>$arr));
      
            
        
	   
	}
	
	
	function slider(){
	    $data = json_decode(file_get_contents('php://input'), true);
    
    $sql="SELECT * FROM data_artikel";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_artikel,
                'judul'=>$r->judul,
                'tipe'=>$r->tipe,
                
      
                 'image'=>site_url().$r->foto_artikel,
                
            
            ]);
            
    }
    
    echo json_encode($arr);
	}
	
	
function artikel(){
    $data = json_decode(file_get_contents('php://input'), true);
    $sql="SELECT * FROM data_artikel";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_artikel,
                'judul'=>$r->judul,
                'keterangan'=>$r->keterangan,
                
      
                 'image'=>site_url().$r->foto_artikel,
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}

function pegawai(){
       $data = json_decode(file_get_contents('php://input'), true);
       
       $dinas = $data['dinas'];
    
    
    $sql="SELECT * FROM data_pegawai WHERE dinas='$dinas'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_pegawai,
                'dinas'=>$r->dinas,
                'nama'=>$r->nama,
                'nip'=>$r->nip,
                'jabatan'=>$r->jabatan,
                'opd'=>$r->opd,
                'nomor_st'=>$r->nomor_st,
                'tanggal_berangkat'=>$r->tanggal_berangkat,
                'tanggal_kembali'=>$r->tanggal_kembali,
                'selama'=>$r->selama,
                'disetujui'=>$r->disetujui,
                'tujuan'=>$r->tujuan,
                'uraian'=>$r->uraian,
           
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}

function materi(){
       $data = json_decode(file_get_contents('php://input'), true);
    $fid_menu = $data['fid_menu'];
    $sql="SELECT * FROM data_materi WHERE fid_menu='$fid_menu'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_materi,
                'kategori'=>$r->kategori,
                'icon'=>site_url().$r->icon_materi,

                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}
	
// 	SLIDER

function informasi(){
       $data = json_decode(file_get_contents('php://input'), true);
    
    $sql="SELECT * FROM data_informasi";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_informasi,
                'keterangan'=>$r->keterangan,
                'image'=>site_url().$r->file_informasi,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}

function rumah_sakit(){
       $data = json_decode(file_get_contents('php://input'), true);
    
    $sql="SELECT * FROM data_rs";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_rs,
                'nama_rs'=>$r->nama_rs,
                'telepon_rs'=>$r->telepon_rs,
                'nik_rs'=>$r->nik_rs,
                'image'=>site_url().$r->file_rs,
                'pdf'=>site_url().$r->filepdf_rs,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}

// 	KATEGORI

function menu(){
       $data = json_decode(file_get_contents('php://input'), true);
    
    $sql="SELECT * FROM data_menu";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_menu,
                'judul'=>$r->judul,
                'modul'=>$r->modul,
                'image'=>site_url().$r->file_menu,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}

// 	PRODUK

function produk(){
     $data = json_decode(file_get_contents('php://input'), true);
    $fid_kategori = $data['fid_kategori'];
    $sql="SELECT * FROM data_produk WHERE fid_kategori='$fid_kategori'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_produk,
                'nama_produk'=>$r->nama_produk,
                'harga_produk'=>$r->harga_produk,
                'keterangan'=>$r->keterangan,
                'image'=>site_url().$r->file_produk,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}
// DOKTER
function dokter(){
     $data = json_decode(file_get_contents('php://input'), true);
  
    $sql="SELECT * FROM data_dokter";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_dokter,
                'nama_dokter'=>$r->nama_dokter,
                'jadwal'=>$r->jadwal,
                'spesialis'=>$r->spesialis,
                'telepon'=>$r->telepon,
                'image'=>site_url().$r->file_dokter,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}


function get_data_order(){
     $data = json_decode(file_get_contents('php://input'), true);
    
    $sql="SELECT * FROM data_produk";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'value'=>$r->nama_produk .' / '. $r->harga_produk,
                'label'=>$r->nama_produk.' / '. $r->harga_produk,
                
            
            ]);
            
    }

        
    $sql2="SELECT * FROM data_kain";
    $arr2 = array();
    
    foreach($this->db->query($sql2)->result() as $r2){
    
        
        array_push($arr2,[
                'value'=>$r2->nama_kain,
                'label'=>$r2->nama_kain,
                
            
            ]);
            
    }
    
    
    array_push($arr2,['label'=>'Dari Konsumen','value'=>'Dari Konsumen']);
    
        $sql3="SELECT * FROM data_model";
    $arr3 = array();
    
    foreach($this->db->query($sql3)->result() as $r3){
    
        
        array_push($arr3,[
                'value'=>$r3->nama_model,
                'label'=>$r3->nama_model,
                
            
            ]);
            
    }
    
    array_push($arr3,['label'=>'Dari Konsumen','value'=>'Dari Konsumen']);
    
    echo json_encode(array(
            
            "produk"=>$arr,
            "kain"=>$arr2,
            "model"=>$arr3,
            
        ));
    
}
function data_order_detail(){
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    $id_order = $data['id'];
    $sql = "SELECT * FROM data_order a JOIN data_user b ON a.fid_user = b.id WHERE a.id_order='$id_order'";
    
     $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_order,
                'nomor_order'=>$r->nomor_order,
                'pembayaran'=>$r->pembayaran,
                'tanggal'=>$r->tanggal,
                'jenis'=>$r->jenis,
                'kain'=>$r->kain,
                'model'=>$r->model,
                'produk'=>$r->produk,
                'ukuran'=>$r->ukuran,
                'biaya'=>$r->biaya,
                'nik_kirim'=>$r->nik_kirim,
                 'tanggal_kirim'=>$r->tanggal_kirim,
                'foto_bayar'=>$r->foto_bayar,
                'foto_terima'=>$r->foto_terima,
                'status'=>$r->status,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
   
}


function data_order(){
    $data = json_decode(file_get_contents('php://input'), true);
    
    $fid_user = $data['fid_user'];
    $sql = "SELECT * FROM data_order a JOIN data_user b ON a.fid_user = b.id WHERE a.fid_user='$fid_user'";
    
     $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_order,
                'nomor_order'=>$r->nomor_order,
                'pembayaran'=>$r->pembayaran,
                'tanggal'=>$r->tanggal,
                'jenis'=>$r->jenis,
                'kain'=>$r->kain,
                'model'=>$r->model,
                'produk'=>$r->produk,
                'ukuran'=>$r->ukuran,
                'biaya'=>$r->biaya,
                'nik_kirim'=>$r->nik_kirim,
                 'tanggal_kirim'=>$r->tanggal_kirim,
                'foto_bayar'=>$r->foto_bayar,
                'foto_terima'=>$r->foto_terima,
                'status'=>$r->status,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
   
    
    
}

function data_order_update(){
     $data = json_decode(file_get_contents('php://input'), true);
         $foto = $data['foto_terima'];
     
      if($foto !="https://zavalabs.com/nogambar.jpg"){
          
           $path_slider = sha1(date('ymdhis'))."_buktiterima.png";
            list($foto, $foto) = explode(';base64', $foto);
            list(, $foto) = explode(',', $foto);
            $foto = base64_decode($foto);
            file_put_contents('./myupload/'.$path_slider, $foto);
             $input_foto =site_url().'myupload/'.$path_slider;
      }else{
           $input_foto = $foto ;
      }
      
      $id = $data['id'];
      
      $sql="UPDATE data_order SET status='SELESAI',foto_terima='$input_foto' WHERE id_order='$id'";
        $this->db->query($sql);
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil ditambahkan !"));
}

function order_add(){
        $data = json_decode(file_get_contents('php://input'), true);
        
        
            // /your code fill here
            
            
     $foto = $data['foto_bayar'];
     
      if($foto !="https://zavalabs.com/nogambar.jpg"){
          
           $path_slider = sha1(date('ymdhis'))."_buktibayar.png";
            list($foto, $foto) = explode(';base64', $foto);
            list(, $foto) = explode(',', $foto);
            $foto = base64_decode($foto);
            file_put_contents('./myupload/'.$path_slider, $foto);
             $input_foto =site_url().'myupload/'.$path_slider;
      }else{
           $input_foto = $foto ;
      }
    date_default_timezone_set('Asia/Jakarta');
    
            $nomor_order = date('ymdhis');

            $fid_user = $data['fid_user'];
            $jenis = $data['jenis'];
            $kain = $data['kain'];
            $model = $data['model'];
            $ex = explode(" / ",$data['produk']);
            
            $produk = $ex[0];
            $ukuran = $data['ukuran'];
            $biaya = $data['jenis']=='Produk Baru'?0:$data['biaya'];
            $pembayaran = $data['pembayaran'];
            $tanggal_kirim = $data['tanggal_kirim'];
            $nik_kirim = $data['nik_kirim'];
    
    
  
      
       
    
    
    
             $sql="INSERT INTO data_order(
            		nomor_order,
            	    fid_user,
                    jenis,
                    kain,
                    model,
                    produk,
                    ukuran,
                    biaya,
                    pembayaran,
                    tanggal_kirim,
                    nik_kirim,
            		foto_bayar
            
            ) VALUES(
            '$nomor_order',
            '$fid_user',
            '$jenis',
            '$kain',
            '$model',
            '$produk',
            '$ukuran',
            '$biaya',
            '$pembayaran',
            '$tanggal_kirim',
            '$nik_kirim',
       
            '$input_foto'
            
            )";
             
             
          
                $this->db->query($sql);
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil ditambahkan !"));
            
        
            
}

// UPDATE PROFILE
function update_profile(){
    $data = json_decode(file_get_contents('php://input'), true);
    
        $foto_user = $data['newfoto_user'];
        $old_foto_user = $data['foto_user'];
        
        
        if(strlen($foto_user) > 250){
            
            
                $path_user = sha1(date('ymdhis'))."_avatar.png";
                list($foto_user, $foto_user) = explode(';base64', $foto_user);
                list(, $foto_user) = explode(',', $foto_user);
                $foto_user = base64_decode($foto_user);
                file_put_contents('./myupload/'.$path_user, $foto_user);
                $input_user = site_url().'myupload/'.$path_user;
                
             
                 
                if($data['foto_user']!="https://zavalabs.com/nogambar.jpg"){
                 unlink(str_replace(site_url(),"",$old_foto_user));
                }
                
        }else{
            $input_user = $data['foto_user'];
        }
    
     
        
        $username = $data['username'];
        $id = $data['id'];
        
     
        $nama_lengkap = $data['nama_lengkap'];
       

        if(!empty($data['newpassword'])){
             $password = sha1($data['newpassword']);
             
             $sql="UPDATE data_user SET username='$username',
                nama_lengkap='$nama_lengkap',
             password='$password',foto_user='$input_user' WHERE id='$id'";
        
            
        }else{
            $sql="UPDATE data_user SET  username='$username',
                nama_lengkap='$nama_lengkap',
            foto_user='$input_user' WHERE id='$id'";
        }
       
       
       $this->db->query($sql);
       
        $sqlHasil = "SELECT * FROM data_user WHERE id='$id'";
          $arr = $this->db->query($sqlHasil)->row_array();
          echo json_encode(array("status"=>200,"message"=>"Profile berhasil di update !","data"=>$arr));
}

function update_info(){
    $data = json_decode(file_get_contents('php://input'), true);
    
       $id = $data['id'];
        $sqlHasil = "SELECT * FROM data_user WHERE id='$id'";
          $arr = $this->db->query($sqlHasil)->row_array();
          echo json_encode($arr);
}

// PENGGUNA

function pengguna_list(){
     $data = json_decode(file_get_contents('php://input'), true);
    
    
    $fid_user = $data['fid_user'];
    $sql="SELECT * FROM data_user WHERE id !='$fid_user'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'value'=>$r->id,
                'label'=>$r->nama_lengkap,

            
            ]);
            
    }
    
    echo json_encode($arr);
    
}


function pengguna(){
     $data = json_decode(file_get_contents('php://input'), true);
    
    $sql="SELECT * FROM data_user";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id,
                'username'=>$r->username,
                'nama_lengkap'=>$r->nama_lengkap,
                    'telepon'=>$r->telepon,
                        'nik'=>$r->nik,
                        'level'=>$r->level,
                        
                        'kategori'=>$r->kategori,
                        'jabatan'=>$r->jabatan,
                        'jenis_kelamin'=>$r->jenis_kelamin,
                        'tempat_lahir'=>$r->tempat_lahir,
                        'tanggal_lahir'=>$r->tanggal_lahir,


                        'foto_user'=>$r->foto_user,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}


	
	
// TARGET

function target(){
      $data = json_decode(file_get_contents('php://input'), true);
    
    $sql="SELECT *,(SELECT IF(a.rumus='AVG',AVG(capaian),IF(a.rumus='MIN',MIN(capaian),IF(a.rumus='MAX',MAX(capaian),SUM(capaian)))) FROM data_targetd WHERE fid_target=a.id_target) target_avg FROM data_target a ORDER BY a.id_target*1 ASC;";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_target,
                'kategori'=>$r->kategori,
                
                'rumus'=>$r->rumus,
                'hijau_min'=>$r->hijau_min,
                'hijau_max'=>$r->hijau_max,
                'kuning_min'=>$r->kuning_min,
                'kuning_max'=>$r->kuning_max,
                'merah_min'=>$r->merah_min,
                'merah_max'=>$r->merah_max,
                
                'jenis'=>$r->jenis,
                    'target_avg'=>round($r->target_avg,1),
                    'target'=>round($r->target,1),
                        'judul'=>$r->judul,
                        'keterangan'=>$r->keterangan
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
}

function get_target_all(){
    error_reporting(0);
    $data = json_decode(file_get_contents('php://input'), true); 
    
    // jayagiri
    
    $arrTarget = array();
    
    $arr = array('Jayagiri','Villa','RnV','Kebun');
    
    for($i=0;$i < count($arr);$i++){
        
        $kat1= $arr[$i];
    
    
    $target = $this->db->query("SELECT ROUND(AVG(((SELECT IF(a.rumus='AVG',AVG(capaian),IF(a.rumus='MIN',MIN(capaian),IF(a.rumus='MAX',MAX(capaian),SUM(capaian)))) FROM data_targetd WHERE fid_target=a.id_target)/a.hijau_max)*100),2) nilai FROM data_target a WHERE a.kategori='$kat1' GROUP BY a.kategori;")->row_object();
    
      
      $nilai = $this->db->query("SELECT ROUND(AVG((SELECT ROUND(AVG(((SELECT COUNT(*) FROM data_pjdetail WHERE fid_user=u.id AND fid_pjdaftar=a.id_pjdaftar) / a.bobot)*100),2) nilai FROM `data_pjdaftar` a)),2) nilai FROM data_user u WHERE u.kategori='$kat1' GROUP BY u.kategori")->row_object();
     
     array_push($arrTarget,[
            
            'kategori'=>$arr[$i],
            'target'=>$target->nilai==null?0:$target->nilai,
            'pj'=>$nilai->nilai==null?0:$nilai->nilai,
         
         ]);
    
    
    }
    
    
    echo json_encode($arrTarget);
    
    
    
    
}


function target_detail(){
    
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $sql="SELECT *,(SELECT IF(a.rumus='AVG',AVG(capaian),IF(a.rumus='MIN',MIN(capaian),IF(a.rumus='MAX',MAX(capaian),SUM(capaian)))) FROM data_targetd WHERE fid_target=a.id_target) target_avg FROM data_target a WHERE a.id_target='$id'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_target,
                'kategori'=>$r->kategori,
                'jenis'=>$r->jenis,
                    'target_avg'=>round($r->target_avg,1),
                    'target'=>round($r->target,1),
                        'judul'=>$r->judul,
                        'keterangan'=>$r->keterangan,
                        'rumus'=>$r->rumus,
                'hijau_min'=>$r->hijau_min,
                'hijau_max'=>$r->hijau_max,
                'kuning_min'=>$r->kuning_min,
                'kuning_max'=>$r->kuning_max,
                'merah_min'=>$r->merah_min,
                'merah_max'=>$r->merah_max,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}

function pjlist_add(){
         $data = json_decode(file_get_contents('php://input'), true);
        
         $jenis = $data['jenis'];
        $judul = $data['judul'];
        $bobot = $data['bobot'];
        $fid_user =$data['fid_user'];
        
       
        
        $sql="INSERT INTO data_pjdaftar(
            jenis,
            judul,
            bobot,
            fid_user
            
            ) VALUES(
                
                '$jenis',
                '$judul',
                '$bobot',
                '$fid_user'
                
                )";
                
                if( $this->db->query($sql)){
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil disimpan !"));    
                }
                
                
                
}

function target_add(){
         $data = json_decode(file_get_contents('php://input'), true);
        
        $kategori = $data['kategori'];
        $judul = $data['judul'];
        $keterangan = $data['keterangan'];
        $jenis = $data['jenis'];
        
           $rumus = $data['rumus'];
           $hijau_min = str_replace(",","",$data['hijau_min']);
           $hijau_max = str_replace(",","",$data['hijau_max']);
           
           $kuning_min = str_replace(",","",$data['kuning_min']);
           $kuning_max = str_replace(",","",$data['kuning_max']);
           
           $merah_min = str_replace(",","",$data['merah_min']);
           $merah_max = str_replace(",","",$data['merah_max']);
           
        
        $sql="INSERT INTO data_target(
            kategori,
            judul,
            keterangan,
            jenis,
            
            rumus,
            hijau_min,
            hijau_max,
            kuning_min,
            kuning_max,
            merah_min,
            merah_max
            
            
            ) VALUES(
                
                '$kategori',
                '$judul',
                '$keterangan',
                '$jenis',
                '$rumus',
                '$hijau_min',
                '$hijau_max',
                '$kuning_min',
                '$kuning_max',
                '$merah_min',
                '$merah_max'
                
                )";
                
                if( $this->db->query($sql)){
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil disimpan !"));    
                }
                
                
                
}
function target_detail_add(){
         $data = json_decode(file_get_contents('php://input'), true);
        
        $fid_target = $data['fid_target'];
        $tanggal = $data['tanggal'];
        $capaian = str_replace(",","",$data['capaian']);
        
        $sql="INSERT INTO data_targetd(
           fid_target,
           tanggal,
           capaian
            
            ) VALUES(
                
               '$fid_target',
               '$tanggal',
               '$capaian'
                
                )";
                
                if( $this->db->query($sql)){
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil disimpan !"));    
                }
                
                
                
}   

function targetd(){
       $data = json_decode(file_get_contents('php://input'), true);
       
       $fid_target = $data['fid_target'];
    
    $sql="SELECT * FROM data_targetd WHERE fid_target='$fid_target' ORDER BY id_targetd*1 ASC";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_targetd,
                'tanggal'=>$r->tanggal,
                'capaian'=>$r->capaian,
                
                
            
            ]);
            
    }
    
    echo json_encode($arr);
}
function targetd_delete(){
    
    $data = json_decode(file_get_contents('php://input'), true);
        
        $id = $data['id'];
        
        $sql="DELETE FROM data_targetd WHERE id_targetd='$id'";
                
                if( $this->db->query($sql)){
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil disimpan !"));    
                }
    
}

function target_delete(){
    
    $data = json_decode(file_get_contents('php://input'), true);
        
        $id = $data['id'];
        
        $sql="DELETE FROM data_target WHERE id_target='$id'";
         $sql2="DELETE FROM data_targetd WHERE fid_target='$id'";
                
                if( $this->db->query($sql)){
                    $this->db->query($sql2);
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil disimpan !"));    
                }
    
}

// list PJ

function get_pj_saya(){
     $data = json_decode(file_get_contents('php://input'), true);
      
      $fid_user = $data['fid_user'];
    
    $sql="SELECT ROUND(AVG(((SELECT COUNT(*) FROM data_pjdetail WHERE fid_user='$fid_user' AND fid_pjdaftar=a.id_pjdaftar) / a.bobot)*100),2) nilai FROM `data_pjdaftar` a;";

$arr= $this->db->query($sql)->row_array();
    echo json_encode($arr); 
}


function get_pj_kategori(){
        $data = json_decode(file_get_contents('php://input'), true);
    $kategori = $data['kategori'];
    $sql="SELECT ROUND(AVG((SELECT ROUND(AVG(((SELECT COUNT(*) FROM data_pjdetail WHERE fid_user=u.id AND fid_pjdaftar=a.id_pjdaftar) / a.bobot)*100),2) nilai FROM `data_pjdaftar` a)),2) nilai FROM data_user u WHERE u.kategori='$kategori' GROUP BY u.kategori;";
    $arr= $this->db->query($sql)->row_array();
    echo json_encode($arr); 
    
}
function pj_list(){
      $data = json_decode(file_get_contents('php://input'), true);
      
      $fid_user = $data['fid_user'];
      if(!empty($data['fid_user'])){
          $sql="SELECT *,IF(a.jenis='Amanah',(SELECT ROUND(SUM(persentase),2) FROM data_amanah WHERE fid_user='$fid_user' AND fid_pjdaftar=a.id_pjdaftar),((SELECT COUNT(*) FROM data_pjdetail WHERE fid_user='$fid_user' AND fid_pjdaftar=a.id_pjdaftar) / a.bobot)*100 ) nilai FROM `data_pjdaftar` a JOIN data_user u ON a.fid_user = u.id WHERE a.fid_user='$fid_user';";
      
          
      }else{
         $sql="SELECT *,IF(a.jenis='Amanah',(SELECT ROUND(AVG(persentase),2) FROM data_amanah WHERE fid_user='$fid_user' AND fid_pjdaftar=a.id_pjdaftar),((SELECT COUNT(*) FROM data_pjdetail WHERE fid_user='$fid_user' AND fid_pjdaftar=a.id_pjdaftar) / a.bobot)*100 ) nilai FROM `data_pjdaftar` a JOIN data_user u ON a.fid_user = u.id;"; 
      }
    
    
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_pjdaftar,
                'jenis'=>$r->jenis,
                'fid_user'=>$r->fid_user,
                'username'=>$r->username,
                'nama_lengkap'=>$r->nama_lengkap,
                'level'=>$r->level,
                'kategori'=>$r->kategori,
                'bobot'=>$r->bobot,
                'judul'=>$r->judul,
                'tanggal'=>$r->tanggal,
                'nilai'=>round($r->nilai,2),
              
                
            
            ]);
            
    }
    
    echo json_encode($arr);
}

function pj_list_daftar(){
      $data = json_decode(file_get_contents('php://input'), true);
      
      $fid_user = $data['fid_user'];
    
    $sql="SELECT * FROM `data_pjdaftar` a JOIN data_user b ON a.fid_user = b.id;";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_pjdaftar,
                'jenis'=>$r->jenis,
                'fid_user'=>$r->fid_user,
                 'judul'=>$r->judul,
                'username'=>$r->username,
                'nama_lengkap'=>$r->nama_lengkap,
                'level'=>$r->level,
                'kategori'=>$r->kategori,
                'bobot'=>$r->bobot,
                'tanggal'=>$r->tanggal,
                
              
                
            
            ]);
            
    }
    
    echo json_encode($arr);
}


function pj_list_pengguna(){
    $data = json_decode(file_get_contents('php://input'), true);
    $kategori = $data['kategori'];
    $sql="SELECT *,(SELECT ROUND(AVG(((SELECT COUNT(*) FROM data_pjdetail WHERE fid_user=u.id AND fid_pjdaftar=a.id_pjdaftar) / a.bobot)*100),2) nilai FROM `data_pjdaftar` a) nilai FROM data_user u WHERE u.kategori='$kategori';";
    
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id,
                'nama_lengkap'=>$r->nama_lengkap,
                'kategori'=>$r->kategori,
                'jabatan'=>$r->jabatan,
                'nilai'=>$r->nilai,
                'level'=>$r->level,
                'foto_user'=>$r->foto_user,
            
            ]);
            
    }
    
    echo json_encode($arr);
    
    
}
function pj_delete(){
      $data = json_decode(file_get_contents('php://input'), true);
      
      $id = $data['id'];
    
    $sql="DELETE FROM data_pjdaftar WHERE id_pjdaftar='$id'";
    if($this->db->query($sql)){
        echo 200;
    }
    
}

function pj_detail_delete(){
    $data = json_decode(file_get_contents('php://input'), true);
      
      $id = $data['id'];
      
      $tmp = $this->db->query("SELECT * FROM data_pjdetail WHERE id_pjdetail='$id'")->row_object();
      
      
      if($tmp->foto_pjdetail !="https://zavalabs.com/nogambar.jpg"){
                 unlink(str_replace(site_url(),"",$tmp->foto_pjdetail));
                }
                if($tmp->foto_pjdetail !="https://zavalabs.com/nogambar.jpg"){
                 unlink(str_replace(site_url(),"",$tmp->foto_pjdetail));
                }
                
    
    $sql="DELETE FROM data_pjdetail WHERE id_pjdetail='$id'";
    if($this->db->query($sql)){
        echo 200;
    }
}

function pj_ikhlas_hapus(){
    $data = json_decode(file_get_contents('php://input'), true);
      
      $id = $data['id'];
      
      $tmp = $this->db->query("SELECT * FROM data_ikhlas WHERE id_ikhlas='$id'")->row_object();
      
      
      if($tmp->foto_ikhlas1 !="https://zavalabs.com/nogambar.jpg"){
                 unlink(str_replace(site_url(),"",$tmp->foto_ikhlas1));
                }
                if($tmp->foto_ikhlas2 !="https://zavalabs.com/nogambar.jpg"){
                 unlink(str_replace(site_url(),"",$tmp->foto_ikhlas2));
                }
       
    
    $sql="DELETE FROM data_ikhlas WHERE id_ikhlas='$id'";
    if($this->db->query($sql)){
        echo 200;
        
                
                
    }
}


function pj_amanah_detail_delete(){
        $data = json_decode(file_get_contents('php://input'), true);
      
      $id = $data['id'];
      
          $tmp = $this->db->query("SELECT * FROM data_amanah WHERE id_amanah='$id'")->row_object();
      
      
      if($tmp->foto_amanah !="https://zavalabs.com/nogambar.jpg"){
                 unlink(str_replace(site_url(),"",$tmp->foto_amanah));
                }
                if($tmp->foto_amanah !="https://zavalabs.com/nogambar.jpg"){
                 unlink(str_replace(site_url(),"",$tmp->foto_amanah));
                }
                
    
    $sql="DELETE FROM data_amanah WHERE id_amanah='$id'";
    if($this->db->query($sql)){
        echo 200;
    }
}
function waktu(){
     $data = json_decode(file_get_contents('php://input'), true);
     $sql="SELECT * FROM data_waktu limit 1";
     $dt = $this->db->query($sql)->row_array();
     echo json_encode($dt);
}

function waktu_update(){
     $data = json_decode(file_get_contents('php://input'), true);
      
      $id = $data['id_waktu'];
      $tanggal_awal = $data['tanggal_awal'];
      $tanggal_akhir = $data['tanggal_akhir'];
      
            $hijau_min= $data['hijau_min'];
            $hijau_max= $data['hijau_max'];
            $kuning_min= $data['kuning_min'];
            $kuning_max= $data['kuning_max'];
            $merah_min= $data['merah_min'];
            $merah_max= $data['merah_max'];
      
    
    $sql="UPDATE data_waktu SET 
    
    hijau_min='$hijau_min',
    hijau_max='$hijau_max',
    kuning_min='$kuning_min',
    kuning_max='$kuning_max',
    merah_min='$merah_min',
    merah_max='$merah_max',


        tanggal_awal='$tanggal_awal',
        tanggal_akhir='$tanggal_akhir'
    WHERE id_waktu='$id'";
    if($this->db->query($sql)){
        echo 200;
    }
}

function pj_add(){
    
     $data = json_decode(file_get_contents('php://input'), true);

            // /your code fill here
            
            
     $foto = $data['foto_pjdetail'];
     
      if($foto !="https://zavalabs.com/nogambar.jpg"){
          
           $path_slider = sha1(date('ymdhis'))."_pjdetail.png";
            list($foto, $foto) = explode(';base64', $foto);
            list(, $foto) = explode(',', $foto);
            $foto = base64_decode($foto);
            file_put_contents('./myupload/'.$path_slider, $foto);
             $input_foto =site_url().'myupload/'.$path_slider;
      }else{
           $input_foto = $foto ;
      }
    

   
    
    
        
        $deskripsi = $data['deskripsi'];
        $fid_user = $data['fid_user'];
        $fid_pjdaftar = $data['fid_pjdaftar'];
    
      
       
    
    
    
             $sql="INSERT INTO data_pjdetail(
            		
            	    deskripsi,
                    fid_user,
                    fid_pjdaftar,
            		foto_pjdetail
            
            ) VALUES(
            
            '$deskripsi',
            '$fid_user',
            '$fid_pjdaftar',
            '$input_foto'
            
            )";
             
             
          
                $this->db->query($sql);
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil ditambahkan !"));
            
        
            
            
        
}
function pj_amanah_add(){
     $data = json_decode(file_get_contents('php://input'), true);


            
     $foto = $data['foto_amanah'];
     
      
    

   
    
    
        
       
        $fid_user = $data['fid_user'];
        $fid_pjdaftar = $data['fid_pjdaftar'];
        $persentase = $data['persentase'];
        $deskripsi = $data['deskripsi'];
        $tanggal_amanah = $data['tanggal_amanah'];
        
        // cek 
        
        $jml = $this->db->query("SELECT sum(persentase) persen FROM data_amanah WHERE fid_user='$fid_user' AND fid_pjdaftar='$fid_pjdaftar'")->row_object();
        
        if(($jml->persen+$persentase)>100){
            echo json_encode(array("status"=>404,"message"=>"Maaf maksimal 100% tidak bisa lebih ! \nAmanah sudah ".$jml->persen."%\nKamu input sebesar ".$persentase."%"));
            die();
        }else{
            
            if($foto !="https://zavalabs.com/nogambar.jpg"){
          
           $path_slider = sha1(date('ymdhis'))."_pjdetailamanah.png";
            list($foto, $foto) = explode(';base64', $foto);
            list(, $foto) = explode(',', $foto);
            $foto = base64_decode($foto);
            file_put_contents('./myupload/'.$path_slider, $foto);
             $input_foto =site_url().'myupload/'.$path_slider;
              }else{
                   $input_foto = $foto ;
              }
      
      
             $sql="INSERT INTO data_amanah(
            		
            		fid_user,
                    fid_pjdaftar,
                    persentase,
                    deskripsi,
                    tanggal_amanah,
                    foto_amanah
            	   
            
            ) VALUES(
            
                	'$fid_user',
                    '$fid_pjdaftar',
                    '$persentase',
                    '$deskripsi',
                    '$tanggal_amanah',
                    '$input_foto'
            
            )";
             
             
          
                $this->db->query($sql);
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil ditambahkan !"));
        }
    
      
       
    
    
    
            
            
        
            
}
function pj_list_detail(){
      $data = json_decode(file_get_contents('php://input'), true);
    
    $fid_pjdaftar = $data['fid_pjdaftar'];
    $fid_user = $data['fid_user'];
    $sql="SELECT * FROM data_pjdetail WHERE fid_pjdaftar='$fid_pjdaftar' AND fid_user='$fid_user'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_pjdetail,
                'deskripsi'=>$r->deskripsi,
                'tanggal_detail'=>$r->tanggal_detail,
                'jam_detail'=>substr($r->jam_detail,0,5),
                'foto_pjdetail'=>$r->foto_pjdetail,
            
            ]);
            
    }
    
    echo json_encode($arr);
}

function pj_amanah_detail(){
    $data = json_decode(file_get_contents('php://input'), true);
    
    $fid_pjdaftar = $data['fid_pjdaftar'];
    $fid_user = $data['fid_user'];
    
    $sql="SELECT * FROM data_amanah WHERE fid_pjdaftar='$fid_pjdaftar' AND fid_user='$fid_user'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_amanah,
                'deskripsi'=>$r->deskripsi,
                'tanggal_amanah'=>$r->tanggal_amanah,
                'persentase'=>$r->persentase,
                'foto_amanah'=>$r->foto_amanah,
            
            ]);
            
    }
    
    echo json_encode($arr);
    
}

function pj_ikhlas_add(){
    
     $data = json_decode(file_get_contents('php://input'), true);

            // /your code fill here
            
            
     $foto = $data['foto_ikhlas1'];
     
      if($foto !="https://zavalabs.com/nogambar.jpg"){
          
           $path_slider = sha1(date('ymdhis'))."_ikhlas1.png";
            list($foto, $foto) = explode(';base64', $foto);
            list(, $foto) = explode(',', $foto);
            $foto = base64_decode($foto);
            file_put_contents('./myupload/'.$path_slider, $foto);
             $input_foto =site_url().'myupload/'.$path_slider;
      }else{
           $input_foto = $foto ;
      }
      
                
     $foto2 = $data['foto_ikhlas2'];
     
      if($foto2 !="https://zavalabs.com/nogambar.jpg"){
          
           $path_slider2 = sha1(date('ymdhis'))."_ikhlas2.png";
            list($foto2, $foto2) = explode(';base64', $foto2);
            list(, $foto2) = explode(',', $foto2);
            $foto2 = base64_decode($foto2);
            file_put_contents('./myupload/'.$path_slider2, $foto2);
             $input_foto2 =site_url().'myupload/'.$path_slider2;
      }else{
           $input_foto2 = $foto2 ;
      }
    

   
    
    $fid_user = $data['fid_user'];
    $tanggal = $data['tanggal'];
    $deskripsi_sebelum = $data['deskripsi_sebelum'];
    $deskripsi_sesudah = $data['deskripsi_sesudah'];
    
        
       
    
      
       
    
    
    
             $sql="INSERT INTO data_ikhlas(
            		fid_user,
            	    tanggal,
                    deskripsi_sebelum,
                    deskripsi_sesudah,
                    foto_ikhlas1,
            		foto_ikhlas2
            
            ) VALUES(
            '$fid_user',
            '$tanggal',
            '$deskripsi_sebelum',
            '$deskripsi_sesudah',
            '$input_foto',
            '$input_foto2'
            
            )";
             
             
          
                $this->db->query($sql);
                echo json_encode(array("status"=>200,"message"=>"Selamat, data berhasil ditambahkan !"));
            
        
            
            
        
}
function pj_ikhlas(){
      $data = json_decode(file_get_contents('php://input'), true);
    

    $fid_user = $data['fid_user'];
    $sql="SELECT * FROM data_ikhlas WHERE fid_user='$fid_user'";
    $arr = array();
    
    foreach($this->db->query($sql)->result() as $r){
    
        
        array_push($arr,[
                'id'=>$r->id_ikhlas,
                'fid_user'=>$r->fid_user,
                'deskripsi_sebelum'=>$r->deskripsi_sebelum,
                'deskripsi_sesudah'=>$r->deskripsi_sesudah,
                'tanggal'=>$r->tanggal,
                'foto_ikhlas1'=>$r->foto_ikhlas1,
                'foto_ikhlas2'=>$r->foto_ikhlas2,
                
            
            ]);
            
    }
    
    echo json_encode($arr);
}

// end
}