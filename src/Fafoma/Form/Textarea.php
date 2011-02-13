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
 * Textarea class.
 *
 * @author Franziskus Domig
 */
class Textarea extends Element {

    /**
     * Constructor
     *
     * @param string $name
     * @param string[] $attributes
     * @param mixed[] $data
     */
    public function __construct($name = null, $attributes = array(), $data = null) {
        parent::__construct($name, $attributes, $data);
        $this->addFilter(FILTER_SANITIZE_STRING);
    }
    
    /* (non-PHPdoc)
     * @see Fafoma\Form.Element::render()
     */
    public function render(Renderer $renderer) {
		$str = '<textarea';
		foreach ($this->attributes as $k => $v) {
			if ('value' == $k) {
				continue;
			}
			$str.= sprintf(' %s="%s"', $k, $v);
		}
		if (!in_array('cols', $this->attributes)) {
			$str.= ' cols="50"';
		}
    	if (!in_array('rows', $this->attributes)) {
			$str.= ' rows="10"';
		}
		$str.= '>';
		if (array_key_exists('value', $this->attributes)) {
			$str.= sprintf('%s', $this->attributes['value']);
		}
		$str.= '</textarea>';
		return $str;
    }

	/* (non-PHPdoc)
	 * @see Fafoma\Form.Element::validate()
	 */
	public function validate() {
		throw new \Exception("Method not yet implemented.");
	}
}
