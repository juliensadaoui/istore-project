<div class="crumb_navigation">
    Navigation: <span class="current"><a href="<?php echo url_for('@homepage') ?>">Home</a></span>
</div>

<div class="homepage_content">
<div class="editorial">
    <div class="homepage_title">
        <h2>Editorial</h2>
    </div>
    <img src="/images/editorial_img.png" width="300" height="150" border="0" class="editorial_img" alt="" title="" />

    <div class="editorial_details">
        <div class="editorial_title">I-Store - Le meilleur du High-Tech dans notre boutique </div>
        <div class="editorial_text">
            I-Store est une boutique en ligne spécialisé dans le matériel informatique et les technologies du High-Tech !
            Notre boutique propose les technologies, le design et l'innovation des produits des grands noms de l'électronique.
        </div>
    </div>
</div>

    <div class="homepage_title">
        <h2>Les Nouveautés</h2>
    </div>


 <?php foreach ($newsItems as $newsItem): ?>

<div class="item_box">
    <div class="item_name"><?php echo $newsItem->getName(); ?></div>
    <div class="content_item_box">
        <div class="item_image">
            <a href="<?php echo url_for('item_show_user', $newsItem); ?>">
                <img src="/images/item/<?php echo $newsItem->getImage(); ?>.jpg" alt="" width="120px" height="120px" />
            </a>
        </div>
        <div class="item_price">
            <?php echo $newsItem->getUnitCost(); ?>&nbsp;€
        </div>

        <div class="item_shoppingcart">
            <form method="post" action="<?php echo url_for('@cart_add?id=' . $newsItem->getId() . '&quantity=1&sf_method=post'); ?>">
                <fieldset>
                    <input type="submit" value="" class="add_shoppingcart_input" />
                </fieldset>
            </form>
        </div>

        <div class="item_category">
           <span>>></span> Plus de <?php echo link_to($newsItem->getIStoreCategory(), 'category', $newsItem->getIStoreCategory()); ?>
        </div>
    </div>
</div>
 <?php endforeach; ?>



    <div class="homepage_title">
        <h2>Les baisses de Prix</h2>
    </div>


 <?php   foreach ($updatedItems as $updatedItem): ?>

<div class="item_box">
    <div class="item_name"><?php echo $updatedItem->getName(); ?></div>
    <div class="content_item_box">
        <div class="item_image">
            <a href="<?php echo url_for('item_show_user', $updatedItem); ?>">
                <img src="/images/item/<?php echo $updatedItem->getImage(); ?>.jpg" alt="" width="120px" height="120px" />
            </a>
        </div>
        <div class="item_price">
            <?php echo $updatedItem->getUnitCost(); ?>&nbsp;€
        </div>

        <div class="item_shoppingcart">
            <form method="post" action="<?php echo url_for('@cart_add?id=' . $updatedItem->getId() . '&quantity=1&sf_method=post'); ?>">
                <fieldset>
                    <input type="submit" value="" class="add_shoppingcart_input" />
                </fieldset>
            </form>
        </div>

        <div class="item_category">
           <span>>></span> Plus de <?php echo link_to($updatedItem->getIStoreCategory(), 'category', $updatedItem->getIStoreCategory()); ?>
        </div>
    </div>
</div>
    
    <?php    endforeach; ?>




</div>

<?php include_component('menu', 'right'); ?>
