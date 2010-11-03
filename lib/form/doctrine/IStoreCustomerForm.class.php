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

      // on configure la position des champs du formulaire
      $this->getWidgetSchema()->setPositions(
              array(
                  'id',
                  'civility',
                  'telephone',
                  'date_of_birth',
                  ));

        $this->widgetSchema['civility'] = new sfWidgetFormChoice(array(
            'choices'  => Doctrine_Core::getTable('IStoreCustomer')->getCivityTypes(),
            'expanded' => false
        ));

        // on parametre le filtre du champ telephone
        $this->validatorSchema['telephone'] = new sfValidatorRegex(
                    array(
                        'pattern' => '#^[0-9]{10}$#'
                    ),
                    array(
                        'invalid' => 'Le numéro de téléphone est invalid.',
                        'required' => 'champ non renseigné'
                    ));


        // on configure les labels du formulaire
        $this->widgetSchema->setLabels(
                array(
                    'civility' => 'Civilité* : ',
                    'telephone' => 'Telephone : ',
                    'date_of_birth' => 'Date de naissance : '
                ));

      $addressForm = new IStoreAddressForm($this->object->Address);
      $this->embedMergeForm('Adresse', $addressForm);
    }
}
