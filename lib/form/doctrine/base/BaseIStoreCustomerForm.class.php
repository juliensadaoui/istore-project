<?php

/**
 * IStoreCustomer form base class.
 *
 * @method IStoreCustomer getObject() Returns the current form's model object
 *
 * @package    i-store
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIStoreCustomerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'login'         => new sfWidgetFormInputText(),
      'password'      => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      'telephone'     => new sfWidgetFormInputText(),
      'sexe'          => new sfWidgetFormInputText(),
      'date_of_birth' => new sfWidgetFormDate(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'login'         => new sfValidatorString(array('max_length' => 255)),
      'password'      => new sfValidatorString(array('max_length' => 255)),
      'email'         => new sfValidatorString(array('max_length' => 255)),
      'firstname'     => new sfValidatorString(array('max_length' => 255)),
      'lastname'      => new sfValidatorString(array('max_length' => 255)),
      'telephone'     => new sfValidatorString(array('max_length' => 255)),
      'sexe'          => new sfValidatorString(array('max_length' => 255)),
      'date_of_birth' => new sfValidatorDate(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'IStoreCustomer', 'column' => array('login'))),
        new sfValidatorDoctrineUnique(array('model' => 'IStoreCustomer', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('i_store_customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'IStoreCustomer';
  }

}
