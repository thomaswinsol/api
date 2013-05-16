<?php

class Application_Model_Translation extends Zend_DB_Table_Abstract
{
    protected $_name = "translate";
    protected $_primary = "id";
    

    
   /**
    * 
    * @param Zend_Locale $locale
    * @return type
    */
    
    public function getTranslationByLocale(Zend_Locale $locale)
    {
        $select = $this->select()->where('locale = ?', $locale);
        $result = $this->fetchAll($select);
        return $result;
    }

}

