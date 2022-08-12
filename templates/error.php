<?php $title = "Le blog de Vinc"; ?>

<?php ob_start(); ?>
<h1>Le super blog de Vinc !</h1>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>