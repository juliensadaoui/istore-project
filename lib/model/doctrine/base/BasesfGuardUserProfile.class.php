<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $telephone
 * @property string $sexe
 * @property date $date_of_birth
 * @property sfGuardUser $User
 * 
 * @method integer            getId()            Returns the current record's "id" value
 * @method integer            getUserId()        Returns the current record's "user_id" value
 * @method string             getTelephone()     Returns the current record's "telephone" value
 * @method string             getSexe()          Returns the current record's "sexe" value
 * @method date               getDateOfBirth()   Returns the current record's "date_of_birth" value
 * @method sfGuardUser        getUser()          Returns the current record's "User" value
 * @method sfGuardUserProfile setId()            Sets the current record's "id" value
 * @method sfGuardUserProfile setUserId()        Sets the current record's "user_id" value
 * @method sfGuardUserProfile setTelephone()     Sets the current record's "telephone" value
 * @method sfGuardUserProfile setSexe()          Sets the current record's "sexe" value
 * @method sfGuardUserProfile setDateOfBirth()   Sets the current record's "date_of_birth" value
 * @method sfGuardUserProfile setUser()          Sets the current record's "User" value
 * 
 * @package    i-store
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
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
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}