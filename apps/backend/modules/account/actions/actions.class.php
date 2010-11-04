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
//    /**
//     *  Valide une liste de commande
//     *
//     * @param sfWebRequest $request
//     */
//    public function executeBatchValid(sfWebRequest $request)
//    {
//        $ids = $request->getParameter('ids');
//
//        $q = Doctrine_Query::create()
//            ->from('IStoreOrder o')
//            ->whereIn('o.id', $ids);
//
//        foreach ($q->execute() as $order)
//        {
//            $order->setIsValidated(true);
//        }
//
//        $this->getUser()->setFlash('notice', 'Les commandes selectionnées ont été validées avec succès.');
//
//        $this->redirect('i_store_order');
//    }
//
//    /**
//     *  action 'listValid' du module 'account' du back office.
//     *      Cette action permet d'activer un compte client
//     *
//     * @param sfWebRequest $request
//     */
//    public function executeListValid(sfWebRequest $request)
//    {
//        $job = $this->getRoute()->getObject();
//        $job->setIsValidated(true);
//
//        $this->getUser()->setFlash('notice', 'La commande selectionnée a été validée avec succès.');
//
//        $this->redirect('i_store_order');
//    }
}
