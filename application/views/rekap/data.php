<div class="container-fluid" style="margin-top:2%">
   
            <div style="margin-bottom:2%">
                	<a href="<?php echo site_url() ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
	              <!--<a href="<?php echo site_url($modul.'/add') ?>" class="btn bg-utama"><i class="flaticon-add"></i> Tambah</a>-->
            </div>
 

	  	<table class="table table-bordered table-striped table-hover tabza2 nowrap display"  style="width:100%">
	  		<thead class="bg-utama" style="color:white">
	  			<tr>
    	  			<th>No</th>
    	  			<th>Nama Akun</th>
    	  			<th>Nama Operator</th>
    	  			<th>Proyek Yang Dikerjakan</th>
    	  			<th>Jam Mulai Kerja</th>
    	  			<th>Jam Terakhir Kerja</th>
    	  			<th>Tanggal Kerja</th>
    	  			<th>Kode Unit</th>
    	  			<th>HM Awal (Jika Proyek Per HM)</th>
    	  			<th>HM Terakhir (Jika Proyek Per HM)</th>
    	  			<th>Jumlah Meter (Jika Proyek Per Meter)</th>
    	  			<th>Action</th>
    	  		</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				$no=0;
	  				foreach($this->db->query("SELECT * FROM data_$modul a JOIN data_user b ON a.fid_user = b.id")->result() as $row):
	  				$no++;
		  		?>
		  			<tr>
		  				<td><?php echo $no ?></td>
		  	
		  				
		  							<td><?php echo $row->nama_lengkap ?></td>
		  							<td><?php echo $row->nama_operator ?></td>
		  							<td><?php echo $row->proyek ?></td>
		  							<td><?php echo $row->jam_awal ?></td>
		  							<td><?php echo $row->jam_akhir ?></td>
		  							<td><?php echo $row->tanggal ?></td>
		  							<td><?php echo $row->kode_unit ?></td>
		  							<td><?php echo $row->hm_awal ?></td>
		  							<td><?php echo $row->hm_akhir ?></td>
		  							<td><?php echo $row->jumlah_meter ?></td>


		  				
		  						
		  


		  				
		  				
                	  			
    	  			
		  			
		  				<td>

		  					<a href="<?php echo site_url($modul.'/edit/'.$row->{'id_' . $modul}) ?>" class="btn bg-utama"><i class="flaticon-edit"></i></a>

		  					<a href="<?php echo site_url($modul.'/delete/'.$row->{'id_' . $modul}) ?>" class="btn bg-ketiga"><i class="flaticon-delete"></i></a>	


		  				</td>
		  			</tr>

		  		<?php 
		  				endforeach;
		  		?>
	  		</tbody>
	  	</table>



</div>

<script type="text/javascript">

	function copyToClipboard(element) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($(element).text()).select();
	  document.execCommand("copy");
	  $temp.remove();
	}


	$(".alink").click(function(e){
		e.preventDefault();
		var link = $(this).attr('data-id');
		$("#p1").text(link);
		copyToClipboard("#p1");
		$(this).removeClass('btn-success');
		$(this).addClass('btn-secondary');

		$(this).text('Copied');
	})
	
	$(document).ready(function() {
    $('.tabza2').DataTable( {
        "scrollX": true
    } );
} );
</script>



