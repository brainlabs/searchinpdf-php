<?php
	/*
		AUTHOR:
		- Miguel Ángel Rea Flores
		- reafmiguel@gmail.com
		- https://www.linkedin.com/in/migueref
		DESCRIPTION:
		This is a simple code to search inside a pdf file using php, I used  pdf2text class to convert PDF files to ASCII text or so called PDF text extraction.
	*/
	/*Part 1. PDF to text*/
	set_time_limit(0);
	include('class.pdf2text.php');
	$a = new PDF2Text();
	$searchcriteria   = 'actividad psicomotora';//search criteria
	//If you want to search in multiple books, you could write a loop here
		$pdffile='el dominio volitivo en competencias.pdf';
		$a->setFilename($pdffile);
		$a->decodePDF();
		$pdfdecoded=$a->output();//text output
		//PART 2. Search
		$indexcriteria = strpos($pdfdecoded, $searchcriteria);
		if ($indexcriteria)
			for($i=$indexcriteria;$i<($indexcriteria+100);$i++)
				echo $pdfdecoded[$i];
		else //Si no se encontró
			echo "\nResults in file: ".$pdffile;
	//You must close foreach here if you have used it
