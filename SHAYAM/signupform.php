<?php
    include_once('db.php');
    // header('location: "http://localhost/Dashboard.php"');
    $username=$_POST["username"];
    // echo " $username";
    $password=$_POST["password"];
    $fullname=$_POST["fullname"];
    // $address=$_POST["address"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $pincode=$_POST["pincode"];
    if(!$conn){die();}
                    else{
                        $passwordmd5=md5($password); //encrytion of password
                        $sql="INSERT INTO table1(username,password,fullname) VALUES ('$username','$passwordmd5','$fullname') ";
                        if ($conn->query($sql) === TRUE) {
                            $last_id = $conn->insert_id;
                            // $_SESSION['favno']= $last_id;
                            echo "New record created successfully. Last inserted ID is: " . $last_id;
                            $person_ID=$last_id;
// echo $person_ID;
                        $role=$_POST["role"];
                        // echo $role;
                        if($role)
                        {
                            foreach($role as $r)
                            {
                                mysqli_query($conn,"INSERT INTO table2(role,person_ID ) VALUES ('".
                                mysqli_real_escape_string($conn,$r). "',".$person_ID." )");
                                
                            }
                            
                        }
                        // $person_ID=$y;
                    // echo $y;
                    $sql_three="INSERT INTO table3(state,city,pincode,person_ID) VALUES ('$state','$city','$pincode','$person_ID') "; 
                    
                    if($conn->query($sql_three)){
                        echo "New record added successfully";
                        echo '<script>
                        alert("Succesffuly signed up");
                        window.location="http://localhost/cris/frontpage.html";
                        </script>'; 
                    }       
                        } 
                        else{
                            echo "Error".$sql." ". $conn->error;
                        } 
                        $conn->close();
                    }
?>