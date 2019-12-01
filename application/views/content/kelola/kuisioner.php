<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<h4>Variabel Kehandalan</h4>
			<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" data-id="0~tbl_var_kehandalan~add" onclick="showModal('add','','tbl_var_kehandalan')">Tambah</button>
			<table class="table table-striped">
				<thead>
				  <tr>
				    <th>No</th>
				    <th>Pertanyaan</th>
				    <th>Action</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						foreach ($kehandalan as $value) {
							$no++;
					?>
					  <tr>
					    <td><?= $no; ?></td>
					    <td><?= $value->pertanyaan ?></td>
					    <td>
					    	<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" onclick="showModal('update',<?= $value->id ?>, 'tbl_var_kehandalan')">Edit</button>
					    	<a href="<?= base_url('Administrasi/delete/'). $value->id.'/tbl_var_kehandalan' ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?');">Delete</a>
					    </td>
					  </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-md-5">
			<h4>Variabel Daya Tanggap</h4>
			<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" data-id="0~tbl_var_daya_tanggap~add" onclick="showModal('add','','tbl_var_daya_tanggap')">Tambah</button>
			<table class="table table-striped">
				<thead>
				  <tr>
				    <th>No</th>
				    <th>Pertanyaan</th>
				    <th>Action</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						foreach ($daya_tanggap as $value) {
							$no++;
					?>
					  <tr>
					    <td><?= $no; ?></td>
					    <td><?= $value->pertanyaan ?></td>
					    <td>
					    	<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" onclick="showModal('update',<?= $value->id ?>, 'tbl_var_daya_tanggap')">Edit</button>
					    	<a href="<?= base_url('Administrasi/delete/'). $value->id.'/tbl_var_daya_tanggap' ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?');">Delete</a>
					    </td>
					  </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5">
			<h4>Variabel Empati</h4>
			<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" data-id="0~tbl_var_empati~add" onclick="showModal('add','','tbl_var_empati')">Tambah</button>
			<table class="table table-striped">
				<thead>
				  <tr>
				    <th>No</th>
				    <th>Pertanyaan</th>
				    <th>Action</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						foreach ($empati as $value) {
							$no++;
					?>
					  <tr>
					    <td><?= $no; ?></td>
					    <td><?= $value->pertanyaan ?></td>
					    <td>
					    	<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" onclick="showModal('update',<?= $value->id ?>, 'tbl_var_empati')">Edit</button>
					    	<a href="<?= base_url('Administrasi/delete/'). $value->id.'/tbl_var_empati' ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?');">Delete</a>
					    </td>
					  </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-md-5">
			<h4>Variabel Jaminan</h4>
			<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" data-id="0~tbl_var_jaminan~add" onclick="showModal('add','','tbl_var_jaminan')">Tambah</button>
			<table class="table table-striped">
				<thead>
				  <tr>
				    <th>No</th>
				    <th>Pertanyaan</th>
				    <th>Action</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						foreach ($jaminan as $value) {
							$no++;
					?>
					  <tr>
					    <td><?= $no; ?></td>
					    <td><?= $value->pertanyaan ?></td>
					    <td>
					    	<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" onclick="showModal('update',<?= $value->id ?>, 'tbl_var_jaminan')">Edit</button>
					    	<a href="<?= base_url('Administrasi/delete/'). $value->id.'/tbl_var_jaminan' ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?');">Delete</a>
					    </td>
					  </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5">
			<h4>Variabel Bukti Fisik</h4>
			<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" data-id="0~tbl_var_bukti_fisik~add" onclick="showModal('add','','tbl_var_bukti_fisik')">Tambah</button>
			<table class="table table-striped">
				<thead>
				  <tr>
				    <th>No</th>
				    <th>Pertanyaan</th>
				    <th>Action</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						foreach ($bukti_fisik as $value) {
							$no++;
					?>
					  <tr>
					    <td><?= $no; ?></td>
					    <td><?= $value->pertanyaan ?></td>
					    <td>
					    	<button type="button" id="showModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdateQuis" onclick="showModal('update',<?= $value->id ?>, 'tbl_var_bukti_fisik')">Edit</button>
					    	<a href="<?= base_url('Administrasi/delete/'). $value->id.'/tbl_var_bukti_fisik' ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?');">Delete</a>
					    </td>
					  </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalUpdateQuis" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Tambah Variabel</h4>
		    </div>
		    <div class="modal-body">
			    <!-- <form action="/action_page.php"> -->
			    	<input type="hidden" readonly name="dataID" id="dataID">
			    	<input type="hidden" readonly name="dataAct" id="dataAct">
			    	<input type="hidden" readonly name="dataTbl" id="dataTbl">
						<div class="form-group">
							<label for="pertanyaan">pertanyaan:</label>
							<textarea name="pertanyaan" type="text" class="form-control" id="pertanyaan"></textarea>
						</div>
					<!-- </form> -->
		    </div>
		    <div class="modal-footer">
				<button type="submit" class="btn btn-primary" onclick="Submit()">Submit</button>
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
		  </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function Submit() {
		const act = $('#dataAct').val();
		const id = $('#dataID').val();
		const tbl = $('#dataTbl').val();
		const pertanyaan = $('#pertanyaan').val();

		if (act === 'update') {
			update(id, pertanyaan, tbl);
		} else {
			add(pertanyaan, tbl);
		}
	}

	function getDtlData(act, id, tbl) {
		$.ajax({
			url: "<?= base_url('Administrasi/getDetailKuisioner') ?>",
			method: "post",
			data: {
				'id': id,
				'tbl': tbl,
				'act': act
			},
			success: function(result){
				const results = JSON.parse(result);
				const id = results['id'];
				const pertanyaan = results['pertanyaan'];
				$('#pertanyaan').html(pertanyaan);
				$('#dataID').val(id);
				$('#dataAct').val(act);
				$('#dataTbl').val(tbl);
	  	}
	 	});
	}

	function add(pertanyaan, tbl) {
		$.ajax({
			url: "<?= base_url('Administrasi/add') ?>",
			method: "post",
			data: {
				'tbl': tbl,
				'pertanyaan': pertanyaan
			},
			success: function(result){
				window.location.reload();
	  	}
	 	});
	}

	function update(id, pertanyaan, tbl) {
		$.ajax({
			url: "<?= base_url('Administrasi/update') ?>",
			method: "post",
			data: {
				'id': id,
				'pertanyaan': pertanyaan,
				'tbl': tbl
			},
			success: function(result){
				window.location.reload();
	  	}
	 	});
	}

	function showModal(act, id, tbl) {
		if (act === 'add') {
			$('#dataAct').val(act);
			$('#dataTbl').val(tbl);
			$("input[name='pertanyaan']").val('');
		} else {
			getDtlData(act, id, tbl);
		}
	}
</script>
