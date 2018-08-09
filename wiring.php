<?php 
  $pagetitle = "Arconic Service Application | GPSL | Wiring Diagram";
  include_once('header.php');
?>
<body>
    <script>whereami = 'wiring';</script>

    <?php 
        $navtitle = "2500 Ton Hydraulic Press Wiring Diagram";
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
            <div class="btn btn-primary flush-bottom" onclick="history.back()">
               << Back
            </div>
        </div>
        <div id="canvas" draggable="false">
            <img src="images/drawings/wiring_diagram.jpg" alt="" draggable="false">
        </div>
    </div>

    <div class="scroll-top"></div>

    <?php include("popups.php");?>
    <?php include_once('footer.php');?>
    <script>$(document).ready(dragSupport);</script>
</body>
</html>