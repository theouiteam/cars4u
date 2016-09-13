<!DOCTYPE html>
  <?php
        session_start();
        ?>
  <?php
            
            $uquery="SELECT * FROM tbl_car WHERE CAR_ID IS NOT NULL";
            $_SESSION["uquery"]=$uquery;
            

            ?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Material design navigation</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
    
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    
        <link rel="stylesheet" href="css/style.css">
         <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index1.js"></script>
        <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
        
                <script>



        function showUser(str) {

           /*fuction to display company name and car model list menu  seperate fuction is used since it returns two value 
             table and select menu of mode*/
            if (str == "") { 
                document.getElementById("txtHint").innerHTML = "";
                return;
                           }
                           else {
                                document.getElementById('pic').style.display = "none";
        //        document.getElementById('Spinner').style.display = "block";
                                   if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                       xmlhttp = new XMLHttpRequest();
                                                                } 
                                    else {
                    // code for IE6, IE5
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                         }
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                 var responseArray = xmlhttp.responseText.split("||");/*splits the returned value to two.
                                      * '||' used as  seperator*/ 

                                                 document.getElementById("txtHint").innerHTML = responseArray[0];//returns table selection
                                                 document.getElementById("showmodel").innerHTML = responseArray[1];//returns select menu of car models

                                                                                               }                                                  
                                                                            };
                                    xmlhttp.open("GET","getcompany.php?q="+str,true);/*transfer parameter to getmoded
                                 *  php page here parameter is car company name*/

                                     xmlhttp.send();
                               }
        }
        function showModel(str,count) {
            /*function to display selection list according to condition set by user.All conditions except company name
             use this function*/

            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
                           } 
            else { 
                document.getElementById('pic').style.display = "none";
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
            else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
            xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                       //value returned on each selection is transfered to division "txtHint"
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;


                                                                          }
                                                    };
           /*Passes selected value "str" and an identifer "count" to identify what was selected by user*/
            xmlhttp.open("GET","getmodel.php?r="+str+"&count="+count,true);
            xmlhttp.send();
                 }
            history.pushState({id: 'SOME ID'}, '', 'index.php');
        }
        function viewTable(str) {
            /*Fuction to view car details when user select an entry in the selection result.It hides the
             * selection result 
             * .......-*/
            document.getElementById('tableDisplay').style.display = "block";
            document.getElementById('txtHint').style.display = "none";
            if (str == "") {
                document.getElementById("tableDisplay").innerHTML = "";
                return;
            } 
            else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                                           } 
                else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                     }
                xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("tableDisplay").innerHTML = xmlhttp.responseText;
                                                                      }
                                                        };
                xmlhttp.open("GET","viewdata.php?q="+str,true);
                xmlhttp.send();
                }  

        }
        
          function viewMore(str) {
            /*Fuction to view car details when user select an entry in the selection result.It hides the
             * selection result 
            
            if (str == "") {
                document.getElementById("more").innerHTML = "";
                return;
            } 
            else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                                           } 
                else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                     }
                xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("more").innerHTML = xmlhttp.responseText;
                                                                      }
                                                        };
                xmlhttp.open("GET","viewmore.php?,true);
                xmlhttp.send();
                }  

        }
        
        function goBack()
        {
            /*Funtion to hide the car details and view the selection result*/
            document.getElementById('tableDisplay').style.display = "none";//"tableDisplay" is car details
            document.getElementById('txtHint').style.display = "block";//"txtHint"selection result
        }
                </script>

    
    
    
  </head>

  <body>
      

    <nav>
  <ul>
      
       <?php
                    $_SESSION['scompany']="";
                    $servername = "localhost";
                    $username = "root";
                    $fpassword = "";
                    $dbname = "oui";
                    $conn = new mysqli($servername, $username, $fpassword, $dbname);// Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                                              } 
                    $sql = "SELECT COMPANY_NAME FROM tbl_car GROUP BY COMPANY_NAME ";
                    $result = $conn->query($sql);  
                    if ($result->num_rows > 0) {?>  
      
      
       
       
       
       
       
      <li>
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
//            if(!isset($_SESSION["uquery"]))
//            {
//            $uquery="SELECT * FROM tbl_car WHERE CAR_ID IS NOT NULL";
//            $_SESSION["uquery"]=$uquery;
//            }
//
//            ?>
          
          
          
          
      </li>
       <li> <div id="showmodel"><b>

        <form>
            <select>
                <option>Select</option>

             </select>
        </form> 
             </b></div></li>
       <li><form>
            <input type="radio" name="fuel" value="All" onchange="showModel(this.value,1)"> All
         <input type="radio" name="fuel" value="Petrol" onchange="showModel(this.value,1)">  petrol
           <input type="radio" name="fuel" value="Diesel" onchange="showModel(this.value,1)">diesel



        </form></li>
   
    <li><form>Comfort
        <select name="usercomfort" onchange="showModel(this.value,5)">
            <option>Select</option>
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
        </form></li>
    
  </ul>
</nav>
<div class="openNav">
  <div class="icon"></div>
</div>

<div class="wrapper">
     <section>
    <div id="txtHint" style="display:block;"><b></b></div>
     <div id="more" style="display:block;"><b></b></div>
        <div id="tableDisplay" style="display:block;"><b></b></div>
        <div id="pic" style="display:block;">
 
     <div class="container">

         
         
        </div>
  </section>
        </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
