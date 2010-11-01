<?php slot('title', sprintf ('Articles de la catégorie %s', $category->getName())) ?>

<?php include_component('menu', 'left'); ?>

<div class="center_content">
    <!--<div class="homepage_title">-->
    <h1><?php echo ucfirst($category); ?></h1>
    <?php if ($category->countActiveItem() != 0): ?>

        <div class="items_count"><?php echo $category->countActiveItem(); ?> articles dans la catégorie</div>
        <?php include_partial('item/list', array('items' => $pager->getResults())) ?>



        <?php if ($pager->haveToPaginate()): ?>

        <div class="pagination">
            
            <div class="pagination_desc">
                page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
            </div>

            
            <!-- first page -->
            <a href="<?php echo url_for('category', $category) ?>?page=1">
                <img src="/images/first-page-icon.png" alt="First page" title="First page"  width="30px" height="30px" />
            </a>
            <!-- previous page -->
            <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getPreviousPage() ?>">
                <img src="/images/previous-page-icon.png" alt="Previous page" title="Previous page" width="30px" height="30px" />
            </a>

        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
            <?php else: ?>
                <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>

            <!-- next page -->
            <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getNextPage() ?>">
                <img src="/images/next-page-icon.png" alt="Next page" title="Next page"  width="30px" height="30px" />
            </a>
            <!-- last page -->
            <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getLastPage() ?>">
                <img src="/images/last-page-icon.png" alt="Last page" title="Last page" width="30px" height="30px" />
            </a>
        </div>
        <?php endif; ?>

        <?php else: ?>
            <div class="items_count">Il n'y a pas d'articles dans cette catégorie.</div>
        <?php endif; ?>
</div>