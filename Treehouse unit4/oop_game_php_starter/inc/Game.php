<?php 
class Game 
{
  public $phrase;
  public $lives = 4;

  public function __construct($phrase)
  {
     return $this->phrase = $phrase;
  }
  
  
  public function displayKeyboard()
  {
     $keyboard = "
      <form action='play.php' method='post'>
     <div id='qwerty' class='section'>";
     $keyboard.= "<div class='keyrow'>";
     $keyboard.= $this->lettersMatch('q');
     $keyboard.= $this->lettersMatch('w');
    $keyboard.= $this->lettersMatch('e');
    $keyboard.= $this->lettersMatch('r');
    $keyboard.= $this->lettersMatch('t');
    $keyboard.= $this->lettersMatch('y');
    $keyboard.= $this->lettersMatch('u');
    $keyboard.= $this->lettersMatch('i');
    $keyboard.= $this->lettersMatch('o');
    $keyboard.= $this->lettersMatch('p');
    $keyboard.="</div>";

    $keyboard.="<div class='keyrow'>";
    $keyboard.= $this->lettersMatch('a');
    $keyboard.= $this->lettersMatch('s');
    $keyboard.= $this->lettersMatch('d');
    $keyboard.= $this->lettersMatch('f');
    $keyboard.= $this->lettersMatch('g');
    $keyboard.= $this->lettersMatch('h');
    $keyboard.= $this->lettersMatch('j');
    $keyboard.= $this->lettersMatch('k');
    $keyboard.= $this->lettersMatch('l');
    $keyboard.="</div>";

    $keyboard.= "<div class='keyrow'>";
    $keyboard.= $this->lettersMatch('z');
    $keyboard.= $this->lettersMatch('x');
    $keyboard.= $this->lettersMatch('c');
    $keyboard.= $this->lettersMatch('v');
    $keyboard.= $this->lettersMatch('b');
    $keyboard.= $this->lettersMatch('n');
    $keyboard.= $this->lettersMatch('m');
    $keyboard.="</div>";
 $keyboard.="</div>
</form>";
    
    return $keyboard;
  }
  
  
  public function displayScore()
  {
    $scores = "<div id='scoreboard' class='section'>
    <ol>";
    
    for($i = 1; $i <= $this->phrase->numberLost(); $i++){
      $scores.= "<li class='tries'><img src='images/lostHeart.png' height='35px' widght='30px'></li>";
    } 
    
    for ($i=0; $i <= ($this->lives - $this->phrase->numberLost()) ; $i++) { 
      $scores.= "<li class='tries'><img src='images/liveHeart.png' height='35px' widght='30px'></li>";
    }

    $scores .= "</ol>
</div>";
    
    return $scores;
  }
  
  
  public function lettersMatch($words)
  {
    $words_selected = $this->phrase->selected;
    if(!in_array($words,$words_selected)){
       return "<input class='key' type='submit' name='key' value='$words' />";
    } else {
       if($this->phrase->checkLetter($words)) {
         return "<input class='key correct' type='submit' name='key' value='$words' />";
       } else {
         return "<input class='key incorrect' type='submit' name='key' value='$words' />";
       }
    }
  }


  public function checkForLose()
  {
    $html = $this->displayScore();
    $doc = new DOMDocument();
    $doc->loadHTML($html);
    $heartsNumber = $doc->getElementsByTagName('li')->length;
    if($this->phrase->numberLost() === $heartsNumber) {
      return true;
    } else {
      return false;
    }
  }


  public function gameOver()
  {
    if($this->checkForLose()) {
      $words = $this->phrase->currentPhrase;
      $finalWords ="<div id='overlay' class='lose'>";
      $finalWords.="<h2>Phrase Hunter</h2>"; 
      $finalWords.= "<h1 id='game-over-message'>The phrase was";
      $finalWords.= '"'. $words . '"';
      $finalWords.="Better luck next time!</h1>";
      $finalWords.="<form action='play.php' method='post'>";
      $finalWords.="<input id='btn__reset' type='submit' name='start' value='Start Game' />";
      $finalWords.="</form>";
      return $finalWords;
    } else if($this->checkForWin())  {
      $words = $this->phrase->currentPhrase;
      $finalWords2 ="<div id='overlay' class='win'>";
      $finalWords2.="<h2>Phrase Hunter</h2>"; 
      $finalWords2.= "<h1 id='game-over-message'>Congratulations on guessing: ";
      $finalWords2.= '"'. $words . '"';
      $finalWords2.="</h1>";
      $finalWords2.="<form action='play.php' method='post'>";
      $finalWords2.="<input id='btn__reset' type='submit' name='start' value='Start Game' />";
      $finalWords2.="</form>";
      return $finalWords2;
    } else {
       return false;
    }
  }


  public function checkForWin()
  {
    $getLetterArray = array_unique(str_split(str_replace(' ','',strtolower($this->phrase->currentPhrase))));
    $winnerResult = array_intersect($this->phrase->selected, $getLetterArray);
    if(count($getLetterArray) === count($winnerResult)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function checkForLive()
  {
    
  }

}




?>