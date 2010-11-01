<div class="shopping_cart">
    <?php if ($shoppingCart->isEmpty()): ?>
    <div class="shopping_cart_empty">
        <span>Votre panier est vide</span>
    </div>
    <?php else: ?>
    <div class="shopping_cart_details"><?php echo $shoppingCart->countItems(); ?> items <br />
        <span class="border_cart"></span>Total: 
        <span class="price"><?php echo $shoppingCart->getTotalPrice(); ?>&nbsp;€</span>
    </div>

    <?php endif; ?>

    <div class="shopping_cart_icon">
        <a href="<?php echo url_for('cart_show'); ?>" >
            <img src="/images/shoppingcart.png" alt="" title="" width="35" height="35" border="0" />
        </a>
    </div>
</div>