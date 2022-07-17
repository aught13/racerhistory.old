<meta name="description"
    content="<?=$person->first; ?>,<?=$person->nick; ?>,<?=$person->last; ?> - Murray State Basketball" />
<meta name="keywords"
    content="<?=$person->first; ?>,<?=$person->nick; ?>,<?=$person->last; ?>,Murray,Racers,Basketball,NCAA" />
<div class="w3-row">
    <div class="w3-col m3 l2 w3-container">
        <img class="w3-image" style="max-height: 200px"
            alt="<?=$person->first; ?> <?=$person->nick; ?> <?=$person->last; ?>"
            src="/assets/img/player/<?=$person->photo; ?>" />
    </div>
    <div class="w3-rest w3-container">
        <h2><?=$person->first; ?> <?=$person->nick; ?> <?=$person->last; ?></h2>
        <span class="w3-large">Men's Basketball</span><br>

        <?php 
if (isset($person->height)) {
    echo "<span>Height: ".$person->height."    </span>";
}
if (isset($person->weight)) {
    echo "<span>Weight: ".$person->weight."lbs    </span>";
}
if (isset($person->position)) {
    echo "<span>Position: ".$person->position." </span><br>";    
}
if (isset($person->hometown)) {
    echo "<span>From: ".$person->hometown." </span>";
}
?>

    </div>
</div>