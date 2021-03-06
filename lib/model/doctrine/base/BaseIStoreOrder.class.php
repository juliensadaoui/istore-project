<?php

/**
 * BaseIStoreOrder
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $credit_card_id
 * @property integer $address_id
 * @property date $date
 * @property boolean $is_validated
 * @property sfGuardUser $User
 * @property Doctrine_Collection $order
 * @property IStoreAddress $Address
 * 
 * @method integer             getUserId()         Returns the current record's "user_id" value
 * @method integer             getCreditCardId()   Returns the current record's "credit_card_id" value
 * @method integer             getAddressId()      Returns the current record's "address_id" value
 * @method date                getDate()           Returns the current record's "date" value
 * @method boolean             getIsValidated()    Returns the current record's "is_validated" value
 * @method sfGuardUser         getUser()           Returns the current record's "User" value
 * @method Doctrine_Collection getOrder()          Returns the current record's "order" collection
 * @method IStoreAddress       getAddress()        Returns the current record's "Address" value
 * @method IStoreOrder         setUserId()         Sets the current record's "user_id" value
 * @method IStoreOrder         setCreditCardId()   Sets the current record's "credit_card_id" value
 * @method IStoreOrder         setAddressId()      Sets the current record's "address_id" value
 * @method IStoreOrder         setDate()           Sets the current record's "date" value
 * @method IStoreOrder         setIsValidated()    Sets the current record's "is_validated" value
 * @method IStoreOrder         setUser()           Sets the current record's "User" value
 * @method IStoreOrder         setOrder()          Sets the current record's "order" collection
 * @method IStoreOrder         setAddress()        Sets the current record's "Address" value
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreOrder extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_order');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('credit_card_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('address_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('date', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('is_validated', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasMany('IStoreOrderLine as order', array(
             'local' => 'id',
             'foreign' => 'order_id'));

        $this->hasOne('IStoreAddress as Address', array(
             'local' => 'id',
             'foreign' => 'order_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}