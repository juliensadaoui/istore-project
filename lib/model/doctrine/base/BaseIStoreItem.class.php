<?php

/**
 * BaseIStoreItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property float $unit_cost
 * @property float $weight
 * @property boolean $is_activated
 * @property IStoreCategory $IStoreCategory
 * @property IStoreBrand $IStoreBrand
 * @property Doctrine_Collection $IStoreComments
 * 
 * @method integer             getCategoryId()     Returns the current record's "category_id" value
 * @method integer             getBrandId()        Returns the current record's "brand_id" value
 * @method string              getName()           Returns the current record's "name" value
 * @method string              getImage()          Returns the current record's "image" value
 * @method string              getDescription()    Returns the current record's "description" value
 * @method float               getUnitCost()       Returns the current record's "unit_cost" value
 * @method float               getWeight()         Returns the current record's "weight" value
 * @method boolean             getIsActivated()    Returns the current record's "is_activated" value
 * @method IStoreCategory      getIStoreCategory() Returns the current record's "IStoreCategory" value
 * @method IStoreBrand         getIStoreBrand()    Returns the current record's "IStoreBrand" value
 * @method Doctrine_Collection getIStoreComments() Returns the current record's "IStoreComments" collection
 * @method IStoreItem          setCategoryId()     Sets the current record's "category_id" value
 * @method IStoreItem          setBrandId()        Sets the current record's "brand_id" value
 * @method IStoreItem          setName()           Sets the current record's "name" value
 * @method IStoreItem          setImage()          Sets the current record's "image" value
 * @method IStoreItem          setDescription()    Sets the current record's "description" value
 * @method IStoreItem          setUnitCost()       Sets the current record's "unit_cost" value
 * @method IStoreItem          setWeight()         Sets the current record's "weight" value
 * @method IStoreItem          setIsActivated()    Sets the current record's "is_activated" value
 * @method IStoreItem          setIStoreCategory() Sets the current record's "IStoreCategory" value
 * @method IStoreItem          setIStoreBrand()    Sets the current record's "IStoreBrand" value
 * @method IStoreItem          setIStoreComments() Sets the current record's "IStoreComments" collection
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_item');
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('brand_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('unit_cost', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
        $this->hasColumn('weight', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
        $this->hasColumn('is_activated', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('IStoreCategory', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasOne('IStoreBrand', array(
             'local' => 'brand_id',
             'foreign' => 'id'));

        $this->hasMany('IStoreComment as IStoreComments', array(
             'local' => 'id',
             'foreign' => 'item_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}