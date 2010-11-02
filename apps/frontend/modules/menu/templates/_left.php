<div class="left_content">
    <h3><?php echo $category->getName(); ?></h3>

    <ul class="left_menu">

        <?php foreach ($subCategories as $i => $subCategory): ?>

        <li class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
            <?php echo link_to($subCategory->getName() ,'category', $subCategory); ?>
        </li>
    
        <?php endforeach; ?>
    </ul>
</div>
