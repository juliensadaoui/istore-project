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
}
?>
