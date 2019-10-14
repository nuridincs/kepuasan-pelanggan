<div class="container">
	<h4>Skala kenyataan</h4>
	<table class="table table-bordered">
		<thead>
		  <tr>
		    <th>No</th>
		    <?php 
		    	for ($i=1; $i <= 24; $i++) { 
		    ?>
		    <th>p<?= $i ?></th>
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
				foreach ($kenyataan as $value) {
					$no++;

					for ($ii=1; $ii <= 24 ; $ii++) { 
						$p = "p".$ii;
						$pCombine = $value->$p;
						$meanKenyataan += $pCombine;
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
			    		$sumMeanKenyataan = $meanKenyataan / 24;
			    		// echo $meanKenyataan." ";
			    		echo $sumMeanKenyataan;
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
		    <th>p<?= $i ?></th>
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
				foreach ($harapan as $value) {
					$no++;
					for ($ii=1; $ii <= 24 ; $ii++) { 
						$p = "p".$ii;
						$pCombine = $value->$p;
						$mean += $pCombine;
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
			    		$sumMean = $mean / 24;
			    		echo $sumMean 
			    	?>
			    </td>
			  </tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>