<?php

$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->result();
$data = $this->db->query("SELECT * FROM data_$modul WHERE id_$modul='$id'")->row_object();

?>



    <!--header-->
    <div class="container-fluid">
        <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp[0]->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:30%" onClick="window.history.back()">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:70%">

                <p class="text-white"><strong>Edit Daftar Obat</strong></p>
          
        </div>
    </div>
    </div>
<div class="container">
    <form action="<?php echo site_url($modul.'/update') ?>" method="POST" enctype="multipart/form-data" >
	
                <input name="id_<?php echo $modul ?>" type="hidden" value="<?php echo $id ?>" />
                
                  <input name="fid_user" type="hidden" value="<?php echo $data->fid_user ?>" />
	
			  
			  
			  
			   <div class="form-group">
                <label>Nama Obat</label>
                <input required name="nama_obat" class="form-eza" value="<?php echo $data->nama_obat ?>" />
            </div>
            <div class="form-group">
                <label>Jam</label>
                <select class="form-eza" name="jam">
                      <?php for($i=0;$i<24;$i++){ ?>
                        
                        <option ><?php echo strlen($i)>1?$i:'0'.$i ?>:00</option>
                    
                    <?php } ?>
                </select>
            </div>
            
             <div class="form-group">
                <label>Tanggal Selesai</label>
                <input required name="tanggal_selesai" type="date" class="form-eza"  value="<?php echo $data->tanggal_selesai ?>" />
            </div>
           
           <button class="btn bg-utama col-sm-12" type="submit">Simpan</button>


			</form>
 </div>





