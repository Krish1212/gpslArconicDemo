<?php 
  $pagetitle = "Arconic Service Application | GPSL | Machines";
  include_once('header.php');  
?>
<body>
    <script>whereami = 'machinery';</script>
    <?php 
        $navtitle = "2500 Ton Hydraulic Press 2583";
        $from = "machinery";
        include_once('navbar.php');
    ?>
    <div class="machinery container">
        <div class="item machine">
            <a href="drawings_1.php">
                <p>Wiring Diagram</p>
                <img src="./images/wiring_diagram.png" alt="Thumbnail 1" width="100" height="100">
            </a>
            <div class="comments-block">
                <h3>Comments</h3>
                <div class="comments-list">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                </div>
            </div>
        </div>
        <div class="item machine">
            <a href="drawings_2.php">
                <p>Hydraulic Drawing</p>
                <img src="./images/hydraulic_drawing.png" alt="Thumbnail 2" width="100" height="100">
            </a>
            <div class="comments-block">
                <h3>Comments</h3>
                <div class="comments-list">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                </div>
            </div>
        </div>
        <div class="item machine">
            <h3>Subsystems</h3>
            <a href="drawings_3.php">
                <p>Vane pump</p>
                <img src="./images/vane_pump.png" alt="Thumbnail 3" width="100" height="100">
            </a>
            <div class="comments-block">
                <h3>Comments</h3>
                <div class="comments-list">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam natus aut magnam perspiciatis quas a dolorem possimus exercitationem, architecto ea harum veritatis quia deleniti nisi accusamus consequatur, excepturi eligendi illum!</p>
                </div>
            </div>
        </div>
        <div class="feedback">
            <h3>Feedback/Comment</h3>
            <textarea name="feedback" id="feedback" rows="10"></textarea><br>
            <div class="button-bar">
                <input type="button" value="Previous Comments" class="button">
                <input type="button" value="Submit" class="button">
            </div>
        </div>
    </div>
</body>
</html>