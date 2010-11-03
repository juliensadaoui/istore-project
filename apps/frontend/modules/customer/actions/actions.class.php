<?php

/**
 * customer actions.
 *
 * @package    i-store
 * @subpackage customer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class customerActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('default', 'module');
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->user = $this->getUser()->getGuardUser();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new sfGuardUserForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('register');
    }

    /**
     *  Action 'edit' du module 'customer'. Cette action permet d'afficher le formulaire
     *      permettant de modifier les informations d'un compte client.
     *
     * @param sfWebRequest $request
     */
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($user = Doctrine_Core::getTable('sfGuardUser')->find($this->getUser()->getGuardUser()->getId()), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
        $this->form = new sfGuardUserForm($user);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $userId = $this->getUser()->getGuardUser()->getId();
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($user = Doctrine_Core::getTable('sfGuardUser')->find($userId), sprintf('Object sf_guard_user does not exist (%s).', $userId ));
        $this->form = new sfGuardUserForm($user);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }
    
    /**
    *  Execute l'action 'register' du module 'customer'. Affiche le formulaire
    *        d'inscription pour un client.
    *
    * @param sfWebRequest $request
    */
    public function executeRegister (sfWebRequest $request)
    {
        $this->form = new sfGuardUserForm();
    }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $i_store_item = $form->save();

      $this->redirect('@account_show');
    }
  }
}
