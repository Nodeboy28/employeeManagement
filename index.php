<?php include "src/phpsrc.php"; ?>
<?php
   if($_SESSION['switch1']=='admin'){
?>
<!--my page body start-->
<!--Including header files-->
<?php include "inc/header.php"; ?>
<style>
::-webkit-scrollbar {
display: none;
}
h4{
  margin:0px;
}
button:focus {
    outline:none;
}
</style>
</head>
<!--body start-->
<body class="" style="margin:0px;">
<!--top bar -->
<header class="w3-bar w3-top w3-medium w3-blue">
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-hover-blue w3-hide-large" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  <div class="w3-bar-item w3-padding-24 w3-wide"><a href="index.php" style="text-decoration: none;">LOGO</a></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right w3-hover-blue" onclick="document.getElementById('log').style.display='block'"><i class="fa fa-user"></i> Admin</a>
  <div id="log" class="w3-modal">
    <div class="w3-hide-large" style="margin-top:83px"></div>
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('log').style.display='none'" class="w3-button w3-xlarge w3-text-red w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="gallery/profile/<?php echo $_SESSION['picture']; ?>" alt="Avatar" style="width:30%" class="w3-circle">
      </div>
      <div class="w3-container w3-center">
        <span class="w3-medium w3-text-black" style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span>
        <br>
        <span class="w3-medium w3-text-green" >Active log : <?php echo $_SESSION['email']; ?></span>
      </div>
      <form class="w3-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="w3-section">
          <button class="w3-button w3-block w3-red w3-section w3-padding" type="submit" name="logout">Log out</button>
        </div>
      </form>
    </div>
  </div>
</header>
<!-- Sidebar/menu start-->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top w3-card" style="z-index:3;width:250px; margin-top:70px;" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16 w3-hide-large">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright w3-hover-red"></i>
  </div>
  <div class="w3-medium" >
     <a href="admin.php" class="w3-bar-item w3-hover-black" style="text-decoration:none;">Edit</a>
     <a href="employeeInfo.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration:none;" >Employee Information</a>
     <a href="agentInfo.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration:none;" >Agent Information</a>
  </div>
</nav>
<!-- Sidebar/menu end-->
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px;">
  <!-- Push down content on small screens -->
  <div class="" style="margin-top:70px"></div>
  <div class="w3-container">

  </div>
</div>
<script src="js/script.js"></script>
</body>
</html>
<!--my page body end-->
<?php
   }else{
          header("location:signin.php");
   }
?>
