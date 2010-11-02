<?php

/**
 * IStoreOrderLine form base class.
 *
 * @method IStoreOrderLine getObject() Returns the current form's model object
 *
 * @package    i-store
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIStoreOrderLineForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'order_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreOrder'), 'add_empty' => false)),
      'item_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreItem'), 'add_empty' => false)),
      'quantity'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreOrder'))),
      'item_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreItem'))),
      'quantity'   => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('i_store_order_line[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'IStoreOrderLine';
  }

}
