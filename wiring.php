<?php 
  $pagetitle = "Arconic Service Application | GPSL | Hydraulic Diagram";
  include_once('header.php');
  session_start();
  $_SESSION['pageid'] = 'wiring';
  if(!$_SESSION['uname']){
      header('Location: index.php');
  }
?>
<body>
    <script>whereami = 'wiring';</script>

    <?php 
        $navtitle = "2500 Ton Hydraulic Press Hydraulic Diagram";
        $from = 'wiring';
        include_once('navbar.php');
    ?>

    <?php include_once('breadscrumb.php'); ?>

    <div class="drawings">
        <div class="leftbar">
            <div class="btn btn-primary highlight">
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
        <div class="wire boxer area1"><a data-id="part1"></a></div>
        <div class="wire boxer area2"><a data-id="part2"></a></div>
        <div class="wire boxer part1"><a data-id="area1"></a><span class="addtocart" data-content="Add to cart"></span></div>
        <div class="wire boxer part2"><a data-id="area2"></a><span class="addtocart" data-content="Add to cart"></span></div>
        <div id="canvas" draggable="false">
            <img src="images/drawings/wiring_trim1.jpg" alt="" draggable="false">
        </div>
    </div>

    <div class="scroll-top"></div>

    <?php include("popups.php");?>
    <?php include_once('footer.php');?>
    <script>$(document).ready(dragSupport);</script>
</body>
</html>