<div class="container">
	<h4>Data Customer</h4>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Umur</th>
				<th>Jenis Kelamin</th>
				<th>Pekerjaan</th>
				<th>Frekuensi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				foreach ($data as $value) {
					$no++;
			?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $value->nama ?></td>
				<td><?= $value->umur ?></td>
				<td><?= $value->jk ?></td>
				<td><?= $value->pekerjaan ?></td>
				<td><?= $value->frekuensi ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
