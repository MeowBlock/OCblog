<?php 

namespace Orm;
use Exception;
abstract class Article
{
    public $id;
    public $title;
    public $positions;
    public $templateId;
    protected $gridWidth;
    protected $gridContent;
    protected $db;
    

    function __construct($id) {
        require_once("_connect_db.php");
        $this->db = $db;
        $prep_getArticle = $this->db->prepare("SELECT * from articles WHERE `id` = ?");
        $prep_getArticle->execute([$id]);
        $getArticle = $prep_getArticle->fetch();
        $this->id = $getArticle['id'];
        $this->title = $getArticle['title'];

        "SELECT *  from articleTexts t, articleImages i WHERE t.`articleID` = ? and t.`articleID` = i.`articleID`";
        $prep_getTemplateID = $this->db->prepare("SELECT templateID from articles WHERE `id` = ?");
        $prep_getTemplateID->execute([$this->id]);
        $this->templateId = $prep_getTemplateID->fetch()[0];

        $this->getArticleGrid();
        $this->getArticleContent();
    }

    function getArticleGrid() {
        $prep_getGridImg = $this->db->prepare("SELECT ti.position, ti.width from templateimages ti, template temp WHERE temp.`id` = ? and ti.`templateID` = temp.`id`");
        $prep_getGridImg->execute([$this->templateId]);

        $prep_getGridText = $this->db->prepare("SELECT tt.position, tt.width from templatetexts tt, template temp WHERE temp.`id` = ? and tt.`templateID` = temp.`id`");
        $prep_getGridText->execute([$this->templateId]);
        

        $grid = [];
        foreach($prep_getGridImg as $gridField) {
            $grid[$gridField['position']] = $gridField['width'];
        }
        foreach($prep_getGridText as $gridField) {
            $grid[$gridField['position']] = $gridField['width'];

        }
        ksort($grid);
        if(count($grid) == 0) {
            // renvoi vers 404
            throw new Exception("non");
        }
        $this->positions = count($grid);
        $this->gridWidth = $grid;
    }

    function getArticleContent() {

        $prep_getGridImg = $this->db->prepare("SELECT position, name from articleimages WHERE `articleId` = ?");
        $prep_getGridImg->execute([$this->id]);

        $prep_getGridText = $this->db->prepare("SELECT position, text from articletexts WHERE `articleId` = ?");
        $prep_getGridText->execute([$this->id]);
        

        $grid = [];
        $grid2 = [];
        foreach($prep_getGridImg as $gridField) {
            $grid[$gridField['position']] = ['image', $gridField['name']];
        }
        foreach($prep_getGridText as $gridField) {
            $grid[$gridField['position']] = ['text', $gridField['text']];
        }
        ksort($grid);
        if(count($grid) == 0) {
            // renvoi vers 404
            throw new Exception("non");
        }
        $this->gridContent = $grid;
    }
}


?>