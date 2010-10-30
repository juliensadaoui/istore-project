<?php include_component('menu', 'left'); ?>
<div class="center_content">
    <!--<div class="homepage_title">-->
    <h2>Catégorie composants</h2>
    <!--</div>-->

    <div id="items">
      <table class="items">
        <?php $headers = array("","Marque","Nom","Prix","Stock",""); ?>
        <thead>
          <tr class="header">
          <?php foreach ($headers as $header): ?>
              <th><?php echo $header; ?></th>
          <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>

          <tr>
            <?php for ($i = 0 ; $i < count($headers) ; $i++) : ?>
                <td class="headerline"></td>
            <?php endfor; ?>
          </tr>

        <?php foreach ($items as $i => $item): ?>
            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
              <td class="image">
                  <img src="/images/item/<?php echo $item->getImage(); ?>_s.jpg" alt="" title="" border="0" width="80" height="80" />
              </td>
              <td class="brand"><?php echo $item->getIStoreBrand()  ?></td>
              <td class="name">
                <a href="<?php echo url_for('item/show?id='.$item->getId()) ?>">
                  <?php echo $item->getName() ?>
                </a>
              </td>
              <td class="prix"><?php echo $item->getUnitCost() ?> €</td>
              <td class="stock"><?php //echo $item->getStock() ?></td>
              <td class="panier">
                   <img src="/images/shoppingcart.png" alt="" title="" border="0" width="30" height="30" />
              </td>
            </tr>
        <?php endforeach; ?>
          </tbody>
      </table>
    </div>
</div>

<!--<a href="//<?php //echo url_for('item/new') ?>">New</a>-->
