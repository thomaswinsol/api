<?php

class Application_Model_Page extends Zend_Db_Table_Abstract
{
    protected $_name = "page";
    protected $_primary = "id";
    
    const MENU_VISIBLE = 1;
    const MENU_INVISIBLE = 0;
    
    const STATUS_ONLINE = 1;
    const STATUS_OFFLINE = 0;
    
    public function getMenu($locale)
    {
        $select = $this->select()
                ->where('menu = ?', self::MENU_VISIBLE)
                ->where('status = ?', self::STATUS_ONLINE)
                ->where('locale= ?', $locale);
        
        $result = $this->fetchAll($select);
        
        return $result;
    }
    
    /** Get page by slug and locale
     * 
     * @param type $slug
     * @param type $lang
     * @return type
     */
    public function getPage($slug = null, $lang)
    {
        if ($slug === null) {
            return;
        }
         $select = $this->select()
                ->where('slug = ?', $slug)
                ->where('status = ?', self::STATUS_ONLINE)
                ->where('locale = ?', $lang);

        $result = $this->fetchAll($select)->current();
        
        return $result;
    }        
}

