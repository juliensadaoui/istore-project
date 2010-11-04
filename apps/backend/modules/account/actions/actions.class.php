<?php

require_once dirname(__FILE__).'/../lib/accountGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/accountGeneratorHelper.class.php';

/**
 * account actions.
 *
 * @package    i-store
 * @subpackage account
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accountActions extends autoAccountActions
{
    /**
     *  Active un compte client
     */
    public function executeListActivate()
    {
        $user = $this->getRoute()->getObject();
        $user->setIsActive(true);
        $user->save();
        $this->getUser()->setFlash('notice', 'Le compte client selectionné a été activé avec succès.');
        $this->redirect('sf_guard_user');
    }

    /**
     *  Desactive un compte client
     */
    public function executeListDeactivate()
    {
        $user = $this->getRoute()->getObject();
        $user->setIsActive(false);
        $user->save();
        $this->getUser()->setFlash('notice', 'Le compte client selectionné a été désactivé avec succès.');
        $this->redirect('sf_guard_user');
    }

    /**
     *  Active une liste compte client
     *
     * @param sfWebRequest $request     web requête encapsulé par symfony
     */
    public function executeBatchActivate(sfWebRequest $request)
    {
        $q = Doctrine_Query::create()
            ->from('sfGuardUser gu')
            ->whereIn('gu.id', $request->getParameter('ids'));

        $guardUsers = $q->execute();

        foreach ($guardUsers as $user)
        {
            $user->setIsActive(true);
            $user->save();
        }

        $this->getUser()->setFlash('notice', 'Les comptes client selectionnés a été activés avec succès.');
        $this->redirect('sf_guard_user');
    }

    /**
     *  Desactive une liste de compte client
     *
     * @param sfWebRequest $request     web requête encapsulé par symfony
     */
    public function executeBatchDeactivate(sfWebRequest $request)
    {
        $q = Doctrine_Query::create()
            ->from('sfGuardUser gu')
            ->whereIn('gu.id', $request->getParameter('ids'));

        $guardUsers = $q->execute();

        foreach ($guardUsers as $user)
        {
            $user->setIsActive(false);
            $user->save();
        }

        $this->getUser()->setFlash('notice', 'Les comptes client selectionnés a été désactivés avec succès.');
        $this->redirect('sf_guard_user');
    }



}
