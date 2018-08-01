<?php
$url = 'data/comments.json';
$data = file_get_contents($url); // put the contents of the file into a variable
$datacollection = json_decode($data, true); // decode the JSON feed
$count = count($datacollection);
echo "<div style='border:5px solid #01B0BA;padding:20px 20px 20px 20px;'>";
foreach($datacollection as $key => $value)
{
foreach($value as $keys =>$values){
$searchdata = ($values['data']);
echo '<br/>';
//$button = $_GET ['submit'];
$search = $_GET ['search']; 
//$search = 'text1'; 

 
$searchdata = str_replace("$search","<span style='color:white;font-weight:bold;background-color:#01B0BA;'>$search</span>",$searchdata);
$display = '';
if( strpos( $searchdata, $search ) !== false)
{
echo "
<a href='$url'><b><span style='font-family:sans-serif;font-weight:bold;'/>$search</b></a><br>
<span style='font-family:sans-serif;'/>$searchdata<br>
<a href='$url'>$url</a><p>
";
}
}
}
echo "</div>";
?>