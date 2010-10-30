<?php

/**
 * IStoreCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class IStoreCategory extends BaseIStoreCategory
{
    /**
     *  Retourne les sous-catégories associé à la catégorie
     *
     * @return <type>
     */
    public function getChildCategories()
    {
        $q = $this->getChildCategoriesQuery();

        return $q->execute();
    }


    public function getChildCategoriesQuery()
    {
        return $q = Doctrine_Query::create()
          ->from('IStoreCategory c')
          ->where('c.parent_category_id = ?', $this->getId());
    }

    public function getParentCategory ()
    {
//        return $q = Doctrine_Query::create()
//            ->from('IStoreCategory c')
//            ->where('c.id = ?', $this->getParentCategory());
    }

    public function getActiveItems()
    {
        return $this->getActiveItemsQuery()->execute();
    }

    public function getActiveItemsQuery()
    {
      $q = Doctrine_Query::create()
        ->from('IStoreItem i')
        ->where('i.category_id = ?', $this->getId());

      return Doctrine_Core::getTable('IStoreItem')->addActiveItemsQuery($q);
    }

    public function countActiveItem()
    {
      $q = Doctrine_Query::create()
        ->from('IStoreItem i')
        ->where('i.category_id = ?', $this->getId());

      return Doctrine_Core::getTable('JobeetJob')->countActiveJobs($q);
    }
//
//    public function getSlug()
//    {
//        IStore::slugify($this->getName());
//    }
}
