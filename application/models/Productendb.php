<?php

class Application_Model_Productendb extends Zend_Db_Table_Abstract
{
    //definieren hoe de tabel eruit ziet    
    protected $_name = 'producten';
    protected $_primary = 'id';

 
/**
 * Add product
 * @param string $titel
 * @param string $omschijving
 * @param float $prijs
 * @return object $product
 */
        /*public function addProducts($titel,$omschrijving,$prijs)
        {
            $this->insert($params);
            
        }   
        */
        /**
         * Delete the product by id
         * @param int $id 
         * @return boolean
         * 
         */
        /*public function deleteProducts($id)
        {

         //$where  = $this->getAdapter()->quoteInto('id= ?', $id);
         //$this->delete($where);  
            return true;

        }*/
        
        /**
         * 
         * @param int $id
         * @param string $titel
         * @param string $omschrijving
         * @param float $prijs
         * @return object
         */
       /* public function modProducts($id, $titel, $omschrijving, $prijs)                 
        {
            $product  = stClass();
            return $product;
        }*/

}

