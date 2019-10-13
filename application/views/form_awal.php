<div class= "container">
	<form class="form-responden form-horizontal" method="POST" action="<?php echo base_url("form");?>" role="form">
		<h3>Identitas Responden</h3><br>
		<div class="form-group">
			<label class="control-label col-sm-3" for="nama">Nama*</label>
			<div class="col-sm-9">
				<input type="text" name="nama" value="<?php echo set_value('nama')?>" class="form-control" placeholder="Isikan nama" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="umur">Umur*</label>
			<div class="col-sm-9">
				<input type="text" name="umur" value="<?php echo set_value('umur')?>" class="form-control" placeholder="Isikan umur" required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Jenis Kelamin*</label>
			<div class="col-sm-9">
				<div class="radio">
					<label><input type="radio" name="jenkel" value="0" <?php echo set_radio('jenkel', '0', TRUE); ?> required> Laki-Laki</label>
					<label><input type="radio" name="jenkel" value="1" <?php echo set_radio('jenkel', '1'); ?> required> Perempuan</label>
				</div>
			</div>
		</div>
		<!-- <div class="form-group">
			<label class="control-label col-sm-3" for="pendidikan">Pendidikan Terakhir*</label>
			<div class="col-sm-9">
				<select name="pendidikan" class="form-control">
					<option value="" selected>-- Pilih Pendidikan --</option>
					<option value="SD Kebawah" <?php //echo set_select('pendidikan', 'SD Kebawah', FALSE)?>>SD Kebawah</option>
					<option value="SMP" <?php //echo set_select('pendidikan', 'SMP', FALSE)?>>SMP</option>
					<option value="SMA" <?php //echo set_select('pendidikan', 'SMA', FALSE)?>>SMA</option>
					<option value="Diploma" <?php //echo set_select('pendidikan', 'Diploma', FALSE)?>>D1-D3-D4</option>
					<option value="S1" <?php //echo set_select('pendidikan', 'S1', FALSE)?>>S1</option>
					<option value="S2 Keatas" <?php //echo set_select('pendidikan', 'S2 Keatas', FALSE)?>>S2 Keatas</option>
				</select>
			</div>
		</div> -->
		<div class="form-group">
			<label class="control-label col-sm-3" for="pekerjaan">Pekerjaan*</label>
			<div class="col-sm-9">
				<select name="pekerjaan" class="form-control">
					<option value="" selected>-- Pilih Pekerjaan --</option>
					<option value="1" <?php echo set_select('pekerjaan', 'Pegawai Negeri', FALSE)?>>Pegawai Negeri</option>
					<option value="2" <?php echo set_select('pekerjaan', 'Wiraswasta', FALSE)?>>Wiraswasta</option>
					<option value="3" <?php echo set_select('pekerjaan', 'Mahasiswa/i', FALSE)?>>Mahasiswa</option>
					<option value="4" <?php echo set_select('pekerjaan', 'pelajar', FALSE)?>>Pelajar</option>
					<option value="5" <?php echo set_select('pekerjaan', 'Lainnya', FALSE)?>>Lainnya</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="pekerjaan">Frekuensi Berkunjung*</label>
			<div class="col-sm-9">
				<select name="frekuensi" class="form-control">
					<option value="" selected>-- Pilih frekuensi --</option>
					<option value="1" <?php echo set_select('frekuensi', 'Pertama Kali', FALSE)?>>Pertama Kali</option>
					<option value="2" <?php echo set_select('frekuensi', 'Dua Kali', FALSE)?>>Dua Kali</option>
					<option value="3" <?php echo set_select('frekuensi', 'Lebih dari dua kali', FALSE)?>>Lebih dari dua kali</option>
				</select>
			</div>
		</div>
		<div>Keterangan : * = Harus diisi</div> 
		<button class="btn btn-lg btn-primary btn-block" type="submit">Lanjutkan</button><br>
		<?php
		$validasi = validation_errors();
		if (!empty($validasi)) {
			echo "<div class= \"alert alert-danger\"><ol type='1'>";
				if(!empty($validasi) ) echo validation_errors("<li>", "</li>");
			echo "</ol></div>";
		}
		?>
	</form>
</div>