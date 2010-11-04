<?php

/**
 * category actions.
 *
 * @package    i-store
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
 /**
  *   Executes l'action 'show' du module 'category' permettant d'afficher
  *     la liste des articles d'une catégorie. Il y a une pagination des
  *     articles fournit par l'objet sfDoctrinePager
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $this->category = $this->getRoute()->getObject();

    // afin de paginer la liste des articles d'une catégorie, on utilise
    //   la classe sfDoctrinePager fournit par symfony
    $this->pager = new sfDoctrinePager(
            'IStoreItem', sfConfig::get('app_max_items_on_category'));
    $this->pager->setQuery($this->category->getActiveItemsQuery());
    // on définit la page 1 par défai
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
}