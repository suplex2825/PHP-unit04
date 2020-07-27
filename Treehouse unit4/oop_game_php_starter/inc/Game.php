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
     <div id='qwerty' class='section'>
    <div class='keyrow'>
        <input class='key' type='submit' name='key' value='q' />
        <input class='key' type='submit' name='key' value='w' />
        <input class='key' type='submit' name='key' value='e' />
        <input class='key' type='submit' name='key' value='r' />
        <input class='key' style='background-color: red' disabled type='submit' name='key' value='t' />
        <input class='key' type='submit' name='key' value='y' />
        <input class='key' type='submit' name='key' value='u' />
        <input class='key' type='submit' name='key' value='i' />
        <input class='key' type='submit' name='key' value='o' />
        <input class='key' type='submit' name='key' value='p' />
    </div>

    <div class='keyrow'>
        <input class='key' type='submit' name='key' value='a' />
        <input class='key' type='submit' name='key' value='s' />
        <input class='key' type='submit' name='key' value='d' />
        <input class='key' type='submit' name='key' value='f' />
        <input class='key' type='submit' name='key' value='g' />
        <input class='key' type='submit' name='key' value='h' />
        <input class='key' type='submit' name='key' value='j' />
        <input class='key' type='submit' name='key' value='k' />
        <input class='key' type='submit' name='key' value='l' />
    </div>

    <div class='keyrow'>
        <input class='key' type='submit' name='key' value='z' />
        <input class='key' type='submit' name='key' value='x' />
        <input class='key' type='submit' name='key' value='c' />
        <input class='key' type='submit' name='key' value='v' />
        <input class='key' type='submit' name='key' value='b' />
        <input class='key' type='submit' name='key' value='n' />
        <input class='key' type='submit' name='key' value='m' />
    </div>
</div>
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