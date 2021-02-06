<?php

// ############################## Variables ####################################

$user = '';
$userName = '';
$userPass = '';
$message = false;

$salt = 'XyZzy12*_';
$md5 = hash('md5', 'XyZzy12*_php123');

$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

// ############################## Variables ####################################

if (isset($_POST['who']) && isset($_POST['pass'])) {
  $userName = $_POST['who'];
  $userPass = $_POST['pass'];

  $passPlusSalt = $salt.$userPass;

  if (strlen($userName) < 1 || strlen($userPass) < 1) {
    $message = 'User Name and Password are required.';

  } else {

    $passCheck = hash('md5', $passPlusSalt);

    if ($passCheck === $stored_hash) {
      header("Location: game.php?name=".urlencode($_POST['who']));
      return;

    } else {

      $message = 'Incorrect password';

    }
  }
}

// ################################# Model #####################################
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/AssignmentRPC.css">
    <title>Michael John Carini - ROCK PAPER SCISSORS Assignment</title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

  </head>
  <body>

    <section class="nes-container is-dark">
      <section id="indexContainer" class="message -right">
        <div class="nes-balloon from-right is-dark">

          <div id="loginContainer">
              <h1 id="loginH1">Please Log In</h1>

              <p>
                <?php
                  if ($message !== false) {
                    echo ("<p id='moduleMessage'>".htmlentities($message)."</p>\n");
                  }
                ?>
              </p>

              <form method="post">
                  <label for="name"><b>User Name:</b></label>
                  <input type="text" name="who" id="name"> <br>

                  <label><b>Password:</b></label>
                  <input type="password" name="pass" > <br>

                  <div class="buttons">
                    <input class="nes-btn is-success" id="submit" size="30" type="submit" value="Log In">
                    <input class="nes-btn is-error" id="submit" size="30" type="submit" name="cancel" value="Cancel"  >
                  </div>
              </form>
                <p class="hint">
                For a password hint, view source and find a password hint
                in the HTML comments.
                <!-- Hint: The password is the three character name of the
                programming language used in this class (all lower case)
                followed by 123. -->
                </p>
          </div>

        </div>
        <i id="secondBrikko" class="nes-bcrikko"></i>
      </section>

    </section>

  </body>
</html>
