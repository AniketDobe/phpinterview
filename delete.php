<?php

$conn = mysqli_connect("localhost", "root", "", "demo");
if(!$conn){
    die("connect error".mysqli_connect_error());
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;

    $sql = "delete from test where id = $id";
    if(mysqli_query($conn, $sql)){
        echo "deleted";
        header("Location: index.php");
    }
    else{
        echo "something went wrong";
    }
    

}

?>
