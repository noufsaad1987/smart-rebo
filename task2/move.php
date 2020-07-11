<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleSheet.css">
    
</head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  width : 10%;
  padding: 15px 40px;

}
</style>
<body >
    <?php
    // session start
    session_start();
    //connect database
    $conn = mysqli_connect('localhost','nouf','Zaidsaad123','robot');
    ?>
    <h2></h2>
    <div  style=" text-align: center;">
        <form action= "" method="POST">
            <label size="20"><b>Forward</b></label> <input type="number"  style="padding: 8px 10px" name="forward"><br>
            <label size="20"><b>Right</b></label>  <input type="number"style="padding: 8px 10px" name="right"><br>
            <label size="20"><b>Back</b></label>  <input type="number" style="padding: 8px 10px"  name="back">
        
        
    </div>
    <br>
    <div class="btt2" style=" text-align: center;" >
    <button type="submit" style="margin:5px ; float:center;" name="save"><b>Save</b></button>
    <button type="submit" style="margin:5px ; float:center;" name="start"><b>Start</b></button>
    <button type="submit" style="margin:5px ; float:center;" name="delete"><b>Delete</b></button>
    </div>

         </form>        

</body>

<?php


if($_SERVER['REQUEST_METHOD'] === "POST"){

    

    $right=$_POST['right'];
    $forward= (int)$_POST['forward'];
    $back= (int) $_POST['back'];
    
    

    
    if(isset($_POST['save'])){
        //if($right == 0 &&  $back == 0 && $forward == 0)
        //{echo "Please insert values";}
        //else{
        $sql = "INSERT INTO direction (forward,back,right1) VALUES('$forward','$back','$right')";
        mysqli_query($conn,$sql);


        // view data in the table
        $sql1 = "SELECT * FROM direction";
        $result = mysqli_query($conn,$sql1);

        echo "<div style='margin-left:10%;'>
        <h2 style='text-align: left;' >Rebot Tracking</h2>";
        echo "<table style='text-align: left;'>";
        echo "<tr>
            <th>Forward</th>
            <th>Right</th> 
            <th>Back</th>
            </tr>";
            $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)> 0){
            while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                <td>".$row["forward"]."</td>
                <td>".$row["right1"]."</td>
                <td>".$row["back"]."</td>
                </tr>";
            }
            
        echo "</table> </div>";
        }
        
        //}
            
            
    }
    
    elseif(isset($_POST['start'])){
        
        // draw path 
        echo '<div style="margin-left:70%; "> <svg width="400" height="400" style="background-color:white" >
        <defs>
        <marker id="markerCircle" markerWidth="8" markerHeight="8" refX="5" refY="5">
        <circle cx="5" cy="5" r="3" style="stroke: black; fill:#000000;"/>
        </marker>
        <marker id="markerArrow" markerWidth="13" markerHeight="13" refX="2" refY="6" orient="auto">
        <path d="M 2,2 L 2,11 L 10,6 L 2,2" style=" fill: #000000;" />
        </marker>
    </defs>
    
    <path d="M 50,50 L 50,'.$forward.' h '.$right.' v '.$back.' "
          style="stroke: #6666ff; stroke-width: 2px; fill: none;
                       marker-start: url(#markerCircle);
                       marker-end: url(#markerArrow);
                     "
    
            /></svg></div>'
            ;
    }
    elseif(isset($_POST['delete'])){

        $sql2 = "DELETE FROM direction WHERE forward=$forward ORDER BY id desc LIMIT 1";
        mysqli_query($conn,$sql2);
        $right=$forward=$back="";


    }
    
//close connection
mysqli_close($conn);
    
}

    ?>