<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Cette classe permet de gérer un panier.
 * Chaque article est dans l'objet sfShoppingCartItem
 *
 * @author julien Sadaoui   <julien.sadaoui@gmail.com>
 */
class sfShoppingCart implements sfShoppingCartInterface
{
    // list des articles du panier
    private $_items = array();


    /**
     *  Retourne la clé d'un article dans le tableau $_items
     *      Ce tableau contient les articles du panier
     *
     * @param int $id : identifiant unique de l'artice
     * @param string $class : nom de la classe qui gére l'article
     * @return sfShoppingCartItem : article du panier
     */
    private function getItemKey ($id, $class)
    {
        foreach ($this->_items as $key => $item)
        {
            if ($item->getId() == $id && $item->getClass() == $class)
            {
                return $key;
            }
        }
        return null;
    }

    /**
     *  Retourne tous les articles du panier
     *
     * @return array() 
     */
    public function getItems()
    {
        $items = array();

        foreach ($this->_items as $item)
        {
            $items[] = $item;
        }
        return $items;
    }

    /**
     *  Retourne un article du panier ou null il n'est pas toruvé
     *
     * @param integer $id  identifiant unique de l'article
     * @param string $class  class de l'article
     * @return sfShoppingCart
     */
    public function getItem ($id, $class)
    {
        $key = $this->getItemKey($id, $class);

        return (($key !==  null) ? $this->_items[$key] : null);
    }

    /**
     *  Ajoute un article au panier
     *
     * @param sfShoppingCart $item  article à ajouter au panier
     */
    public function addItem (sfShoppingCartItem $item)
    {
        $found = $this->getItemKey($item->getId(), $item->getClass());

        if ($found === null) {
            $this->_items[] = $item;
        }
    }

    /**
     *  Supprime un article du panier
     *
     * @param <type> $id  identifiant unique de l'article
     * @param <type> $class  class de l'article
     */
    public function removeItem($id, $class)
    {
        $key = $this->getItemKey($id, $class);

        if ($key !== null) { unset($this->_items[$key]); }
    }

    /**
     *  Retourne true si le panier est vide, false autrement
     *
     * @return <type>
     */
    public function isEmpty()
    {
        return (($this->countItems() ==  0) ? true :  false );
    }

    /**
     *  Supprime tous les éléments du panier
     */
    public function clear ()
    {
        $this->_items = array();
    }

    /**
     *  Retourne le nombre d'articles du tableau
     *
     * @param $quantity boolean   compte avec la quantité de l'article si true
     * @return integer
     */
    public function  countItems ($quantity = false)
    {
        if ($quantity) {
            $count = 0;
            foreach ($this->_items as $item)
            {
                $count += $item->getQuantity();
            }
            return $count;
        }

        return count($this->_items);
    }

    /**
     *  Retourne le prix total du panier
     *
     *  @return float
     */
    public function getTotalPrice ()
    {
        $price = 0;

        foreach ($this->_items as $item)
        {
            $price += ($item->getTotalPrice ());
        }
        return $price;
    }

    /**
     *  Retourne le poids total du panier
     *
     * @return float
     */
    public function  getTotalWeight()
    {
        $weight = 0;

        foreach ($this->_items as $item)
        {
            $weight += ($item->getQuantity() * $item->getWeight());
        }

        return $weight;
    }
}
?>
