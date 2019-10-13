<div class="container">
	<?php 
		// echo "<pre>";
		// print_r($var);die; 
	?>
	<div class="row">
		<div class="col-md-5">
			<h4>Variabel Kehandalan</h4>
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
					    	<button class="btn btn-primary btn-sm">Edit</button>
					    	<button class="btn btn-danger btn-sm">Delete</button>
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
					    	<button class="btn btn-primary btn-sm">Edit</button>
					    	<button class="btn btn-danger btn-sm">Delete</button>
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
					    	<button class="btn btn-primary btn-sm">Edit</button>
					    	<button class="btn btn-danger btn-sm">Delete</button>
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
					    	<button class="btn btn-primary btn-sm">Edit</button>
					    	<button class="btn btn-danger btn-sm">Delete</button>
					    </td>
					  </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>

	<div class="row">
		<div class="col-md-5">
			<h4>Variabel Bukti Fisik</h4>
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
					    	<button class="btn btn-primary btn-sm">Edit</button>
					    	<button class="btn btn-danger btn-sm">Delete</button>
					    </td>
					  </tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
	
</div>
