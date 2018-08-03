<?php
$filepath = 'data/comments.json';
$data = file_get_contents($filepath); 
$datacollection = json_decode($data, true); 
$count = count($datacollection);
$urlpath = '';
$x='';
$displayresult = '';
include ( 'PdfToText-master/PdfToText.phpclass' ) ;
$pdfpath = 'downloads/pll_2373.pdf';
$pdf	=  new PdfToText ( $pdfpath ) ;	
$search = $_GET ['search'];
//$searchuc = ucwords($search);
//$searchlc = lcfirst($search);
$pdfdata = $pdf -> Text ;
if( stripos( $pdfdata, $search) !== false){
$pos = stripos($pdfdata, $search);
$previous = substr($pdfdata,0,$pos);
$next = substr($pdfdata,$pos);
if (strlen($previous) > 100){
	$previous = substr($previous,strlen($previous) - 100);
}
if (strlen($next) > 100){
	$next = substr($next,0,100);
}
$pdfresult = $previous." ".$next;
$pdfresult = str_ireplace("$search","<span style='color:white;font-weight:bold;background-color:#01B0BA;'>$search</span>",$pdfresult);
$displayresult.="<span style='font-family:sans-serif;'/>$pdfresult<br><a href='$pdfpath'>$pdfpath</a><br><br>";
$x++;
}
echo "<div style='border:2px solid #01B0BA;background-color:#ebf3f4;padding:20px 20px 20px 20px;'>";
foreach($datacollection as $key => $value)
{
	$urlpath = ($value['url']);
		foreach($value as $keys =>$values){
			if(isset($values['data'])){
				$searchdata = $values['data'];
				if( stripos( $searchdata, $search ) !== false){
				$x++;
				$searchdata = str_ireplace("$search","<span style='color:white;font-weight:bold;background-color:#01B0BA;'>$search</span>",$searchdata);
				$displayresult .= "				
				<span style='font-family:sans-serif;'/>$searchdata<br>
				<a href='$urlpath'>$urlpath</a><p>
				<br/>";
				}
			}
			}				
		}
if ($x>0){
		echo "<span style='font-family:courier;'/>$x results found for the search term <b>$search</b><hr/><br/>";
        echo "$displayresult";
		}
else{
	    echo "<span style='font-family:courier;'/>No Results Found for the term <b>$search</b>! ";
}
echo "</div>";
?>
