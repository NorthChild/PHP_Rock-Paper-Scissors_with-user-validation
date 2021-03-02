
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

$rpsChoices = array('Rock', 'Paper', 'Scissors');

$result = '';
$humanChoice = '';
$computerChoice = '';

// computer choice made into variable

// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

$computer = 0;
$computer = rand(0,2);

function check($computer, $human) {
    if ( $human == $computer ) {
        return "Tie";
    } else if ( ($human == 0 && $computer == 1) ||
                ($human == 1 && $computer == 2) ||
                ($human == 2 && $computer == 0)) {
        return "You Lose";
    } else {
        return "You Win";
    }
    return false;
}

$result = check($computer, $human);


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

if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
} else {
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}

?>

</pre>

  </body>
</html>
