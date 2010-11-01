<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author julien
 */
class cartComponents extends sfComponents
{
    /**
     *  Affiche l'encart de l'état du panier disponible sur toutes les pages
     */
    public function executeEncart()
    {
        $this->shoppingCart = $this->getUser()->getShoppingCart();
    }
}
?>
