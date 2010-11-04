<?php

require_once dirname(__FILE__).'/../lib/orderGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/orderGeneratorHelper.class.php';

/**
 * order actions.
 *
 * @package    i-store
 * @subpackage order
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class orderActions extends autoOrderActions
{
    /**
     *  Valide une liste de commande
     *
     * @param sfWebRequest $request
     */
    public function executeBatchValid(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $q = Doctrine_Query::create()
            ->from('IStoreOrder o')
            ->whereIn('o.id', $ids);

        foreach ($q->execute() as $order)
        {
            $order->validate();
        }

        $this->getUser()->setFlash('notice', 'Les commandes selectionnées ont été validées avec succès.');

        $this->redirect('i_store_order');
    }

    /**
     *  valide une commande dans la liste
     *
     * @param sfWebRequest $request
     */
    public function executeListValid(sfWebRequest $request)
    {
        $order = $this->getRoute()->getObject()->validate();

        $this->getUser()->setFlash('notice', 'La commande selectionnée a été validée avec succès.');

        $this->redirect('i_store_order');
    }
}
