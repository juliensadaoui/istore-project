<?php

/**
 * cart actions.
 *
 * @package    i-store
 * @subpackage cart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cartActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
        $this->forward404();
  }

    /**
     *  Action 'show' du module 'cart' permettant d'afficher le panier virtuel
     *      de l'utilisateur
     *
     * @param sfWebRequest $request
     */
    public function executeShow(sfWebRequest $request)
    {
        $this->shoppingCart = $this->getUser()->getShoppingCart();
        $this->items = $this->getUser()->getItemShoppingCart();
    }

    /**
     *  Action 'add' du module 'cart' permettant d'ajouter un article
     *      dans le panier virtuel de l'utilisateur
     *
     * @param sfWebRequest $request
     */
    public function executeAdd(sfWebRequest $request)
    {
        if ($this->hasRequestParameter('id')
                && $this->hasRequestParameter('quantity'))
        {
            // on recupere les parametres de la requête
            $id = $request->getParameter('id');
            $quantity = $request->getParameter('quantity');

            // on recupere l'article dans la base de données
            $item = Doctrine::getTable('IStoreItem')->find($id);

            if ($item !== null) {
                // on recupere la panier virtuel stockés dans la session
                $shoppingCart = $this->getUser()->getShoppingCart();

                // si le produit n'existe pas, on l'ajoute au panier
                $shoppingCartItem = $shoppingCart->getItem($id);
                if ($shoppingCartItem ===  null)
                {
                    $shoppingCartItem = new ShoppingCartItem($id);
                    $shoppingCartItem->setQuantity($quantity);
                    $shoppingCartItem->setPrice($item->getUnitCost());
                    $shoppingCart->addItem($shoppingCartItem);
                }
                // si le produit n'existe pas, on l'ajoute au panier
                else
                {
                    $shoppingCartItem->setQuantity($shoppingCartItem->getQuantity() + $quantity);
                }
            }

            // on redirige vers le panier
            $this->forward('cart', 'show');
        }

        $this->forward404();
    }

    /**
     *  Action 'delete' du module 'cart' permettant de supprimer un article
     *      du panier virtuel de l'utilisateur
     *
     * @param sfWebRequest $request
     */
    public function executeDelete(sfWebRequest $request)
    {
        if ($this->hasRequestParameter('id'))
        {
            $id = $request->getParameter('id');

            $shoppingCart = $this->getUser()->getShoppingCart();
            $shoppingCart->removeItem($id);

            // on redirige vers le panier
            $this->forward('cart', 'show');
        }

        $this->forward404();
    }

    /**
     *  Action 'update' du module 'cart' permettant de mettre à jour
     *      la quantité d'un article du panier virtuel de l'utilisateur
     *
     * @param sfWebRequest $request
     */
    public function executeUpdate (sfWebRequest $request)
    {
        if (($this->hasRequestParameter('id'))
                && ($this->hasRequestParameter('operation')))
        {
            $id = $request->getParameter('id');
            $operation = $request->getParameter('operation');

            // on recupere l'article du panier correspondant à l'identifiant
            //      passée en parametre
            $shoppingCart = $this->getUser()->getShoppingCart();
            $shoppingCartItem = $shoppingCart->getItem($id);

            // on verifie que l'identifiant correspond à un panier
            if ($shoppingCartItem !==  null)
            {
                if ($operation === 'incremente') {

                    $shoppingCartItem->setQuantity($shoppingCartItem->getQuantity() + 1);
                }
                else if ($operation === 'decremente') {
                    if ($shoppingCartItem->getQuantity() == 1) {
                        $shoppingCart->removeItem($id);
                    }
                    else {
                        $shoppingCartItem = $shoppingCart->getItem($id);
                        $shoppingCartItem->setQuantity($shoppingCartItem->getQuantity() - 1);
                    }
                }
            }

            // on redirige vers le panier
            $this->forward('cart', 'show');
        }

        $this->forward404();
    }

    /**
     *  Action 'clear' du module 'cart' permettant de vider l'intégralité
     *      du panier virtuel de l'utilisateur
     *
     * @param sfWebRequest $request
     */
    public function executeClear (sfWebRequest $request)
    {
        $shoppingCart = $this->getUser()->getShoppingCart();
        $shoppingCart->clear();

        // on redirige vers le panier
        $this->forward('cart', 'show');
    }

}
