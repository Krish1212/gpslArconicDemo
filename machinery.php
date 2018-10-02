<?php 
  $pagetitle = "Arconic Service Application | GPSL | Machines";
  include_once('header.php'); 
  session_start();
  $_SESSION['pageid'] = '';
  if(!$_SESSION['uname']){
      header('Location: index.php');
  } 
?>
<body>
    <script>whereami = 'machinery';</script>
    <?php 
        $navtitle = "2500 Ton Hydraulic Press 2583";
        $from = "machinery";
        include_once('navbar.php');
    ?>
    <?php include_once('breadscrumb.php'); ?>
    <div class="machinery container">
        <div class="item machine">
            <a href="wiring.php" class="thumbnail">
                <p>Hydraulic Diagram</p>
                <img src="images/drawings/wiring_diagram_1.jpg" alt="Wiring Diagram" width="100" height="100">
            </a>
            <div class="comments-block">
                <h3>Comments</h3>
                <div class="wiring comments-list">
                </div>
            </div>
        </div>
        <div class="item machine">
            <a href="hydraulic.php" class="thumbnail">
                <p>Hydraulic Drawing</p>
                <img src="images/drawings/hydraulic_drawing.jpg" alt="Hydraulic Drawing" width="100" height="100">
            </a>
            <div class="comments-block">
                <h3>Comments</h3>
                <div class="hydraulic comments-list">
                </div>
            </div>
        </div>
        <div class="item machine">
            <h3>Subsystems</h3>
            <a href="vane_pump.php" class="thumbnail">
                <p>Vane pump</p>
                <img src="./images/vane_pump.png" alt="Vane pump" width="100" height="100">
            </a>
<!--             <div class="comments-block">
                <h3>Comments</h3>
                <div class="comments-list">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                </div>
            </div> -->
        </div>
        <div class="feedback">
            <h3>Feedback/Comment</h3>
            <textarea name="feedback" id="feedback" rows="10"></textarea><br>
            <div class="button-bar">
                <input type="button" value="Previous Comments" class="previous button">
                <input type="button" value="Submit" class="submit button">
            </div>
        </div>
    </div>
<?php 
    include('popups.php');
    include_once('footer.php');
?>
<script>
    $(document).ready(onMachinerypageload);
</script>
</body>
</html>