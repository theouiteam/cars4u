<?php
session_start();
?>

<html>
<head>
<script>
function showUser(str) {
   
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var responseArray = xmlhttp.responseText.split("||");
                document.getElementById("txtHint").innerHTML = responseArray[0];
                document.getElementById("showmodel").innerHTML = responseArray[1];
                
            }
        };
        xmlhttp.open("GET","getcompany.php?q="+str,true);
        xmlhttp.send();
    }
}
function showModel(str,count) {
    
   
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               
               document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                
            }
        };
        xmlhttp.open("GET","getmodel.php?r="+str+"&count="+count,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
  <?php
   $_SESSION['scompany']="";
$servername = "localhost";
$username = "root";
$fpassword = "";
$dbname = "oui";
 

$conn = new mysqli($servername, $username, $fpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} 
$sql = "SELECT COMPANY_NAME FROM tbl_car GROUP BY COMPANY_NAME ";
$result = $conn->query($sql);
        if ($result->num_rows > 0) {?>   
<form>
<select name="users" onchange="showUser(this.value)">
    <option>Select</option>
   <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
       
        
        ?>  
    <option value="<?php echo $row['COMPANY_NAME']; ?>"> <?php echo$row["COMPANY_NAME"]?></option>
<?php }}
?> 
  
  </select>
</form>
    <?php
    if(!isset($_SESSION["uquery"]))
    {
    $uquery="SELECT * FROM tbl_car WHERE CAR_ID IS NOT NULL";
    $_SESSION["uquery"]=$uquery;
    }
    
    ?>
<br>
<div id="modele"><b>              </b></div>
 <div id="showmodel"><b>
 
<form>
    <select>
        <option>Select</option>
       
     </select>
</form> 
     </b></div>


<form>
    
    
    
    
</form>
<form>
<select name="usercomfort" onchange="showModel(this.value,7)">
    <option>Comfort</option>
    <option value="15">10-20</option>
     <option value="25">20-30</option>
      <option value="35">30-40</option>
       <option value="45">40-50</option>
        <option value="55">50-60</option>
         <option value="65">60-70</option>
          <option value="75">70-80</option>
           <option value="85">80-90</option>
            <option value="95">90-1000</option>
            
</select>
</form>
<form>
   All <input type="radio" name="fuel" onchange="showModel(this.value,8)">
  petrol <input type="radio" name="fuel" onchange="showModel(this.value,8)">
  diesel <input type="radio" name="fuel" onchange="showModel(this.value,8)">
                
    
    
</form>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
Run example »