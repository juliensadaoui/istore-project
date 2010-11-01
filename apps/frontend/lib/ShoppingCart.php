<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *  Cette classe représente le panier virtuel spécifique à l'application IStore.
 *      Elle étend la classe sfShoppingCart du plugin sfShoppingCartPlugin.
 *
 *  Le plugin sfShoppingCartPlugin fournit les fonctionnalités de base d'un
 *      panier virtuel
 *
 * @author julien
 */
class ShoppingCart extends sfShoppingCart
{
    /**
     *  Recupére un article du panier virtuel
     *
     * @param <type> $id
     */
    public function  getItem($id, $class = 'ShoppingCartItem')
    {
        return parent::getItem($id, $class);
    }

    /**
     *  Supprime un article du panier virtuel
     *
     * @param <type> $id
     */
    public function  removeItem($id, $class = 'ShoppingCartItem')
    {
        parent::removeItem($id, $class);
    }
}
?>
