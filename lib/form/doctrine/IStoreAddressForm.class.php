<?php

/**
 * IStoreAddress form.
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
class IStoreAddressForm extends BaseIStoreAddressForm
{
    public function configure()
    {
        // on configure les champs à afficher dans le formulaire
        $this->useFields(
              array(
                  'street',          /*  adresse du client */
                  'city',            /*  ville du client */
                  'zipcode',         /*  code postal */
        //                  'state',           /*   departement du client */
                  'country'          /*   pays du client */
              ));

        // on configure la position des champs
        $this->getWidgetSchema()->setPositions(
              array(
                  'id',
                  'street',
                  'city',
                  'zipcode',
                  'country'
                  ));

        // parametrage du filtre du champ de l'adresse
        $options = array( 'required' => true, 'min_length' => 5, 'max_length' => 255);
        $messages = array(
            'required' => 'champ non renseigné',
            'min_length' => 'Adresse trop courte (5 caractères minimum)',
            'max_length' => 'Adresse trop longue (255 caractères minmum)'
        );
        $this->validatorSchema['street'] = new sfValidatorString($options, $messages);

        // parametrage du filtre du champ de la ville
        $messages = array(
            'required' => 'champ non renseigné',
            'min_length' => 'Ville trop courte (5 caractères minimum)',
            'max_length' => 'Ville trop longue (255 caractères minmum)'
        );
        $this->validatorSchema['city'] = new sfValidatorString($options, $messages);


        // on parametre le filtre du champ zipcode
        $this->validatorSchema['zipcode'] = new sfValidatorRegex(
                array(
                    'required' => true,
                    'pattern' => '#^[0-9]{5}$#'
                ),
                array(
                    'invalid' => 'Le code postal est invalid.',
                    'required' => 'champ non renseigné'
                ));

        // on redefinit le champ pays
        $this->setDefault('pays', 'FR');
        $this->widgetSchema['country'] = new sfWidgetFormI18nChoiceCountry(
            array('culture' => sfContext::getInstance()->getUser()->getCulture()));

        // on personnalise les labels
        $this->widgetSchema->setLabels(
          array(
              'street' => 'Adresse* :',
              'city' => 'Ville* :',
              'zipcode' => 'Code Postal* :',
              'country' => 'Pays* :'
              ));

    }
}
