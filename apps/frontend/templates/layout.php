<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <title>
            <?php if (!include_slot('title')): ?>
                iStore - Le meilleur du High-Tech dans notre boutique
            <?php endif; ?>
        </title>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
            <div id="main_container">
                <div id="header">
                    <div class="top_right">
                        <ul id="connexion">
                            <li><a href="<?php echo url_for('@register') ?>">S'inscrire</a></li>
                            <li>|</li>
                            <li><a href="">Mon compte</a></li>
                            <li>|</li>
                            <li><a href="">Newsletter</a></li>
                            <!-- <li>|</li>
                            <li><a href="/Accueil/Aide/">Aide</a></li> -->
                        </ul>

                    <div class="clear">
                        <?php include_component('cart', 'encart'); ?>

                        <form id="search" action="/Accueil/Recherche/">
                            <fieldset>
                                <input id="champRecherche" name="q" type="text" accesskey="4" value="" class="box" />
                                <input type="submit" value="Recherche" class="button_search" />
                            </fieldset>
                        </form>
                    </div>
                </div>


                <div id="logo">
                    <a href="<?php echo url_for('@homepage') ?>">
                        <img src="/images/logo.png" alt="" title="" border="0" width="182" height="85" />
                    </a>

                    <a href="index.html"></a>
                </div>
            </div>

            <div id="content">
                <?php include_component('menu', 'main'/* , array('selected_category' => $sf_user->getFlash('selected_category','')) */); ?>

                        <!--            <div class="center_content">-->
                <?php echo $sf_content ?>
                <!--            </div> end of center content -->

            </div>

            <div class="footer">
                <div class="left_footer">
                    <img src="/images/logo.png" alt="" title="" width="89" height="42"/>
                </div>

                <div class="center_footer">
                    Template name. All Rights Reserved 2008<br />
                    <a href="http://csscreme.com/freecsstemplates/" title="free css templates"><img src="images/csscreme.jpg" alt="free css templates" border="0" /></a><br />
                    <!--           <img src="images/payment.gif" alt="" title="" />-->

                </div>

                <div class="right_footer">
                    <a href="<?php echo url_for('@homepage') ?>">home</a>
                    <a href="details.html">about</a>
                    <a href="details.html">sitemap</a>
                    <a href="details.html">rss</a>
                    <a href="contact.html">contact us</a>
                </div>
            </div>
        </div>
    </body>
</html>
