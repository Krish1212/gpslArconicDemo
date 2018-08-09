<div class="breadscrumb">
    <a href="/">Home</a> \
    <a href="/plant.php">Plant Map</a> 
    
<?php 
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
$pagename = ucfirst( str_replace(array(".php","_"),array(""," "),$crumbs[1]) );
if($pagename != "Machinery"){
    echo ' \ <a href="/machinery.php">Machinery</a>';
    //echo '<a href="' .$pagename .'">' . $pagename . '</a>';
}
?>

</div>
