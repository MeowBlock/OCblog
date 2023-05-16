<div class='main-title'><?= $article->getTitle() ?></div>
<div class='grid-container'>
<?php 
for($i = 1; $i <= $article->getPositions(); $i++) {
    ?>
    <div class='grid-element grid-element<?=$i?>'>
    <?= $article->getElement($i) ?>

    </div>
    
    
    
    <?php
}
$article->getGrid();
?>
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
        grid-template-areas: 'n1 n1 n1 n1 n1 n2 n2 n2 n2 n2'
        'n3 n3 n3 n3 n3 n4 n4 n4 n4 n4';
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
    for($i = 1; $i <= $article->getPositions(); $i++) {
        echo '.grid-element'.$i.' {
           grid-area: n'.$i.'; 
        }';
    }
    ?>

</style>