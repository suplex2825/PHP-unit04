<?php 
class Phrase 
{
   private $currentPhrase = null;
   private $selected = array();
   
   public $phrase = null;

   public function __construct($currentPhrase = null, $selected = null)
   {
     if(!empty($currentPhrase)){
       $this->currentPhrase = $currentPhrase;
     }
     
     if(!empty($selected)){
       $this->selected[] = $selected;
     }
     
     if(!isset($phrase)){
         $this->phrase = "dream big";
     }
   }

   
  
    public function addPhraseToDisplay()
    {
      $characters = str_split(strtolower($this->phrase));
      $splitwords = "<div id='phrase' class='section'>
    <ul>";
      foreach($characters as $words){
        if($words === " "){
          $splitwords .= "<li class='hide space'> </li>";
        } else{
          $splitwords .="<li class='hide letter'>$words</li>";
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
      
}







?>