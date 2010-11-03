<?php

/**
 * IStoreCustomerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class IStoreCustomerTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object IStoreCustomerTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('IStoreCustomer');
    }

    static public $civilityTypes = array(
        '1' => 'M',
        '2' => 'Mlle',
        '3' => 'Mme',
    );

    /**
    *    Retourne le type de civilité d'une personne
    *
    * @return array()
    */
    public function getCivilityTypes()
    {
        return self::$civilityTypes;
    }
}