<?php

/**
 * order actions.
 *
 * @package    i-store
 * @subpackage order
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class orderActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->forward('homepage', 'index');
  }

    /**
     *  Affiche le contenu de la commande. Informations sur le client.
     *      Les articles commandés avec la quantité ...
     *
     * @param sfWebRequest $request
     */
    public function executeShow(sfWebRequest $request)
    {
        $this->order = $this->getRoute()->getObject();
        $this->forward404Unless($this->order);

        if ($this->order->getUserId() !== $this->getUser()->getGuardUser()->getId())
        {
            $this->forward('homepage', 'index');
        }
    }


    /**
     *  Execute l'action 'confirm' du module 'order' permettant de confimer
     *      la commande du panier. Affiche les informations personnelles
     *      et le formulaire de saisie de la carte bancaire
     *
     * @param sfWebRequest $request
     */
    public function executeConfirm(sfWebRequest $request)
    {
        // verification que la commande est lancé du panier
        if ($this->getUser()->getAttribute('cart') !== 'order')
        {
            $this->forward('homepage', 'index');
        }

        // on supprime l'attribut
        $this->getUser()->setAttribute('cart', null);

        $this->user = $this->getUser()->getGuardUser();
        $this->form = new IStoreCreditCardForm();
    }

    /**
     *   Execute l'action 'create' du module 'order'. Recupére la saisie
     *      du formulaire de la validation de la commande. Filtre les
     *      champs saisis et enregistre la commande si le traitement
     *      du filtrage n'a pas retourné d'erreurs.
     *
     * @param sfWebRequest $request 
     */
    public function executeCreate (sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new IStoreCreditCardForm();

        $this->processForm($request, $this->form);

        $this->user = $this->getUser()->getGuardUser();
        $this->setTemplate('confirm');
    }


     /**
     *  Cette méthode permet de valider la saisie d'un formulaire. Elle utilise
     *      les classes de validation du framework symfony.
     *
     *  Dans ce traitement, on sauvegarde l'intégralité de la commande.
     *          * date de la commande
     *          * adresse de facturation/livraison
     *          * ensemble des lignes de commande (article + quantité)
     *
     * @param sfWebRequest $request
     * @param sfForm $form  forumlaire à valider
     */
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $shoppingCart = $this->getUser()->getShoppingCart();
            if (!$shoppingCart->isEmpty())
            {
                // on recupere l'adresse de l'utilisateur
                $user = $this->getUser()->getGuardUser();
                $address = $user->getAddress();

                // on sauvegarde la carte de credit
                $creditCard = $form->save();

                // on cree une commande en base de données.
                $order = new IStoreOrder();
                $order->setDate(date('Y-m-d'));
                $order->setCreditCardId($creditCard->getId());
                $order->setUserId($user->getId());
                $order->save();

                // on sauvegarde une copie de l'adresse du client
                //      pour la commande.
                $orderAddress = new IStoreAddress();
                $orderAddress->setStreet($address->getStreet());
                $orderAddress->setCity($address->getCity());
                $orderAddress->setZipcode($address->getZipcode());
                $orderAddress->setCountry($address->getCountry());
                $orderAddress->setOrderId($order->getId());
                $orderAddress->save();

                $order->setAddressId($orderAddress->getId());
                $order->save();

                // on sauvegarde chaque ligne de la commande
                foreach ($shoppingCart->getItems() as $item)
                {
                    $orderLine = new IStoreOrderLine();
                    $orderLine->setItemId($item->getId());
                    $orderLine->setOrderId($order->getId());
                    $orderLine->setQuantity($item->getQuantity());
                    $orderLine->save();
                }

                // on vide le panier après sauvegarde de la commande
                $shoppingCart->clear();

                $this->redirect($this->generateUrl('order', $order));
            }
            // si le panier est vide, on redirige vers le panier
            $this->forward('cart', 'show');
        }
    }

}
