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
    if($_POST['uname'] == ''){
      $errormsg = 'Username cannot be empty';
    } else if($_POST['upass'] == ''){
      $errormsg = 'Password cannot be empty';
    } else if($userdetails[$_POST['uname']] == $_POST['upass']){
      $_SESSION['uname'] = $_POST['uname'];
      $errormsg = '';
    } else {
      //echo the error message here
      $errormsg = 'Wrong user credentials! Try again.';
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
    <p class="loggedin">Welcome <?= $_SESSION['uname'];?> <a href="?logout=1">Logout</a></p>
  <?php endif; ?>
  <?php if(!$_SESSION['uname']){ ?>
    <div class="login">
      <form action="" method="post" name="login_form">
        <h3>Login</h3>
        <?php if(isset($errormsg) && !($errormsg == '')) {?>
          <p class="error-msg" style="text-align:center;background:rgba(255,0,0,0.3);border:1px solid red;"><?= $errormsg ?></p>
        <?php } ?>
        <input type="text" name="uname" placeholder="Username" required/><br>
        <input type="password" name="upass" placeholder="Password" required/><br>
        <input type="submit" name="submit" value="SUBMIT"/>
      </form>
    </div>
  <?php } else { ?>
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
  <?php } ?>
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