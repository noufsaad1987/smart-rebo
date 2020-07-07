
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleSheet.css">
    <title>Control Panel </title>
</head>


<?php

//connect database
$conn = mysqli_connect('localhost','nouf','Zaidsaad123','robot');

//check connection

if(!$conn)
{
    echo 'connect erorr'. mysqli_connect_error();
}

$sql ='SELECT * FROM control';

 // make query & get result
$result = mysqli_query($conn,$sql);

$stop=$back=$lift=$forward=$right="";

if(isset($_POST["stop"]))
{$stop =$_POST["stop"];}

if(isset($_POST["lift"]))
{$lift = $_POST["lift"];}

if(isset($_POST["right"]))
{$right = $_POST["right"];}

if(isset($_POST["forward"]))
{$forward = $_POST["forward"];}

if(isset($_POST["back"]))
{$back = $_POST["back"];}




$dir = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($dir as $dirc){
    if ($dirc['stop'] == $stop  )
        {
         echo "S";
        }
    elseif ($dirc['lift1'] == $lift)
        {
         echo "L";
        }
    elseif ($dirc['right1'] == $right)
        {
         echo "R";
        }
    elseif ($dirc['forward'] == $forward)
        {
         echo "F";
        }
    elseif ($dirc['back'] == $back)
        {
         echo "B";
        }













}

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);




?>