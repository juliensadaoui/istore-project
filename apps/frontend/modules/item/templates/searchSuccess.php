<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <span class="current">
            <a href="#"> Recherche</a>
        </span>
</div>
<?php // include_component('menu', 'left', array('category' => null)); ?>
<div class="center_content">
    <!--<div class="homepage_title">-->
    <h1>Résultat de votre recherche</h1>

    <?php if ($items->count() !== 0): ?>
        <div class="items_count"><?php echo $items->count(); ?> 
                article<?php echo (($items->count() === 1) ? '' : 's' ); ?>
                correspondent à votre recherche</div>
        <?php include_partial('item/list', array('items' => $items)) ?>

    <?php else: ?>
        <div class="items_count">Aucun article ne correspond à votre recherche</div>
    <?php endif; ?>
</div>
