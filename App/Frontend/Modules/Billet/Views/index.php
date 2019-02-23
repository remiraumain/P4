
<div class="row">
<?php
$billet = current($listeBillets);
$banniere = $imageManager->getFrom($billet['id']);
    ?>
    <h2 class="z-depth-4 center-align">Mon dernier billet</h2>
    <div class="col l8 m6 offset-l2">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="<?= $banniere['location'] ?>">
                <div class="card-custom activator">
                    <h2 class="white-text font-custom center-align activator"><?= $billet['titre'] ?></h2>
                </div>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?= $billet['titre'] ?><i class="material-icons right">close</i></span>
                <p><?= $billet['contenu'] ?></p>
                <p><a class="waves-effect waves-light btn" href="/billet-<?= $billet['id'] ?>.html">Lire</a></p>
            </div>
        </div>
    </div>

</div>

<p>Holy crap, Morty, run! Run for your life, Morty, run! I-I've never seen that thing before in my life, Morty, I don't even know what the hell it is! We-we gotta get out of here, Morty, it's gonna kill us! We're gonna die, Morty! We're gonna die! Go home and drink, grandpa. What, I'm gonna touch it, and you're gonna tell me it's an alien dick or something? Want to piss on him?

Hi! I'm Mr Meeseeks! Look at me! Sometimes science is a lot more art, than science. A lot of people don't get that. Listen, Morty, I hate to break it to you but what people call "love" is just a chemical reaction that compels animals to breed. It hits hard, Morty, then it slowly fades, leaving you stranded in a failing marriage. I did it. Your parents are gonna do it. Break the cycle, Morty. Rise above. Focus on science. This is because you give Morty Smith bad grades, bitch!</p>

