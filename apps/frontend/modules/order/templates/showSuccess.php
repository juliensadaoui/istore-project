<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <a href=""> Commande ></a>
        <span class="current">
            <a href=""> Récapitulatif</a>
        </span>
</div>


<?php /* récupere les variables avant l'affichage */
    $value = $user->getProfile()->getCivility();
    $civility = Doctrine::getTable('IStoreCustomer')->getCivilityTypes();
    $address = $user->getAddress();
?>
<div class="center_content">
    <div id="cart">
        <h1>
            Votre commande est complète
        </h1>
        <!-- Informations sur la commande est le client -->
        <div class="items_count">
            Le numéro de la commande est <?php echo $order->getId(); ?><br />
            Le prix total de votre commande est de <?php echo $order->getTotalPrice(); ?>&nbsp;€<br /><br />

            <?php

            echo  $civility[$value] . ' ' . ucfirst($user->getLastName()) . ' ' . $user->getFirstName() . '<br />'
                    . $address->getStreet() . '<br />' .
                    $address->getZipcode() . ' ' . $address->getCity() . ' - ' . $address->getCountry() . '<br />';

            ?>
        </div>

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


                 <!--   Liste des lignes de la commande sous forme de tableau -->
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
        <div class="items_count">      
            <br/>Un court e-mail de confirmation a été envoyé à :
                    <?php echo $user->getEmailAddress(); ?> <br /><br />
                 Merci de votre achat sur i-store.
        </div>
    </div>
</div>

<?php include_partial('cart/serv') ?>
