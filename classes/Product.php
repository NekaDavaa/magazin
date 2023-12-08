<?php
class Product {
    
    public function __construct() {

    }

    public function loadFromXml($xmlPath) {
    	 $this->xml = simplexml_load_file("$xmlPath");
    }

    public function getAllProducts() {
    	 $this->products = [];
			foreach ($this->xml->record as $product) {
    			$this->products[] = $product;
				}
				return $this->products;
    }


}
