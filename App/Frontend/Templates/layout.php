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
        <link rel="stylesheet" href="/jeanforteroche/Web/materialize/css/materializeAddsOn.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    </head>

    <body>
        <div id="wrap">
            <header>

                <div class="navbar-fixed">
                    <nav>
                        <div class="nav-wrapper blue darken-4">
                            <a class="brand-logo" href="/jeanforteroche">Jean Forteroche</a>
                            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <ul class="right hide-on-med-and-down">
                                <li><a href="/jeanforteroche">Accueil</a></li>
                                <!-- Dropdown Trigger -->
                                <li><a class="dropdown-trigger" href="/jeanforteroche/billets.html" data-target="dropdown">Chapitres<i class="material-icons right">arrow_drop_down</i></a></li>
                                <?php if ($user->isAuthenticated()) { ?>
                                    <li><a href="/jeanforteroche/admin/">Admin</a></li>
                                    <li><a href="/jeanforteroche/admin/billet-insert.html">Ajouter un billet</a></li>
                                    <li><a href="/jeanforteroche/admin/disconnect.html">Déconnexion</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Dropdown Structure -->
                <ul id="dropdown" class="dropdown-content">
                    <?php foreach ($listeBillets as $billet) { ?>
                        <li><a href="/jeanforteroche/billet-<?= $billet['id'] ?>.html"><?= $billet['titre'] ?></a></li>
                    <?php } ?>
                </ul>
                <ul id="dropdown1" class="dropdown-content">
                    <?php foreach ($listeBillets as $billet) { ?>
                        <li><a href="/jeanforteroche/billet-<?= $billet['id'] ?>.html"><?= $billet['titre'] ?></a></li>
                    <?php } ?>
                </ul>
                <!-- Sidenav Structure -->
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="/jeanforteroche">Accueil</a></li>
                    <li><a class="dropdown-trigger" href="/jeanforteroche/billets.html" data-target="dropdown1">Chapitres<i class="material-icons right">arrow_drop_down</i></a></li>
                    <?php if ($user->isAuthenticated()) { ?>
                        <li><a href="/jeanforteroche/admin">Admin/</a></li>
                        <li><a href="/jeanforteroche/admin/billet-insert.html">Ajouter un billet</a></li>
                        <li><a href="/jeanforteroche/admin/disconnect.html">Déconnexion</a></li>
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
        <script type="text/javascript" src="/jeanforteroche/Web/RR/js/Router.js"></script>
        <!--Don't forget materialize script-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="/jeanforteroche/Web/materialize/js/materializeAddsOn.js"></script>

    </body>
</html>