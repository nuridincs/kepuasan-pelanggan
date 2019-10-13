<?php
function do_export_xlsx($listRespon, $simpulan, $hasil) {
	$CI =& get_instance();
	
	// load the excel library
	$CI->load->library('excel');
	
	define('IDX_COL_HOME', 2);	// Kolom dimulai pada kolom ke 3 (index 2)
	define('IDX_ROW_START', 1); // Dimulai dari baris 1
	define('TABLE_COLS', 19);	// Tabel ada 8 kolom
	
	$jmlHasil = count($listRespon);
	
	$exportFileName = "Data Responden Kuisioner.xlsx";
	$columnWidths = array(
			2,	// [A] Padding
			2,	// [B] Padding
			18,	// [C] Kolom Nomer
			8,	// [D] Kolom usia
			14,	// [E] Kolom jenis kelamin
			12,	// [F] Kolom pendidikan
			20, // [G] Kolom pekerjaan
			12,	// [H] Kolom kuisioner 1
			12,	// [J] Kolom kuisioner 3
			12,	// [I] Kolom kuisioner 2
			12, // [K] Kolom kuisioner 4
			16, // [K] Kolom kuisioner 5
			12, // [K] Kolom kuisioner 6
			12, // [K] Kolom kuisioner 7
			12, // [K] Kolom kuisioner 8
			12, // [K] Kolom kuisioner 9
			15, // [K] Kolom kuisioner 10
			15, // [K] Kolom kuisioner 11
			16, // [K] Kolom kuisioner 12
			12, // [K] Kolom kuisioner 13
			12, // [K] Kolom kuisioner 14
			
	);
	$styleHeader = array(
			'alignment' => array(
					'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'		=> PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'font'  => array(
					'bold'  => true
			)
	);
	$styleGrayBg = array(
			'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'EEEEEE')
			)
	);
	$styleBorderAll = array(
			'borders' => array(
					'allborders'	=> array(
							'style'		=> PHPExcel_Style_Border::BORDER_THIN
					)
			)
	);
	$styleAlignCenterTop = array(
			'alignment' => array(
					'horizontal'	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'		=> PHPExcel_Style_Alignment::VERTICAL_TOP,
					'wrap'			=> true
			),
	);
	$styleAPDown = array(
			'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'F9BBBC')
			)
	);
	
	// Generate excel....
	try {
		$objPHPExcel = new PHPExcel();
		$worksheetReport = $objPHPExcel->getActiveSheet();
		$worksheetReport->setTitle('Data Hasil Responden');
		
		// Set default alignment ke kiri atas...
		$objPHPExcel->getDefaultStyle()
			->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
		
		// Set up kolom -----------------------------------
		foreach ($columnWidths as $colIdx => $colWidth) {
			$worksheetReport->getColumnDimensionByColumn($colIdx)->setWidth($colWidth);
		}
		
		// Judul worksheet pada bagian atas
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, IDX_ROW_START,
				IDX_COL_HOME+TABLE_COLS-1, IDX_ROW_START+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME, IDX_ROW_START, "Data Hasil Responden Kuisioner Kepuasan Masyarakat");
		
		$worksheetReport->getStyleByColumnAndRow(IDX_COL_HOME, IDX_ROW_START)
			->applyFromArray($styleHeader); // Set style
		$worksheetReport->getStyleByColumnAndRow(IDX_COL_HOME, IDX_ROW_START)
			->getFont()->setSize(18);
		
		$rowBaseTable	= IDX_ROW_START+4;
		
		// Baris judul
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable-1,
				IDX_COL_HOME+TABLE_COLS-1, $rowBaseTable-1)
				->setCellValueByColumnAndRow(IDX_COL_HOME, $rowBaseTable-1,
						"Total: ".$jmlHasil);
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable,
				IDX_COL_HOME+TABLE_COLS-1, $rowBaseTable)
				->setCellValueByColumnAndRow(IDX_COL_HOME, $rowBaseTable,
						date("d m Y, H:i"));
		
		// Baris header tabel
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $rowBaseTable+1,
				IDX_COL_HOME, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME,$rowBaseTable+1,'Nomor');
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+1, $rowBaseTable+1,
				IDX_COL_HOME+1, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+1,$rowBaseTable+1,'Umur');
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+2, $rowBaseTable+1,
				IDX_COL_HOME+2, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+2,$rowBaseTable+1,'Jenis Kelamin');
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+3, $rowBaseTable+1,
				IDX_COL_HOME+3, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+3,$rowBaseTable+1,'Pendidikan');
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+4, $rowBaseTable+1,
				IDX_COL_HOME+4, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+4,$rowBaseTable+1,'Pekerjaan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+5, $rowBaseTable+1,
				IDX_COL_HOME+5, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+5,$rowBaseTable+1,'Prosedur');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+6, $rowBaseTable+1,
				IDX_COL_HOME+6, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+6,$rowBaseTable+1,'Persyaratan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+7, $rowBaseTable+1,
				IDX_COL_HOME+7, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+7,$rowBaseTable+1,'Kejelasan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+8, $rowBaseTable+1,
				IDX_COL_HOME+8, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+8,$rowBaseTable+1,'Kedisiplinan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+9, $rowBaseTable+1,
				IDX_COL_HOME+9, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+9,$rowBaseTable+1,'Tanggung Jawab');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+10, $rowBaseTable+1,
				IDX_COL_HOME+10, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+10,$rowBaseTable+1,'Kemampuan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+11, $rowBaseTable+1,
				IDX_COL_HOME+11, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+11,$rowBaseTable+1,'Kecepatan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+12, $rowBaseTable+1,
				IDX_COL_HOME+12, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+12,$rowBaseTable+1,'Keadilan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+13, $rowBaseTable+1,
				IDX_COL_HOME+13, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+13,$rowBaseTable+1,'Kesopanan');		
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+14, $rowBaseTable+1,
				IDX_COL_HOME+14, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+14,$rowBaseTable+1,'Kewajaran Biaya');

		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+15, $rowBaseTable+1,
				IDX_COL_HOME+15, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+15,$rowBaseTable+1,'Kepastian Biaya');
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+16, $rowBaseTable+1,
				IDX_COL_HOME+16, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+16,$rowBaseTable+1,'Kepastian Jadwal');	

		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+17, $rowBaseTable+1,
				IDX_COL_HOME+17, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+17,$rowBaseTable+1,'Kenyamanan');
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+18, $rowBaseTable+1,
				IDX_COL_HOME+18, $rowBaseTable+2)
				->setCellValueByColumnAndRow(IDX_COL_HOME+18,$rowBaseTable+1,'Keamanan');		
				
		
		
		// Set border header
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$rowBaseTable+1,
				IDX_COL_HOME+TABLE_COLS-1,$rowBaseTable+2)
				->applyFromArray($styleHeader)
				->applyFromArray($styleBorderAll)
				->applyFromArray($styleGrayBg);
		
		// Isi body tabel
		$counterItem	= 0;
		$currentRow		= $rowBaseTable + 3;
		foreach ($listRespon as $itemResult) {
			$counterItem++;
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME, $currentRow, $itemResult['nomer']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+1, $currentRow, $itemResult['umur']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+2, $currentRow, $itemResult['jenkel']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+3, $currentRow, $itemResult['pendidikan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+4, $currentRow, $itemResult['pekerjaan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+5, $currentRow, $itemResult['prosedur']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+6, $currentRow, $itemResult['persyaratan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+7, $currentRow, $itemResult['kejelasan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+8, $currentRow, $itemResult['kedisiplinan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+9, $currentRow, $itemResult['tanggungjawab']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+10, $currentRow, $itemResult['kemampuan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+11, $currentRow, $itemResult['kecepatan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+12, $currentRow, $itemResult['keadilan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+13, $currentRow, $itemResult['kesopanan']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+14, $currentRow, $itemResult['kewajaranBiaya']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+15, $currentRow, $itemResult['kepastianBiaya']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+16, $currentRow, $itemResult['kepastianJadwal']);
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+17, $currentRow, $itemResult['kenyamanan']);		
			$worksheetReport->setCellValueByColumnAndRow(
					IDX_COL_HOME+18, $currentRow, $itemResult['keamanan']);
			
			$currentRow++;
		}
		
		// Setting font color red
		$FontColor = new PHPExcel_Style_Color();
		
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$currentRow,
				IDX_COL_HOME+TABLE_COLS-1,$currentRow+1)
				->applyFromArray($styleHeader)
				->applyFromArray($styleBorderAll)
				->applyFromArray($styleGrayBg);
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME, $currentRow,
				IDX_COL_HOME+TABLE_COLS-15, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME,$currentRow,'Nilai Rata-Rata Setiap Pertanyaan:');
				
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+5, $currentRow,
				IDX_COL_HOME+5, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+5, $currentRow, $hasil['prosedur']);
		if($hasil['prosedur'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+5, $currentRow,
				IDX_COL_HOME+5, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+6, $currentRow,
				IDX_COL_HOME+6, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+6, $currentRow, $hasil['persyaratan']);
		if($hasil['persyaratan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+6, $currentRow,
				IDX_COL_HOME+6, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+7, $currentRow,
				IDX_COL_HOME+7, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+7, $currentRow, $hasil['kejelasan']);
		if($hasil['kejelasan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+7, $currentRow,
				IDX_COL_HOME+7, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+8, $currentRow,
				IDX_COL_HOME+8, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+8, $currentRow, $hasil['kedisiplinan']);
		if($hasil['kedisiplinan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+8, $currentRow,
				IDX_COL_HOME+8, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+9, $currentRow,
				IDX_COL_HOME+9, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+9, $currentRow, $hasil['tanggungjawab']);
		if($hasil['tanggungjawab'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+9, $currentRow,
				IDX_COL_HOME+9, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+10, $currentRow,
				IDX_COL_HOME+10, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+10, $currentRow, $hasil['kemampuan']);			
		if($hasil['kemampuan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+10, $currentRow,
				IDX_COL_HOME+10, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+11, $currentRow,
				IDX_COL_HOME+11, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+11, $currentRow, $hasil['kecepatan']);			
		if($hasil['kecepatan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+11, $currentRow,
				IDX_COL_HOME+11, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+12, $currentRow,
				IDX_COL_HOME+12, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+12, $currentRow, $hasil['keadilan']);
		if($hasil['keadilan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+12, $currentRow,
				IDX_COL_HOME+12, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+13, $currentRow,
				IDX_COL_HOME+13, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+13, $currentRow, $hasil['kesopanan']);
		if($hasil['kesopanan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+13, $currentRow,
				IDX_COL_HOME+13, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+14, $currentRow,
				IDX_COL_HOME+14, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+14, $currentRow, $hasil['kewajaranBiaya']);	
		if($hasil['kewajaranBiaya'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+14, $currentRow,
				IDX_COL_HOME+14, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+15, $currentRow,
				IDX_COL_HOME+15, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+15, $currentRow, $hasil['kepastianBiaya']);
		if($hasil['kepastianBiaya'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+15, $currentRow,
				IDX_COL_HOME+15, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+16, $currentRow,
				IDX_COL_HOME+16, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+16, $currentRow, $hasil['kepastianJadwal']);
		if($hasil['kepastianJadwal'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+16, $currentRow,
				IDX_COL_HOME+16, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+17, $currentRow,
				IDX_COL_HOME+17, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+17, $currentRow, $hasil['kenyamanan']);
		if($hasil['kenyamanan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+17, $currentRow,
				IDX_COL_HOME+17, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}
		
		$worksheetReport->mergeCellsByColumnAndRow(
				IDX_COL_HOME+18, $currentRow,
				IDX_COL_HOME+18, $currentRow+1)
				->setCellValueByColumnAndRow(IDX_COL_HOME+18, $currentRow, $hasil['keamanan']);
		if($hasil['keamanan'] <= 2){
			$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME+18, $currentRow,
				IDX_COL_HOME+18, $currentRow+1)->getFont()->getColor()->setArgb($FontColor::COLOR_RED);
		}			
		
		$worksheetReport->setCellValueByColumnAndRow(IDX_COL_HOME, $currentRow + 4, 
			"Kesimpulan Kuisioner: ");
			
		$worksheetReport->setCellValueByColumnAndRow(IDX_COL_HOME, $currentRow + 5, 
			"    Kualitas Pelayanan '".$simpulan['kinerja']."' dengan nilai ".$simpulan['konversi']." ( ".$simpulan['mutu']." )");
		
		
		// Set border untuk seluruh cell
		$worksheetReport->getStyleByColumnAndRow(
				IDX_COL_HOME,$rowBaseTable+1,
				IDX_COL_HOME+TABLE_COLS-1,$currentRow-1)
				->applyFromArray($styleBorderAll);
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$exportFileName.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	} catch (Exception $e) {
		die('[PHPExcel error] '.$e->getMessage()."<br> Trace:<br>".$e->getTraceAsString());
	}
}