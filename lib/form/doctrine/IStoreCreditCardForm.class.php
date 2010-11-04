<?php

/**
 * IStoreCreditCard form.
 *
 * @package    i-store
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class IStoreCreditCardForm extends BaseIStoreCreditCardForm
{
    /**
     *  Configure le formulaire associé à la carte bancaire
     */
    public function configure()
    {
      // on configure les champs à afficher dans le formulaire
      $this->useFields(
              array(
                  'number',         /*  numero de la carte bancaire */
                  'type',           /*  type de carte bancaire */
                  'expiry_date',    /*  date d'expiration de la carte bancaire */
                  ));

        $date = array();
        for ($i = 2010 ; $i < 2015 ; $i++)
        {
            $date[$i] = $i;
        }
        $this->widgetSchema['expiry_date'] = new sfWidgetFormDate(
                array(
                    'years' => $date
                    ));

      // on configure la position des champs du formulaire
      $this->getWidgetSchema()->setPositions(
              array(
                  'id',
                  'number',
                  'type',
                  'expiry_date',
                  ));


        $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
            'choices'  => Doctrine_Core::getTable('IStoreCreditCard')->getTypes(),
            'expanded' => false
        ));
        $this->validatorSchema['type']->setMessage('required', 'champ non renseigné');
        $this->validatorSchema['expiry_date']->setMessage('required', 'champ non renseigné');

        // on parametre le filtre du champ number
        $this->validatorSchema['number'] = new sfValidatorRegex(
                    array(
                        'pattern' => '#^[0-9]{16}$#'
                    ),
                    array(
                        'invalid' => 'Le numéro de la carte bancaire est invalide.',
                        'required' => 'champ non renseigné'
                    ));


        // on configure les labels du formulaire
        $this->widgetSchema->setLabels(
                array(
                    'number' => 'Numéro de la carte* : ',
                    'type' => 'Type de carte bancaire* : ',
                    'expiry_date' => 'Date d\'expiration* : '
                ));
    }
}
