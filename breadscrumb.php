<div class="breadscrumb">
    <a href="/">Home</a> \
    <a href="/plant.php">Plant Map</a> 
    
<?php 
$curpagename = '';
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
$pagename = ucfirst( str_replace(array(".php","_"),array(""," "),$crumbs[1]) );
//$curpagename = "<span style='font-size:13px;color:#0000EE;'>$pagename</span>";
$curpagename = '<a style="color:#0000EE;">' . $pagename . '</a>';
if($pagename != "Machinery"){
    echo ' \ <a href="/machinery.php">Machinery</a>';
    if($pagename == 'Viewcart'){
        if($_SESSION['pageid'] == 'hydraulic'){
            echo ' \ <a href="/hydraulic.php">Hydraulic Drawing</a>';
        } else if ($_SESSION['pageid'] == 'wiring'){
            echo ' \ <a href="/wiring.php">Wiring Diagram</a>';
        }
    }
	echo " \ $curpagename ";
}
else
{
    //echo " \ <span style='font-size:14px;color:#0000EE;'>Machinery";
    echo ' \ <a style="color:#0000EE;">Machinery</a>'; 
	
}
?>
</div>
