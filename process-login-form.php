<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$conn = new mysqli($host, $username, $password, $dbname, 3307);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search parameters from the form
//$email = $_GET['email'];
//$pass = $_GET['password'];


//$sql = "SELECT * FROM users WHERE email = %$email% AND password = %$pass%";

// Execute the query and fetch the results
//$result = $conn->query($sql);


session_start();

include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($email)) {

        header("Location: index.php?error=User Name is required");

        exit();

    } else if (empty($pass)) {

        header("Location: index.php?error=Password is required");

        exit();

    } else {

        $sql = "SELECT * FROM users WHERE user_name='$email ' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            } else {

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        } else {

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

} else {

    header("Location: index.php");

    exit();

}

?>