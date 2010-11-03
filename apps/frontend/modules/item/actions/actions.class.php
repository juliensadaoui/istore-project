<?php

/**
 * item actions.
 *
 * @package    i-store
 * @subpackage item
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
//        $this->items = Doctrine_Core::getTable('IStoreItem')
//            ->createQuery('a')->execute();
        $this->forward('homepage', 'index');
    }

    /**
     *  Action 'show' du module 'item'. Cette action permet d'afficher
     *      la page détaillée d'un article.
     *
     * @param sfWebRequest $request
     */
    public function executeShow(sfWebRequest $request)
    {
        $this->item = $this->getRoute()->getObject();
        $this->forward404Unless($this->item);
    }
}
