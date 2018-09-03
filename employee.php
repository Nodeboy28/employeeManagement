<?php include "src/phpsrc.php"; ?>
<?php
   if($_SESSION['switch2']=='employee'){
?>
<!--my page body start-->
<!--Including header files-->
<?php include "inc/header.php"; ?>
<style>

</style>
</head>
<!--body start-->
<body class="" style="margin:0px;">
<!--top bar -->
<header class="w3-bar w3-top w3-medium w3-blue">
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-hover-blue w3-hide-large" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right w3-hover-blue" onclick="document.getElementById('log').style.display='block'"><i class="fa fa-user"></i> Employee</a>
  <div id="log" class="w3-modal">
    <div class="w3-hide-large" style="margin-top:85px"></div>
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
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top w3-card" style="z-index:3;width:250px; margin-top:71px;" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16 w3-hide-large">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright w3-hover-red"></i>
  </div>
  <div class="w3-medium" >
       <a href="#" class="w3-bar-item w3-button w3-medium w3-hover-black" >About us</a>
       <a href="#" class="w3-bar-item w3-button w3-medium w3-hover-black" >Contacts</a>
  </div>
</nav>
<!-- Sidebar/menu end-->
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px;">
  <!-- Push down content on small screens -->
  <div class="" style="margin-top:65px"></div>
  <div class="w3-container">
    <h3 class="w3-center">Payment Inforamtion</h3>
    <div class="">
      <section class="w3-margin-top w3-margin-bottom w3-border-left w3-border-right w3-border-bottom w3-border-green" >
          <!--select all employee start-->
            <?php
              $id=$_SESSION['id'];
              $sql="SELECT * from paysalery where id='$id' and status='salery' order by i desc";
              $result=mysqli_query($db,$sql);
              while($row=$result->fetch_assoc()){
                $i=$row['i'];
            ?>
          <!--select all employee start-->
            <button onclick="showEmployeeInfo('<?php echo $i; ?>')" class="w3-button w3-block w3-left-align w3-border-top w3-border-green" ><?php echo $row['date']; ?> <span class="w3-tiny"><?php echo $row['time']; ?></span></button>

            <div id="<?php echo $i; ?>" class="w3-row w3-hide w3-padding w3-light-gray w3-border-green w3-leftbar w3-border-top">
                <p><pre><strong>Salery</strong>      : <?php echo $row['salery']; ?></pre></p>
                <p><pre><strong>Bonus</strong>       : <?php echo $row['bonus']; ?></pre></p>
                <p><pre><strong>Mobile bill</strong> : <?php echo $row['mobile']; ?></pre></p>
                <p><pre><strong>Tada</strong>        : <?php echo $row['tada']; ?></pre></p>
                <p class="w3-border-top w3-border-green"></p>
                <p><pre><strong>Total</strong>       : <?php echo $row['salery']+$row['bonus']+$row['mobile']+$row['tada']; ?></pre></p>
            </div>
            <?php
              }
            ?>
          <script>
          function showEmployeeInfo(id) {
              var x = document.getElementById(id);
              if (x.className.indexOf("w3-show") == -1) {
                  x.className += " w3-show";
              } else {
                  x.className = x.className.replace(" w3-show", "");
              }
          }
          </script>

        </table>
      </section>
    </div>
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
