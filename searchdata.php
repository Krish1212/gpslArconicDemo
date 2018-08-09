<?php 
  $pagetitle = "Arconic Service Application | GPSL | Machines";
  include_once('header.php');  
?>
<body>
    <script>whereami = 'searchdata';
	function validateForm() {
    var x = document.forms["sform"]["search"].value;
    if (x == "") {
        alert("Search term must be filled out");
        return false;
    }
}
//console.log('add click event')
//$(".searchbtn2").click(function(){ 
//$(".searchenginespage").click();
//});
	</script>
	 <?php 
        $navtitle = "Service Application Manager";
        $from = 'search';
        include_once('navbar.php');
    ?>

<div style="width:80%;margin:0 auto;margin-top:12px;">

<?php $search = $_GET ['search']; ?>
<span style='display:inline-block;color:black;font-size:20px;font-family:"sans-serif";margin-top:5px;margin-bottom:15px;'>Search Result for <b><span style='color:#01B0BA;'><?php echo $search?></span></b>:</span>

<?php
$filepath = 'data/comments.json';
$data = file_get_contents($filepath); 
$datacollection = json_decode($data, true); 
$count = count($datacollection);
$urlpath = $x = $z = $pagenum = $newArray = $pdfff = $displayresult = '';
include ( 'PdfToText-master/PdfToText.phpclass' ) ;
$pdfpath = 'downloads/pll_2373.pdf';
$pdf	=  new PdfToText ( $pdfpath ) ;	
$pdfdata = $pdf -> Text ;
$page_count = count ( $pdf -> Pages ) ;
if( stripos( $pdfdata, $search) !== false){
	$pdfff = $pdf -> document_stripos ( $search, $group_by_page = false );
    $newArray = array_column($pdfff,0);
    $pagenum = $newArray[0];
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
$pdfresult = str_ireplace("$search","<span style='color:white;font-weight:bold;background-color:#01B0BA;padding:1px 1px 1px 1px;'>$search</span>",$pdfresult);
$displayresult.="<span style='font-family:sans-serif;'/>$pdfresult<br><span style='font-family:sans-serif;font-size:14px;'><a href='$pdfpath#page=$pagenum' style='color:#01B0BA;'>$pdfpath</a></span><br><br>";
$x++;
$z++;
}
$y = 1;
echo "<div style='border:2px solid #01B0BA;background-color:#ebf3f4;padding:20px 20px 10px 20px;margin-top:20px;'>";
foreach($datacollection as $key => $value)
{
	$urlpath = ($value['url']);
		foreach($value as $keys =>$values){
			if(isset($values['data'])){
				$searchdata = $values['data'];		
				if( stripos( $searchdata, $search ) !== false){				
				$x++;
				$searchdata = str_ireplace("$search","<span style='color:white;font-weight:bold;background-color:#01B0BA;padding:1px 1px 1px 1px;'>$search</span>",$searchdata);				
				if($z > 0){$displayresult.= "<hr/><br>";}	
				if($z == 0 & $y == 0){$displayresult.= "<hr/><br>";}				
				$y = 0;
				$displayresult .= "				
				<span style='font-family:sans-serif;'/>$searchdata<br>
				<span style='font-family:sans-serif;font-size:14px;'><a href='$urlpath' style='color:#01B0BA;'>$urlpath</a></span><p>
				<br>";
				
				}
			}
			}
		}
if ($x>0){
        echo "$displayresult";
		}
else{
	    echo "No Results Found for the term <b>$search</b>! ";
}
echo "</div>";
?>
</div>
</body>
</html>