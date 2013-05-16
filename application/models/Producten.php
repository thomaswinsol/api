<?php

class Application_Model_Producten 
{
    //definieren hoe de tabel eruit ziet    
    protected $_name = 'producten';
    protected $_primary = 'id';

 
/**
 * Add product
 * @param string $titel
 * @param string $omschrijving
 * @param float $prijs
 * @return object $product
 */
        public function addProducts($titel,$omschrijving = 'test',$prijs)
        {
            $productendb = new Application_Model_Productendb();
            $params=  array('titel'=>$titel, 'omschrijving'=>$omschrijving, 'prijs'=>$prijs);
            $productendb->insert($params);
            return func_get_args();
            
        }   
        
        public function getAll()
        {
            $select = $this->select();
            $result = $this->fetchAll($select);
            return $result;
        }
    
        /**
         * Delete the product by id
         * @param int $id 
         * @return boolean
         * 
         */
        public function deleteProducts($id)
        {

         //$where  = $this->getAdapter()->quoteInto('id= ?', $id);
         //$this->delete($where);  
            return true;

        }
        
        /**
         * 
         * @param int $id
         * @param string $titel
         * @param string $omschrijving
         * @param float $prijs
         * @return object
         */
        public function modProducts($id, $titel, $omschrijving, $prijs)                 
        {
            $product  = stClass();
            return $product;
        }

}

