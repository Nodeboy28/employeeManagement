<?php
$connect =mysqli_connect('localhost','root','','bdprotidin');
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM signin
  WHERE status='agent' and id LIKE '%".$search."%'";
  $result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
  $a=array('white');
  $random_keys=mt_rand(0,0);
 while($row = mysqli_fetch_array($result))
 {
    $output .= '
    <div class="">
      <button onclick="showAgentInfo('.$row["phone"].')" class="w3-button w3-block w3-left-align w3-border-top w3-border-left w3-border-right w3-border-blue" style="text-transform: capitalize;">'.$row["id"].'</button>

      <div id="'.$row["phone"].'" class="w3-padding w3-light-gray w3-border-blue w3-leftbar w3-border">
        <div class="w3-row">
          <div class="w3-col m2">
            <img src="gallery/profile/'.$row["picture"].'" style="width:100%">
            <div class="w3-container w3-center">
              <span style="text-transform: capitalize;">'.$row["firstname"].' '.$row["lastname"].'</span>
            </div>
          </div>
          <div class="w3-col m5 w3-container">
            <p><pre><strong>ID</strong>           : '.$row["id"].'</pre></p>
            <p><pre><strong>Name       </strong>  : <span style="text-transform: capitalize;">'.$row["firstname"].' '.$row["lastname"].'</span></pre></p>
            <p><pre><strong>Email      </strong>  : '.$row["email"].'</pre></p>
            <p><pre><strong>Address</strong>      : '.$row["address"].'</pre></p>
            <p><pre><strong>Phone      </strong>  : '.$row["phone"].'</pre></p>
          </div>
          <div class="w3-col m5 w3-container">
            <p><pre><strong>Phone 2</strong>      : '.$row["phone2"].'</pre></p>
            <p><pre><strong>Blood Group</strong>  : '.$row["blood"].'</pre></p>
          </div>
        </div>
      </div>
    </div>
  ';
 }
 echo $output;
}
else
{
 echo '<div class="w3-container w3-center">
              <p>Context not found!</p>
            </div>';
}
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
