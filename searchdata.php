<?php 
  $pagetitle = "Arconic Service Application | GPSL | Plant Map";
  include_once('header.php');
?>
<body>
    <script>whereami = 'plant';</script>
    <?php 
        $navtitle = "Service Application Manager";
        include_once('navbar.php');
    ?>

<div style="width:80%;margin:0 auto;margin-top:18px;">
<h2>Search Result</h>

<?php
$filepath = 'data/comments.json';
$data = file_get_contents($filepath); // put the contents of the file into a variable
$datacollection = json_decode($data, true); // decode the JSON feed
$count = count($datacollection);
$urlpath = '';
$displayresult = '';
$search = $_GET ['search'];
echo "<div style='border:2px solid #01B0BA;background-color:#ebf3f4;padding:20px 20px 20px 20px;'>";
$x='';
foreach($datacollection as $key => $value)
{
	$urlpath = ($value['url']);
		foreach($value as $keys =>$values){
			if(isset($values['data'])){
				$searchdata = $values['data'];
				if( strpos( $searchdata, $search ) !== false){
				$x++;
				$searchdata = str_replace("$search","<span style='color:white;font-weight:bold;background-color:#01B0BA;'>$search</span>",$searchdata);
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

</div>
</body>
</html>
