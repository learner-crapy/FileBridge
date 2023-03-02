<?php
function Unzip($doc_name, $dir)
{
	$zip = new ZipArchive;
	// $doc_file = './upload/'.$doc_name;
	$doc_file = $doc_name;
	$zip->open($doc_file);
	// $zip->extractTo('./upload/'.$dir);
	$zip->extractTo($dir);
}
	//$xml = simplexml_load_file("./tmp/document.xml");
//$xml->registerXPathNamespace('w',"http://schemas.openxmlformats.org/wordprocessingml/2006/main");
//$text = $xml->xpath('//w:t');
//echo '<pre>'; print_r($text); echo '</pre>';
?>
