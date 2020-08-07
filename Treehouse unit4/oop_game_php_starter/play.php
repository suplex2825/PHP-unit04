<?php 
 session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phrase Hunter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
<?php 
  include 'inc/Game.php';
  include 'inc/Phrase.php';

// var_dump($_SESSION);
//echo '<br>';

  if(isset($_POST['start'])) {
    if(!empty($_SESSION['phrase']) && !empty($_SESSION['selected'])) {
      unset($_SESSION['phrase']);
      unset($_SESSION['selected']);
    }
  } 

  if(isset($_POST['key'])){
    if(empty($_SESSION['selected'])){
      $_SESSION['selected'] = array();
//    }
//     
//      $_SESSION['selected'][] = $_POST['key'];
//      $_SESSION['selected'] = $_POST;
    }
    array_push($_SESSION['selected'],$_POST['key']);

  }

//  $_SESSION['phrase'] = 'start small';

  $phrase = new Phrase($_SESSION['phrase'],$_SESSION['selected']);
// $_SESSION['phrase'] = $phrase->phrases[array_rand($phrase->phrases,1)];
  if(!isset($_SESSION['phrase'])) {
    $_SESSION['phrase'] = $phrase->currentPhrase;
  }

  $game = new Game($phrase);
  // var_dump($_SESSION['selected']);
  // var_dump($_SESSION['selected']);
  // var_dump($game);
  // var_dump($phrase->checkLetter('a'));
//  echo "<pre>";
//  var_dump($phrase);
//  var_dump($game);
//  echo "</pre>";
  // echo $phrase->numberLost();
  // echo "<br>";
  // var_dump($game->checkForLose());
  // var_dump($game->checkForWin());
  ?>  
<div class="main-container">
    <div id="banner" class="section">
        <h2 class="header">Phrase Hunter</h2>
        <?php echo $phrase->addPhraseToDisplay();?>
      
        <?php echo $game->displayKeyboard();?>
      
        <?php echo $game->displayScore();
          // var_dump($_POST);
         ?>

        <?php echo $game->gameOver();?>
    </div>
</div>

</body>
</html>


