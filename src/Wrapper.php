<?php

/**
 * Mage proxy class
 *
 * @author Matthew Wells
 */
class Mage_Wrapper
{
    /**
     * Call a static method on the Mage class
     * @param  string $name
     * @param  array $args
     * @return mixed
     */
    public function __call($name, $args)
    {
        return call_user_func_array(
            array('Mage', $name), $args);
    }

    /**
     * Retrieve model object
     *
     * @link    Mage_Core_Model_Config::getModelInstance
     * @param   string $modelClass
     * @param   array|object $arguments
     * @return  Mage_Core_Model_Abstract|false
     */
    public function getModel($modelClass = '', $arguments = array())
    {
        return Mage::getModel($modelClass, $arguments);
    }

    /**
     * Retrieve model object singleton
     *
     * @param   string $modelClass
     * @param   array $arguments
     * @return  Mage_Core_Model_Abstract
     */
    public function getSingleton($modelClass='', array $arguments=array())
    {
        return Mage::getSingleton($modelClass, $arguments);
    }

    /**
     * Retrieve object of resource model
     *
     * @param   string $modelClass
     * @param   array $arguments
     * @return  Object
     */
    public function getResourceModel($modelClass, $arguments = array())
    {
        return Mage::getResourceModel($modelClass, $arguments);
    }

    /**
     * Retrieve helper object
     *
     * @param string $name the helper name
     * @return Mage_Core_Helper_Abstract
     */
    public function helper($name)
    {
        return Mage::helper($name);
    }

    /**
     * log facility (??)
     *
     * @param string $message
     * @param integer $level
     * @param string $file
     * @param bool $forceLog
     */
    public function log($message, $level = null, $file = '', $forceLog = false)
    {
        return Mage::log($message, $level, $file, $forceLog);
    }
}
