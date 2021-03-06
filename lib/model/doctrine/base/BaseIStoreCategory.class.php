<?php

/**
 * BaseIStoreCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $parent_category_id
 * @property IStoreCategory $IStoreCategory
 * @property Doctrine_Collection $category
 * @property Doctrine_Collection $IStoreItems
 * 
 * @method string              getName()               Returns the current record's "name" value
 * @method integer             getParentCategoryId()   Returns the current record's "parent_category_id" value
 * @method IStoreCategory      getIStoreCategory()     Returns the current record's "IStoreCategory" value
 * @method Doctrine_Collection getCategory()           Returns the current record's "category" collection
 * @method Doctrine_Collection getIStoreItems()        Returns the current record's "IStoreItems" collection
 * @method IStoreCategory      setName()               Sets the current record's "name" value
 * @method IStoreCategory      setParentCategoryId()   Sets the current record's "parent_category_id" value
 * @method IStoreCategory      setIStoreCategory()     Sets the current record's "IStoreCategory" value
 * @method IStoreCategory      setCategory()           Sets the current record's "category" collection
 * @method IStoreCategory      setIStoreItems()        Sets the current record's "IStoreItems" collection
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_category');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('parent_category_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('IStoreCategory', array(
             'local' => 'parent_category_id',
             'foreign' => 'id'));

        $this->hasMany('IStoreCategory as category', array(
             'local' => 'id',
             'foreign' => 'parent_category_id'));

        $this->hasMany('IStoreItem as IStoreItems', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}