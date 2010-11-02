<?php

/**
 * IStoreOrder form base class.
 *
 * @method IStoreOrder getObject() Returns the current form's model object
 *
 * @package    i-store
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIStoreOrderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'credit_card_id' => new sfWidgetFormInputText(),
      'address_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreAddress'), 'add_empty' => false)),
      'date'           => new sfWidgetFormDate(),
      'payment'        => new sfWidgetFormInputText(),
      'is_validated'   => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'credit_card_id' => new sfValidatorInteger(array('required' => false)),
      'address_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreAddress'))),
      'date'           => new sfValidatorDate(),
      'payment'        => new sfValidatorInteger(),
      'is_validated'   => new sfValidatorBoolean(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('i_store_order[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'IStoreOrder';
  }

}
