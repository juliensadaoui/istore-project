<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <a href="<?php echo url_for('category', $item->getIStoreCategory()); ?>"><?php echo $item->getIStoreCategory(); ?> ></a>
        <span class="current">
            <a href="<?php echo url_for('item', $item); ?>"><?php echo $item; ?></a>
        </span>
</div>

<?php include_component('menu', 'left', array('category' => $item->getIStoreCategory())); ?>

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

        <?php $details = IStoreItem::formatDetails($item->getDetails()); ?>
        <?php if (count($details) !== 0): ?>
        <div class="item_details" >
            <h3>Fiche technique</h3>
            <table>
                <tbody>
                    <?php foreach ($details as $caract): ?>
                    <tr>
                        <td class="item_caract_name"><?php echo $caract['name']; ?></td>
                        <td class="item_caract_value"><?php echo $caract['value']; ?></td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <?php endif; ?>
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
                 <form method="post" action="<?php echo url_for('@cart_add?id=' . $item->getId() . '&sf_method=post'); ?>">
                    <fieldset>
                        <label>Quantité&nbsp;:</label><input name="quantity" value="1" type="text" accesskey="4" class="item_quantity_input" />
                         <input type="submit" value="" class="add_shoppingcart_input" />
                    </fieldset>
                </form>-->
            </li>
        </ul>
    </div>
</div>


<!--<a href="<?php //echo url_for('item/index') ?>">List</a>-->
