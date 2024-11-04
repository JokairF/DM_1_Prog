<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire de Contact</title>
</head>

<body>

    <section id="contact">
        <h1>Formulaire de Contact</h1>
        <form action="" method="POST">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea><br><br>

            <input type="submit" value="Envoyer">
        </form>
    </section>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        echo "<p style='color:red;'>Tous les champs sont obligatoires.</p>";
    } else {
        echo "<h2>Vos informations</h2>";
        echo "<p>Nom: " . htmlspecialchars($name) . "</p>";
        echo "<p>Email: " . htmlspecialchars($email) . "</p>";
        echo "<p>Message: " . nl2br(htmlspecialchars($message)) . "</p>";

        //Bonus: Envoyer email
        $to = $email;
        $subject = "Nouveau message de contact";
        $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        /* CE CODE EST POUR L'ENVOI D'EMAIL VIA GMAIL SMTP AVEC PHPMAILER LIBRARY
        N'étant pas connecté il ne fonctionne pas mais si ont change les paramètres en 
        commentaires donc le email et le mot de passe qui sont autentifier par google workspace
        il fonctionnera correctement
        */


        //require 'path/to/PHPMailer/PHPMailerAutoload.php';
        /*$mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        
        $mail->Username = 'your-email@gmail.com'; // Ajouter une adresse email valide avec 
        google workspace au vu de l'utilisation de gmail en tant que smtp

        $mail->Password = 'your-email-password'; // Fournir le mot de passe de l'adresse email
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress($email);
        $mail->Subject = 'Nouveau message de contact';
        $mail->Body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

        if ($mail->send()) {
            echo "<p style='color:green;'>Votre message a été envoyé avec succès.</p>";
        } else {
            echo "<p style='color:red;'>Une erreur s'est produite lors de l'envoi de votre message.</p>";
        }*/

        if (mail($to, $subject, $body, $headers)) {
            echo "<p style='color:green;'>Votre message a été envoyé avec succès.</p>";
        } else {
            echo "<p style='color:red;'>Une erreur s'est produite lors de l'envoi de votre message.</p>";
        }
    }
}
?>