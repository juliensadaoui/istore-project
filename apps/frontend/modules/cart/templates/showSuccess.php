<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <span class="current">
            <a href="<?php echo url_for('@cart_show'); ?>"> Panier</a>
        </span>
</div>

<div class="center_content">
    <div id="cart">
        <h1>
            Mon panier
        </h1>

        <?php if ($shoppingCart->isEmpty()): ?>
            <div class="cart_empty">
                <img src="/images/empty-shopping-cart-icon.png" alt="empty-shopping-cart" height="220px" width="220px" />
                <br /><span>Votre panier est vide !</span>
            </div>

        <?php else: ?>
                <div class="items_count">
                    <?php $countItems = $shoppingCart->countItems(true); echo $countItems;  ?>
                    article<?php echo (($countItems == 1) ? "" : "s"); ?> dans votre panier</div>

                <table class="cart_items">
                    <?php $headers = array("", "Category", "Nom", "Stock", "Quantité", "Prix Unitaire", "Montant", "Clear"); ?>
                    <thead>
                        <tr class="header">
                            <?php foreach ($headers as $header): ?>
                                <?php if ($header === "Clear"): ?>
                                <th>
                                    <form method="post" action="<?php echo url_for('@cart_clear?sf_method=post'); ?>">
                                        <fieldset>
                                            <input type="submit" value="" class="remove" />
                                        </fieldset>
                                    </form>
                                </th>
                                <?php else: ?>
                                <th><?php echo $header; ?></th>
                                <?php endif; ?>
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
                        <?php $cartItem = $shoppingCart->getItem($item->getId(), $itemClass); ?>
                            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">

                                    <td class="image">
                                        <img src="/images/item/<?php echo $item->getImage(); ?>_s.jpg" alt="<?php echo $item->getImage(); ?>" title="<?php echo $item->getImage(); ?>" border="0" width="60" height="60" />
                                    </td>
                                    <td class="category"><?php echo $item->getIStoreCategory(); ?></td>
                                    <td class="name">
                                        <a href="<?php echo url_for('item_show_user', $item); ?>">
                                          <?php echo $item->getName() ?><br />
                                            <span class="short_description"><?php echo $item->getShortDescription(); ?></span>
                                        </a>
                                    </td>
                                    <td class="stock">
                                        <img src="/images/stock_dispo.png" alt="" title="" border="0" width="20" height="20" /><br />en stock
                                    </td>
                                    <td class="quantity">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <form method="post" action="<?php echo url_for('@cart_update?id=' . $item->getId() . '&operation=decremente&sf_method=post'); ?>">
                                                            <fieldset>
                                                                <input type="submit" value="" class="delete" />
                                                            </fieldset>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <span><?php echo $cartItem->getQuantity(); ?></span>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="<?php echo url_for('@cart_update?id=' . $item->getId() . '&operation=incremente&sf_method=post'); ?>">
                                                            <fieldset>
                                                                <input type="submit" value="" class="add" />
                                                            </fieldset>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="price">
                                <?php echo $item->getUnitCost(); ?>&nbsp;€
                                    </td>
                                    <td class="price">
                                <?php echo $cartItem->getTotalPrice(); ?>&nbsp;€
                                    </td>
                                    <td>
                                        <form method="post" action="<?php echo url_for('@cart_delete?id=' . $item->getId() . '&sf_method=post'); ?>">
                                            <fieldset>
                                                <input type="submit" value="" class="remove" />
                                            </fieldset>
                                        </form>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                                    </tbody>
                    </table>

                <div class="cart_full_image">
                    <img src="/images/full-shopping-cart-icon.png" alt="full-shopping-cart" height="140px" width="140px" />
                </div>
                
                <div class="cart_container_total">
                    <div class="title">Total de la commande</div>
                    <div class="price_total">
                        <?php echo $shoppingCart->getTotalPrice(); ?>&nbsp;€
                    </div>

                    <div class="order">
                        <form method="get" action="">
                            <input type="submit" value="Commander" />
                        </form>
                    </div>
                </div>

        <?php endif; ?>
    </div>
</div>
<div id="cart_container_right">

    <div class="title">Services</div>
    <div class="services">
        <ul>
            <li class="debit">
                <table> <tbody>
                    <tr>
                        <td class="service_image"><img src="/images/credit-cards-icon.png" alt="credit-card" title="credit-card" border="0" height="40px" width="40px" /></td>
                        <td class="service_desc"><span>Débit</span><br /> à l'expédition</td>
               </table> </tbody>
            </li>
        </ul>
        <ul>
            <li class="expedition">
                <table> <tbody>
                    <tr>
                        <td class="service_image"><img src="/images/expedition-icon.png" alt="expedition" title="expedition" border="0" height="40px" width="40px" /></td>
                        <td class="service_desc"><span>Expédition</span><br /> de 24h à 48h</td>
               </table> </tbody>
            </li>
        </ul>
        <ul>
            <li class="securite">
                <table> <tbody>
                    <tr>
                        <td class="service_image"><img src="/images/paiement-secu-icon.png" alt="paiement-secu" title="paiement-secu" border="0" height="40px" width="40px" /></td>
                        <td class="service_desc"><span>Paiement</span><br /> 100% Sécurisé</td>
               </table> </tbody>
            </li>
        </ul>
        <ul>
            <li class="payment">
                <img src="/images/check-icon.png" alt="check" title="check" border="0" height="60px" width="60px" />
                <img src="/images/paypal-icon.png" alt="paypal" title="paypal" border="0" height="60px" width="60px" /><br />
                <img src="/images/visa-icon.png" alt="visa" title="visa" border="0" height="60px" width="60px" />
                <img src="/images/masterCard-icon.png" alt="masterCard" title="masterCard" border="0" height="60px" width="60px" />
            </li>
            <li class="transport">
                <img src="/images/chronopost.gif" alt="chronopost" title="chronopost" border="0" /><br />
                <img src="/images/colissimo.gif" alt="colissimo" title="colissimo" border="0" />
                <img src="/images/ups.gif" alt="ups" title="ups" border="0" />
            </li>
        </ul>
    </div>
</div>
