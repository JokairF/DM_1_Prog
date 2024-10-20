<?php
$utilisateurs = [];
if (file_exists('utilisateurs.json')) {
    $utilisateurs = lireUtilisateurs();
}
// Lire les données depuis le fichier JSON
function lireUtilisateurs()
{
    $json = file_get_contents('utilisateurs.json');
    return json_decode($json, true);
}

// Enregistrer les données dans le fichier JSON
function enregistrerUtilisateurs($utilisateurs)
{
    $json = json_encode($utilisateurs, JSON_PRETTY_PRINT);
    file_put_contents('utilisateurs.json', $json);
}

// Ajouter un nouvel utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nouvelUtilisateur = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email']
    ];
    $utilisateurs = lireUtilisateurs();
    $utilisateurs[] = $nouvelUtilisateur;
    enregistrerUtilisateurs($utilisateurs);
}

// Supprimer un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {
    $emailASupprimer = $_POST['email'];
    $utilisateurs = lireUtilisateurs();
    $utilisateurs = array_filter($utilisateurs, function ($utilisateur) use ($emailASupprimer) {
        return $utilisateur['email'] !== $emailASupprimer;
    });
    enregistrerUtilisateurs($utilisateurs);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Gestion des Utilisateurs</title>
</head>

<body>
    <h1>Liste des Utilisateurs</h1>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur): ?>
            <tr>
                <td><?php echo htmlspecialchars($utilisateur['nom']); ?></td>
                <td><?php echo htmlspecialchars($utilisateur['prenom']); ?></td>
                <td><?php echo htmlspecialchars($utilisateur['email']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Ajouter un Utilisateur</h2>
    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required />
        <br />
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required />
        <br />
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
        <br />
        <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <h2>Supprimer un Utilisateur</h2>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
        <br />
        <button type="submit" name="supprimer">Supprimer</button>
    </form>
</body>

</html>