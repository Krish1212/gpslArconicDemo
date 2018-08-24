<div class="breadscrumb">
    <a href="/">Home</a> \
    <a href="/plant.php">Plant Map</a> 
    
<?php 
$curpagename = '';
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
$pagename = ucfirst( str_replace(array(".php","_"),array(""," "),$crumbs[1]) );
$curpagename = "<span style='font-size:14px;color:#0000EE;'>$pagename</span>";
if($pagename != "Machinery"){
    echo ' \ <a href="/machinery.php">Machinery</a>';
    //echo '<a href="' .$pagename .'">' . $pagename . '</a>';
	echo " \ $curpagename ";
}
else
{
    echo " \ <span style='font-size:14px;color:#0000EE;'>Machinery";
	
}
?>
</div>
