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
namespace Fafoma;

/**
 *
 */
class Manager {

    /**
     * The form id.
     *
     * @var string
     */
    protected $id;

    /**
     * The form method.
     *
     * @var string
     */
    protected $method;

    /**
     * The form elements.
     *
     * @var Form\Element[]
     */
    protected $elements = array();

    /**
     * @var string
     */
    protected $action = '';

    /**
     *
     * @param string $id
     * @param string $method (optional)
     */
    public function __construct($id, $method = 'post') {
        $this->id = $id;
        $this->method = $method;
    }

    /**
     * Add a form element to this manager.
     *
     * @param Form\Element $element The element to add.
     */
    public function addElement(Form\Element $element) {
        $this->elements[] = $element;
    }

    /**
     * Get the form elements of this manager.
     *
     * @return Form\Element[]
     */
    public function getElements() {
        return $this->elements;
    }

    /**
     * Get the id of this form.
     *
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the method of this form.
     *
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * Validate this form.
     */
    public function validate() {
        foreach ($this->elements as $element) {
            $element->validate();
        }
    }

    /**
     * Export the values of this form.
     *
     * @return string[]
     */
    public function export() {
        $data = array();
        foreach ($this->elements as $element) {
            $data[$element->getName()] = $element->export();
        }
        return $data;
    }

    /**
     * Bind POST values to this form.
     *
     * @param array $values
     */
    public function bind(array $values) {
        foreach ($this->elements as $element) {
            if (array_key_exists($element->getName(), $values)) {
                $element->setFilteredValue($values[$element->getName()]);
            }
        }
    }

    /**
     * Set the form action.
     *
     * @param string $action
     */
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     * Get the form action.
     */
    public function getAction() {
        return $this->action;
    }
}