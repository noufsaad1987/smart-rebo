<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleSheet.css">
    <title>Control Panel </title>
</head>


<?php
include "index.html";
//connect database
$conn = mysqli_connect('localhost','nouf','Zaidsaad123','robot');

//check connection

if(!$conn)
{
    echo 'connect erorr'. mysqli_connect_error();
}



$stop=$back=$lift=$forward=$right="";

if(isset($_POST["stop"]))
{$stop =mysqli_real_escape_string($conn, $_POST["stop"]);
}

if(isset($_POST["lift"]))
{$lift =mysqli_real_escape_string($conn, $_POST["lift"]);
}

if(isset($_POST["right"]))
{$right =mysqli_real_escape_string($conn, $_POST["right"]);
}

if(isset($_POST["forward"]))
{$forward =mysqli_real_escape_string($conn, $_POST["forward"]);
}

if(isset($_POST["back"]))
{$back =mysqli_real_escape_string($conn, $_POST["back"]);
}

// insert data to database
$sql1 = "INSERT INTO control(stop,back,forward,lift1,right1) VALUES('$stop','$back','$forward','$lift','$right')";
mysqli_query($conn,$sql1);

// sql query to fetch last one row 
$sql ='SELECT * FROM control ORDER BY id desc LIMIT 1';

 // make query & get result
$result = mysqli_query($conn,$sql);

// fetch data 
$dir = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($dir as $dirc){
    if ($dirc['stop'] == 's'  )
        {
         echo "<h1  > S</h1>";
        }
    elseif ($dirc['lift1'] == 'l')
        {
         echo "<h1  >L</h1>";
        }
    elseif ($dirc['right1'] == 'r')
        {
         echo "<h1>R</h1>";
        }
    elseif ($dirc['forward'] == 'f')
        {
         echo "<h1>F</h1>";
        }
    elseif ($dirc['back'] == 'b')
        {
         echo "<h1>B</h1>";
        }

}

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);




=======

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



$stop=$back=$lift=$forward=$right="";

if(isset($_POST["stop"]))
{$stop =mysqli_real_escape_string($conn, $_POST["stop"]);
}

if(isset($_POST["lift"]))
{$lift =mysqli_real_escape_string($conn, $_POST["lift"]);
}

if(isset($_POST["right"]))
{$right =mysqli_real_escape_string($conn, $_POST["right"]);
}

if(isset($_POST["forward"]))
{$forward =mysqli_real_escape_string($conn, $_POST["forward"]);
}

if(isset($_POST["back"]))
{$back =mysqli_real_escape_string($conn, $_POST["back"]);
}

// insert data to database
$sql1 = "INSERT INTO control(stop,back,forward,lift1,right1) VALUES('$stop','$back','$forward','$lift','$right')";
mysqli_query($conn,$sql1);

// sql query to fetch last one row 
$sql ='SELECT * FROM control ORDER BY id desc LIMIT 1';

 // make query & get result
$result = mysqli_query($conn,$sql);

// fetch data 
$dir = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($dir as $dirc){
    if ($dirc['stop'] == 's'  )
        {
         echo "S";
        }
    elseif ($dirc['lift1'] == 'l')
        {
         echo "L";
        }
    elseif ($dirc['right1'] == 'r')
        {
         echo "R";
        }
    elseif ($dirc['forward'] == 'f')
        {
         echo "F";
        }
    elseif ($dirc['back'] == 'b')
        {
         echo "B";
        }

}

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);




>>>>>>> 322b7df67a295564f5c559acb4a2a5ba47b6ea5e
?>