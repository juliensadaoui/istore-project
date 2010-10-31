<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sfShoppingCartInterface
 *
 * @author julien
 */
interface sfShoppingCartInterface
{
    public function getItem($id, $class);
    public function addItem (sfShoppingCart $item);
    public function removeItem ($id, $class);
    public function isEmpty();
    public function clear();
    public function getTotal();
    public function getTotalPrice();
    public function getTotalWeight();
}
?>
