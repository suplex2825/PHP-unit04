<?php 
class Game 
{
  private $phrase;
  private $lives = 5;

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
    $keyborad.="</div>";

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
    
    for($i = 1; $i < 6; $i++){
     $scores.= "<li class='tries'><img src='images/liveHeart.png' height='35px' widght='30px'></li>";
    }
    
    $scores .= "    </ol>
</div>";
    
    return $scores;
  }
  
  
  public function lettersMatch($words)
  {
    $words_selected = $this->phrase->selected[0];
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
}




?>