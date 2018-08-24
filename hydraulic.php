<?php 
  $pagetitle = "Arconic Service Application | GPSL | Hydraylic Drawings";
  include_once('header.php');
  session_start();
  if(!$_SESSION['uname']){
      header('Location: index.php');
  } 
?>
<body>
    <script>whereami = 'hydraulic';</script>

    <?php 
        $navtitle = "2500 Ton Hydraulic Press Hydraulic Drawing";
        $from = 'hydraulic';
        include_once('navbar.php');
    ?>

    <?php include_once('breadscrumb.php'); ?>

    <div class="drawings">
        <div class="leftbar">
            <div class="btn btn-primary">
                Highlight and comment
            </div>
            <div class="btn btn-primary prev-comments">
                Previous Comments
            </div>
            <div class="btn btn-primary clear-comments">
                Clear highlights
            </div>
            <div class="btn btn-primary flush-bottom" onclick="history.back()">
                << Back
            </div>
        </div>
        <div class="draw boxer area1"><a data-id="part1"></a></div>
        <div class="draw boxer area2"><a data-id="part2"></a></div>
        <div class="draw boxer part1"><a data-id="area1"></a><span class="addtocart" data-content="Add to cart"></span></div>
        <div class="draw boxer part2"><a data-id="area2"></a><span class="addtocart" data-content="Add to cart"></span></div>
        <div id="canvas" draggable="false">
            <img src="images/drawings/hydraulic_drawing.jpg" alt="" draggable="false">
        </div>
    </div>

    <div class="scroll-top"></div>

    <?php include("popups.php");?>
    <?php include_once('footer.php');?>
    <script>$(document).ready(dragSupport);</script>
</body>
</html>