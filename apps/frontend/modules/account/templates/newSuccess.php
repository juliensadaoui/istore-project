
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <span class="current">
            <a href="<?php echo url_for('@register') ?>"> Inscription</a>
        </span>
</div>

<div class="center_content">
    <h1>Créer un compte client</h1>
    <p>
        L'inscription sur i-store permet d'accéder à votre compte personnel et de bénéficier à nombreux services:
            consultation de vos informations personnelles, consultation de l'historique et de l'état de vos commandes,
            modification de vos informations personnelles et de votre adresse ...

        <br /><br />Les champs avec le caractère * sont obligatoires.
    </p>

    <?php include_partial('form', array('form' => $form)) ?>
</div>

