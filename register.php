<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="name">Enter your name...</label>
        <input type="text" name="name" required>
        <label for="name">Enter your surname...</label>
        <input type="text" name="surname" required>
        <label for="name">Enter your email...</label>
        <input type="email" name="email" required>
        <label for="name">Enter your password...</label>
        <input type="password" name="password" required>
        <label for="adress">Enter your adress...</label>
        <input type="text" name="adress" required> <br> <br>
        <label for="number">Enter your phone number...</label>
        <input type="number" name="number" required>
        <input type="submit" name="submit" value="Register">
    </form>
</body>

</html>

<?php
include('connection.php');


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adress = $_POST['adress'];
    $pnumber = $_POST['number'];


    $select = "SELECT id, email FROM second_table where email = '$email'";
    $qoshish = mysqli_query($conn, $select);
    // $qator = mysqli_fetch_assoc($qoshish);
    // $emaili = $qator['email'];
    if ($qoshish) {
        die('Bu email oldin kiritilgan');
    } else {


        $sql = "INSERT INTO second_table(name, surname, email)  Values ('$name', '$surname', '$email')";
        $query = mysqli_query($conn, $sql);

        if ($query) {

            $sql4 = "INSERT INTO third_table(name, phone_number, adress, email) VALUES('$name', '$pnumber', '$adress', '$email')";
            $query4 = mysqli_query($conn, $sql4);
            $sql3 = "SELECT id FROM third_table where email = '$email'";
            $query3 = mysqli_query($conn, $sql3);
            $row1 = mysqli_fetch_assoc($query3);
            $th_id = $row1['id'];
            $sql1 = "SELECT id FROM second_table where email = '$email'";
            $query2 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($query2);
            $st_id = $row['id'];
            $sql2 = "INSERT INTO first_table(st_id, th_id, email, password) Values ('$st_id', '$th_id', '$email', '$password')";
            $query1 = mysqli_query($conn, $sql2);
        }
    }
}

?>