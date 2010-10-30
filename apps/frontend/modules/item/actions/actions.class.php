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
    $this->items = Doctrine_Core::getTable('IStoreItem')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->i_store_item = Doctrine_Core::getTable('IStoreItem')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->i_store_item);
    $this->item = $this->i_store_item;
  }

//  public function executeNew(sfWebRequest $request)
//  {
//    $this->form = new IStoreItemForm();
//  }
//
//  public function executeCreate(sfWebRequest $request)
//  {
//    $this->forward404Unless($request->isMethod(sfRequest::POST));
//
//    $this->form = new IStoreItemForm();
//
//    $this->processForm($request, $this->form);
//
//    $this->setTemplate('new');
//  }

//  public function executeEdit(sfWebRequest $request)
//  {
//    $this->forward404Unless($i_store_item = Doctrine_Core::getTable('IStoreItem')->find(array($request->getParameter('id'))), sprintf('Object i_store_item does not exist (%s).', $request->getParameter('id')));
//    $this->form = new IStoreItemForm($i_store_item);
//  }
//
//  public function executeUpdate(sfWebRequest $request)
//  {
//    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//    $this->forward404Unless($i_store_item = Doctrine_Core::getTable('IStoreItem')->find(array($request->getParameter('id'))), sprintf('Object i_store_item does not exist (%s).', $request->getParameter('id')));
//    $this->form = new IStoreItemForm($i_store_item);
//
//    $this->processForm($request, $this->form);
//
//    $this->setTemplate('edit');
//  }
//
//  public function executeDelete(sfWebRequest $request)
//  {
//    $request->checkCSRFProtection();
//
//    $this->forward404Unless($i_store_item = Doctrine_Core::getTable('IStoreItem')->find(array($request->getParameter('id'))), sprintf('Object i_store_item does not exist (%s).', $request->getParameter('id')));
//    $i_store_item->delete();
//
//    $this->redirect('item/index');
//  }
//
//  protected function processForm(sfWebRequest $request, sfForm $form)
//  {
//    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
//    if ($form->isValid())
//    {
//      $i_store_item = $form->save();
//
//      $this->redirect('item/edit?id='.$i_store_item->getId());
//    }
//  }
}
