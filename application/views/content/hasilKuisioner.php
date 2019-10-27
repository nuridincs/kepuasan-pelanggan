<div class="container">
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
		    <th>Mean</th>
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
						$meanKenyataan += $pCombine;
						$meanKenyataanArr[] = $pCombine;
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
			    <td>
			    	<?php 

				    	// echo "<pre>";
				    	// print_r($meanKenyataanArr);die;
			    		$avg = array_sum($meanKenyataanArr)/count($meanKenyataanArr);
			    		$arrKenyataan[] = $avg;
			    		echo number_format($avg,2);
			    		// $sumMeanKenyataan = $meanKenyataan / 24;
			    		// echo $meanKenyataan." ";
			    		// echo $meanKenyataan/$no;
			    		// echo $sumMeanKenyataan;
			    	?>
			    </td>
			  </tr>
			<?php
				}
			?>
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
		    <th>Mean</th>
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
						$meanHarapanArr[] = $pCombine;
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
			    <td>
			    	<?php 
			    		// $sumMean = $mean / 24;
			    		// echo $sumMean 

			    		$avgHarapan = array_sum($meanHarapanArr)/count($meanHarapanArr);
			    		$arrHarapan[] = $avgHarapan;
			    		echo number_format($avgHarapan, 2);
			    	?>
			    </td>
			  </tr>
			<?php
				}
			?>
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
</div>