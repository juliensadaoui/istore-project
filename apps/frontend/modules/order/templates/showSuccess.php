<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <a href=""> Commande ></a>
        <span class="current">
            <a href=""> Récapitulatif</a>
        </span>
</div>

<div class="center_content">
    <div id="cart">
        <h1>
            Votre commande est complète
        </h1>
                <p>Le numéro de la commande est <?php echo $order->getId(); ?></p>
        <table class="cart_items">
            <?php $headers = array("", "Category", "Nom", "Quantité", "Prix Unitaire", "Montant"); ?>
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
                <?php $orderLines = $order->getOrderLines(); ?>
                <?php foreach ($orderLines as $i => $orderLine): ?>

                <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">

                    <td class="image">
                        <img src="/images/item/<?php echo $orderLine->getIStoreItem()->getImage(); ?>_s.jpg"
                             alt="<?php echo $orderLine->getIStoreItem()->getImage(); ?>" title="<?php echo  $orderLine->getIStoreItem()->getImage(); ?>"
                             border="0" width="60" height="60" />
                    </td>
                    <td class="category"><?php echo $orderLine->getIStoreItem()->getIStoreCategory(); ?></td>
                    <td class="name">
                        <?php echo $orderLine->getIStoreItem()->getName() ?><br />
                        <span class="short_description"><?php echo $orderLine->getIStoreItem()->getShortDescription(); ?></span>
                    </td>

                    <td class="quantity">
                        <span><?php echo $orderLine->getQuantity(); ?></span>
                    </td>

                    <td class="price">
                        <?php echo $orderLine->getIStoreItem()->getUnitCost(); ?>&nbsp;€
                    </td>
                    <td class="price">
                        <?php echo $orderLine->getTotalPrice(); ?>&nbsp;€
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_partial('cart/serv') ?>
