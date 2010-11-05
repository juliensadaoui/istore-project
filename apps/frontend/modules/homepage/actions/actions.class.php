<?php

/**
 * homepage actions.
 *
 * @package    i-store
 * @subpackage homepage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homepageActions extends sfActions
{
    /**
     * Executes index action. Affiche la page d'acceuil du site.
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        // $this->forward('default', 'module');
        $this->updatedItems = Doctrine::getTable('IStoreItem')->getUpdatedItems(6);
        $this->newsItems = Doctrine::getTable('IStoreItem')->getNewsItems(6);
    }

    /**
     *  Execute l'action 'error404' du module 'homepage'. Affiche la page d'erreur
     *      'page non trouvée' lorsque l'url n'est pas valide.
     *
     * @param sfWebRequest $request 
     */
    public function executeError404(sfWebRequest $request)
    {

    }
}
