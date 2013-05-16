<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{
        protected $_name = 'users';
        protected $_primary = 'id';
        
        /**
         * 
         * @param type $identity
         * @return Zend_DB_Table_Rowset
         */
        public function getUserByIdentity($identity) {           
            $select = $this->select()->where('username= ?', $identity);
            $result = $this->fetchall($select)->current();   
            return $result;
         }
        
}   

