<?php

    require "includes/config/database.php";
    $db = connectDB();

    // Authenticates the user

    $errors = [];

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST["password"]);

        if (!$email) {
            $errors[] = "You have to write a valid email";
        };

        if (!$password) {
            $errors[] = "You have to write a password";
        };

        if(empty($errors)) {
            // Check if the user exists

            $query = "SELECT * FROM users WHERE email = '${email}'";
            $result = mysqli_query($db, $query);

            if($result->num_rows) {
                // Check if the password is correct

                $user = mysqli_fetch_assoc($result);

                // Verify if the password is correct or not

                $auth = password_verify($password, $user["password"]);

                if($auth) {
                    // The user is authenticated, and you need to start de session before anything else

                    session_start();

                    // Filling the aray of the session

                    $_SESSION["login"] = true;
                    header("Location: /admin");

                } else {
                    $errors[] = "That password is incorrect";
                };
            } else {
                $errors[] = "That email doesn't exist";
            };
        };
    };

    // Includes the header

    require "includes/functions.php";
    includeTemplate("header");
?>

<main class="container section centered-content">
    <h1>Log In</h1>

    <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>           
    <?php endforeach; ?>

    <form method="POST" class="form">
        <fieldset>
            <legend>Email and Password</legend>
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Your E-mail" id="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Your Password" id="password" required>
        </fieldset>

        <input type="submit" value="Log In" class="button green-button">
    </form>
</main>

<?php 
    includeTemplate("footer");
?>