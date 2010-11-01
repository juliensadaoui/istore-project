<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *  Interface fournissant les services du panier. Il est permet d'implémenter
 *      cette interface pour personnaliser son panier.
 *
 * @author julien
 */
interface sfShoppingCartInterface
{
    public function getItem($id, $class);
    public function addItem (sfShoppingCartItem $item);
    public function removeItem ($id, $class);
    public function isEmpty();
    public function clear();
    public function getTotal();
    public function getTotalPrice();
    public function getTotalWeight();
}
?>
