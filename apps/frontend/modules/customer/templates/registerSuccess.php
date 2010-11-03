<?php //include_partial('form', array('form' => $form)) ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="center_content">
    <form action="<?php echo url_for('customer/create'); ?>" method="post">
        <fieldset>
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
            </div>
            <div id="container_address">
                <div class="title">Adresse</div>

                <div class="container_content">
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

        <div class="title">Valider votre inscription</div>
        <div class="container_content">
            <ul>
                <li>
            <p><input type="submit" id='submit' value="<?php echo 'Register'; ?>" /></p>
                </li>
            </ul>
        </div>
    </div>

    </fieldset>
    </form>
</div>

