<!--Including header files-->
<?php include "src/phpsrc.php"; ?>
<?php
   if($_SESSION['switch1']=='admin'){
?>
<?php include "inc/header.php"; ?>
<style>
.upload-btn-wrapper {
 position: relative;
 overflow: hidden;
 display: inline-block;
}
.upload-btn-wrapper input[type=file] {
 font-size: 100px;
 position: absolute;
 left: 0;
 top: 0;
 opacity: 0;
}
input:focus {
    outline:none;
}
::-webkit-scrollbar {
display: none;
}
h4{
  margin:0px;
}
</style>
</head>
<!--page body start-->
<body class="" style="margin:0px;">
<div ng-app="myApp" ng-controller="myCtrl">
<!-- top bar -->
<header class="w3-bar w3-top w3-medium w3-green">
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-hover-green w3-hide-large" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right w3-hover-green" onclick="document.getElementById('log').style.display='block'"><i class="fa fa-user"></i> Admin</a>
  <div id="log" class="w3-modal">
    <div class="w3-hide-large" style="margin-top:83px"></div>
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('log').style.display='none'" class="w3-button w3-xlarge w3-text-red w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="gallery/profile/<?php echo $_SESSION['picture']; ?>" alt="Avatar" style="width:30%" class="w3-circle">
      </div>
      <div class="w3-container w3-center">
        <br>
        <span class="w3-small w3-text-black" style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span>
        <br>
        <span class="w3-small w3-text-green" >Active log : <?php echo $_SESSION['email']; ?></span>
      </div>
      <form class="w3-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="w3-section">
          <button class="w3-button w3-block w3-red w3-section w3-padding" type="submit" name="logout">Log out</button>
        </div>
      </form>
    </div>
  </div>
</header>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top w3-card" style="z-index:3;width:250px; margin-top:70px;" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16 w3-hide-large">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright w3-hover-red"></i>
  </div>
  <div class="w3-medium">
    <a href="index.php" class="w3-bar-item w3-hover-black" style="text-decoration: none;">Home</a>
    <a href="addnewEmployee.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration: none;">Add new employee</a>
    <a href="employeeSalery.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration: none;">Employee salery</a>
    <a href="addnewAgent.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration: none;">Add new agent</a>
    <a href="agentSalery.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration: none;">Agent salery</a>
    <a href="advertisement.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration: none;">Advertisement</a>
  </div>
</nav>
<!-- Sidebar/menu end -->
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px; ">
  <!-- Push down content on small screens -->
  <div class="" style="margin-top:65px"></div>
  <div class="w3-container">

  </div>
</div>
</body>
</html>
<?php
   }else{
          header("location:signin.php");
   }
?>
