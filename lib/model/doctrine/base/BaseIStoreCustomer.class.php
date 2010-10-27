<?php

/**
 * BaseIStoreCustomer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $telephone
 * @property string $sexe
 * @property date $date_of_birth
 * @property Doctrine_Collection $IStoreAddresses
 * 
 * @method string              getLogin()           Returns the current record's "login" value
 * @method string              getPassword()        Returns the current record's "password" value
 * @method string              getEmail()           Returns the current record's "email" value
 * @method string              getFirstname()       Returns the current record's "firstname" value
 * @method string              getLastname()        Returns the current record's "lastname" value
 * @method string              getTelephone()       Returns the current record's "telephone" value
 * @method string              getSexe()            Returns the current record's "sexe" value
 * @method date                getDateOfBirth()     Returns the current record's "date_of_birth" value
 * @method Doctrine_Collection getIStoreAddresses() Returns the current record's "IStoreAddresses" collection
 * @method IStoreCustomer      setLogin()           Sets the current record's "login" value
 * @method IStoreCustomer      setPassword()        Sets the current record's "password" value
 * @method IStoreCustomer      setEmail()           Sets the current record's "email" value
 * @method IStoreCustomer      setFirstname()       Sets the current record's "firstname" value
 * @method IStoreCustomer      setLastname()        Sets the current record's "lastname" value
 * @method IStoreCustomer      setTelephone()       Sets the current record's "telephone" value
 * @method IStoreCustomer      setSexe()            Sets the current record's "sexe" value
 * @method IStoreCustomer      setDateOfBirth()     Sets the current record's "date_of_birth" value
 * @method IStoreCustomer      setIStoreAddresses() Sets the current record's "IStoreAddresses" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIStoreCustomer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('i_store_customer');
        $this->hasColumn('login', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('firstname', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('lastname', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('telephone', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('sexe', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('date_of_birth', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('IStoreAddress as IStoreAddresses', array(
             'local' => 'id',
             'foreign' => 'customer_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}