<?php

/* 
 * Racerhistory.com software package
 * Patrick Foltz
 */
$max=0;
$min=0;

if ($till == $season){
    $max=1;
}

if ($from == $season){
    $min=1;  
}
$prev=$season-1;
$next=$season+1;
?>
<div class="w3-bar w3-auto w3-border-bottom">
    <?php if ($min==0): ?>
    <a href="/seasons/view/<?=$from; ?>" class="w3-bar-item w3-btn">First | </a>
    <a href="/seasons/view/<?=$prev; ?>" class="w3-bar-item w3-btn"><?=$prev; ?> << </a>
            <?php endif; ?>
            <a href="/seasons/" class="w3-bar-item w3-btn"><span class="w3-hide-small">All Seasons</span><span class="w3-hide-medium w3-hide-large">All</span></a>
            <?php if($max==0): ?>
            <a href="/seasons/view/<?=$next; ?>" class="w3-bar-item w3-btn"> >> <?=$next; ?></a>
            <a href="/seasons/view/<?=$till; ?>" class="w3-bar-item w3-btn"> | Current</a>
            <?php endif; ?>
</div>