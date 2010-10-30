<?php include_component('menu', 'left'); ?>
<div class="center_content">
    <div id="item_fact_sheet">
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
            </ul>
        </div>
        <div class="item_description">
            <h3>Description</h3>
            <p><?php echo str_replace("[br]","<br />",$item->getDescription()); ?></p>
        </div>
    </div>
</div>
<div class="item_order">
    <div class="item_order_title">Commande</div>
    <div class="item_order_prix">
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
                <form id="search" action="/Accueil/Recherche/">
                    <fieldset>
                        <input id="champRecherche" name="q" type="text" accesskey="4" value="" class="box" />
                        <input type="submit" value="Ajouter au panier" class="button_add_shoppingcart" />
                    </fieldset>
                </form>
            </li>
        </ul>
    </div>
</div>


<!--<a href="<?php //echo url_for('item/index') ?>">List</a>-->
