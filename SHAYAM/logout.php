<?php
 session_start();
 session_destroy();
 
 echo '<script>
 alert("Logged out successfully");
 window.location="http://localhost/cris/frontpage.html";
 </script>'; 
//  header("location:http://localhost/frontpage.html");
?>