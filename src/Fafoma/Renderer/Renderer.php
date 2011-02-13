<?php

namespace Fafoma\Renderer;

abstract class Renderer {
    
    /**
     * 
     */
    public function __construct() {
        
    }
    
    /**
     * @param \Fafoma\Manager $manager
	 * @return string
     */
    abstract public function renderForm(\Fafoma\Manager $manager);
}