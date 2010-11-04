<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <a href=""> Commande ></a>
        <span class="current">
            <a href=""> Confirmation</a>
        </span>
</div>

<div class="center_content">

    <h1>Confirmation de la commande</h1>

    <div id="center_content_customer">

        <p>Vous voulez modifier votre adresse de facturation/livraison ? Vos données sont
            incorrectes. Vous pouvez encore modifier votre compte client avant la commande
            avec le lien ci-dessous. Pour poursuivre la commande, il suffit de revalider
            le panier après la modification du compte.<br /><br />

            <a href="<?php echo url_for('account_edit', $user); ?>">Modifier votre compte</a></p>

        <div id="container_account">
            <div class="title">Mes informations personnelles</div>
            <div class="container_content">
                <?php
                    $value = $user->getProfile()->getCivility();
                    $civility = Doctrine::getTable('IStoreCustomer')->getCivilityTypes();
                    ?>
                <table>
                    <tbody>
                         <tr>
                            <td class="field">Adresse email : </td><td><?php echo $user->getEmailAddress(); ?></td>
                        </tr>
                        <tr>
                            <td class="field">Nom de famille : </td><td><?php echo  $civility[$value] . ' ' . $user->getLastName(); ?></td>
                        </tr>
                        <tr>
                            <td class="field">Prenom :</td><td><?php echo $user->getFirstName() ?></td>
                        </tr>
                        <tr>
                            <td class="field">Téléphone : </td><td><?php echo $user->getProfile()->getTelephone(); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php $address = $user->getAddress(); ?>
            <div class="title">Mon adresse </div>
            <div class="container_content">
                <table>
                    <tbody>
                        <tr>
                            <td class="field">Adresse :</td><td><?php echo $address->getStreet(); ?></td>
                        </tr>
                        <tr>
                            <td class="field">Ville : </td><td><?php echo $address->getCity(); ?></td>
                        </tr>
                        <tr>
                            <td class="field">Code postal : </td><td><?php echo $address->getZipcode(); ?></td>
                        </tr>
                        <tr>
                            <td class="field">Pays : </td><td><?php echo $address->getCountry(); ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>


        </div>


        <form action="<?php echo url_for('order_create');?>" method="post">

        <div id="container_credit_card">
            <div class="title">Carte de crédit</div>
            <div class="container_content">

                <ul>

            <?php if ($form->hasGlobalErrors()): ?>
                <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
                <li class='error'><?php echo $error ?></li>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php foreach ($form as $widget): ?>

            <?php if ($widget->hasError()): ?>
                <li class='error'><span><?php echo $widget->getError(); ?></span></li>
            <?php endif; ?>
            <?php if (!$widget->isHidden()): ?>
                <li><span> <?php echo $widget->renderLabel(); ?> <?php echo $widget->renderHelp() ?> </span>
            <?php echo $widget->render() ?>
                </li>
            <?php else: ?>
            <?php echo $widget->render() ?>

            <?php endif; ?>
            <?php endforeach; ?>
                </ul>

            </div>

            <div class="title">Valider votre commande</div>
            <div class="container_content">
                <ul>
                    <li>
                        <p><input type="submit" id='submit' value="Enregistrer" /></p>
                    </li>
                </ul>
            </div>
        </div>
        </form>
    </div>
</div>


<?php include_partial('cart/serv') ?>