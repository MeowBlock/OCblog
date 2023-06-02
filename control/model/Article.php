<?php 

namespace Model;
class Article extends \Orm\Article
{
    function __construct($id) {
        Parent::__construct($id);
        echo 'id is : '.$id;
    }
    public function getGrid() {
        //avant la BDD
        $arr = $this->gridWidth;
        $max = 0;
        $msg = '';
        $toreturn = [];
        foreach($arr as $key => $el) {
            $max += $el;
            if($max > 100) {
                throw new \Exception("article width does not match");
            } else {
                for($i = 0; $i < $el/10; $i++) {
                    $msg .= 'n'.$key.' ';
                }

            }
            if($max == 100) {
                $max = 0;
                $toreturn[] = $msg;
                $msg = '';
            }

        }
        return $toreturn;
        
    }



    public function getElement($id) {
        $arr = $this->gridContent[$id];
        if($arr[0] == 'image') {
            return "<div class='article-image' style='background: url(../public/images/articles/".$this->id."/".$arr[1].");'></div>";
        } elseif($arr[0] == 'text') {
            return "<div class='article-text'>".$arr[1]."</div>";
        }
    }



    /**
     * Get the value of positions
     */ 
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Set the value of positions
     *
     * @return  self
     */ 
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }
}


?>