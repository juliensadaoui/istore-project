<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class menuComponents extends sfComponents
{
    public function executeMain(sfWebRequest $request)
    {
        $this->categories = Doctrine::getTable('IStoreCategory')->getFirstLevel();
    }

    public function executeRight()
    {
        $this->brands = Doctrine::getTable('IStoreBrand')->getUpdated(10);
    }

    public function executeLeft()
    {
        $this->category = Doctrine_Core::getTable('IStoreCategory')->find(1);
        $this->subCategories = $this->category->getChildCategories();
    }
}
?>
