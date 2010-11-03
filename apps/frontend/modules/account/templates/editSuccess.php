
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <a href="<?php echo url_for('@account_show') ?>"> Mon compte ></a>
        <span class="current"><a href="#">Modifier mon compte</a></span>
</div>

<?php include_partial('menu') ?>

<div id="center_content_customer">
    <p>
        <span>Modifier votre compte client :</span><br /><br />
            Cette interface vous permet de modifier toutes les informations de votre compte. Avant de faire une commmande,
                pensez à modifier votre adresse de facturation/livraison si elle est différente de celle indiquée. Vous pouvez
                également modifier votre mot de passe et votre adresse e-mail. Attention, l'adresse e-mail est le seul moyen
                de récupérer son mot de passe !
    </p>

    <div id="container_account">

    <?php include_partial('form', array('form' => $form)) ?>

    </div>
</div>