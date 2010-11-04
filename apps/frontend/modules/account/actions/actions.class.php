<?php

/**
 * customer actions.
 *
 * @package    i-store
 * @subpackage customer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accountActions extends sfActions
{
    /**
    *   Executes index action. Cette action renvoie automatiquement
    *       sur la page d'acceuil
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('homepage','index');
    }

    /**
     *  Action 'show' du module 'account' permettant d'afficher l'interface
     *      de gestion d'un compte client. Affiche les informations du compte
     *      client.
     *
     * @param sfWebRequest $request
     */
    public function executeShow(sfWebRequest $request)
    {
        $this->user = $this->getUser()->getGuardUser();
    }

    /**
    *  Execute l'action 'new' du module 'customer'. Affiche le formulaire
    *        d'inscription pour un client.
    *
    * @param sfWebRequest $request
    */
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new sfGuardUserForm();
    }

    /**
     *  Action 'create' du module 'account' permettant de récupérer la saisie
     *      du formulaire d'inscription d'un compte client. Effectue un traitement
     *      du formulaire pour filtrer les données et créer un nouveau compte
     *      client si le traitement n'a pas échoué
     *
     * @param sfWebRequest $request
     */
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new sfGuardUserForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    /**
     *  Action 'edit' du module 'customer'. Cette action permet d'afficher le formulaire
     *      permettant de modifier les informations d'un compte client.
     *
     * @param sfWebRequest $request
     */
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($this->getRoute()->getObject());
        $this->form = new sfGuardUserForm($this->getRoute()->getObject());
    }

    /**
     *  Action 'update' du module 'account' permettant de récupérer la saisie
     *      du formulaire de modification du compte. Effectue un traitement
     *      du formulaire pour filtrer les données et met à jour le compte
     *      client si le traitement n'a pas échoué
     *
     * @param sfWebRequest $request
     */
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($this->getRoute()->getObject());
        $this->form = new sfGuardUserForm($this->getRoute()->getObject());

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    /**
     *   Cette action est non supportée par le module 'account'.
     *      Renvoie automatiquement à la page d'acceuil
     *
     * @param sfRequest $request A request object representant la requête http
     */
    public function executeDelete(sfWebRequest $request)
    {
//    $request->checkCSRFProtection();
//
//    $this->forward404Unless($sf_guard_user = Doctrine_Core::getTable('IStoreItem')->find(array($request->getParameter('id'))), sprintf('Object i_store_item does not exist (%s).', $request->getParameter('id')));
//    $sf_guard_user->delete();
//
//    $this->redirect('account/index');

        $this->forward('homepage','index');
    }
    

    /**
     *  Cette méthode permet de valider la saisie d'un formulaire. Elle utilise
     *      les classes de validation du framework symfony.
     *
     * @param sfWebRequest $request
     * @param sfForm $form  forumlaire à valider
     */
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $user = $form->save();

            $this->redirect('@account_show');
        }
    }
}
