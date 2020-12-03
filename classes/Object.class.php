<?php

// This class must extend all classes allowing to create objects.
abstract class Object {
    
    /**
     * Object constructor.
     * @param array $data
     */
    public function __construct($data = array()) {
        if (!empty($data))
            $this->affects($data);
    }
    
    /**
     * This method associates the values in the table with the right variables.
     *
     * @param array $data
     */
    abstract protected function affects(array $data);
}