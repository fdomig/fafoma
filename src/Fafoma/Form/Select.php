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
use \Fafoma\Form\Option;

/**
 * Select element class.
 *
 * @author Franziskus Domig
 */
class Select extends Element {

    /**
     * @var Option[]
     */
    protected $options = array();

    /**
     * Constructor
     *
     * @param string $name
     * @param string[] $attributes
     * @param mixed[] $data
     */
    public function __construct($name = null, $attributes = array(), $data = null) {
        parent::__construct($name, $attributes, $data);
    }

    /**
     * Add an option to this select element.
     *
     * @param \Fafoma\Form\Option $option
     */
    public function addOption(Option $option) {
        $this->options[] = $option;
    }

    /**
     * Add an array of options to this select element.
     *
     * @param \Fafoma\Form\Option[] $options
     */
    public function addOptions(array $options) {
        foreach ($options as $option) {
            $this->options[] = $option;
        }
    }

    /* (non-PHPdoc)
     * @see Fafoma\Form.Element::setValue()
     */
    public function setValue($value) {
        foreach ($this->options as $option) {
            if ($value == $option->getValue()) {
                $option->select();
                return;
            }
        }
    }

    /* (non-PHPdoc)
     * @see Fafoma\Form\Element::render()
     */
    public function render(Renderer $renderer) {
        $str = '<select';
        foreach ($this->attributes as $k => $v) {
            $str.= sprintf(' %s="%s"', $k, $v);
        }
        $str.='>';

        foreach ($this->options as $option) {
            $str.= $option->render($renderer);
        }

        $str.='</select>';
        return $str;
    }

    /* (non-PHPdoc)
     * @see Fafoma\Form.Element::validate()
     */
    public function validate() {
        throw new \Exception("Method not yet implemented.");
    }
}
