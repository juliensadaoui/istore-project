<?php

/**
 * BaseIStoreComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $item_id
 * @property string $title
 * @property string $description
 * @property integer $note
 * @property IStoreItem $IStoreItem
 * 
 * @method integer       getItemId()      Returns the current record's "item_id" value
 * @method string        getTitle()       Returns the current record's "title" value
 * @method string        getDescription() Returns the current record's "description" value
 * @method integer       getNote()        Returns the current record's "note" value
 * @method IStoreItem    getIStoreItem()  Returns the current record's "IStoreItem" value
 * @method IStoreComment setItemId()      Sets the current record's "item_id" value
 * @method IStoreComment setTitle()       Sets the current record's "title" value
 * @method IStoreComment setDescription() Sets the current record's "description" value
 * @method IStoreComment setNote()        Sets the current record's "note" value
 * @method IStoreComment setIStoreItem()  Sets the current record's "IStoreItem" value
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_comment');
        $this->hasColumn('item_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('note', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('IStoreItem', array(
             'local' => 'item_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}