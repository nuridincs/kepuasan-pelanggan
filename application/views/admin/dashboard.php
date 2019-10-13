<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Beranda</h1>
			
			<h4 align="left">Selamat Datang <?php echo $this->session->adminName." (".$this->session->sessionEmail.")";?></h4>
			<div class="row placeholders">
				<h3 align="left">Grafik Kualitas Pelayanan</h3>
				
				<canvas id="respondenChart" width="400" height="120"></canvas>
				
				<div class="col-xs-6 col-sm-6 placeholder">
					<div class="panel panel-primary">
						<div class="panel-heading">
						    <h3 class="panel-title">Simpulan Kuisioner dari <?php echo $jumlahResponden;?> Responden</h3>
						</div>
						<div class="panel-body">
						    Kualitas Pelayanan <?php echo $simpulan['kinerja']?><br>
						    Dengan Nilai <?php echo $simpulan['konversi']." (".$simpulan['mutu'].")";?>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
