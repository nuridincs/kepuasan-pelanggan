<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type='text/javascript' src="<?php echo base_url('/assets/js/jquery.min.js'); ?>"></script>

<script type='text/javascript'
	src="<?php echo base_url('/assets/js/jquery.dataTables.min.js'); ?>"></script>
	
<script type='text/javascript'
	src="<?php echo base_url('/assets/js/dataTables.bootstrap.js'); ?>"></script>
	
<script type='text/javascript'
	src="<?php echo base_url('/assets/js/bootstrap.js'); ?>"></script>

	
<script type='text/javascript'
	src="<?php echo base_url('/assets/js/Chart.js');?>"></script>
<?php if(isset($activePage)){?>
<?php if($activePage == "dashboard") {?>
<script type='text/javascript'
	src="<?php echo base_url('/assets/js/chartInit.js');?>"></script>
<?php }?>

<?php if($activePage == "respon") {?>
<script type='text/javascript'
	src="<?php echo base_url('/assets/js/dataTablesInit.js');?>"></script>
<?php }?>
<?php }?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script
	src="<?php echo base_url('/assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
</body>
</html>