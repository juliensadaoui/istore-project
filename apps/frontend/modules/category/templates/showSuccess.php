<?php include_component('menu', 'left'); ?>
<div class="center_content">
    <!--<div class="homepage_title">-->
    <h2>Catégorie <?php echo $category; ?></h2>
    <!--</div>-->
    <?php include_partial('item/list', array('items' => $category->getActiveItems())) ?>
</div>