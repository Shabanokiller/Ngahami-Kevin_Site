<nav>
    <h1> Titre </h1>
    <ul>
        <li>Acceuil</li>
        <?php if(!isset($_SESSION["user"])): ?>
            <li><a href="/connexion.php">Connexion</a></li>
            <li><a href="/inscription.php">Inscription</a></li>
        <?php else: ?>
            <li><a href="/deconnexion.php">Deconnexion</a></li>
        <?php endifl ?>
    </ul>
</nav>