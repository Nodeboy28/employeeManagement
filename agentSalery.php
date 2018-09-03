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
     <a href="agentSalery.php" class="w3-bar-item w3-left-align w3-black" style="text-decoration: none;">Agent salery</a>
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
    <?php
      if(isset($_POST['addBill'])){
        echo $_SESSION['addAgentBill'];
      }
    ?>
    <?php
      if(isset($_POST['payBill'])){
        echo $_SESSION['payAgentBill'];
      }
    ?>
    <!--show agent Information-->
    <div class="w3-card w3-margin-top w3-border w3-border-green w3-padding" id="showAllAgent" >
      <h4 id="header" class="w3-green w3-padding">Agent salery <span class="w3-right w3-white w3-padding w3-tiny w3-hover-red" onclick="document.getElementById('reset').style.display='block'" style="cursor: pointer;">Reset</span>  <span class="w3-right w3-white w3-padding w3-tiny w3-margin-right" style="cursor: pointer;" onclick="print()">Print</span></h4>
      <div id="reset" class="w3-modal">
        <div class="w3-modal-content w3-animate-top">
          <div class="w3-container w3-padding w3-text-red">
            <span onclick="document.getElementById('reset').style.display='none'" class="w3-button w3-display-topright w3-hover-red">&times;</span>
            <p>Are you sure you want to reset all previous month data??</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <p>Admin Password :</p>
              <input type="password" name="resetpassword" class="w3-input w3-border w3-border-red" ><br>
              <button class="w3-btn w3-red w3-margin-bottom" name="resetemployee" type="submit">Reset</button>
            </form>
          </div>
        </div>
      </div>
      <section class="w3-margin-top w3-margin-bottom w3-border-left w3-border-right w3-border-bottom w3-border-green" >
          <!--select all employee start-->
            <?php
              $sql="SELECT * from signin where status='agent' order by id";
              $result=mysqli_query($db,$sql);
              while($row=$result->fetch_assoc()){
                $phone=$row['phone'];
                $id=$row['id'];
            ?>
            <?php
              $sqlTotal="SELECT SUM(totalbill) as totalbill from agentbill where id='$id'";
              $resultTotal=mysqli_query($db,$sqlTotal);
              $rowTotal=$resultTotal->fetch_assoc();
            ?>
            <?php
              $sqlTotalPayBill="SELECT SUM(bill) as bill from paybill where id='$id'";
              $resultTotalPayBill=mysqli_query($db,$sqlTotalPayBill);
              $rowTotalPayBill=$resultTotalPayBill->fetch_assoc();
            ?>
            <?php
              $due=$rowTotal['totalbill']-$rowTotalPayBill['bill'];
            ?>
          <!--select all employee start-->
          <div class="">
            <button onclick="showAgentInfo('<?php echo $phone; ?>')" class="w3-button w3-block w3-left-align w3-border-top w3-border-green"><?php echo $row['id']; ?></button>

            <div id="<?php echo $phone; ?>" class="w3-hide w3-padding w3-light-gray w3-border-green w3-leftbar w3-border-top">
              <div class="w3-row">
                <div class="w3-col m4 w3-container">
                  <p><pre><strong>Name       </strong>   : <span style="text-transform: capitalize;"><?php echo $row['firstname']." ".$row['lastname']; ?></span></pre></p>
                  <p><pre><strong>Total bill  </strong>  : <?php echo $rowTotal['totalbill']; ?></pre></p>
                  <p><pre><strong>Paid  </strong>        : <?php echo $rowTotalPayBill['bill']; ?></pre></p>
                  <p><pre><strong>Due  </strong>         : <?php echo $due; ?></pre></p>

                </div>
                <div class="w3-col m4 w3-container w3-border-left w3-border-green">
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <p class="w3-green w3-padding-large w3-center">Add Agent Bill</p>
                    <input type="text" name="id" style="display:none;" value="<?php echo $row['id']; ?>">
                    <input type="email" name="email" style="display:none;" value="<?php echo $row['email']; ?>">
                    <label>Unit price(per paper)</label>
                    <input type="number" step="0.01" name="unitPrice" class="w3-input w3-margin-bottom w3-light-gray w3-border-green" required>
                    <label>Total quantity</label>
                    <input type="number" name="totalQuantity" class="w3-input w3-margin-bottom w3-light-gray w3-border-green" required>
                    <label>Sample copy</label>
                    <input type="number" name="samplecopy" class="w3-input w3-margin-bottom w3-light-gray w3-border-green" >
                    <label>Extra Sample copy</label>
                    <input type="number" name="exsamplecopy" class="w3-input w3-margin-bottom w3-light-gray w3-border-green" >
                    <button class="w3-btn w3-green" name="addBill" type="submit">Add</button>
                  </form>
                </div>
                <div class="w3-col m4 w3-container w3-border-left w3-border-green">
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <p class="w3-green w3-padding-large w3-center">Pay Bill</p>
                    <input type="text" name="id" style="display:none;" value="<?php echo $row['id']; ?>">
                    <input type="email" name="email" style="display:none;" value="<?php echo $row['email']; ?>">
                    <label>Amount</label>
                    <input type="number" name="bill" class="w3-input w3-margin-bottom w3-light-gray w3-border-green" >
                    <button class="w3-btn w3-green" name="payBill" type="submit">Pay</button>
                  </form>
                </div>
              </div>
            </div>
            <?php
              }
            ?>
          <script>
          function showAgentInfo(id) {
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
</div>
</body>
</html>
<?php
   }else{
          header("location:signin.php");
   }
?>
