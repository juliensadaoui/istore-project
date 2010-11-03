<?php

/**
 * IStoreCustomer form.
 *
<<<<<<< HEAD
 * @package    symfony
=======
 * @package    i-store
>>>>>>> ce54ec20e0f7185057f63fc7bb8cc6645b62d79f
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class IStoreCustomerForm extends BaseIStoreCustomerForm
{
    public function configure()
    {
      // on configure les champs à afficher dans le formulaire
      $this->useFields(
              array(
                  'civility',         /*  civilité du client */
                  'telephone',        /*  telephone du client */
                  'date_of_birth',    /*  date de naissance du client */
                  ));

        $this->widgetSchema['civility'] = new sfWidgetFormChoice(array(
            'choices'  => Doctrine_Core::getTable('IStoreCustomer')->getCivityTypes(),
            'expanded' => true,
        ));
       
    }
}
