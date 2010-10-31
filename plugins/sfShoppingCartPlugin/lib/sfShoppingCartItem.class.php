<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *  Cette classe représente un article du panier (shopping cart)
 *
 * @author     Sadaoui Julien <julien.sadaoui@gmail.com>
 */
class sfShoppingCartItem
{
    private $_id;
    private $_quantity;
    private $_price;
    private $_weight;
    private $_class;

    /**
     *  Retourne l'identifiant unique du produit
     *
     * @return integer identifiant unique du produit
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     *  Modifie l'identifiant unique du produit
     *
     * @param integer $id identifiant unique du produit
     */
    public function setId ($id)
    {
        $this->_id = $id;
    }

    /**
     *  Retourne la class de l'article
     */
    public function getClass ()
    {
        return $this->_class;
    }

    /**
     *  Modifie la class de l'article
     *
     *  @param string $class
     */
    public function setClass ($class)
    {
        $this->_class = $class;
    }

    
    /**
     *  Retourne la quantité 
     *
     * @return integer
     */
    public function getQuantity ()
    {
        return $this->_quantity;
    }

    /**
     *
     * @param integer $quantity
     */
    public function setQuantity ($quantity)
    {
        $this->_quantity = $quantity;
    }
    
    /**
     *  Retourne le prix du produit
     *
     * @return float prix du produit
     */
    public function getPrice ()
    {
        return $this->_price;
    }

    /**
     *  Modifie le prix du produit
     *
     * @param float $price prix du produit
     */
    public function setPrice ($price)
    {
        $this->_price = $price;
    }

    /**
     *  Retourne le poids du produit
     *
     * @return float poids du produit
     */
    public function getWeight ()
    {
        return $this->_weight;
    }

    /**
     *  Modifie le poids du produit
     *
     *  @param float poids du produit
     */
    public function setWeight ($weight)
    {
        $this->_weight = $weight;
    }
}

?>
