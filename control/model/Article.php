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
        $arr['1'] = 50;
        $arr['2'] = 50;
        $arr['3'] = 50;
        $arr['4'] = 50;
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
        //avant la BDD
        if($id == 1) {
            return "<div class='article-image' style='background: url(../public/images/articles/".$this->id."/HF.jpg);'></div>";
        } else if($id == 4) {
            return "<div class='article-image' style='background: url(../public/images/articles/".$this->id."/smile.jpg);'></div>";
        } else if($id == 2) {
            return "<div class='article-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in nisl vel eros auctor interdum quis sed mi. Suspendisse cursus velit at diam posuere, eu ultricies leo suscipit. Nulla eu ornare nibh. Etiam quis elementum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur facilisis urna a luctus ullamcorper. Vestibulum sodales neque ut est rutrum porta. Morbi odio dolor, laoreet sed semper pretium, tristique nec nibh.

            Nam sapien dui, tempor sed sollicitudin et, tempus nec dolor. Vivamus porttitor ex et neque fermentum iaculis. Vivamus eget neque ullamcorper, interdum massa non, faucibus mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer at risus leo. Fusce eget scelerisque lorem. Fusce id ipsum justo. Ut commodo facilisis magna sit amet pharetra. Pellentesque finibus, libero vitae dictum varius, eros nisl ullamcorper neque, at mollis purus nunc quis nisl. Nam sed ipsum ac quam interdum vestibulum. Phasellus consectetur nulla non euismod sagittis. Curabitur in interdum elit. Donec mollis velit id dignissim porttitor. Maecenas non condimentum nibh. Mauris fringilla ipsum eget sapien rutrum, nec ultrices turpis convallis.
            
            Donec varius est sed lacus euismod eleifend. Integer congue porttitor ultrices. In congue mauris eget felis sollicitudin consequat. Vivamus dapibus nisi dolor, ac pharetra lectus volutpat id. Suspendisse potenti. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque in lectus mattis, ornare quam ut, pharetra tortor. Ut imperdiet, eros a ultrices mattis, orci nibh ultricies nulla, id sodales est magna non ex. Mauris at efficitur eros, non vestibulum mi. Curabitur aliquet, libero ac ornare bibendum, erat sem feugiat ligula, vitae vehicula urna turpis at ligula. Mauris tempor non ex vitae commodo.</div>";
        } else if($id == 3) {
            return "<div class='article-text'>Nulla venenatis felis sit amet ornare consequat. In ac aliquam ipsum, aliquet ultricies libero. Nam in hendrerit ante. Ut ullamcorper nulla id dui rhoncus, consequat tempor turpis aliquet. Aliquam tristique, enim ut condimentum rhoncus, sem felis hendrerit neque, sed cursus felis ex at tortor. Quisque a eros at felis fermentum mollis et eget lorem. Vivamus eget velit viverra, molestie ex vitae, pulvinar metus. Proin in nibh in odio mollis egestas. Mauris in dignissim felis. In dolor nunc, accumsan quis malesuada in, ultricies vel sapien.

            Quisque sem nunc, aliquet ut laoreet non, auctor sed neque. Sed ornare, lectus sit amet ullamcorper accumsan, dolor augue pretium lorem, vel viverra neque lorem ac leo. Suspendisse vulputate sit amet metus sed tincidunt. Maecenas eu varius lorem. Aliquam eget velit urna. Suspendisse accumsan elementum laoreet. Vestibulum lobortis sit amet magna et mattis. Proin non molestie tellus. Fusce sagittis finibus lectus, id dignissim tellus aliquam id. Aliquam aliquet neque non sapien blandit, et auctor dui mattis.</div>";
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