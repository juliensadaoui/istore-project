<?php

/**
 * BaseIStoreCreditCard
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $number
 * @property integer $type
 * @property date $expiry_date
 * 
 * @method string           getNumber()      Returns the current record's "number" value
 * @method integer          getType()        Returns the current record's "type" value
 * @method date             getExpiryDate()  Returns the current record's "expiry_date" value
 * @method IStoreCreditCard setNumber()      Sets the current record's "number" value
 * @method IStoreCreditCard setType()        Sets the current record's "type" value
 * @method IStoreCreditCard setExpiryDate()  Sets the current record's "expiry_date" value
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreCreditCard extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_credit_card');
        $this->hasColumn('number', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('type', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('expiry_date', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}