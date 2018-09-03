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
     <a href="agentInfo.php" class="w3-bar-item w3-left-align w3-black" style="text-decoration:none;" >Agent Information</a>
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
    <!--show agent Information-->
    <div class="w3-card w3-margin-top w3-border w3-border-blue w3-padding" ng-show="showAllAgent" id="showAllAgent" >
      <h4 id="header" class="w3-blue w3-padding">Agent List <span class="w3-right"><input type="text" class="w3-input w3-tiny" id="search_id" placeholder="Search" /></span> </h4>
      <div id="result" style="margin-top: 15px;"></div>

      <section class="w3-margin-top w3-margin-bottom w3-border-left w3-border-right w3-border-bottom w3-border-blue" >
          <!--select all employee start-->
            <?php
              $sql="SELECT * from signin where status='agent' order by id asc";
              $result=mysqli_query($db,$sql);
              while($row=$result->fetch_assoc()){
                $phone=$row['phone'];
                $id=$row['id'];
            ?>
          <!--select all employee start-->
          <div class="">
            <button onclick="showAgentInfo('<?php echo $phone; ?>')" class="w3-button w3-block w3-left-align w3-border-top w3-border-blue" style="text-transform: capitalize;"><?php echo $row['id'];?></button>

            <div id="<?php echo $phone; ?>" class="w3-hide w3-padding w3-light-gray w3-border-blue w3-leftbar w3-border-top w3-white">
              <div class="w3-row">
                <div class="w3-col m2">
                  <img src="gallery/profile/<?php echo $row['picture']; ?>" style="width:100%">
                  <div class="w3-container w3-center">
                    <span style="text-transform: capitalize;"><?php echo $row['firstname']." ".$row['lastname']; ?></span>
                  </div>
                </div>
                <div class="w3-col m5 w3-container">
                  <p><pre><strong>ID</strong>           : <?php echo $row['id']; ?></pre></p>
                  <p><pre><strong>Name       </strong>  : <span style="text-transform: capitalize;"><?php echo $row['firstname']." ".$row['lastname']; ?></span></pre></p>
                  <p><pre><strong>Email      </strong>  : <?php echo $row['email']; ?></pre></p>
                  <p><pre><strong>Address</strong>      : <?php echo $row['address']; ?></pre></p>
                  <p><pre><strong>Phone      </strong>  : <?php echo $row['phone']; ?></pre></p>
                </div>
                <?php
                    $sqlAgentTBill="SELECT SUM(totalBill) as ATB from agentbill where id='$id'";
                    $resultAgentTBill=mysqli_query($db,$sqlAgentTBill);
                    $rowAgentTBill=$resultAgentTBill->fetch_assoc();

                    $sqlAgentFBill="SELECT SUM(finalBill) as Fbill from advertisement where id='$id'";
                    $resultAgentFBill=mysqli_query($db,$sqlAgentFBill);
                    $rowAgentFBill=$resultAgentFBill->fetch_assoc();

                    $sqlAgentRBill="SELECT SUM(Ramount) as Rbill from advertisement where id='$id'";
                    $resultAgentRBill=mysqli_query($db,$sqlAgentRBill);
                    $rowAgentRBill=$resultAgentRBill->fetch_assoc();

                    $sqlAgentPaidBill="SELECT SUM(bill) as paidAmount from paybill where id='$id'";
                    $resultAgentPaidBill=mysqli_query($db,$sqlAgentPaidBill);
                    $rowAgentPaidBill=$resultAgentPaidBill->fetch_assoc();

                    $tab=$rowAgentTBill['ATB']+$rowAgentFBill['Fbill'];
                    $tpb=$rowAgentPaidBill['paidAmount']+$rowAgentRBill['Rbill'];
                    $tad=$tab-$tpb;
                ?>
                <div class="w3-col m5">
                  <div class="w3-container">
                    <p><pre><strong>Phone 2</strong>      : <?php echo $row['phone2']; ?></pre></p>
                    <p><pre><strong>Blood Group</strong>  : <?php echo $row['blood']; ?></pre></p>
                  </div>
                  <div class="w3-pale-green w3-container">
                    <p><pre><strong>Total bill </strong>  : <?php echo $tab; ?></pre></p>
                    <p><pre><strong>Paid amount</strong>  : <?php echo $tpb; ?></pre></p>
                    <p><pre><strong>Due      </strong>    : <?php echo $tad; ?></pre></p>
                  </div>
                </div>
              </div>

              <div class="">
                 <h4>Payment Information</h4>
                  <section class="w3-margin-top w3-margin-bottom w3-border w3-border-blue" style="height:400px; overflow: scroll;">
                      <!--select all employee start-->
                        <?php
                          $sqlES="SELECT distinct month from agentbill where id='$id' order by i desc";
                          $resultES=mysqli_query($db,$sqlES);
                          while($rowES=$resultES->fetch_assoc()){
                            $month=$rowES['month'];
                        ?>
                      <!--select all employee start-->
                        <button onclick="showEmployeeInfo('<?php echo $month; ?>')" class="w3-blue w3-button w3-block w3-left-align w3-border-bottom w3-border-white" ><?php echo $rowES['month']; ?><i class="fa fa-angle-down w3-right"></i></button>
                        <div id="<?php echo $month; ?>" class="w3-row w3-hide w3-light-gray w3-border-blue w3-leftbar w3-border w3-pale-yellow">
                          <div class="">
                            <table class="w3-table-all">
                              <tr class="w3-small">
                                <th>Date</th>
                                <th>Unit price</th>
                                <th>Quantity</th>
                                <th>Sample copy</th>
                                <th>Ex. sample copy</th>
                                <th>Bill</th>
                              </tr>
                              <?php
                                $sqlAgentinfo="SELECT * from agentbill where month='$month'and id='$id'";
                                $resultAgentinfo=mysqli_query($db,$sqlAgentinfo);
                                while($rowAgentinfo=$resultAgentinfo->fetch_assoc()){
                              ?>
                              <tr class="w3-pale-yellow w3-small">
                                <td><?php echo $rowAgentinfo['date'] ?></td>
                                <td><?php echo $rowAgentinfo['unitprice'] ?></td>
                                <td><?php echo $rowAgentinfo['quantity'] ?></td>
                                <td><?php echo $rowAgentinfo['samplecopy'] ?></td>
                                <td><?php echo $rowAgentinfo['exsamplecopy'] ?></td>
                                <td><?php echo $rowAgentinfo['totalbill'] ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                              <?php
                                $sqlAgentinfoTotalQuantity="SELECT SUM(quantity) as tQuantity from agentbill where month='$month'and id='$id'";
                                $resultAgentinfoTotalQuantity=mysqli_query($db,$sqlAgentinfoTotalQuantity);
                                $rowAgentinfoTotalQuantity=$resultAgentinfoTotalQuantity->fetch_assoc();

                                $sqlAgentinfoTotalSCopy="SELECT SUM(samplecopy) as sCopy from agentbill where month='$month'and id='$id'";
                                $resultAgentinfoTotalSCopy=mysqli_query($db,$sqlAgentinfoTotalSCopy);
                                $rowAgentinfoTotalSCopy=$resultAgentinfoTotalSCopy->fetch_assoc();

                                $sqlAgentinfoEXsamplecopy="SELECT SUM(exsamplecopy) as exsamplecopy from agentbill where month='$month'and id='$id'";
                                $resultAgentinfoEXsamplecopy=mysqli_query($db,$sqlAgentinfoEXsamplecopy);
                                $rowAgentinfoEXsamplecopy=$resultAgentinfoEXsamplecopy->fetch_assoc();

                                $sqlAgentinfoTotalBill="SELECT SUM(totalbill) as totalBill from agentbill where month='$month'and id='$id'";
                                $resultAgentinfoTotalBill=mysqli_query($db,$sqlAgentinfoTotalBill);
                                $rowAgentinfoTotalBill=$resultAgentinfoTotalBill->fetch_assoc();
                              ?>
                              <tr class="w3-small">
                                <td>Total : </td>
                                <td></td>
                                <td><?php echo $rowAgentinfoTotalQuantity['tQuantity']; ?></td>
                                <td><?php echo $rowAgentinfoTotalSCopy['sCopy']; ?></td>
                                <td><?php echo $rowAgentinfoEXsamplecopy['exsamplecopy']; ?></td>
                                <td><?php echo $rowAgentinfoTotalBill['totalBill']; ?></td>
                              </tr>
                            </table>
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
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"src/fetchsearch.php",
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
