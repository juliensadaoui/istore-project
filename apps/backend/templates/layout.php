
<!--      <a href="item"><img src="/images/item.gif"/></a> <a href="brand"><img src="/images/brand.gif"/></a><a href="addre"><img src="/images/address.gif"/></a>
      <a href="category"><img src="/images/category.gif"/></a><a href="comment"><img src="/images/comment.gif"/></a>
      <a href="creditcard"><img src="/images/creditcard.gif"/></a><a href="customer"><img src="/images/customer.gif"/></a>
      <a href="order"><img src="/images/order.gif"/></a><a href="orderline"><img src="/images/orderline.gif"/></a>-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Interface d'administration du site</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1>
          <a href="<?php echo url_for('homepage') ?>">
            Interface d'administration du site
          </a>
        </h1>
      </div>
      <?php if ($sf_user->isAuthenticated()): ?>
      <div id="menu">
        <ul>
          <li>
            <?php echo link_to('Article', 'i_store_item') ?>
          </li>
          <li>
            <?php echo link_to('Catégorie', 'i_store_category') ?>
          </li>
          <li>
            <?php echo link_to('Marque', 'i_store_brand') ?>
          </li>
          <li>
            <?php echo link_to('Commande', 'i_store_order') ?>
          </li>
           <li>
            <?php echo link_to('Compte client', 'sf_guard_user') ?>
          </li>
            <li><?php echo link_to('Logout', 'sf_guard_signout') ?></li>
        </ul>
      </div>
      <?php endif ?>

      <div id="content">
        <?php echo $sf_content ?>
      </div>

      <div id="footer">
        <img src="/images/logo.png" height="200px" width="200px" />
      </div>
    </div>
  </body>
</html>