<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://racerhistory.com/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title; ?></title>
    <?= Asset::js('scroll.js'); ?>
    <?= Asset::css('w3.css'); ?>
    <?= Asset::css('datatables.css'); ?>
    <?= Asset::js('datatables.min.js'); ?>

</head>

<body>
    <nav id="topNav" class="w3-top racer-gold">
        <div class="w3-bar w3-large w3-auto">
            <a id="scroll" class="w3-bar-item w3-button w3-hide" href="/"><img class=""
                    style="width: 100%; max-width: 540px; height: 100%; max-height: 29px" alt="Racerhistory.com"
                    src="/assets/img/logo.png"></img></a></li>
            <a class="w3-bar-item w3-hide-small w3-button" href="/players">PLAYERS</a></li>
            <a class="w3-bar-item w3-hide-small w3-button" href="/seasons">SEASONS</a></li>
            <a class="w3-bar-item w3-hide-small w3-button" href="/stats">STATS</a></li>
            <a class="w3-bar-item w3-hide-small w3-button" href="/games">GAMES</a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
                onclick="dropNav()">&#9776;</a>
        </div>
        <div id="navdrop" class="w3-bar-block racer-gold w3-hide w3-hide-large w3-hide-medium">
            <a href="/players" class="w3-bar-item w3-button">PLAYERS</a>
            <a href="/seasons" class="w3-bar-item w3-button">SEASONS</a>
            <a href="/stat" class="w3-bar-item w3-button">STATS</a>
        </div>
    </nav>

    <header style="padding-top: 45px" class="w3-row w3-container racer-blue">
        <div class="w3-auto">

            <div class="">
                <a href="/"><img class="" style="width: 100%; max-width: 540px; height: 100%; max-height: 90px"
                        alt="Racerhistory.com" src="/assets/img/logo.png"></img></a>
                <!-- Record Row -->
            </div>

            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-571cc416b8c8639d">
            </script>
        </div>
    </header>
    <?php if (isset($sidenav)): ?>
    <nav class="w3-white">
        <?= $sidenav; ?>
    </nav>
    <?php endif; ?>
    <div class="racer-grey w3-row w3-container">
        <div class="w3-auto">
            <div class="w3-right racer-grey w3-card w3-col l2 m12 s12">
                <div>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--                     Leaderboard -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6903556731799787"
                        data-ad-slot="9814065751" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            <div class="w3-left w3-row-padding w3-col l10 m12 s12">
                <?php if (\Session::get_flash('success')): ?>
                <div class="alert alert-success">
                    <strong>Success</strong>
                    <p>
                        <?= implode('</p><p>', e((array) \Session::get_flash('success'))); ?>
                    </p>
                </div>
                <?php endif; ?>
                <?php if (\Session::get_flash('error')): ?>
                <div class="alert alert-danger">
                    <strong>Error</strong>
                    <p>
                        <?= implode('</p><p>', e((array) \Session::get_flash('error'))); ?>
                    </p>
                </div>
                <?php endif; ?>
                <div class="w3-row w3-white">
                    <?= $content; ?>
                    <?= (isset($content2) ? $content2 : ""); ?>
                    <?= (isset($content3) ? $content3 : ""); ?>
                    <?= (isset($content4) ? $content4 : ""); ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="racer-blue">
            <div class="w3-auto">
                <div style="height: inherit" class="racer-blue">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--                     Footer -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6903556731799787"
                        data-ad-slot="9149427751" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
        <div class="racer-gold">
            <div class="w3-auto"> © 2007-<?=date("Y");?> RacerHistory.com &amp; Patrick Foltz. All Rights Reserved.
                </br>
                RacerHistory.com is not the official website of Murray State University Athletics and is not sanctioned
                by the university or athletic department.</br>
                <p>Powered by <a href="https://fuelphp.com">FuelPHP</a> </p>
            </div>
        </div>
    </footer>
    <script>
    function dropNav() {
        var x = document.getElementById("navdrop");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
    </script>
</body>

</html>