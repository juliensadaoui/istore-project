<div class="crumb_navigation">
    Navigation: <span class="current"><?php echo $category->getName(); ?></span>
</div>

<div class="left_content">
    <h3><?php echo $category->getName(); ?></h3>

    <ul class="left_menu">

        <?php foreach ($subCategories as $subCategory): ?>

        <li class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
            <a href="<?php url_for('item/show?id='. $subCategory->getId()) ?>"><?php echo $subCategory->getName(); ?></a>
        </li>
    
        <?php endforeach; ?>
    </ul>
</div>
