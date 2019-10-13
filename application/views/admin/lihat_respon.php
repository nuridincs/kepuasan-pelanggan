<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class="page-header" style="border-bottom: solid 1px blue">Lihat Respon</h3>
			
			<div style="margin-right:1px; padding-bottom:45px; margin-top:-20px">
				<a href="<?php echo site_url("administrasi/export_respon") ?>" class="btn btn-primary pull-right">Export ke Excel</a>
			</div>
			 
			<div class="row">
				<table class="table table-striped table-bordered table-hover" id="dataTables-list">
                    <thead>
                        <tr>
                            <th class="title-center" style="font-size:1em; text-align:center;">No.</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Umur</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Jenis Kelamin</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Pendidikan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Pekerjaan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Prosedur</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Persyaratan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kejelasan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kedisiplinan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Tanggung Jawab</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kemampuan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kecepatan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Keadilan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kesopanan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Keawajaran Biaya</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kepastian Biaya</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kepastian Jadwal</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Kenyamanan</th>
                            <th class="title-center" style="font-size:1em; text-align:center;">Keamanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
							foreach($listRespon as $item)
							{
								echo '<tr>
										<td>'.$item['nomer'].'</td>
										<td>'.$item['umur'].'</td>
										<td>'.$item['jenkel'].'</td>
										<td>'.$item['pendidikan'].'</td>
										<td>'.$item['pekerjaan'].'</td>
										<td>'.$item['prosedur'].'</td>
										<td>'.$item['persyaratan'].'</td>
										<td>'.$item['kejelasan'].'</td>
										<td>'.$item['kedisiplinan'].'</td>
										<td>'.$item['tanggungjawab'].'</td>
										<td>'.$item['kemampuan'].'</td>
										<td>'.$item['kecepatan'].'</td>
										<td>'.$item['keadilan'].'</td>
										<td>'.$item['kesopanan'].'</td>
										<td>'.$item['kewajaranBiaya'].'</td>
										<td>'.$item['kepastianBiaya'].'</td>
										<td>'.$item['kepastianJadwal'].'</td>
										<td>'.$item['kenyamanan'].'</td>
										<td>'.$item['keamanan'].'</td>
								</tr>';
							}
						?>
                    </tbody>
                </table>
			</div>	
		</div>
	</div>
</div>