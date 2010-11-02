<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class menuComponents extends sfComponents
{
    /**
     *  Action 'main' du composant 'menu'. Ce composant affiche le menu central
     *      affichant l'ensemble des catégories de premier niveau avec leurs
     *      sous-catégories.
     *
     * @param sfWebRequest $request
     */
    public function executeMain(sfWebRequest $request)
    {
        $this->categories = Doctrine::getTable('IStoreCategory')->getFirstLevel();
    }

    /**
     *  Action 'right' du composant 'menu'. Ce composant affiche le menu de droite
     *      de la page d'acceuil affichant la liste des marques les plus recente.
     */
    public function executeRight(sfWebRequest $request)
    {
        $this->brands = Doctrine::getTable('IStoreBrand')->getUpdated(10);
    }

    /**
     *  Action 'left' du composant 'menu'. Ce composant affiche le menu de gauche
     *      sur le site affichant la liste des sous-catégories d'une catégorie de
     *      permier niveau.
     */
    public function executeLeft(sfWebRequest $request)
    {
        // recupere la catégorie parent associé à la catgorie selectionné
        $parentCategory = $this->category->getIStoreCategory();
        $this->category = Doctrine_Core::getTable('IStoreCategory')->find($parentCategory->getId());
        $this->subCategories = $this->category->getChildCategories();
    }
}
?>
