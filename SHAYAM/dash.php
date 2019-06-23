<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset =UTF-8>
<!-- <script src="main.js"></script> -->
<link rel="stylesheet" type="text/css" media="screen" href="dash.css" />
<link rel="stylesheet" type="text/css" media="screen" href="common.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>SAHAYAM </title>
</head>
<body>

      <div class="login">

<div >
    <!-- Trigger/Open The Modal -->
    <button id="myBtn" style="float: right; margin-right: 30px" >LOGIN </button>
    <div id="myModal" class="modal">
     <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
     <center>    <h2 style="color: black; ">LOGIN</h2></center> 
        </div>
        <div class="modal-body">
            <form action="loginform.php" method="POST">
                <table id="modal-table">
                    <tr><td>USERNAME:</td> <td> <input type="text" name="username" placeholder="Enter Mobile Number" autofocus pattern="^[6-9]\d{9}$"></td> <br></tr> 
                    <tr><td>PASSWORD:</td><td> <input type="password" name="password" placeholder="Enter password" autofocus></td></tr> 
                    <tr><td></td> <td><input type="submit" name="submit" value="LOGIN IN"></td></tr> 
                    <tr> <td></td> <td>  </td> </tr>
            
                 </table>
            </form>
        </div>
        <div class="modal-footer">
                <a href="http://localhost/cris/signupform.html">Do not have a account? SignUp</a><br><br>
            <a href="http://localhost/dash.php">Look up my profile..</a>
            <br><br>
             <a href="logout.php" >LogOut</a>
          </div>
      </div>
    
    </div>
    </div>
    </div>
<header> 
    <hgroup>
        <h1> <a href="http://localhost/cris/frontpage.html">सहाय्यम्</a></h1>
    
    <h2>For handling incidents</h2>
    </hgroup>
</header>
<div class="navbar">
    <a href="http://localhost/cris/aboutus.html">
          <i class="fa fa-info" style="font-size: 1.2em"></i>  About Us</a>
    <a href="http://localhost/cris/directory.html">
          <i class="fa fa-search" style="font-size: 1.2em"></i>  Directory</a>
    <div class="dropdown">
      <button class="dropbtn"><i class="fa fa-group" style="font-size: 1.2em"></i>Appeal 
      </button>
      <div class="dropdown-content"> 
        <a href="http://localhost/cris/adoptionform.html"><i class="fa fa-handshake-o" style="font-size: 1.2em"></i>Adoption</a>
        <a href="http://localhost/findaparent.php"><i class="fa fa-group" style="font-size: 1.2em"></i>Find a Parent</a>
        <a href="http://localhost/donationrequest.php"><i class="fa fa-heartbeat" style="font-size: 1.2em"></i>All Donation Requests</a>
        <a href="http://localhost/askfordonation.html"><i class="fa fa-inr" style="font-size: 1.2em"></i>Ask for donation</a>
      </div>
    </div> 
    <div class="dropdown">
        <button class="dropbtn"><i class="fa fa-volume-control-phone" style="font-size: 1.2em"></i>  Emergency</button>
        <div class="dropdown-content">
                <a href="http://localhost/cris/whydonate.html"><i class="fa fa-question-circle" style="font-size: 1.2em"></i>Why Donate</a>
                <a href="http://localhost/askfordonation.html"><i class="fa fa-inr" style="font-size: 1.2em"></i>Ask for donation</a>
                
            <a href="http://localhost/donationpage.php"><i class="fa fa-credit-card" style="font-size: 1.2em"></i>Donate</a>
        </div>
    </div>
  </div>
<section class="container">
<div class="heading">Dashboard</div>
        <section class="content_display">
                <?php 
                session_start();
              include_once('db.php');
if(isset($_SESSION['user'])){
    $x=$_SESSION['user'];
            //  echo $x;
        $sql="SELECT * from table1 WHERE  (username=$x)";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res))
                   {   ?>
                <center>   <table>
                        <h3>Personal Details</h3>
                        <p>-------------------------------------------</p>
                        <tr> <td>USERNAME:</td> <td><?php echo $row["username"];   ?> </td> </tr>
                        <tr> <td>FULL NAME:</td> <td><?php echo $row["fullname"];   ?> </td> </tr>
                   
                    </table></center>
                    <h3>Role</h3>
                <center>      <p>-------------------------------------------</p></center>
                  <?php  
                       $_SESSION['idkey']=$row["ID"];

                   }
                 
               }else{ echo " 0 results";}
               $y=$_SESSION['idkey'];
            //    echo $y;
               $sql1="SELECT * FROM table2 where(person_ID=$y )";
               $result=mysqli_query($conn,$sql1);
               if(mysqli_num_rows($result)>0)
               {
                   while($row=mysqli_fetch_assoc($result))
                   {?>
                <center> 
                       <?php echo $row["role"]."<br><br>" ?>
                       
                </center>
                    
                <?php   }
               }
               $sql2="SELECT * FROM table3 where (person_ID=$y)";
               $fresult=mysqli_query($conn,$sql2);
               if(mysqli_num_rows($fresult)>0)
               {?>
               <h3>Active Area</h3>
         <center>      <p>-------------------------------------------</p></center>
        <center> <table border='1' >
                    <th> STATE: </th><th>CITY:</th><th>PINCODE:</th>
               <?php
                   while($row=mysqli_fetch_assoc($fresult))
                   {?>
                        <tr><td><?php echo $row["state"]; ?></td>
                        <td><?php echo $row["city"]; ?></td>
                        <td><?php echo $row["pincode"]; ?></td></tr>
                    <?php
                   } ?>
                </center>
                    <?php echo"</table>";
               }
           ?>
  <?php  if(isset($_SESSION['user'])=='9873179872') :
        { 
            $dbhost="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="cris";
            $conn= new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
            if(!$conn){die();}
            else 
            {
                $sql="SELECT * FROM ask";
                $res=mysqli_query($conn,$sql);
                ?> <div class="QA" >
                <?php if(mysqli_num_rows($res)>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    { ?>
                  
                      <p class="block" style="border: none;border-bottom: 1px solid black;padding: 5px;font-size: 1.2em"> <?php echo $row["question"];?>
                        <?php   $lid=$row["id"];
                        echo '<a href="http://localhost/cris/reply.php?id='.$lid.' ">';
                           echo "Click to question";   ?></a></p>
                          <?php

                    }
                }?></div><?php 
            }
        } ?>
        <?php elseif(isset($_SESSION['user'])!='9873179872') : 
        echo "NO Admin rights provided";
        ?>
        <?php  endif; ?>
             <div id="p01" style="background: rgb(247, 152, 247); padding: 10px; float: right;"  > <a href="logout.php" >LOG OUT</a></div> 
          <?php       
            $conn->close();
        }  
        else
        {
            echo '<script>
            alert("Please log in to visit your dashboard.");
            window.location="http://localhost/cris/frontpage.html";
            </script>';
        } ?>
               
        </section>
</section>
<script>
        // Get the modal
        var modal = document.getElementById('myModal');
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
        
        
    </body>
    </html>
</body>
</html>