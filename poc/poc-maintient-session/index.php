<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("location: connected.php");
    exit;
}

$email = $password = "";
$email_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty(trim($_POST["email"])))
    {
        $email_err = "Please enter email";
    }
    else
    {
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["motDePasse"])))
    {
        $password_err = "Please enter password";
    }
    else
    {
        $password = trim($_POST["motDePasse"]);
    }

    if(empty($email_err) && empty($password_err))
    {
        $querry = "SELECT id, nom, email, motDePasse FROM client WHERE email = :email";
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=figureit","site_user","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo ('Message : ' . $exception->getMessage());
            exit;
        }

        if($stmt = $pdo->prepare($querry))
        {
            $paramEmail = trim($_POST["email"]);
            $stmt->bindParam(":email", $paramEmail, PDO::PARAM_STR);

            if($stmt->execute())
            {
                if($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $nom = $row["nom"];
                        $hashed_password = $row["motDePasse"];
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["nom"] = $nom;
                            $_SESSION["lastConnexion"] = time();

                            // Redirect user to welcome page
                            header("location: connected.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }else{
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid username or password.";

                    }
                }else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                unset($stmt);
            }
        }
        unset($pdo);
    }
}
    ?>

<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>POC MAINTIENT SESSION</title>
</head>
<body>
    <form action="#" method="post">

        <input type="text" class="form-control" placeholder="Email"  name="email" id="email" value="<?= $email ?>" required>
        <span><?= $email_err?></span>

        <input type="password" class="form-control" placeholder="Mot de passe" name="motDePasse" id="motDePasse" value="<?= $password ?>" required>
        <span><?= $password_err ?></span>

        <button type="submit">Connexion</button>

    </form>
</body>
</html>




