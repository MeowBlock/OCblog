<div class='main-title'><?= $article->title ?></div>
<div class='grid-container'>
    <div class='grid-element grid-element'>
    <?= $article->content ?>

    </div>
    
</div>
<style>
    .main-title {
        width: 100%;
        text-align: center;
        font-size: 30px;
        font-weight: 700;
    }
    .grid-container {
        width: calc(100vw - 200px);
        margin: auto;
        display: grid;
        /*grid-template-areas:*/ <?php
         //foreach($article->getGrid() as $el) {
            //echo "'".$el."'";
        //} 
        ?>
    }
    .grid-element {
        padding: 30px;
        min-height: 400px;
    }
    .article-image {
        height: 100%;
        width: 100%;
        background-size: cover!important;
        background-position: center!important;
    }
    <?php 
    // for($i = 1; $i <= $article->getPositions(); $i++) {
    //     echo '.grid-element'.$i.' {
    //        grid-area: n'.$i.'; 
    //     }';
    // }
    ?>
    @media only screen and (max-width: 1000px) {
        .grid-container {
            display: flex;
            flex-direction: column;
            width: calc(100vw - 60px);
        }
        .article-image {
            width: calc(100vw - 120px);
            min-height: 100vw;
        }
        .grid-element {
        min-height: 300px;
        }
    }

</style>