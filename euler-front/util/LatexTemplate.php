<?php
/**
 * Class for handling latex templating
 * 
 * @author Aparicio da Silva
 */
class LatexTemplate {
	/**
	 * Generate a PDF file using xelatex and pass it to the user
	 */
	public  function download($urlfile, $file, $outp_file) {
        /*abrir pasta*/
        chdir($urlfile);

		/*checa o arquivo */
		if(!file_exists($file)) {

			throw new Exception("Arquivo nao encontrado !!".'</br>');
		}
        $f = strtok (  $file,"." );
		$tex_f = $f. '.tex';
		$aux_f = $f . '.aux';
		$log_f = $f . '.log';
		$pdf_f =$f. '.pdf';

		// Perform substitution of variables
		ob_start();
		include($file);
		/*gerar arquivo tex*/
		file_put_contents($tex_f, ob_get_clean());

		/* comando de execucao e arquivo do latex */
        $cmd = sprintf('pdflatex.exe -synctex=1 -interaction=nonstopmode "'.$file);

        /*executar latex*/
        exec($cmd);
        /*deletar arquivos gerados */

		@unlink($f.'.synctex.gz');
		@unlink($aux_f);
		@unlink($log_f);
		//sleep(5);
		// Test here
       // echo getcwd() ;
		if(!file_exists($pdf_f)) {
			@unlink($f);
			throw new Exception(" Erro ao gerar o arquivo !  ");
		}
		//exit();
		// Send through output
		$fp = fopen($pdf_f, 'rb');
		header('Content-Type: application/pdf');
		/*faz download*/
		//header('Content-Disposition: attachment; filename="' . $outp_file . '"' );
		//header('Content-Length: ' . filesize($pdf_f));
		fpassthru($fp);
		// Final cleanup
		@unlink($pdf_f);
		@unlink($f);
	}

}
?>
