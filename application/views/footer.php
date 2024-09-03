
</main>
<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container text-center">
        <p>&copy; 2024 Shimeta Education Center. All Rights Reserved.</p>
    </div>
</footer>


</body>
   <script src="https://zavalabs.com/simple.money.format.js"></script>
	<!-- area javascript -->
<!--<footer>-->
<!--	<div class="footer">-->
<!--		Copyright	&copy; 2020 by <a href="https://bikinaplikasimurah.com">https://bikinaplikasimurah.com</a>-->
<!--	</div>-->
<!--</footer>-->
</html>
<script>


<?php if($this->session->flashdata('import')){ ?>
Swal.fire(
     'Successfully',
      '<?php echo $this->session->flashdata('import'); ?>',
      'success'
    )
<?php } ?>

<?php if($this->session->flashdata('update')){ ?>
Swal.fire(
     'Successfully',
      '<?php echo $this->session->flashdata('update'); ?>',
      'success'
    )
<?php } ?>

<?php if($this->session->flashdata('pdf')){ ?>
Swal.fire(
     'Successfully',
      '<?php echo $this->session->flashdata('pdf'); ?>',
      'success'
    )
<?php } ?>

<?php if($this->session->flashdata('error')){ ?>
Swal.fire(
     'Gagal Upload',
      '<?php echo $this->session->flashdata('error'); ?>',
      'error'
    )
<?php } ?>

        $('.summernote').summernote();


 $('.uang').simpleMoneyFormat();
</script>