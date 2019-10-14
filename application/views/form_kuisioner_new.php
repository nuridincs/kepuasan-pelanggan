<div class="container">
	<div class="container-page">
		<div class="row form-kuisioner">
			<h2>Formulir Kuisioner Responden Tentang Kepuasaan Pelanggan</h2>
			<hr>
			<h3>Petunjuk</h3>
			<div>
				Kami menginginkan pendapat anda tentang kualitas pelayanan yang diberikan Restoran Foodwalk
			</div>
			<h3>Cara Pengisian</h3>
			<div>
				Setiap soal terdapat 2 jawaban kenyataan dan harapan, pilih salau satu pada jawaban yang Saudara pilih
			</div>
			<br><br>
			<form method="POST" action="<?php echo base_url("Kuisioner/formSubmit");?>" role="form">
				<div class="col-md-12">	
					<input type="hidden" name="nama" value="<?php echo (!empty($dataResponden['responden']['nama']))?$dataResponden['responden']['nama']:set_value('nama') ?>">
					<input type="hidden" name="umur" value="<?php echo (!empty($dataResponden['responden']['umur']))?$dataResponden['responden']['umur']:set_value('umur') ?>">
					<input type="hidden" name="jenkel" value="<?php echo (!empty($dataResponden['responden']['jenkel']))?$dataResponden['responden']['jenkel']:set_value('jenkel') ?>">
					<input type="hidden" name="frekuensi" value="<?php echo (!empty($dataResponden['responden']['frekuensi']))?$dataResponden['responden']['frekuensi']:set_value('frekuensi') ?>">
					<input type="hidden" name="pekerjaan" value="<?php echo (!empty($dataResponden['responden']['pekerjaan']))?$dataResponden['responden']['pekerjaan']:set_value('pekerjaan') ?>">

					<?php
						$no = 1;
						// echo "<pre>";
						// print_r($dataKuisioner);die;
						foreach ($dataKuisioner as $value) {
					?>
						<label for="kuisioner"><?= $no ?>. <?= $value['kuisioner'] ?>*</label> <br>
						<div class="row">
							<div class="col-md-6">
								<h4>Kenyataan</h4>
							</div>
							<div class="col-md-6">
								<h4>Harapan</h4>
							</div>
						</div>
						<br>
					<?php
							foreach ($value['pernyataan']['pernyataan'] as $data) {
								$dataPernyataan = explode('~', $data);
					?>
					<div class="row">
						<div class="col-md-6">
							<label><input type="radio" name="kenyataan<?= $value['pernyataan']['id_pernyataan'] ?>" value="<?= $dataPernyataan[1] ?>" <?php echo set_radio('pernyataan', '<?= $dataPernyataan[1] ?>'); ?> required> <?= $dataPernyataan[0] ?></label> <br><br>
						</div>
						<div class="col-md-6">
							<label><input type="radio" name="harapan<?= $value['pernyataan']['id_skala'] ?>" value="<?= $dataPernyataan[1] ?>" <?php echo set_radio('pernyataan', '<?= $dataPernyataan[1] ?>'); ?> required> <?= $dataPernyataan[0] ?></label> <br><br>
						</div>
					</div>
					<?php
							}
						$no++;
						}
					?>				
					<button class="btn btn-lg btn-warning btn-block btn-custom" type="submit"
						name="submit" style="width: 120px;">Submit</button><br>
				</div>
			</form>
		</div>
	</div>
</div>