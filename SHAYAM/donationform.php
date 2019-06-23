<?php
session_start();
if(!isset($_SESSION['user']) && $_SESSION['user']==FALSE){
    echo  "<script type='text/javascript'>alert('KINDLY LOGIN TO PUT UP Donation REQUEST');
            window.location='http://localhost/cris/frontpage.html';
    </script>";

}
else{
if(isset($_POST["submit"])){
    $dbhost="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="cris";
        $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
        $aboutme=$_POST["aboutme"];
        $reason=$_POST["reason"];
        $illeffect=$_POST["illeffect"];
        $amount=$_POST["amount"];
        $date = htmlentities($_POST['date']);
        // $atmostby=$_POST["atmostby"];
        
        $y=$_SESSION['idkey'];     //value derived from dash.php
        // $date=now();
        $sql="INSERT INTO askfordonation(aboutme,reason,illeffect,amount,atmostby,person_ID) VALUES ('$aboutme','$reason','$illeffect','$amount','$date','$y')";
        if ($conn->query($sql) === TRUE) {
                       echo "Record added in donation table";
                        echo "<script>
                        alert('Request for donation added successfully');
                        window.location.href='http://localhost/cris/frontpage.html';
                        </script>";
                    }
                       else{
                           echo "ERROR". "$conn->error()";
                           die();
                       }
                       $image=$_FILES['image']['name'];
       
                       $target="imagex/".basename($image);
                       $sql_one="INSERT INTO askfordonationimage(image,person_ID) VALUES ('$image','$y')";
                       mysqli_query($conn,$sql_one);
                       if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
                       {
                           $msg="Image uploaded successfully";
                       }
                       else{
                           $msg="failed to upload image";
                       }
        $conn->close();
        }   
    }
        
        
