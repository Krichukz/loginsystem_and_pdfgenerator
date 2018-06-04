<?php

require 'dbconnect.php';
$db = new Db();

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {

if (empty(trim($_POST['username']))) {
    $username_err = 'Nav ievadīts lietotājvārds!';
} else {
    $username = $_POST['username'];
}
if (empty(trim($_POST['password']))){
    $password_err = 'Nav ievadīta parole!';
} else {
    $password = $_POST['password'];
}

if (empty($username_err) && empty($password_err)) {

    $query = "SELECT username, password FROM users WHERE username=?";

    if ($stmt = $db->connection->prepare($query)) {

        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        if($stmt->execute()){

            $stmt->store_result();

            if($stmt->num_rows == 1) {

                $stmt->bind_result($username, $hashed_password);

                if ($stmt->fetch()) {

                    if (password_verify($password, $hashed_password)) {

                        session_start();
                        $_SESSION['username'] = $username;
                        header('Location: index.php');

                    } else {
                        $password_err = 'Nepareiza parole!';
                    }
                }
            } else {
                $username_err = 'Šāds konts nepastāv!';
            }
                }
                else {
                echo 'Radās kļūda!';
            }
        }

        $stmt->close();
    }

    $db->connection->close();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Autorizācija</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="content">

    <div class="container">

        <div class="row justify-content-center">
            <img src="logo.png" alt="Naked digitālā aģentūra" style="margin-bottom: 15px;">
        </div>

        <div class="row justify-content-center">
            <div class="col-9">

                <h2>Pierakstīties</h2>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                        <label for="itemNo">Lietotājvārds:</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Lietotājvārds">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="itemTitle">Parole</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Parole">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Pierakstīties">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>