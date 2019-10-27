<div class="container">
	<h4>Data User</h4>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Role</th>
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
				<td><?= $value->email ?></td>
				<td><?= $value->role ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>