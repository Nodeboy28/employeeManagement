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
     <a href="advertisement.php" class="w3-bar-item w3-left-align w3-black" style="text-decoration: none;">Advertisement</a>
  </div>
</nav>
<!-- Sidebar/menu end -->
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px; ">
  <div ng-app="">
  <!-- Push down content on small screens -->
  <div class="" style="margin-top:65px"></div>
  <div class="" style="padding-top: 5px;">
    <div class="w3-bar w3-pale-green" style="padding:5px;">
      <button class="w3-bar-item w3-hover-green w3-button w3-border w3-border-green" onclick="openCity('London')">Advertisement</button>
      <button class="w3-bar-item w3-hover-green w3-button w3-border-top w3-border-right w3-border-bottom w3-border-green" onclick="openCity('Paris')">Ordered</button>
    </div>
    <script>
    function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
    </script>
    <?php
      if(isset($_POST['advertisement'])){
        echo $_SESSION['advertisement'];
      }
    ?>
    <?php
      if(isset($_POST['payDueAd'])){
        echo $_SESSION['payAgentAdd'];
      }
    ?>
    <div id="London" class="w3-container city">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="w3-container">
          <div class="w3-row">
            <div class="w3-col m2"><p></p></div>
            <div class="w3-col m8">
                <div class="w3-row w3-border w3-card">
                  <div class="w3-col m3 w3-padding w3-light-gray">
                    <div class="w3-row w3-section">
                      <div class="w3-col w3-padding w3-text-green" style="width:60px">Inch</div>
                        <div class="w3-rest" >
                          <input type="number" step="0.01" class="w3-input w3-border w3-border-green w3-text-green" ng-model="inch" name="inch" required>
                        </div>
                    </div>
                  </div>
                  <div class="w3-col m3 w3-padding w3-light-gray">
                    <div class="w3-row w3-section">
                      <div class="w3-col w3-padding w3-text-green" style="width:85px">Column</div>
                        <div class="w3-rest" >
                          <input type="number" step="0.01" class="w3-input w3-border w3-border-green w3-text-green" ng-model="col" name="column" required>
                        </div>
                    </div>
                  </div>
                  <div class="w3-col m3 w3-padding w3-light-gray">
                    <div class="w3-row w3-section">
                      <div class="w3-col w3-padding w3-text-green" style="width:63px">Page</div>
                        <div class="w3-rest">
                          <input type="number" class="w3-input w3-border w3-border-green w3-text-green" ng-model="page" name="page" required>
                        </div>
                    </div>
                  </div>
                  <div class="w3-col m3 w3-padding w3-light-gray">
                    <div class="w3-row w3-section">
                      <div class="w3-col w3-padding w3-text-green" style="width:65px">Price</div>
                        <div class="w3-rest" >
                          <input type="number" step="0.01" class="w3-input w3-border w3-border-green w3-text-green" value="<?php if(isset($_COOKIE["adPrice"])) { echo $_COOKIE["adPrice"]; } ?>" ng-model="price" name="unitPrice"required>
                        </div>
                    </div>
                  </div>
                  <!--**************************************************-->
                  <div class="w3-row w3-light-gray">
                    <div class="w3-col m6">
                      <div class="w3-row w3-section w3-container w3-light-gray">
                        <div class="w3-col w3-padding w3-text-green" style="width:170px">Official amount</div>
                          <div class="w3-rest">
                            <input type="number" step="0.01" class="w3-input w3-border w3-white w3-border-green w3-text-green" value="{{inch*col*page*price}}" name="Oamount"  disabled>
                          </div>
                      </div>
                    </div>
                    <div class="w3-col m6">
                      <div class="w3-row w3-section w3-container w3-light-gray">
                        <div class="w3-col w3-padding w3-text-green" style="width:170px">Final amount</div>
                          <div class="w3-rest">
                            <input type="number" step="0.01" ng-model="receivedAmount-((receivedAmount*commission)/100)" class="w3-input w3-border w3-border-green w3-text-green" name="finalBill"  required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!--**************************************************-->
                  <div class="w3-row w3-light-gray">
                    <div class="w3-col m6">
                      <div class="w3-row w3-section w3-container w3-light-gray">
                        <div class="w3-col w3-padding w3-text-green" style="width:170px">Customer amount</div>
                          <div class="w3-rest">
                            <input type="number" step="0.01" ng-model="customerAmount" class="w3-input w3-border w3-border-green w3-text-green" name="Camount"  required>
                          </div>
                      </div>
                    </div>
                    <div class="w3-col m6">
                      <div class="w3-row w3-section w3-container w3-light-gray">
                        <div class="w3-col w3-padding w3-text-green" style="width:170px">Due</div>
                          <div class="w3-rest">
                            <input type="number" step="0.01" ng-model="customerAmount-receivedAmount" class="w3-input w3-border w3-border-green w3-white w3-text-green" name="due" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!--**************************************************-->
                  <div class="w3-row w3-light-gray">
                    <div class="w3-col m6">
                      <div class="w3-row w3-section w3-container w3-light-gray">
                        <div class="w3-col w3-padding w3-text-green" style="width:180px">Received amount</div>
                          <div class="w3-rest">
                            <input type="number" step="0.01" ng-model="receivedAmount" class="w3-input w3-border w3-border-green w3-text-green" name="Ramount"  required>
                          </div>
                      </div>
                    </div>
                    <div class="w3-col m6">
                      <div class="w3-row w3-section w3-container w3-light-gray">
                        <div class="w3-col w3-padding w3-text-green" style="width:170px">Customer Id</div>
                          <div class="w3-rest">
                            <input type="text" class="w3-input w3-border w3-border-green w3-text-green" name="id" required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="w3-row w3-light-gray">
                    <div class="w3-col m6">
                      <div class="w3-row w3-section w3-container w3-light-gray">
                        <div class="w3-col w3-padding w3-text-green" style="width:170px">Commmission(%)</div>
                          <div class="w3-rest">
                            <input type="number" ng-model="commission" class="w3-input w3-border w3-border-green w3-text-green" value="<?php if(isset($_COOKIE["adCommission"])) { echo $_COOKIE["adCommission"]; } ?>" name="commission"  required>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="w3-container">
                    <button class="w3-btn w3-hover-green w3-border w3-border-green w3-block w3-margin-bottom w3-text-green" name="advertisement" ype="submit">Save</button>
                  </div>
                </div>
            </div>
            <div class="w3-col m2"><p></p></div>
          </div>
      </div>
      </form>
    </div>
    <div id="Paris" class="w3-container city" style="display:none">
      <!--***************************************-->
      <div class="">
        <!--show agent Information-->
        <div class="w3-card w3-margin-top w3-border w3-border-green w3-padding" id="showAllAgent" >
          <h4 id="header" class="w3-green w3-padding">Advertisement ordered list <span class="w3-right"></h4>
          <div id="result" style="margin-top: 15px;"></div>

          <section class="w3-margin-top w3-border-bottom w3-border-left w3-border-right w3-border-green" >
              <!--select all employee start-->
                <?php
                  $sql="SELECT distinct id from advertisement order by n desc";
                  $result=mysqli_query($db,$sql);
                  while($row=$result->fetch_assoc()){
                    $id=$row['id'];
                ?>
              <!--select all employee start-->
              <div class="">
                <button onclick="showAgentInfo('<?php echo $id; ?>')" class="w3-button w3-block w3-left-align w3-border-top w3-border-green" style="text-transform: capitalize;"><?php echo $row['id'];?></button>

                <div id="<?php echo $id; ?>" class="w3-hide w3-padding w3-light-gray w3-border-green w3-leftbar w3-border-top w3-white">
                  <section class="w3-margin-top w3-margin-bottom w3-border w3-border-green" >
                      <?php
                          $sqlAgentABill="SELECT SUM(due) as Adue from advertisement where id='$id'";
                          $resultAgentABill=mysqli_query($db,$sqlAgentABill);
                          $rowAgentABill=$resultAgentABill->fetch_assoc();
                      ?>
                      <?php
                          $sqlAgentADueBill="SELECT SUM(original) as Pdue from payDue where id='$id'";
                          $resultAgentADueBill=mysqli_query($db,$sqlAgentADueBill);
                          $rowAgentADueBill=$resultAgentADueBill->fetch_assoc();
                      ?>
                      <div class="w3-row w3-pale-green">
                        <div class="w3-pale-green w3-container w3-col m2">
                          <div class="w3-padding">
                            <p><pre><strong>Total due </strong>: <?php echo $rowAgentABill['Adue']-$rowAgentADueBill['Pdue']; ?></pre></p>
                          </div>
                        </div>
                        <div class="w3-pale-green w3-container w3-col m3">
                          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="w3-row w3-section w3-container">
                              <div class="w3-col w3-padding" style="width:100px">Pay due</div>
                                <div class="w3-rest">
                                  <input type="text" class="w3-input w3-border w3-border-green" value="<?php echo $id; ?>" name="id" style="display: none;" >
                                  <input type="number" ng-model="payDue" class="w3-input w3-border w3-border-green" name="dueAmount"  required>
                                </div>
                            </div>
                        </div>
                        <div class="w3-pale-green w3-container w3-col m4">
                            <div class="w3-row w3-section w3-container">
                              <div class="w3-col w3-padding" style="width:160px">Commission(%)</div>
                                <div class="w3-rest">
                                  <input type="number" ng-model="commission" class="w3-input w3-border w3-border-green" name="adcommission" required>
                                </div>
                            </div>
                        </div>
                        <div class="w3-pale-green w3-container w3-col m3">
                          <div class="w3-padding">
                            <p><pre><strong>Bill </strong>: {{payDue-((payDue*commission)/100)}}</pre></p>
                          </div>
                        </div>
                        <div class="w3-pale-green w3-container w3-col m2">
                            <div class="w3-row w3-section w3-container">
                                  <button type="submit" name="payDueAd" class="w3-button w3-green w3-block" >Pay</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!--select all employee start-->
                        <?php
                          $sql2="SELECT * from advertisement where id='$id' order by n desc";
                          $result2=mysqli_query($db,$sql2);
                          while($row2=$result2->fetch_assoc()){
                            $date=$row2['date'];
                            $time=$row2['time'];
                            $id=$row2['id'];
                        ?>
                      <!--select all employee start-->
                      <div class="">
                        <button onclick="showAgentInfo2('<?php echo $id.$time; ?>')" class="w3-button w3-block w3-left-align w3-border-top w3-border-green" style="text-transform: capitalize;"><?php echo $row2['date'];?> <span class="w3-tiny"><?php echo $row2['time'];?></span></button>

                        <div id="<?php echo $id.$time; ?>" class="w3-hide w3-padding w3-light-gray w3-border-green w3-leftbar w3-border-top w3-white">
                          <div class="w3-row">
                            <div class="w3-col m6 w3-container">
                              <p><pre><strong>ID</strong>         : <?php echo $row2['id']; ?></pre></p>
                              <p><pre><strong>Date</strong>       : <?php echo $row2['date']; ?></pre></p>
                              <p><pre><strong>Inch  </strong>     : <?php echo $row2['inch'] ?></pre></p>
                              <p><pre><strong>Column </strong>    : <?php echo $row2['columnSize']; ?></pre></p>
                              <p><pre><strong>Page</strong>       : <?php echo $row2['page']; ?></pre></p>
                              <p><pre><strong>Unit price </strong>: <?php echo $row2['unitPrice']; ?></pre></p>
                            </div>
                            <div class="w3-col m6">
                              <div class="w3-container">
                                <p><pre><strong>Official amount</strong> : <?php echo $row2['Oamount']; ?></pre></p>
                                <p><pre><strong>Customer amount</strong> : <?php echo $row2['Camount'] ?></pre></p>
                              </div>
                              <div class="w3-container w3-pale-green">
                                <p><pre><strong>Received amount </strong>: <?php echo $row2['Ramount']; ?></pre></p>
                                <p><pre><strong>Commission</strong>      : <?php echo $row2['commission']; ?>%</pre></p>
                                <p><pre><strong>Final bill</strong>      : <?php echo $row2['finalBill']; ?></pre></p>
                              </div>
                              <div class="w3-container">
                                <p><pre><strong>Due      </strong>       : <?php echo $row2['due']; ?></pre></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        <?php
                          }
                        ?>
                      <script>
                      function showAgentInfo2(id) {
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
      <!--**************************************-->
    </div>
  </div>
  <div>
</div>
</div>
</body>
</html>

<?php
   }else{
          echo("<script>location.href = 'signin.php';</script>");
   }
?>
