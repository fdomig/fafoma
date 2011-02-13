<?php
/**
 * Fafoma
 *
 * Copyright (c) 2011, Franziskus Domig
 * All rights reserved.
 *
 *
 * Redistribution and use in source and binary forms, with or without
 * modification are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 *     * Neither the name of Franziskus Domig nor the names of his contributors
 *       may be used to endorse or promote products derived from this software
 *       without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES;
 *
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
namespace Fafoma\Form;

use \Fafoma\Renderer\Renderer;

/**
 * Abstract element class.
 *
 * @author Franziskus Domig
 */
abstract class Element {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string[]
     */
    protected $attributes = array();

    /**
     * @var string
     */
    protected $label = '';

    /**
     * @var mixed[]
     */
    protected $data = null;

    /**
     * @var mixed[]
     */
    protected $filters = array();

    /**
     * Constructor
     *
     * @param string $name
     * @param string[] $attributes
     * @param mixed[] $data
     */
    public function __construct($name = null, $attributes = array(), $data = null) {
        $this->setAttributes($attributes);
        $this->setName($name);
        $this->data = $data;
        if (!array_key_exists('id', $this->attributes)) {
            $this->generateId();
        }
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->attributes['name'] = $name;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->attributes['name'];
    }

    /**
     * @return string
     */
    public function getId() {
        return $this->attributes['id'];
    }

    /**
     * Set a value to this element.
     *
     * @param mixed $value
     */
    public function setValue($value) {
        $this->attributes['value'] = $value;
    }

    /**
     * Set a value which gets filtered.
     *
     * @param mixed $value
     */
    public function setFilteredValue($value) {
        foreach ($this->filters as $k => $v) {
            // TODO: change to validator classes
            $value = filter_var($value, $v['filter'], $v['options']);
        }
        $this->setValue($value);
    }

    /**
     * Get the value of this element.
     *
     * @return string
     */
    public function getValue() {
        return $this->attributes['value'];
    }

    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * Set the label of this element.
     * @param string $label
     */
    public function setLabel($label) {
        $this->label = $label;
    }

    /**
     * @param string $filter
     * @param array $options
     */
    public function addFilter($filter, $options = null) {
        $this->filters[] = array(
			'filter' => $filter,
			'options' => $options,
        );
    }

    /**
     * @param \Fafoma\Renderer\Renderer $renderer
     * @return string
     */
    abstract public function render(Renderer $renderer);

    /**
     * Validate this element
     * @return boolean
     */
    abstract public function validate();

    /**
     * Export the elements value.
     *
     * @return string
     */
    public function export() {
        return $this->getValue();
    }

    /**
     * @param string[] $attributes
     */
    protected function setAttributes(array $attributes) {
        $this->attributes = $attributes;
    }

    /**
     * Generate a unique id for this element.
     */
    private function generateId() {
        $this->attributes['id'] = uniqid($this->getName() . '-');
    }
}