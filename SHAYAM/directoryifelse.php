<!-- <link rel="stylesheet" type="text/css" media="screen" href="kosis1.css" /> -->
<style>
    table{
align-content: center;
margin:0 auto;
}
table th{
    font-size: 1.4em;
    line-height: 2em;
    padding: 5px;
}
table td{
    font-size: 1.3em;
    text-align: center;
    padding: 15px;
}
table td:first-of-type{
    text-transform: uppercase;  
}
</style>
<?php

include_once('db.php');
$role=$_POST['role'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
if(!$conn)
{echo die();}
else{?>
  <?php    if(isset($_POST['pincode']) && (empty($_POST['role'])) && (empty($_POST['city']))) : ?>
   <?php $sql= "SELECT * from table1 t1 
    JOIN table2 t2 ON t1.ID=t2.person_ID 
    JOIN table3 t3 ON t1.ID=t3.person_ID 
    where  pincode='$pincode' "	;
    
    if($conn->query($sql))
    {
        // echo "join successfull";
    }
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
       echo" <table border='1' >
        <tr><th>STATE</th> <th>CITY</th><th>PINCODE</th><th>PHONE NO.</th><th>FULLNAME</th><th>ROLE</th></tr>";
        while($row=mysqli_fetch_array($res))
        {?> 
             <tr><td><?php echo "$row[8]";?></td>
                    <td><?php echo "$row[9]";?></td>
                    <td><?php echo "$row[10]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[3]";?></td>
                    <td><?php echo "$row[5]";?></td>
                   </tr>
<?php
        
        
        }?><?php echo"</table>";
    }
    else{
        echo "No matching results";
    }?>
 
 <?php    elseif(isset($_POST['city']) && (empty($_POST['role'])) && (empty($_POST['pincode']))) : ?>
   <?php $sql= "SELECT * from table1 t1 
    JOIN table2 t2 ON t1.ID=t2.person_ID 
    JOIN table3 t3 ON t1.ID=t3.person_ID 
    where  upper(city) like '%$city%' "	;
    
    if($conn->query($sql))
    {
        // echo "join successfull";
    }
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
       echo" <table border='1' >
       <tr><th>STATE</th> <th>CITY</th><th>PINCODE</th><th>PHONE NO.</th><th>FULLNAME</th><th>ROLE</th></tr>";
       while($row=mysqli_fetch_array($res))
       {?> 
          <tr><td><?php echo "$row[8]";?></td>
                    <td><?php echo "$row[9]";?></td>
                    <td><?php echo "$row[10]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[3]";?></td>
                    <td><?php echo "$row[5]";?></td>
                   </tr>
<?php
        
        
        }?><?php echo"</table>";
    }
    else{
        echo "No matching results";
    }?>

 <?php elseif(isset($_POST['role']) && (empty($_POST['pincode']))  && (empty($_POST['city']))) : ?>   
            <?php $sql= "SELECT * from table1 t1 
                JOIN table2 t2 ON t1.ID=t2.person_ID 
                JOIN table3 t3 ON t1.ID=t3.person_ID 
                where  upper(role) like '$role' "	;
                
                if($conn->query($sql))
                {
                    // echo "join successfull";
                }
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                echo" <table border='1' >
                <tr><th>STATE</th> <th>CITY</th><th>PINCODE</th><th>PHONE NO.</th><th>FULLNAME</th><th>ROLE</th></tr>";
                while($row=mysqli_fetch_array($res))
                {?> 
                           <tr><td><?php echo "$row[8]";?></td>
                    <td><?php echo "$row[9]";?></td>
                    <td><?php echo "$row[10]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[3]";?></td>
                    <td><?php echo "$row[5]";?></td>
                   </tr>
            <?php
                    
                    
                    }?><?php echo"</table>";
                }
                else{
                    echo "No matching results";
                }?>

 <?php elseif(isset($_POST['role']) && (isset($_POST['city'])) && (empty($_POST['pincode']))) : ?>   
            <?php $sql= "SELECT * from table1 t1 
                JOIN table2 t2 ON t1.ID=t2.person_ID 
                JOIN table3 t3 ON t1.ID=t3.person_ID 
                where  upper(city)like '%$city%' "	;
                
                if($conn->query($sql))
                {
                    // echo "join successfull";
                }
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                echo" <table border='1' >
                <tr><th>STATE</th> <th>CITY</th><th>PINCODE</th><th>PHONE NO.</th><th>FULLNAME</th><th>ROLE</th></tr>";
                while($row=mysqli_fetch_array($res))
                {?> 
                            <tr><td><?php echo "$row[8]";?></td>
                    <td><?php echo "$row[9]";?></td>
                    <td><?php echo "$row[10]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[3]";?></td>
                    <td><?php echo "$row[5]";?></td>
                   </tr>
            <?php
                    
                    
                    }?><?php echo"</table>";
                }
                else{
                    echo "No matching results";
                }?>
 <?php elseif(isset($_POST['role']) && (isset($_POST['pincode'])) && (empty($_POST['city']))) : ?>   
            <?php $sql= "SELECT * from table1 t1 
                JOIN table2 t2 ON t1.ID=t2.person_ID 
                JOIN table3 t3 ON t1.ID=t3.person_ID 
                where     pincode='$pincode' and upper(role) like '$role'"	;
                
                if($conn->query($sql))
                {
                    // echo "join successfull";
                }
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                echo" <table border='1' >
                <tr><th>STATE</th> <th>CITY</th><th>PINCODE</th><th>PHONE NO.</th><th>FULLNAME</th><th>ROLE</th></tr>";
                while($row=mysqli_fetch_array($res))
                {?> 
                           <tr><td><?php echo "$row[8]";?></td>
                    <td><?php echo "$row[9]";?></td>
                    <td><?php echo "$row[10]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[3]";?></td>
                    <td><?php echo "$row[5]";?></td>
                   </tr>
            <?php
                    
                    
                    }?><?php echo"</table>";
                }
                else{
                    echo "No matching results";
                }?>
 <?php elseif(isset($_POST['city']) && (isset($_POST['pincode'])) && (empty($_POST['role']))) : ?>   
            <?php $sql= "SELECT * from table1 t1 
                JOIN table2 t2 ON t1.ID=t2.person_ID 
                JOIN table3 t3 ON t1.ID=t3.person_ID 
                where     pincode='$pincode' and upper(city) like '%$city%'"	;
                
                if($conn->query($sql))
                {
                    // echo "join successfull";
                }
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                echo" <table border='1' >
                <tr><th>STATE</th> <th>CITY</th><th>PINCODE</th><th>PHONE NO.</th><th>FULLNAME</th><th>ROLE</th></tr>";
                while($row=mysqli_fetch_array($res))
                {?> 
                             <tr><td><?php echo "$row[8]";?></td>
                    <td><?php echo "$row[9]";?></td>
                    <td><?php echo "$row[10]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[3]";?></td>
                    <td><?php echo "$row[5]";?></td>
                   </tr>
            <?php
                    
                    
                    }?><?php echo"</table>";
                }
                else{
                    echo "No matching results";
                }?>
<?php elseif(isset($_POST['city']) && (isset($_POST['pincode'])) && (isset($_POST['role']))) : ?>   
            <?php $sql= "SELECT * from table1 t1 
                JOIN table2 t2 ON t1.ID=t2.person_ID 
                JOIN table3 t3 ON t1.ID=t3.person_ID 
                where    ( upper(city) like '%$city%' or pincode='$pincode') or upper(role) like '$role'
                 GROUP BY username order by role asc";
                
                if($conn->query($sql))
                {
                    // echo "join successfull";
                }
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                echo" <table border='1' >
                <tr><th>STATE</th> <th>CITY</th><th>PINCODE</th><th>PHONE NO.</th><th>FULLNAME</th><th>ROLE</th></tr>";
                while($row=mysqli_fetch_array($res))
                {?> 
          <tr><td><?php echo "$row[8]";?></td>
                    <td><?php echo "$row[9]";?></td>
                    <td><?php echo "$row[10]";?></td>
                    <td><?php echo "$row[1]";?></td>
                    <td><?php echo "$row[3]";?></td>
                    <td><?php echo "$row[5]";?></td>
                   </tr>
            <?php
                    
                    
                    }?><?php echo"</table>";
                }
                else{
                    echo "No matching results";
                }?>

    <?php  endif; ?><?php
}
$conn->close();
?>