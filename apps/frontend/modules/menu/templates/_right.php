<div class="right_content">

    <h3>Newsletter</h3>
    <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">subscribe</a>
     </div>

    <h3>Marques</h3>
    <ul class="left_menu">
        <?php foreach ($brands as $key => $brand) : ?>
        <li class="<?php if (($key % 2) == 0) { echo "odd"; } else { echo "even"; } ?>">
            <a href="<?php echo $brand->getUrl(); ?>"><?php echo $brand->getName(); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>

</div>