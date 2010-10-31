<?php include_component('menu', 'left'); ?>
<div class="center_content">
    <div id="item_container_center">
        <div class="item_image">
            <img title="<?php echo $item->getName(); ?>" alt="" src="/images/item/<?php echo $item->getImage(); ?>.jpg" width="200" height="200" />
        </div>
        <div class="item_header">
            <h1><?php echo $item->getName(); ?></h1>
            <h2><?php echo $item->getShortDescription(); ?></h2>

            <ul>
                <li>
                    <span>Pour en savoir plus&nbsp:</span>
                    <a href="<?php echo $item->getIStoreBrand()->getUrl() ?>"><?php echo $item->getIStoreBrand()->getName(); ?></a>
                </li>
                <li>Référencement&nbsp: <?php $date = date_create($item->getCreatedAt()); echo date_format($date, "Y-m-d"); ?></li>
                <li>Date modification&nbsp: <?php $date = date_create($item->getUpdatedAt()); echo date_format($date, "Y-m-d"); ?></li>

            </ul>
        </div>
        <div class="item_description">
            <h3>Description</h3>
            <p><?php echo str_replace("[br]","<br />",$item->getDescription()); ?></p>
        </div>
    </div>
</div>
<div id="item_container_right">
    <div class="title">Commande</div>
    <div class="item_order">
        <ul>
            <li class="item_prix">
                Prix TTC <br/>
                Ecotaxe : 1,00 € TTC<br />
                <span><?php echo $item->getUnitCost(); ?>&nbsp;€</span>
            </li>
            <li class="item_stock">
                <img src="/images/stock_dispo.png" alt="" title="" border="0" width="20" height="20" />
                <br />en stock
            </li>
            <li class="item_shoppingcart">
                <form action="/Accueil/Recherche/">
                    <fieldset>
                        <label>Quantité&nbsp;:</label><input name="q" type="text" accesskey="4" value="1" class="item_quantity_input" />
                        <input type="submit" value="" class="add_shoppingcart_input" />
                    </fieldset>
                </form>
            </li>
        </ul>
    </div>

    <div class="title">Services</div>
    <div class="item_services">
        <ul>
            <li class="item_payment">
                <img src="/images/check-icon.png" alt="check" title="check" border="0" height="60px" width="60px" />
                <img src="/images/paypal-icon.png" alt="paypal" title="paypal" border="0" height="60px" width="60px" /><br />
                <img src="/images/visa-icon.png" alt="visa" title="visa" border="0" height="60px" width="60px" />
                <img src="/images/masterCard-icon.png" alt="masterCard" title="masterCard" border="0" height="60px" width="60px" />
            </li>
            <li class="item_transport">
                <img src="/images/chronopost.gif" alt="chronopost" title="chronopost" border="0" /><br />
                <img src="/images/colissimo.gif" alt="colissimo" title="colissimo" border="0" />
                <img src="/images/ups.gif" alt="ups" title="ups" border="0" />
            </li>
        </ul>
    </div>
</div>


<!--<a href="<?php //echo url_for('item/index') ?>">List</a>-->
