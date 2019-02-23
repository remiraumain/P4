<!DOCTYPE html>
<html>
    <head>
        <title>
            <?= isset($title) ? $title : 'Jean Forteroche' ?>
        </title>

        <meta charset="utf-8" />

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="/materialize/css/materializeAddsOn.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8pfy2ce1w2wznu2sl4peivm2990w6ck75m8ozvipust9m6kn"></script>
        <script src="/tinymce/tinymceAddsOn.js"></script>
    </head>

    <body>
        <div id="wrap">
            <header>

                <div class="navbar-fixed">
                    <nav>
                        <div class="nav-wrapper blue darken-4">
                            <a class="brand-logo" href="/">Jean Forteroche</a>
                            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <ul class="right hide-on-med-and-down">
                                <li><a href="/">Accueil</a></li>
                                <!-- Dropdown Trigger -->
                                <li><a class="dropdown-trigger" href="/billets.html" data-target="dropdown">Chapitres<i class="material-icons right">arrow_drop_down</i></a></li>
                                <?php if ($user->isAuthenticated()) { ?>
                                    <li><a href="/admin/">Admin</a></li>
                                    <li><a href="/admin/billet-insert.html">Ajouter un billet</a></li>
                                    <li><a href="/admin/disconnect.html">Déconnexion</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Dropdown Structure -->
                <ul id="dropdown" class="dropdown-content">
                    <?php foreach ($listeBillets as $billet) { ?>
                        <li><a href="/billet-<?= $billet['id'] ?>.html"><?= $billet['titre'] ?></a></li>
                    <?php } ?>
                </ul>
                <ul id="dropdown1" class="dropdown-content">
                    <?php foreach ($listeBillets as $billet) { ?>
                        <li><a href="/billet-<?= $billet['id'] ?>.html"><?= $billet['titre'] ?></a></li>
                    <?php } ?>
                </ul>
                <!-- Sidenav Structure -->
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="/">Accueil</a></li>
                    <li><a class="dropdown-trigger" href="/billets.html" data-target="dropdown1">Chapitres<i class="material-icons right">arrow_drop_down</i></a></li>
                    <?php if ($user->isAuthenticated()) { ?>
                        <li><a href="/admin/">Admin</a></li>
                        <li><a href="/admin/billet-insert.html">Ajouter un billet</a></li>
                        <li><a href="/admin/disconnect.html">Déconnexion</a></li>
                    <?php } ?>
                </ul>

            </header>

            <div id="content-wrap" class="container">
                <section id="main" class="row">
                    <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

                    <?= $content ?>
                </section>
            </div>

            <footer></footer>
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="/materialize/js/materializeAddsOn.js"></script>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="/masonry/js/masonryAddsOn.js"></script>

    </body>
</html>