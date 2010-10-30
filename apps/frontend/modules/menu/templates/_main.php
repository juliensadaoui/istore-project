<div class="menu">
    <ul>
<!--      <li class="selected">
          <a href="index.html" class="nav">  Home </a>
          <ul>
              <li><a  href="/">Inscription</a></li>
              <li class="divider"></li>
              <li><a  href="/">Connexion</a></li>
              <li class="divider"></li>
              <li><a  href="/">Autre</a></li>
              <li class="divider"></li>
          </ul>
      </li>-->

      <?php foreach ($categories as $category) : ?>

      <li>
          <a href="#" class="nav"><?php echo $category->getName(); ?> </a>
          <ul>

            <?php foreach ($category->getChildCategories() as $childCategory) : ?>
                <li><?php echo link_to($childCategory->getName() ,'category', $childCategory); ?></li>
                <li class="divider"></li>
            <?php endforeach; ?>
          </ul>
      </li>
      <li class="divider"></li>
      
      <?php endforeach; ?>
  </ul>
</div><!-- end of menu tab -->