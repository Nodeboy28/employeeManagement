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
     <a href="employeeInfo.php" class="w3-bar-item w3-left-align w3-black" style="text-decoration:none;" >Employee Information</a>
     <a href="agentInfo.php" class="w3-bar-item w3-left-align w3-hover-black" style="text-decoration:none;" >Agent Information</a>
  </div>
</nav>
<!-- Sidebar/menu end-->
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px;">
  <!-- Push down content on small screens -->
  <div class="" style="margin-top:70px"></div>
  <div class="w3-container">
    <div class="w3-card w3-margin-top w3-border w3-border-blue w3-padding" id="showAllEmployee" >
      <h4 id="header" class="w3-blue w3-padding">Employee list  <span class="w3-right"><input type="text" class="w3-input w3-tiny" id="search_id" placeholder="Search" /></span> </h4>
      <div id="result" style="margin-top: 15px;"></div>
      <section class="w3-margin-top w3-margin-bottom w3-border-left w3-border-right w3-border-bottom w3-border-blue" >
          <!--select all employee start-->
          	<?php
          		$sql="SELECT * from signin where status='employee' order by id asc";
          		$result=mysqli_query($db,$sql);
          		while($row=$result->fetch_assoc()){
                $email=$row['email'];
                $id=$row['id'];
          	?>
          <!--select all employee start-->
            <button onclick="showEmployeeInfo('<?php echo $email; ?>')" class="w3-button w3-block w3-left-align w3-border-top w3-border-blue" ><?php echo $row['id']; ?></button>

            <div id="<?php echo $email; ?>" class="w3-hide w3-padding w3-light-gray w3-border-blue w3-leftbar w3-border-top">
              <div class="w3-row">
                <div class="w3-col m2">
                  <img src="gallery/profile/<?php echo $row['picture']; ?>" alt="Profile Picture" width="100%">
                  <div class="w3-container w3-center">
                    <span style="text-transform: capitalize;"><?php echo $row['firstname']." ".$row['lastname']; ?></span>
                  </div>
                </div>
                <div class="w3-col m5 w3-container w3-white">
                  <p><pre><strong>Name       </strong>  : <span style="text-transform: capitalize;"><?php echo $row['firstname']." ".$row['lastname']; ?></span></pre></p>
                  <p><pre><strong>Email      </strong>  : <?php echo $row['email']; ?></pre></p>
                  <p><pre><strong>Designation</strong>  : <?php echo $row['designation']; ?></pre></p>
                  <p><pre><strong>Phone      </strong>  : <?php echo $row['phone']; ?></pre></p>
                  <p><pre><strong>Phone(2)</strong>     : <?php echo $row['phone2']; ?></pre></p>
                </div>
                <div class="w3-col m5 w3-container w3-white">
                  <p><pre><strong>Address</strong>           : <?php echo $row['address']; ?></pre></p>
                  <p><pre><strong>Facebook</strong>          : <?php echo $row['facebook']; ?></pre></p>
                  <p><pre><strong>Emergency Contact</strong> : <?php echo $row['econtact']; ?></pre></p>
                  <p><pre><strong>Blood</strong>             : <?php echo $row['blood']; ?></pre></p>
                  <p><pre><strong>Joining Date</strong>      : <?php echo $row['date']; ?></pre></p>
                </div>
              </div>
              <!--**************************************-->
              <div>
                <h3>Payment Information</h3>
                <section class="w3-margin-top w3-margin-bottom w3-border w3-border-orange" style="height:300px; overflow: scroll;">
                    <!--select all employee start-->
                      <?php
                        $sqlES="SELECT * from paysalery where id='$id' and status='salery' order by i desc";
                        $resultES=mysqli_query($db,$sqlES);
                        while($rowES=$resultES->fetch_assoc()){
                          $i=$rowES['i'];
                      ?>
                    <!--select all employee start-->
                      <button onclick="showEmployeeInfo('<?php echo $i; ?>')" class="w3-button w3-block w3-left-align w3-border-bottom w3-border-orange" ><?php echo $rowES['date']; ?> <span class="w3-tiny"><?php echo $rowES['time']; ?></span></button>

                      <div id="<?php echo $i; ?>" class="w3-row w3-hide w3-padding w3-light-gray w3-border-orange w3-leftbar w3-border-bottom w3-pale-yellow">
                        <div class="w3-col m6">
                          <p><pre><strong>Salery</strong>      : <?php echo $rowES['salery']; ?></pre></p>
                          <p><pre><strong>Bonus</strong>       : <?php echo $rowES['bonus']; ?></pre></p>
                          <p class="w3-border-top w3-border-orange"></p>
                          <p><pre><strong>Total</strong>       : <?php echo $rowES['salery']+$rowES['bonus']+$rowES['mobile']+$rowES['tada']; ?></pre></p>
                        </div>
                        <div class="w3-col m6">
                          <p><pre><strong>Mobile bill</strong> : <?php echo $rowES['mobile']; ?></pre></p>
                          <p><pre><strong>Tada</strong>        : <?php echo $rowES['tada']; ?></pre></p>
                        </div>

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
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"src/fetchsearchemployee.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_id').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<script src="js/script.js"></script>
</body>
</html>
<!--my page body end-->
<?php
   }else{
          header("location:signin.php");
   }
?>
