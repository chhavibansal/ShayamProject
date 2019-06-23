<html>
    <body>
    <?php

session_start();
    include_once("db.php");
    if(!isset($_SESSION['user']))
    {
    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,md5($_POST["password"])); 
    $sql="SELECT count(*) FROM table1 WHERE (username='$username' AND password='$password') ";
    echo $username."<br>  ".$password;
    $_SESSION['user']= $username;
    $res=mysqli_query($conn,$sql);
    
    $row=mysqli_fetch_array($res);
    if($row[0]>0)
    {
    echo "<br>Login successful";
    echo $_SESSION['user'];
    header('Location: http://localhost/cris/dash.php');
    }
    else { 
        echo $_SESSION['user'];
        echo '<script>
        alert("You have entered a wrong password. Please try again");
        window.location="http://localhost/cris/frontpage.html";
        </script>';
        
    }
}
else
{
    echo '<script>
    alert("Please log out to login.");
    window.location="http://localhost/cris/frontpage.html";
    </script>';
}
    

?>        
    </body>
</html>
