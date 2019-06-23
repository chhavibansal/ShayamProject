<?php
session_start();
if(!isset($_SESSION['user']) && $_SESSION['user']==FALSE){
    echo  "<script type='text/javascript'>alert('KINDLY LOGIN TO PUT UP ADOPTION REQUEST');
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
        $information=$_POST["information"];
        $city=$_POST["city"];
        $landmark=$_POST["landmark"];
        $quantity=$_POST["quantity"];

        $y=$_SESSION['idkey'];     //value derived from dash.php
        // $date=now();
        $sql="INSERT INTO donatenow(information,city,landmark,quantity,person_ID) VALUES ('$information','$city','$landmark','$quantity','$y')";
        if ($conn->query($sql) === TRUE) {
                       echo "Record added in adoption table";
                        echo "<script>
                        alert('Request for adoption added successfully');
                        window.location.href='http://localhost/cris/donationavailable.php';
                        </script>";
                    }
                       else{
                           echo "ERROR". "$conn->error()";
                           die();
                       }
        $image=$_FILES['image']['name'];
       
        $target="imagex/".basename($image);
        $sql_one="INSERT INTO donatenowimage(image,person_ID) VALUES ('$image','$y')";
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
        
        
