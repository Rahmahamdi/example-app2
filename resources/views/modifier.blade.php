<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['mail']) || !isset($_SESSION['URL'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: connexion.php");
    exit;
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données soumises du formulaire
    $civilite = $_POST['Civilité'];
    $categorie = $_POST['Catégorie'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $datenaissance = $_POST['datenaissance'];
    $ville = $_POST['Ville'];

    // Mettre à jour les valeurs dans les variables de session
    $_SESSION['Civilité'] = $civilite;
    $_SESSION['Catégorie'] = $categorie;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['mail'] = $mail;
    $_SESSION['tel'] = $tel;
    $_SESSION['datenaissance'] = $datenaissance;
    $_SESSION['Ville'] = $ville;

    // Rediriger vers la page connected.php après la mise à jour
    header("Location: connected.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Modifier les données</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bienvenue.css')}}">
    <link rel="stylesheet" href="{{asset('css/modifier.css')}}">

</head>
<body>
    <header>
    <nav>
            <ul class="left">
            <li>
                        <img src="{{ asset('asset/reseau.png') }}" alt="reseau">
                        <a href="{{ route('\') }}"> Intranet</a>
            </ul>
            <ul class="right">
                <li>
                <a href="{{ route('bienvenue') }}"> 
                    <img src="./asset/liste.svg" alt="liste"> Liste</a>
                    <a href="./modifier.php"><img src="<?php echo $_SESSION['URL']; ?>" class="top"></a>
                    <a href="./src/deconnexion.php">   <img src="./asset/logout.svg" alt="logout"> Déconnexion
</a>
<li>
        
            </ul>
</nav>
    </header>
    <main>
        <h1>Modifier les données</h1>
        <form method="post" action="modifier.php"class="modifier">
        <label>Civilité</label>
<select name="Civilité" id="Civilité">
    <option value="Homme" <?php if($_SESSION['Civilité'] === 'Homme') echo 'selected'; ?>>Homme</option>
    <option value="Femme" <?php if($_SESSION['Civilité'] === 'Femme') echo 'selected'; ?>>Femme</option>
</select>

<label>Catégorie</label>
<select name="Catégorie" id="Catégorie">
    <option value="Client" <?php if($_SESSION['Catégorie'] === 'Client') echo 'selected'; ?>>Client</option>
    <option value="admin" <?php if($_SESSION['Catégorie'] === 'admin') echo 'selected'; ?>>admin</option>
    <option value="Technique" <?php if($_SESSION['Catégorie'] === 'Technique') echo 'selected'; ?>>Technique</option>
    <option value="Marketing" <?php if($_SESSION['Catégorie'] === 'Marketing') echo 'selected'; ?>>Marketing</option>
    <option value="Manager" <?php if($_SESSION['Catégorie'] === 'Manager') echo 'selected'; ?>>Manager</option>
</select>

<label>Nom</label>
<input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" aria-labelledby="Nom"  id="Nom" placeholder="Nom" aria-required="true">

<label>Prénom</label>
<input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" aria-labelledby="Prénom"  id="Prénom" placeholder="Prénom" aria-required="true">
            <label>Mail ou login</label>
            <input type="email" name="mail" value="<?php echo $_SESSION['mail']; ?>" aria-labelledby="email"  id="email" placeholder="Mail Utilisateur" aria-required="true" autofocus>

            <label>Mot de passe</label>
            <input type="password" name="psw" aria-labelledby="password" id="password" placeholder="Mot de passe" aria-required="true">

            <label>Confirmation</label>
            <input type="password" name="pswC" aria-labelledby="password" id="password" placeholder="Mot de passe" aria-required="true">

            <label for="tel">Telephone</label>
            <input type="tel" id="tel" name="tel" value="<?php echo $_SESSION['tel']; ?>" placeholder="Enter Your tel" required>

            <label for="datenaissance">Date de naissance</label>
            <input type="date" id="datenaissance" name="datenaissance" value="<?php echo $_SESSION['datenaissance']; ?>" placeholder="Enter Your Birthdate" required>

            <label>Ville</label>
            <input type="Ville" id="Ville" name="Ville" value="<?php echo $_SESSION['Ville'];?>" placeholder="ville" required>

            <input type="submit" value="Modifier">
        </form>
    </main>
    <footer>
        <!-- Ajoutez votre pied de page personnalisé ici -->
    </footer>
</body>
</html>
