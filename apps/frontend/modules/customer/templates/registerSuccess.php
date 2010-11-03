<?php //include_partial('form', array('form' => $form)) ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div id="container_create_account">
    <div class="title">Créer un compte client</div>
    <div id="container_content">
        <form action="<?php echo url_for('customer/create'); ?>" method="post">
            <fieldset>
		<legend></legend>
		<ul>

			<?php if ($form->hasGlobalErrors()): ?>
                    <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
                     <li class='error'><?php echo $error ?></li>
                    <?php endforeach; ?>
			<?php endif; ?>

			<?php foreach ($form as $widget): ?>

			<?php if ($widget->hasError()): ?>
			   <li class='error'><span><?php echo $widget->getError(); ?></span></li>
			<?php endif; ?>

			<?php if (!$widget->isHidden()): ?>
                           <li><span> <?php echo $widget->renderLabel(); ?> <?php echo $widget->renderHelp() ?> </span> <?php echo $widget->render() ?>

                           </li>
			 <?php else: ?>
			 	<?php echo $widget->render() ?>


                    <?php endif; ?>
                    <?php endforeach; ?>
		</ul>
		<p><input type="submit" id='submit' value="<?php echo 'Register'; ?>" /></p>
            </fieldset>
        </form>
    </div>
</div>


