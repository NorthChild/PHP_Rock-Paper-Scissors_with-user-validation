
<?php

// ############################# Validation ####################################

// confirmation that userName is logged in
if (! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
  die("Name parameter missing");
}

// logout
if (isset($_POST['logout']) && $_POST['logout'] === "Logout") {
  header('Location: index.php');
  return;
}

$user = $_GET['name'];

// ########################### Game Mechanics ##################################

$rpsChoices = array("Rock", "Paper", "Scissors");

$result = '';
$humanChoice = '';
$computerChoice = '';

// computer choice made into variable
$computerChoice = rand(0, 2);

if (isset($_POST['human']) && strlen($_POST['human']) !== '') {

  // human choice made into variable
  if ($_POST['human'] == -1) {
    $humanChoice = 'Select';
  }
  if ($_POST['human'] == 0) {
    $humanChoice = $rpsChoices['0'];
  }
  if ($_POST['human'] == 1) {
    $humanChoice = $rpsChoices['1'];
  }
  if ($_POST['human'] == 2) {
    $humanChoice = $rpsChoices['2'];
  }
  if ($_POST['human'] == 3) {
    $humanChoice = 'Test';
  }

  // JUST FOR TESTING PURPOSES
  // JUST FOR TESTING PURPOSES
  // echo 'HUMAN = '.$humanChoice."<br>";
  // JUST FOR TESTING PURPOSES
  // JUST FOR TESTING PURPOSES

  if ($computerChoice == 0) {
    $computerChoice = $rpsChoices['0'];
  }
  if ($computerChoice == 1) {
    $computerChoice = $rpsChoices['1'];
  }
  if ($computerChoice == 2) {
    $computerChoice = $rpsChoices['2'];
  }

  // JUST FOR TESTING PURPOSES
  // JUST FOR TESTING PURPOSES
  // echo 'CPU = '.$computerChoice."<br>";
  // JUST FOR TESTING PURPOSES
  // JUST FOR TESTING PURPOSES
}

function check($humanChoice, $computerChoice) {

  if ($humanChoice == $computerChoice) {
    return "Tie";

  } else if (($humanChoice == 'Paper' && $computerChoice == 'Rock') || ($humanChoice == 'Rock' && $computerChoice == 'Scissors') || ($humanChoice == 'Scissors' && $computerChoice == 'Paper')) {
    return "You Win";

  } else {
    return "You Lose";
  }
}

$r = check($humanChoice, $computerChoice);

// ########################### Game Mechanics ##################################

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/AssignmentRPC.css">
    <title>Michael John Carini - ROCK PAPER SCISSORS Assignment, week 8 </title>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

  </head>
  <body>

<section class="nes-container is-dark" id="gameContainer">

  <h1 class="rpsTitle">Rock Paper Scissors</h1>
  <p>Welcome:<?= htmlentities($user) ?></p>
  <form method="post">
  <select name="human">
  <option value="-1">Select</option>
  <option value="0">Rock</option>
  <option value="1">Paper</option>
  <option value="2">Scissors</option>
  <option value="3">Test</option>
  </select>
  <input class="nes-btn is-success"  type="submit" value="Play" name="Play">
  <input class="nes-btn is-error"  type="submit" name="logout" value="Logout">
  </form>

</section>

<pre class="nes-container is-rounded">

<?php

if (!isset($_POST['human']) || $_POST['human'] == -1) {

  $result = "Please select a strategy and press Play.";

} else if ($humanChoice == 'Test') {

  for($c=0;$c<3;$c++) {
      for($h=0;$h<3;$h++) {
          $r = check($c, $h);
          print ($result = "Human=$rpsChoices[$h] Computer=$rpsChoices[$c] Result=$r\n");
      }
  }

} else {
  $result = "Your Play=$humanChoice Computer Play=$computerChoice Result=$r\n";
}

echo $result;

?>

</pre>

  </body>
</html>
