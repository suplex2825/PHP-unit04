<?php 
class Phrase 
{
   public $currentPhrase = null;
   public $selected = array();
   
   public $phrases = array("Always turn a negative situation into a positive situation",
                          "With the new day comes new strength and new thoughts",
                          "The best and most beautiful things in the world cannot be seen or even touched they must be felt with the heart",
                          "If I have seen further than others it is by standing upon the shoulders of giants",
                          "There is nothing impossible to him who will try",
                          "Try to be a rainbow in someone s cloud");

   public function __construct($currentPhrase = null, $selected = null)
   {
     if($currentPhrase == null) {
      shuffle($this->phrases);
      $this->currentPhrase = $this->phrases[0];
     } else {
      $this->currentPhrase = $currentPhrase;
     }
      
     if(!empty($selected)){
       $this->selected = $selected;
     }
     if(!isset($phrase)){
         $this->phrase = "dream big";
     }
   }

   
  
    public function addPhraseToDisplay()
    {
      $characters = str_split(strtolower($this->currentPhrase));
      $splitwords = "<div id='phrase' class='section'>
    <ul>";
      foreach($characters as $words){
        if($words === " "){
          $splitwords .= "<li class='hide space'> </li>";
        } else{
          if(in_array($words,$this->selected)){
          $splitwords .="<li class='show letter'>$words</li>";
          } else {
          $splitwords .="<li class='hide letter'>$words</li>";
          }
        }
      }
          $splitwords .= "</ul>
      </div>";
      return $splitwords;
    }
  
  
    public function checkLetter($singlewords)
    {
       $result_words = array_unique(str_split(str_replace(' ','',strtolower($this->currentPhrase))));
       if(in_array($singlewords,$result_words)) {
         return true;
       } else {
         return false;
       }
    }



    public function numberLost()
    {
      $getLetterArray = array_unique(str_split(str_replace(' ','',strtolower($this->currentPhrase))));
      $results = array_diff($this->selected, $getLetterArray);
      return count($results);
    }
    
}







?>