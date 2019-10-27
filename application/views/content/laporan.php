<div class="container">
	<h2>Data Lapoarn</h2>
	<h4>Skala kenyataan</h4>
	<table class="table table-bordered">
		<thead>
		  <tr>
		    <th>No</th>
		    <?php 
		    	for ($i=1; $i <= 24; $i++) { 
		    ?>
		    <th>P<?= $i ?></th>
		    <?php
		    	} 
		    ?>
		  </tr>
		</thead>
		<tbody>
			<?php
				$no=0;
				$meanKenyataan = 0;
				$meanKenyataanArr = [];
				$arrKenyataan = [];
				foreach ($kenyataan as $value) {
					$no++;

					for ($ii=1; $ii <= 24 ; $ii++) { 
						$p = "p".$ii;
						$pCombine = $value->$p;
						$meanKenyataan += $pCombine;
						$meanKenyataanArr[$ii][] = $pCombine;
					}
			?>
			  <tr>
			    <td><?= $no; ?></td>
			    <td><?= $value->p1 ?></td>
			    <td><?= $value->p2 ?></td>
			    <td><?= $value->p3 ?></td>
			    <td><?= $value->p4 ?></td>
			    <td><?= $value->p5 ?></td>
			    <td><?= $value->p6 ?></td>
			    <td><?= $value->p7 ?></td>
			    <td><?= $value->p8 ?></td>
			    <td><?= $value->p9 ?></td>
			    <td><?= $value->p10 ?></td>
			    <td><?= $value->p11 ?></td>
			    <td><?= $value->p12 ?></td>
			    <td><?= $value->p13 ?></td>
			    <td><?= $value->p14 ?></td>
			    <td><?= $value->p15 ?></td>
			    <td><?= $value->p16 ?></td>
			    <td><?= $value->p17 ?></td>
			    <td><?= $value->p18 ?></td>
			    <td><?= $value->p19 ?></td>
			    <td><?= $value->p20 ?></td>
			    <td><?= $value->p21 ?></td>
			    <td><?= $value->p22 ?></td>
			    <td><?= $value->p23 ?></td>
			    <td><?= $value->p24 ?></td>
			  </tr>
			<?php
				}
			?>
			<tr class="mean">
				<td>Mean</td>
			<?php 
				for ($k=1; $k <= count($meanKenyataanArr); $k++) { 
					$meanKenyataan = array_sum($meanKenyataanArr[$k])/count($meanKenyataanArr[$k]);
					$arrKenyataan[] = $meanKenyataan;
			?>
				<td><?= number_format($meanKenyataan, 2) ?></td>
			<?php } ?>
			</tr>
		</tbody>
	</table>

	<h4>Skala Harapan</h4>
	<table class="table table-bordered">
		<thead>
		  <tr>
		    <th>No</th>
		    <?php 
		    	for ($i=1; $i <= 24; $i++) { 
		    ?>
		    <th>P<?= $i ?></th>
		    <?php
		    	} 
		    ?>
		  </tr>
		</thead>
		<tbody>
			<?php
				$no = 0;
				$mean = 0;
				$meanHarapanArr = [];
				$arrHarapan = [];
				foreach ($harapan as $value) {
					$no++;
					for ($ii=1; $ii <= 24 ; $ii++) { 
						$p = "p".$ii;
						$pCombine = $value->$p;
						$mean += $pCombine;
						$meanHarapanArr[$ii][] = $pCombine;
					}
			?>
			  <tr>
			    <td><?= $no; ?></td>
			    <td><?= $value->p1 ?></td>
			    <td><?= $value->p2 ?></td>
			    <td><?= $value->p3 ?></td>
			    <td><?= $value->p4 ?></td>
			    <td><?= $value->p5 ?></td>
			    <td><?= $value->p6 ?></td>
			    <td><?= $value->p7 ?></td>
			    <td><?= $value->p8 ?></td>
			    <td><?= $value->p9 ?></td>
			    <td><?= $value->p10 ?></td>
			    <td><?= $value->p11 ?></td>
			    <td><?= $value->p12 ?></td>
			    <td><?= $value->p13 ?></td>
			    <td><?= $value->p14 ?></td>
			    <td><?= $value->p15 ?></td>
			    <td><?= $value->p16 ?></td>
			    <td><?= $value->p17 ?></td>
			    <td><?= $value->p18 ?></td>
			    <td><?= $value->p19 ?></td>
			    <td><?= $value->p20 ?></td>
			    <td><?= $value->p21 ?></td>
			    <td><?= $value->p22 ?></td>
			    <td><?= $value->p23 ?></td>
			    <td><?= $value->p24 ?></td>
			  </tr>
			<?php
				}
			?>
			<tr class="mean">
				<td>Mean</td>
			<?php 
				for ($h=1; $h <= count($meanHarapanArr); $h++) { 
					$meanHarapan = array_sum($meanHarapanArr[$h])/count($meanHarapanArr[$h]);
					$arrHarapan[] = $meanHarapan;
			?>
				<td><?= number_format($meanHarapan, 2) ?></td>
			<?php } ?>
			</tr>
		</tbody>
	</table>


	<h4>GAP</h4>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Harapan</th>
				<th>Kenyataan</th>
				<th>GAP</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$gap = array(
					'data' => array(
						'0' => $arrKenyataan,
						'1'	=> $arrHarapan
					)
				);

				$combineArr = array();
				for ($i=0; $i < count($gap['data']) ; $i++) { 
					for ($ii=0; $ii < count($gap['data'][$i]); $ii++) { 
						if ($ii == $ii) {
							$combineArr[$ii][] = $gap['data'][$i][$ii];
						}
					}
				}
			?>
			<?php 
				foreach ($combineArr as $value) {
			?>
			<tr>
				<td><?= number_format($value[0], 2) ?></td>
				<td><?= number_format($value[1], 2) ?></td>
				<td><?= number_format(($value[1] - $value[0]), 2) ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<h4>Dimensi GAP</h4>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Dimensi</th>
				<th>Harapan</th>
				<th>Kinerja</th>
				<th>GAP</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 0;
				$sumH = 0;
				$sumK = 0;
				for ($dg=1; $dg <= 4 ; $dg++) { 
					$no++;
					$sumH += $combineArr[$dg][0];
					$sumK += $combineArr[$dg][1];
			?>
			<tr>
				<td><?= $no ?></td>
				<td>Realibility</td>
				<td><?= number_format($combineArr[$dg][0], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1] - $combineArr[$dg][0], 2) ?></td>
			</tr>
		<?php } ?>
			<tr class="mean">
				<td colspan="2">Mean</td>
				<td><?= number_format(($sumH/4), 2) ?></td>
				<td><?= number_format(($sumK/4), 2) ?></td>
				<td><?= number_format(($sumK/4) - ($sumH/4), 2) ?></td>
			</tr>
		</tbody>
	</table>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Dimensi</th>
				<th>Harapan</th>
				<th>Kinerja</th>
				<th>GAP</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				// echo "<pre>";
				// print_r($combineArr);
				// die;
				$no = 0;
				$sumH = 0;
				$sumK = 0;
				for ($dg=5; $dg <= 8 ; $dg++) { 
					$no++;
					$sumH += $combineArr[$dg][0];
					$sumK += $combineArr[$dg][1];
			?>
			<tr>
				<td><?= $no ?></td>
				<td>Responsiveness</td>
				<td><?= number_format($combineArr[$dg][0], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1] - $combineArr[$dg][0], 2) ?></td>
			</tr>
		<?php } ?>
			<tr class="mean">
				<td colspan="2">Mean</td>
				<td><?= number_format(($sumH/4), 2) ?></td>
				<td><?= number_format(($sumK/4), 2) ?></td>
				<td><?= number_format(($sumK/4) - ($sumH/4), 2) ?></td>
			</tr>
		</tbody>
	</table>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Dimensi</th>
				<th>Harapan</th>
				<th>Kinerja</th>
				<th>GAP</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 0;
				$sumH = 0;
				$sumK = 0;
				for ($dg=9; $dg <= 13 ; $dg++) { 
					$no++;
					$sumH += $combineArr[$dg][0];
					$sumK += $combineArr[$dg][1];
			?>
			<tr>
				<td><?= $no ?></td>
				<td>Assurance</td>
				<td><?= number_format($combineArr[$dg][0], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1] - $combineArr[$dg][0], 2) ?></td>
			</tr>
		<?php } ?>
			<tr class="mean">
				<td colspan="2">Mean</td>
				<td><?= number_format(($sumH/5), 2) ?></td>
				<td><?= number_format(($sumK/5), 2) ?></td>
				<td><?= number_format(($sumK/5) - ($sumH/5), 2) ?></td>
			</tr>
		</tbody>
	</table>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Dimensi</th>
				<th>Harapan</th>
				<th>Kinerja</th>
				<th>GAP</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				$sumH = 0;
				$sumK = 0;
				for ($dg=14; $dg <= 17 ; $dg++) { 
					$no++;
					$sumH += $combineArr[$dg][0];
					$sumK += $combineArr[$dg][1];
			?>
			<tr>
				<td><?= $no ?></td>
				<td>Empathy</td>
				<td><?= number_format($combineArr[$dg][0], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1] - $combineArr[$dg][0], 2) ?></td>
			</tr>
		<?php } ?>
			<tr class="mean">
				<td colspan="2">Mean</td>
				<td><?= number_format(($sumH/4), 2) ?></td>
				<td><?= number_format(($sumK/4), 2) ?></td>
				<td><?= number_format(($sumK/4) - ($sumH/4), 2) ?></td>
			</tr>
		</tbody>
	</table>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Dimensi</th>
				<th>Harapan</th>
				<th>Kinerja</th>
				<th>GAP</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				$sumH = 0;
				$sumK = 0;
				for ($dg=18; $dg <= 23 ; $dg++) { 
					$no++;
					$sumH += $combineArr[$dg][0];
					$sumK += $combineArr[$dg][1];
			?>
			<tr>
				<td><?= $no ?></td>
				<td>Tangibles</td>
				<td><?= number_format($combineArr[$dg][0], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1], 2) ?></td>
				<td><?= number_format($combineArr[$dg][1] - $combineArr[$dg][0], 2) ?></td>
			</tr>
		<?php } ?>
			<tr class="mean">
				<td colspan="2">Mean</td>
				<td><?= number_format(($sumH/7), 2) ?></td>
				<td><?= number_format(($sumK/7), 2) ?></td>
				<td><?= number_format(($sumK/7) - ($sumH/7), 2) ?></td>
			</tr>
		</tbody>
	</table>
</div>