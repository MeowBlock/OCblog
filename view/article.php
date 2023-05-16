<div class='grid-container'>
<?php 
for($i = 1; $i <= $article->getPositions(); $i++) {
    ?>
    <div class='grid-element grid-element<?=$i?>'>
    hey <?= $article->getElement($i) ?>

    </div>
    
    
    
    <?php
}
?>
</div>
<style>
    .grid-container {
        width: calc(100vw - 200px);
        margin: auto;
        display: grid;
        grid-template-areas: 'n1 n1 n1 n1 n1 n2 n2 n2 n2 n2'
        'n3 n3 n3 n3 n3 n4 n4 n4 n4 n4';
    }
    .grid-element {

    }
    .article-image {
        height: 100%;
        width: 100%;
        background-size: cover;
        background-position: center;
    }
    <?php 
    for($i = 1; $i <= $article->getPositions(); $i++) {
        echo '.grid-element'.$i.' {
           grid-area: n'.$i.'; 
        }';
    }
    ?>

</style>