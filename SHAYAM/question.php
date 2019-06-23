<?php
    session_start();
    include_once('db.php');
    if(!$conn){die();}
else{
    if(isset($_SESSION['user']))
    {
    $y=$_SESSION["idkey"];
    if(isset($_POST["question"])){
    $question=$_POST["question"];}
    if(isset($_POST["submit"]))
    {
        $sql="INSERT INTO ask(question,person_ID) VALUES ('$question','$y')";
        if($conn->query($sql)===TRUE)
        {
            echo "<script>
            alert('question added will be answered soon');
            window.location='http://localhost/cris/frontpage.html';
            </script>";
        }
        else{
            $conn->error();
        }
    }
}
}
?>