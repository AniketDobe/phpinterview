<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">
        First Name: <input type="text" name="fname" required><br>
        Last Name: <input type="text"name="lname" required><br>
        Address: <input type="text" name="address" required><br>
        <input type="submit" name="submit">
        
    </form>


    <?php
    
    $conn = mysqli_connect("localhost", "root", "", "demo");
        if(!$conn){
            die(mysqli_connect.error_log());
        }
        

        
        if(isset($_POST['submit'])){
            
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $address = $_POST['address'];
       

        $sql = "insert into test(fname,lname,address) values('$fname','$lname','$address')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Inserted";
            echo "<b>hello ". $fname ." </b>";
        }else{
            echo "soething went wrong";
        }

       



    }
     // ''''''''''''''''''''''''''''''''''''''''''
     $sql1 = "select * from test";
     $result1 = mysqli_query($conn, $sql1);

     if(mysqli_num_rows($result1) > 0){
         while($row = mysqli_fetch_assoc($result1)){
             echo "<br>". $row['id'] . "     ". $row['fname']."      ".$row['lname']."       ".$row['address']. "<a href='edit.php?id=" . $row['id'] . "'>Edit</a>
             <a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
         }
     }
     // ''''''''''''''''''''''''''''''''''''''''''''

    ?>
   
</body>
</html>