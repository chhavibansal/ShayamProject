<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="donationavailable.css" />
<link rel="stylesheet" type="text/css" media="screen" href="common.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>SAHAYAM</title>
</head>
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
              <a href="http://localhost/signupform.html">Do not have a account? SignUp</a><br><br>
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
       <h1>      <a href="http://localhost/cris/frontpage.html">सहाय्यम्</a></h1>
    
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
            <a href="http://localhost/cris/whyadopt.html"><i class="fa fa-handshake-o" style="font-size: 1.2em;padding-right:5px"></i>Why Adopt?</a>
            <a href="http://localhost/cris/adoptionform.html"><i class="fa fa-user-plus " style="font-size: 1.2em;padding-right:5px"></i>Adoption</a>
            <a href="http://localhost/cris/alladoptionrequests.php"><i class="fa fa-list" style="font-size: 1.2em;padding-right:5px"></i>Adoption Requests</a>
            <a href="http://localhost/cris/whydonate.html"><i class="fa fa-question-circle" style="font-size: 1.2em;padding-right:5px"></i>Why Donate</a>
            <a href="http://localhost/cris/donationform.html"><i class="fa fa-inr" style="font-size: 1.2em;padding-right:5px"></i>Ask for donation</a>
          </div>
        </div> 
        <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-volume-control-phone" style="font-size: 1.2em"></i>  Emergency</button>
            <div class="dropdown-content">
                <a href="http://localhost/cris/donationpage.html"><i class="fa fa-credit-card" style="font-size: 1.2em;padding-right:5px"></i>Donate</a>
            </div>
        </div>
      </div>
<div class="result-container" style="background:url(http://localhost/imagex/all.jpg) ">
  <?php
  include_once('db.php');
    $sql="SELECT * FROM donatenow a JOIN donatenowimage p ON (a.person_ID=p.person_ID AND a.ID=p.id)";
  // $result=mysqli_query($conn,"SELECT * FROM petimage");   
  $res=mysqli_query($conn,$sql);
  if(mysqli_num_rows($res)>0){
     
      while($row=mysqli_fetch_assoc($res))
      {
          ?>
                <table align="left" id="t01"  style="width: 400px; height: 350px;">
                          <tr> <td>INFORMATION:</td> <td><?php echo $row["information"];   ?> </td> </tr>
                          <tr> <td>CITY:</td> <td><?php echo $row["city"];   ?> </td> </tr>
                          <tr> <td>LANDMARK:</td> <td><?php echo $row["landmark"];   ?> </td> </tr>
                          <tr> <td>QUANTITY:</td> <td><?php echo $row["quantity"];   ?> </td> </tr>
                          <tr> <td>IMAGE:</td> <td> <?php echo "<img src='imagex/".$row['image']."' >";   ?> </td> </tr>
                          <!-- <tr> <td>PERSON_ID:</td> <td><?php echo $row["person_ID"];   ?> </td> </tr> -->
                       
                         
                      </table>
  <?php    }
  }
  $conn->close();
  ?>

</div>

<footer id="pageFooter">
        <div style="margin-top: 1.2em" class="down one">
            <h1>Support Us</h1>
            <ul>
                <li><a href="http://localhost/cris/donatenow.html">Donate Now</a></li>
                <li><a href="http://localhost/cris/donationavailable.php">Donation`s Available</a></li>
                <!-- <li><a href="http://localhost/volunteer.html">Volunteer for us</a></li> -->
            </ul>
        </div>
        <div  class="down two">
            <h1>Adoption</h1>
           <ul>
                <li><a href="http://localhost/cris/alladoptionrequests.php">Adoption Requests</a> </li>
                <li><a href="http://localhost/Dog%20Adoption%20Form.pdf">Adoption Process</a></li>
                <li><a href="http://localhost/cris/faq.php">FAQ</a></li>
           </ul>
        </div>
            <div style="margin-top: 0.5em" class="down three">
                <h1>Our Location</h1><br>
                   <center> <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=E+11+Green+Park,+Extension,+India&amp;ie=UTF8&amp;hq=&amp;hnear=E+11+Green+park,+Extension,+New,+Delhi+110016&amp;ll=28.5597,77.2039&amp;spn=0.009995,0.023056&amp;t=m&amp;z=14&amp;iwloc=r0&amp;output=embed"></iframe>
                    <p>E-11, Green Park Extension <br>
                        New Delhi-110016 <br>
                        Mobile No-9873179872 <br>
                    </p></center>
            </div>

    </footer>
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

