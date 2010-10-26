<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="main_container">
        <div id="header">
              <div class="top_right">
                  <ul id="connexion">
                      <li><a href="">S'inscrire</a></li>
                      <li>|</li>
                      <li><a href="">Mon compte</a></li>
                      <li>|</li>
                      <li><a href="">Newsletter</a></li>
                        <!-- <li>|</li>
                        <li><a href="/Accueil/Aide/">Aide</a></li> -->
                  </ul>

                  <div class="clear">
                      <div class="shopping_cart">
                          <div class="cart_details">3 items <br />
                              <span class="border_cart"></span>Total: <span class="price">350$</span>
                          </div>

			<div class="cart_icon">
                            <a href="#" title="">
                                <img src="images/shoppingcart.png" alt="" title="" width="35" height="35" border="0" />
                            </a>
                        </div>
		</div>

		<form id="search" action="/Accueil/Recherche/">
                    <fieldset>
                        <input id="champRecherche" name="q" type="text" accesskey="4" value="" class="box" />
                        <input type="submit" value="Recherche" class="button_search" />
                    </fieldset>
                </form>
			</div>
              </div>
          </div>

          <div id="main_content">
            <?php include_component('menu', 'main'/*, array('selected_category' => $sf_user->getFlash('selected_category',''))*/); ?>


          <div class="crumb_navigation">
                Navigation: <span class="current">Home</span>

          </div>


            <div class="center_content">
                <?php echo $sf_content ?>
            </div><!-- end of center content -->

            <?php include_component('menu', 'right'); ?>

            </div>




        <div class="footer">
            <div class="left_footer">
                <img src="images/footer_logo.png" alt="" title="" width="89" height="42"/>
            </div>

            <div class="center_footer">
                Template name. All Rights Reserved 2008<br />
           <a href="http://csscreme.com/freecsstemplates/" title="free css templates"><img src="images/csscreme.jpg" alt="free css templates" border="0" /></a><br />
           <img src="images/payment.gif" alt="" title="" />

            </div>
            
            <div class="right_footer">
                <a href="index.html">home</a>
                <a href="details.html">about</a>
                <a href="details.html">sitemap</a>
                <a href="details.html">rss</a>
                <a href="contact.html">contact us</a>
            </div>
        </div>
    </div>
  </body>
</html>
