<?php

/**
 * BaseIStoreOrderLine
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $order_id
 * @property integer $item_id
 * @property integer $quantity
 * @property IStoreOrder $IStoreOrder
 * @property IStoreItem $IStoreItem
 * 
 * @method integer         getOrderId()     Returns the current record's "order_id" value
 * @method integer         getItemId()      Returns the current record's "item_id" value
 * @method integer         getQuantity()    Returns the current record's "quantity" value
 * @method IStoreOrder     getIStoreOrder() Returns the current record's "IStoreOrder" value
 * @method IStoreItem      getIStoreItem()  Returns the current record's "IStoreItem" value
 * @method IStoreOrderLine setOrderId()     Sets the current record's "order_id" value
 * @method IStoreOrderLine setItemId()      Sets the current record's "item_id" value
 * @method IStoreOrderLine setQuantity()    Sets the current record's "quantity" value
 * @method IStoreOrderLine setIStoreOrder() Sets the current record's "IStoreOrder" value
 * @method IStoreOrderLine setIStoreItem()  Sets the current record's "IStoreItem" value
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreOrderLine extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_order_line');
        $this->hasColumn('order_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('item_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('quantity', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('IStoreOrder', array(
             'local' => 'order_id',
             'foreign' => 'id'));

        $this->hasOne('IStoreItem', array(
             'local' => 'item_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}