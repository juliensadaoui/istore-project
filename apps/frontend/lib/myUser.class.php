<?php

class myUser extends sfGuardSecurityUser
{
    /**
     *  Recupére la panier virtual de l'utilisateur
     *
     * @return <type>
     */
    public function getShoppingCart()
    {
        if (!$this->hasAttribute('shopping_cart')) {
            $this->setAttribute('shopping_cart', new sfShoppingCart());
        }

        return $this->getAttribute('shopping_cart');
    }

    /**
     *  Recupére tous les articles contenus dans le panier de l'utilisateur
     *
     * @return array() - IStoreItem
     */
    public function getItemShoppingCart()
    {
        // on recupere le panier virtuel
        $shoppingCart = $this->getShoppingCart();

        // on recupere les identifiant de tous les articles
        //      du panier virtuel
        $ids = array();
        foreach ($shoppingCart->getItems() as $shoppingCartItem)
        {
            $ids[] = $shoppingCartItem->getId();
        }

        if (!empty($ids)) {
            return Doctrine_Core::getTable($shoppingCartItem->getClass())
                    ->createQuery('i')
                    ->whereIn('i.id', $ids)
                    ->execute()
            ;
        }

        return array();
    }

}
