<?php 
  $pagetitle = "Arconic Service Application | GPSL | Home";
  include_once('header.php');

  session_set_cookie_params(604800,'/');
  session_start();
  $userdetails = array('gpsl' => 'gpsl123','user' => 'user123');
  if(isset($_GET['logout'])) {
    $_SESSION['uname'] = '';
    header('Location: ' . $_SERVER['PHP_SELF']);
  }
  if(isset($_POST['uname'])){
    if($userdetails[$_POST['uname']] == $_POST['upass']){
      $_SESSION['uname'] = $_POST['uname'];
    } else {
      //echo the error message here
    }
  }
?>
<body>
<script>whereami = 'home';
function validateForm() {
    var x = document.forms["sform"]["search"].value;
    if (x == "") {
        alert("Search term must be filled out");
        return false;
    }
}
</script>

<div class="header" style="position:absolute;z-index: 99;">
    <div class="logo"><a href="/"><img src="images/logo.svg" alt=""></a></div>
    <div class="title"></div>
</div>

<div class="branding-new">
  <div class="title">Service <br>Application</div>
  <?php if($_SESSION['uname']): ?>
    <p style="position:absolute;top:250px;left:44px;display:block;color:white;padding:1%;">Welcome <?= $_SESSION['uname'];?> <a href="?logout=1">Logout</a></p>
  <?php endif; ?>
  <?php if(!$_SESSION['uname']): ?>
    <div class="login" style="position:absolute;width:300px;top:300px;left:44px;display:block;background:white;border:2px solid #01B0BA;">
      <form action="" method="post" name="login_form">
        <h3 style="text-align:center;padding:1%;margin:0;margin-bottom:5px;background:#01B0BA;">Login</h3>
        <input type="text" name="uname" placeholder="Username" style="width:96%;line-height:1em;font-size:20px;margin:2%;padding:1%"/><br>
        <input type="password" name="upass" placeholder="Password" style="width:96%;line-height:1em;font-size:20px;margin:2%;padding:1%;"/><br>
        <input type="submit" name="submit" value="SUBMIT" style="margin:2%;padding:1%;width:96%;font-size:1em;font-weight:bold;border:1px solid #01B0BA;border-radius:10px;background:#01B0BA;"/>
      </form>
    </div>
  <?php endif; ?>
  <?php if($_SESSION['uname']): ?>
    <div class="ft_wrap">
      <a href="plant.php" style="text-decoration:none;">
        <div class="mainmap">Plant Map</div>
      </a>
      <div class="searchengine">
        <!--gcse:searchbox-only resultsUrl="searchpage.php" newWindow="true" queryParameterName="q"></gcse:searchbox-only-->
        <form name="sform" action='searchdata.php' method='GET' onsubmit="return validateForm()">
          <input type='text' size='90' name='search' placeholder="Search in Application...">
          <div class="searchbtn">
            <input type='submit' name='submit' value='Search'>
          </div>
        </form>
    </div>
<?php endif; ?>
  </div>
</div>

<?php
  include_once('footer.php');
?>
<!--script>
/*    (function() {
        var cx = '008683130934383105744:-8atcd4pn0k';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();*
</script-->
</body>

</html>