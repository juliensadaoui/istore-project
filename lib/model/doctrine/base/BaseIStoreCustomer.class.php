<?php

/**
 * BaseIStoreCustomer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $telephone
 * @property integer $civility
 * @property date $date_of_birth
 * @property sfGuardUser $User
 * @property Doctrine_Collection $IStoreAddresses
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getUserId()          Returns the current record's "user_id" value
 * @method string              getTelephone()       Returns the current record's "telephone" value
 * @method integer             getCivility()        Returns the current record's "civility" value
 * @method date                getDateOfBirth()     Returns the current record's "date_of_birth" value
 * @method sfGuardUser         getUser()            Returns the current record's "User" value
 * @method Doctrine_Collection getIStoreAddresses() Returns the current record's "IStoreAddresses" collection
 * @method IStoreCustomer      setId()              Sets the current record's "id" value
 * @method IStoreCustomer      setUserId()          Sets the current record's "user_id" value
 * @method IStoreCustomer      setTelephone()       Sets the current record's "telephone" value
 * @method IStoreCustomer      setCivility()        Sets the current record's "civility" value
 * @method IStoreCustomer      setDateOfBirth()     Sets the current record's "date_of_birth" value
 * @method IStoreCustomer      setUser()            Sets the current record's "User" value
 * @method IStoreCustomer      setIStoreAddresses() Sets the current record's "IStoreAddresses" collection
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreCustomer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_customer');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('telephone', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('civility', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('date_of_birth', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasMany('IStoreAddress as IStoreAddresses', array(
             'local' => 'id',
             'foreign' => 'customer_id'));
    }
}