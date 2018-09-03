<?php
     include "src/phpsrc.php";
?>
<!DOCTYPE html>
<html>
<title>Bangladesh Protidine</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3css.css">
<link rel="stylesheet" href="fonts/roboto.css">
<link rel="stylesheet" href="fonts/montsrret.css">
<link href="fonts/buda.css" rel="stylesheet">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
body,h2{
  font-family: 'Buda', cursive;
}
.myLink {display: none}
.w3-jumbo{
  background-image: url("london2.jpg");
  background-position: center;
}
input:focus {
    outline:none;
}
</style>
<body class="w3-light-grey">
<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small w3-hide-medium" style="max-width:1500px">
  <img class="w3-image" src="london.jpg" alt="London" width="1500" height="700">
  <div class="w3-display-middle w3-white" style="width:30%" >
    <?php
      if(isset($_POST['signin'])){
    ?>
        <div class="w3-red w3-center w3-padding"><?php echo $_SESSION['msglog']; ?>
        </div>
    <?php
      }
    ?> <!-- Tabs -->
    <div class="w3-container w3-blue">
      <h2>Sign in</h2>
    </div>
    <form class="w3-padding" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <label class=""><b>Email</b></label>
      <input class="w3-input" type="email" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" required>
      <br>
      <label class=""><b>Password</b></label>
      <input class="w3-input" type="text" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
      <p>
      <input class="w3-check" type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> />
      <label class="">Remember me</label>
      <button class="w3-btn w3-blue w3-right" name="signin">Sign In</button>
      </p>
    </form>
  </div>
</header>
<header class="w3-hide-large">
  <div class="w3-jumbo" style="height:100px;">

  </div>
  <div class="w3-padding">    <!-- Tabs -->
    <div class="w3-container w3-blue">
      <h2>Sign in</h2>
    </div>
    <form class="w3-padding w3-border">
      <label class=""><b>Username</b></label>
      <input class="w3-input" type="text">
      <label class=""><b>Password</b></label>
      <input class="w3-input" type="text">
      <p>
      <input class="w3-check" type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> />
      <label class="">Remember me</label>
      <button class="w3-btn w3-blue w3-right" name="signin">Sign In</button>
      </p>
    </form>
  </div>
</header>
<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>

</body>
</html>
