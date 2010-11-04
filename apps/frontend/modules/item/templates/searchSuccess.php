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


    <div class="items_count"><?php echo ""; ?> articles correspondent à votre recherche</div>
    <?php include_partial('item/list', array('items' => $items)) ?>
</div>
