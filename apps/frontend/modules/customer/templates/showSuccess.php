<div class="crumb_navigation">
    Navigation:
        <a href="<?php echo url_for('@homepage') ?>"> Home ></a>
        <a href="<?php echo url_for('@account_show') ?>"> Mon compte ></a>
        <span class="current"><a href="#">Mon compte client</a></span>
</div>


<div id="menu_customer">
    <div id="menu_account">
        <div class="menu_customer_img">
        </div>
        <div class="menu_customer_text">
        </div>
    </div>

    <div id="menu_order">
        <div class="menu_customer_img">
        </div>
        <div class="menu_customer_text">
        </div>
    </div>
</div>

<div id="center_content_customer">
    <p>
        <span>Gestion de mon compte client :</span><br /><br />
            Vous souhaitez consulter ou modifier vos informations personnelles. Vous vous voulez modifier votre adresse de facturation/livraison ?
            Vous avez une nouvelle adresse e-mail ? L'interface de gestion de client vous permet de modifier toutes les informations de votre compte client.
    </p>

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
                        <td class="field">Nom d'utilisateur : </td><td><?php echo $user->getUsername(); ?></td>
                    </tr>
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
                    <tr>
                        <td class="field">Date de naissance : </td><td><?php echo $user->getProfile()->getDateOfBirth() ?></td>
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
</div>