<?php
	 session_start();
	 //connect to database
	 $db=mysqli_connect('localhost','root','','bdprotidin');
   function test($data){
	 		$data=htmlspecialchars($data);
	 		$data=stripcslashes($data);
	 		$data=trim($data);
	 		return $data;
	 	}
?>
<!--sign in start-->
<?php
	 if(isset($_POST['signin'])){
	 	$email=test($_POST['email']);
	 	$password=test($_POST['password']);
	 	$sql="SELECT * FROM signin where email='$email'";
	 	$result=mysqli_query($db,$sql);

	 	if(mysqli_num_rows($result)== 1){
	 		$row = $result->fetch_assoc();
      $status=$row['status'];
			$_SESSION['username']=$row['firstname']." ".$row['lastname'];
			$_SESSION['email']=$row['email'];
			$_SESSION['picture']=$row['picture'];
	 		$dpassword=$row['password'];

	 		if($password==$dpassword){
	 			//set cookie
				if(!empty($_POST["remember"])) {
					setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
					setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
				} else {
					if(isset($_COOKIE["email"])) {
						setcookie ("email","");
					}
					if(isset($_COOKIE["password"])) {
						setcookie ("password","");
					}
				}
        if($status=='admin'){
          header("location:index.php");
  	 			$_SESSION['switch1']="admin";
					$_SESSION['id']=$row['id'];

        }
        if($status=='employee'){
          header("location:employee.php");
  	 			$_SESSION['switch2']="employee";
					$_SESSION['id']=$row['id'];
        }
        if($status=='agent'){
          header("location:agent.php");
  	 			$_SESSION['switch3']="agent";
					$_SESSION['id']=$row['id'];
        }

	 		}else{
	 	    	$_SESSION['msglog']="<strong>Wrong Password!</strong>";
	 		}
	 }else{
	 	$_SESSION['msglog']="<strong>Wrong Information!</strong>";

	 }
}
?>
<!--sign in end-->
<!--log out start-->
<?php
	 if(isset($_POST['logout'])){
		 unset($_SESSION['switch1']);
		 unset($_SESSION['switch2']);
		 unset($_SESSION['switch3']);
		 setcookie ("email","");
		 setcookie ("password","");
		 header("location:signin.php");
	 }
?>
<!--log out end-->
<!--add employee start-->
<?php
	 if(isset($_POST['addemployee'])){
	 	$permited  = array('jpg', 'jpeg', 'png', 'gif',);
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "gallery/profile/".$unique_image;
		move_uploaded_file($file_temp, $uploaded_image);
	 	$firstname=test($_POST['firstname']);
		$lastname=test($_POST['lastname']);
		$address=test($_POST['address']);
		$phone=test($_POST['phone']);
		$designation=test($_POST['designation']);
		$date=test($_POST['date']);
		$date=strtotime($date);
		$date=date('d/m/Y',$date);
		$email=test($_POST['email']);
		$password=test($_POST['password']);
		$status="employee";
		$facebook=test($_POST['facebook']);
		$econtact=test($_POST['econtact']);
		$blood=test($_POST['blood']);
		$id=test($_POST['id']);
		$phone2=test($_POST['phone2']);
		$sqltest="SELECT * from signin where status='employee'";
		$resulttest=mysqli_query($db,$sqltest);
		while($rowtest = $resulttest->fetch_assoc()){
			if($email==$rowtest['email']){
				$test="exist";
			}
		}
		if($test=='exist'){
			$_SESSION['msgAddEmployee']="<a href='addNewEmployee.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-orange w3-center w3-padding w3-margin-top w3-margin-bottom' onclick=hideEmployeeMsz()>Id already exist.<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
		}else{
			$sql="INSERT INTO signin(email,password,firstname,lastname,address,phone,designation,date,picture,status,facebook,econtact,blood,id,phone2) values('$email','$password','$firstname','$lastname','$address','$phone','$designation','$date','$unique_image','$status','$facebook','$econtact','$blood','$id','$phone2')";
			mysqli_query($db,$sql);
			$_SESSION['msgAddEmployee']="<a href='addNewEmployee.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-blue w3-center w3-padding w3-margin-top w3-margin-bottom' onclick=hideEmployeeMsz()>New employee added...<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
		}
	}else{
		$_SESSION['msgAddEmployee']="<a href='addNewEmployee.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-red w3-center w3-padding w3-margin-top w3-margin-bottom' onclick=hideEmployeeMsz()>Faild!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}
?>
<script>
	function hideEmployeeMsz(){
		header("location:addnewEmployee.php");
		document.getElementById('msg').style.display="none";
	}
</script>
<!--add employee end-->
<?php
	 if(isset($_POST['addagent'])){
	 	$permited  = array('jpg', 'jpeg', 'png', 'gif',);
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "gallery/profile/".$unique_image;
		move_uploaded_file($file_temp, $uploaded_image);
	 	$firstname=test($_POST['firstname']);
		$lastname=test($_POST['lastname']);
		$address=test($_POST['address']);
		$phone=test($_POST['phone']);
		$phone2=test($_POST['phone2']);
		$blood=test($_POST['bloodGroup']);
		$email=test($_POST['email']);
		$password=test($_POST['password']);
		$status="agent";;
		$id=test($_POST['id']);
		$sql="INSERT INTO signin(email,password,firstname,lastname,address,phone,picture,status,blood,phone2,id) values('$email','$password','$firstname','$lastname','$address','$phone','$unique_image','$status','$blood','$phone2','$id')";
		mysqli_query($db,$sql);
		$_SESSION['msgAddAgent']="<a href='addNewAgent.php' style='text-decoration:unset;'><div id='msgAgent' class='w3-card w3-blue w3-center w3-padding w3-margin-top w3-margin-bottom' onclick='hideAgentMSZ()'>New agent added...<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}else{
		$_SESSION['msgAddAgent']="<a href='addNewAgent.php' style='text-decoration:unset;'><div id='msgAgent' class='w3-card w3-red w3-center w3-padding w3-margin-top w3-margin-bottom' onclick=hideAgentMsz()>Faild!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}
?>
<script>
	function hideAgentMsz(){
		header("location:addnewAgent.php");
		document.getElementById('msgAgent').style.display="none";
	}
</script>
<!--add agent start-->

<!--add agent end-->
<!--change salery start-->
<?php
	 if(isset($_POST['updateSalery'])){
		$email=test($_POST['email']);
		$newSalery=test($_POST['newSalery']);
		$sql="UPDATE signin SET salery='$newSalery' WHERE email='$email'";
		mysqli_query($db,$sql);
		$_SESSION['updateSalery']="<a href='employeeSalery.php' style='text-decoration:unset;'><div id='msgAgent' class='w3-card w3-blue w3-center w3-padding w3-margin-top w3-margin-bottom' onclick=hideAgentMsz()>Salery update success<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}else{
		$_SESSION['updateSalery']="<a href='addNewAgent.php' style='text-decoration:unset;'><div id='msgAgent' class='w3-card w3-red w3-center w3-padding w3-margin-top w3-margin-bottom' onclick=hideAgentMsz()>Faild!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}
?>
<!--change salery end-->
<!--pay salery start-->
<?php
	 if(isset($_POST['paySalery'])){
		$id=test($_POST['id']);
		$email=test($_POST['email']);
		$salery=test($_POST['salery']);
		$bonus=test($_POST['bonus']);
		$mobile=test($_POST['mobile']);
		$tada=test($_POST['tada']);
		date_default_timezone_set("Asia/Dhaka");
		$date=date('d/m/y');
		$time=date('h:i:sa');
		$sql="INSERT INTO paySalery(id, email, salery, date, time, status, bonus, mobile,tada) values('$id','$email','$salery','$date','$time','salery','$bonus','$mobile','$tada')";
		mysqli_query($db,$sql);
		$_SESSION['paySalery']="<a href='employeeSalery.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-blue w3-center w3-padding w3-margin-top' onclick=hide()>Paid Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	 }
?>
<!--pay salery end-->
<!--reset employee data start-->
<?php
	 if(isset($_POST['resetemployee'])){
		$resetpassword=test($_POST['resetpassword']);
		$sql="SELECT * FROM signin where status='admin'";
	 	$result=mysqli_query($db,$sql);
		$row = $result->fetch_assoc();
		if($row['password']==$resetpassword){
			$sql="UPDATE signin SET month='', bill='unpaid' WHERE status='employee'";
			$result=mysqli_query($db,$sql);
		}
	 }
?>
<!--reset employee data end-->
<!--add agent bill start-->
<?php
	 if(isset($_POST['addBill'])){
		$id=test($_POST['id']);
		$email=test($_POST['email']);
		$unitPrice=test($_POST['unitPrice']);
		$totalQuantity=test($_POST['totalQuantity']);
		$samplecopy=test($_POST['samplecopy']);
		$exsamplecopy=test($_POST['exsamplecopy']);
		if($samplecopy=='' || $samplecopy==null){
			$samplecopy=0;
		}
		if($exsamplecopy=='' || $exsamplecopy==null){
			$exsamplecopy=0;
		}
		$totalbill=$unitPrice*($totalQuantity- $samplecopy -$exsamplecopy);
		date_default_timezone_set("Asia/Dhaka");
		$date=date('d/m/y');
		$time=date('h:i:sa');
		$month=date('M');
		$sql="INSERT INTO agentbill(id, email, unitprice,quantity,samplecopy, totalbill, date, time, month, exsamplecopy) values('$id','$email','$unitPrice','$totalQuantity','$samplecopy','$totalbill','$date','$time','$month', '$exsamplecopy')";
		mysqli_query($db,$sql);
		$_SESSION['addAgentBill']="<a href='agentSalery.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-blue w3-center w3-padding w3-margin-top' onclick=hide()>Agent bill added...<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}else{
		$_SESSION['addAgentBill']="<a href='agentSalery.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-red w3-center w3-padding w3-margin-top' onclick=hide()>Faild!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}
?>
<!--add agent bill end-->
<!--pay agent bill start-->
<?php
	 if(isset($_POST['payBill'])){
		$id=test($_POST['id']);
		$email=test($_POST['email']);
		$bill=test($_POST['bill']);
		date_default_timezone_set("Asia/Dhaka");
		$date=date('d/m/y');
		$time=date('h:i:sa');
		$sql="INSERT INTO paybill(id, email, bill, date, time) values('$id','$email','$bill','$date','$time')";
		mysqli_query($db,$sql);
		$_SESSION['payAgentBill']="<a href='agentSalery.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-blue w3-center w3-padding w3-margin-top' onclick=hide()>Bill pay Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	 }
?>
<!--pay agent bill end-->

<!--advertisement start-->
<?php
	 if(isset($_POST['advertisement'])){
	 	$inch=test($_POST['inch']);
		$column=test($_POST['column']);
		$page=test($_POST['page']);
		$unitPrice=test($_POST['unitPrice']);
		$Oamount=$inch*$column*$page*$unitPrice;
		$Ramount=test($_POST['Ramount']);
		$Camount=test($_POST['Camount']);
		$commission=test($_POST['commission']);
		$finalBill=test($_POST['finalBill']);
		$due=test($_POST['due']);
		$id=test($_POST['id']);
		date_default_timezone_set("Asia/Dhaka");
		$date=date('d/m/y');
		$time=date('h:i:sa');
		$sql="INSERT INTO advertisement(inch, columnSize, page, unitPrice, Oamount, Camount, commission, finalBill, Ramount, due, id, date, time) values('$inch','$column','$page','$unitPrice','$Oamount', '$Camount','$commission','$finalBill','$Ramount','$due','$id','$date','$time')";
		mysqli_query($db,$sql);
		$_SESSION['advertisement']="<a href='advertisement.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-blue w3-center w3-padding' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}else{
		$_SESSION['advertisement']="<a href='advertisement.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-red w3-center w3-padding' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	}
?>
<!--pay ad due start-->
<?php
	 if(isset($_POST['payDueAd'])){
		$id=test($_POST['id']);
		$original=test($_POST['dueAmount']);
		$adcommission=test($_POST['adcommission']);
		$dueAmount=$original-($original*($adcommission/100));
		$sql="INSERT INTO payDue(id, amount,original) values('$id','$dueAmount','$original')";
		mysqli_query($db,$sql);
		$_SESSION['payAgentAdd']="<a href='advertisement.php' style='text-decoration:unset;'><div id='msg' class='w3-card w3-blue w3-center w3-padding w3-margin-top' onclick=hide()>Due pay Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	 }
?>
<!--pay ad due end-->

