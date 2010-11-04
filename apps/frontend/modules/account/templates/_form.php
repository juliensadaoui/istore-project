<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php
        if ($form->getObject()->isNew()) echo url_for('account_create');
        else echo url_for('account_update', $form->getObject());?>" method="post">
 <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

    <div id="container_account">
        <div class="title">Identifiants</div>
        <div class="container_content">

            <ul>

            <?php if ($form->hasGlobalErrors()): ?>
                <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
                <li class='error'><?php echo $error ?></li>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php foreach ($form as $widget): ?>

            <?php if (strchr('Nom* :',$widget->renderLabelName())): ?>
            </ul>
        </div>
        <div class="title">Informations personnelles</div>
        <div class="container_content">
        <ul>
            <?php elseif (strchr('Adresse* :',$widget->renderLabelName())): ?>
            </ul>
        </div>

            <?php if ($form->getObject()->isNew()): ?>
    </div>

    <div id="container_address">
            <?php endif; ?>
        <div class="title">Adresse</div>

        <div id="container_address_content">
            <ul>
            <?php endif; ?>

            <?php if ($widget->hasError()): ?>
                <li class='error'><span><?php echo $widget->getError(); ?></span></li>
            <?php endif; ?>
            <?php if (!$widget->isHidden()): ?>
                <li><span> <?php echo $widget->renderLabel(); ?> <?php echo $widget->renderHelp() ?> </span>
            <?php echo $widget->render() ?>
                </li>
            <?php else: ?>
            <?php echo $widget->render() ?>

            <?php endif; ?>
            <?php endforeach; ?>
            </ul>

        </div>

        <div class="title"><?php echo (($form->getObject()->isNew()) ? 'Valider votre inscription' : 'Enregistrer vos modification'); ?></div>
        <div class="container_content">
            <ul>
                <li>
            <p><input type="submit" id='submit' value="<?php echo (($form->getObject()->isNew()) ? 'S\'inscrire' : 'Modifier'); ?>" /></p>
                </li>
            </ul>
        </div>
    </div>
</form>
