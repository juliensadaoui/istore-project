<?php

/**
 * IStoreItem filter form base class.
 *
 * @package    i-store
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseIStoreItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreCategory'), 'add_empty' => true)),
      'brand_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('IStoreBrand'), 'add_empty' => true)),
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'short_description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'details'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'unit_cost'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'weight'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_activated'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'category_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('IStoreCategory'), 'column' => 'id')),
      'brand_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('IStoreBrand'), 'column' => 'id')),
      'name'              => new sfValidatorPass(array('required' => false)),
      'image'             => new sfValidatorPass(array('required' => false)),
      'short_description' => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'details'           => new sfValidatorPass(array('required' => false)),
      'unit_cost'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'weight'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_activated'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('i_store_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'IStoreItem';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'category_id'       => 'ForeignKey',
      'brand_id'          => 'ForeignKey',
      'name'              => 'Text',
      'image'             => 'Text',
      'short_description' => 'Text',
      'description'       => 'Text',
      'details'           => 'Text',
      'unit_cost'         => 'Number',
      'weight'            => 'Number',
      'is_activated'      => 'Boolean',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
