<?php slot('title', sprintf ('Articles de la catégorie %s', $category->getName())) ?>

<?php include_component('menu', 'left'); ?>

<div class="center_content">
    <!--<div class="homepage_title">-->
    <h2><?php echo ucfirst($category); ?></h2>
    <?php if ($category->countActiveItem() != 0): ?>

        <div class="items_count"><?php echo $category->countActiveItem(); ?> articles dans la catégorie</div>
        <?php include_partial('item/list', array('items' => $category->getActiveItems())) ?>

    <?php else: ?>
        <div class="items_count">Il n'y a pas d'articles dans cette catégorie.</div>
    <?php endif; ?>
</div>