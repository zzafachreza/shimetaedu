 
 
    <?php
	  		$sqlCom = "SELECT * FROM data_company limit 1";
$hasilCom = $this->db->query($sqlCom);

$comp = $hasilCom->row_object();


	  	$row =	$this->db->query("SELECT * FROM data_artikel WHERE id_artikel='".$this->uri->segment(3)."'")->row_object()
	  		
	  		?>
	  		
	  		<!--header-->
    <div class="container-fluid">
       <div class="row" style="height:60px;margin-bottom:10px;padding-top:20px;padding-left:20px;background-color:<?php echo $comp->warna_utama ?>;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <div style="width:30%" onClick="window.history.back()">
            <span><i class="flaticon2-left-arrow-1 text-white"></i></span>
        </div>
          <div style="width:70%">

                <p class="text-white"><strong><?php echo $row->tipe ?> Detail</strong></p>
          
        </div>
    </div>
    </div>
  

        
		<div class="container">
		    
		    	   
			    <h3><?php  echo $row->judul ?></h3>
	
			
			    <img src="<?php  echo  urladmin().$row->foto_artikel ?>" height="200" />
		
		
			   <p><?php  echo $row->keterangan ?></p>

		</div>

 




