<?php
$conn = mysqli_connect("localhost", "root", "", "demo");
if(!$conn){
    die("error". mysqli_connect_error());

}
if(isset($_POST['submit']) && isset($_GET['id'])){
    $id = $_GET['id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];

    $sql = "update test set fname = '$fname', lname = '$lname', address = '$address' where id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "updated";
        header("location: index.php");
    }
    else{
        echo "something went wrong";
    }

}
$id = $_GET['id'];
$sql = "select *from test where id = '$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
}
else{
    echo "something wrong no data available";
}
?>
<form method="Post">
        First Name: <input type="text" name="fname" value="<?php echo $row['fname']; ?>" required><br>
        Last Name: <input type="text"name="lname" value="<?php echo $row['lname']; ?>" required><br>
        Address: <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>
        <input type="submit" name="submit">
        
    </form>