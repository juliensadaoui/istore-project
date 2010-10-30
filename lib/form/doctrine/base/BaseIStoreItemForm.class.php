<?php

/**
 * IStoreItem form base class.
 *
 * @method IStoreItem getObject() Returns the current form's model object
 *
 * @package    i-store
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIStoreItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreCategory'), 'add_empty' => false)),
      'brand_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreBrand'), 'add_empty' => false)),
      'name'         => new sfWidgetFormInputText(),
      'image'        => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'unit_cost'    => new sfWidgetFormInputText(),
      'weight'       => new sfWidgetFormInputText(),
      'is_activated' => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreCategory'))),
      'brand_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreBrand'))),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'image'        => new sfValidatorString(array('max_length' => 255)),
      'description'  => new sfValidatorString(array('max_length' => 255)),
      'unit_cost'    => new sfValidatorNumber(),
      'weight'       => new sfValidatorNumber(),
      'is_activated' => new sfValidatorBoolean(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'IStoreItem', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('i_store_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'IStoreItem';
  }

}
