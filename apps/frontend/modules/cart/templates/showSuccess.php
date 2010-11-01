<div id="cart">
    <div class="cart_title">
        <img src="/images/full-shopping-cart-icon.png" alt="full-shopping-cart" height="120px" width="120px" />
        <br /><span>Mon panier</span>
    </div>


    <table class="cart_items">
        <?php $headers = array("", "Category", "Nom", "Stock", "Quantité", "Prix Unitaire", "Montant", ""); ?>
        <thead>
            <tr class="header">
                <?php foreach ($headers as $header): ?>
                    <th><?php echo $header; ?></th>
                <?php endforeach; ?>
                </tr>
        </thead>
        <tbody>
            <tr>
                <?php for ($i = 0; $i < count($headers); $i++) : ?>
                        <td class="headerline"></td>
                <?php endfor; ?>
            </tr>

            <?php foreach ($items as $i => $item): ?>
                <?php $cartItem = $shoppingCart->getItem($item->getId());  ?>
            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">

                  <td class="image">
                      <img src="/images/item/<?php echo $item->getImage(); ?>_s.jpg" alt="<?php echo $item->getImage(); ?>" title="<?php echo $item->getImage(); ?>" border="0" width="60" height="60" />
                  </td>
                <td class="category"><?php echo $item->getIStoreCategory(); ?></td>
                <td class="name"><?php echo $item->getName(); ?></td>
                 <td class="stock">
                    <img src="/images/stock_dispo.png" alt="" title="" border="0" width="20" height="20" /><br />en stock
                </td>
                <td class="quantity">
                      <img src="/images/add-icon.png" alt="add" title="add" border="0" width="20" height="20" />
                        <?php echo $cartItem->getQuantity(); ?>
                      <img src="/images/delete-icon.png" alt="delete" title="delete" border="0" width="20" height="20" /> 
                </td>
                <td class="price">
                    <?php echo $item->getUnitCost(); ?>&nbsp;€
                </td>
                <td class="price">
                    <?php echo $cartItem->getTotalPrice(); ?>&nbsp;€
                </td>
                <td>
                    <img src="/images/remove-icon.png" alt="remove" title="remove" border="0" width="20" height="20" />
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>