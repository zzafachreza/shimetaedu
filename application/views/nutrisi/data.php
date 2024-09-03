<?php


$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->row_object();

if(!empty($_GET['tanggal'])){
    $tanggal = $_GET['tanggal'];
}else{
    $tanggal = date('Y-m-d');
}

?>

    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:40%" onClick="window.location.href='./'">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:60%">

                <p class="text-white"><strong>Nutrisi</strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
    
    <form id="dataForm">
        <input onChange="$('#dataForm').submit()" type="date" name="tanggal" value="<?php echo $tanggal ?>" class="form-eza"/>
    </form>
    
    <center>
        <a href="<?php echo site_url('pengguna?edit=jam') ?>" class="btn bg-utama" style="margin-top:10px"> <i class="flaticon-edit"></i> Atur waktu Catat Jenis Makanan</a>
    </center>
  
  <hr/>
  <div class="card">
      <div class="card-header bg-utama">
        <div class="row">
    <div style="width:70%;padding-left:10px">
                  <h5>Makan Pagi</h5>
              </div>
             <div onclick="window.location.href='nutrisi/add/Pagi/<?php echo $tanggal ?>'" style="width:30%;display:flex;justify-content:flex-end;font-size:15pt;padding-right:10px">
                  <i class="flaticon-plus"></i>
              </div>
          </div>
      </div>
      <div class="card-body">
           <ul class="list-group">
               <?php
	                foreach($this->db->query("SELECT * FROM data_makan a JOIN data_nutrisi b ON a.fid_nutrisi = b.id_nutrisi WHERE a.tanggal='$tanggal' AND waktu='Pagi'")->result() as $r){
	                ?>
	                    <li class="list-group-item"><?php echo $r->makanan ?> <br/>( <small><?php echo $r->informasi ?></small> ) <a href="<?php echo site_url('nutrisi/delete/'.$r->id_makan) ?>" onclick="return confirm('Apakah kamu akan hapus ini ?')"><i class="flaticon-delete text-danger"></i></a></li>
	                <?php } ?>
           </ul>
      </div>
  </div>
  
  <div class="card" style="margin-top:10px">
      <div class="card-header bg-utama">
          <div class="row">
          <div style="width:70%;padding-left:10px">
                  <h5>Makan Siang</h5>
              </div>
             <div onclick="window.location.href='nutrisi/add/Siang/<?php echo $tanggal ?>'" style="width:30%;display:flex;justify-content:flex-end;font-size:15pt;padding-right:10px">
                  <i class="flaticon-plus"></i>
              </div>
          </div>
      </div>
      <div class="card-body">
           <ul class="list-group">
               <?php
	                foreach($this->db->query("SELECT * FROM data_makan a JOIN data_nutrisi b ON a.fid_nutrisi = b.id_nutrisi WHERE a.tanggal='$tanggal' AND waktu='Siang'")->result() as $r){
	                ?>
	                    <li class="list-group-item"><?php echo $r->makanan ?> <br/>( <small><?php echo $r->informasi ?></small> ) <a href="<?php echo site_url('nutrisi/delete/'.$r->id_makan) ?>" onclick="return confirm('Apakah kamu akan hapus ini ?')"><i class="flaticon-delete text-danger"></i></a></li>
	                <?php } ?>
           </ul>
      </div>
  </div>
  
  <div class="card" style="margin-top:10px">
      <div class="card-header bg-utama">
        <div class="row">
              <div style="width:70%;padding-left:10px">
                  <h5>Makan Malam</h5>
              </div>
             <div onclick="window.location.href='nutrisi/add/Malam/<?php echo $tanggal ?>'" style="width:30%;display:flex;justify-content:flex-end;font-size:15pt;padding-right:10px">
                  <i class="flaticon-plus"></i>
              </div>
          </div>
      </div>
      <div class="card-body">
           <ul class="list-group">
               <?php
	                foreach($this->db->query("SELECT * FROM data_makan a JOIN data_nutrisi b ON a.fid_nutrisi = b.id_nutrisi WHERE a.tanggal='$tanggal' AND waktu='Malam'")->result() as $r){
	                ?>
	                    <li class="list-group-item"><?php echo $r->makanan ?> <br/>( <small><?php echo $r->informasi ?></small> ) <a href="<?php echo site_url('nutrisi/delete/'.$r->id_makan) ?>" onclick="return confirm('Apakah kamu akan hapus ini ?')"><i class="flaticon-delete text-danger"></i></a></li>
	                <?php } ?>
           </ul>
      </div>
  </div>
  
</div>