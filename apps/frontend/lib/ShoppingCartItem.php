<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *  Cette classe représente un article du panier virtuel spécifique
 *      à l'application IStore. Elle étend la classe sfShoppingCartItem
 *      du plugin sfShoppingCartPlugin.
 *
 *  Le plugin sfShoppingCartPlugin fournit les fonctionnalités de base d'un
 *      panier virtuel
 *
 * @author julien
 */
class ShoppingCartItem extends sfShoppingCartItem
{
    public function  __construct($id)
    {
        $this->setId($id);
        $this->setClass('ShoppingCartItem');
    }
}
?>
