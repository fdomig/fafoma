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

namespace Fafoma\Tests\Form;

use Fafoma\Form\Textarea;
use Fafoma\Renderer\Html;

class TextareaTest extends \PHPUnit_Framework_TestCase {

    private $text;

    private $renderer;

    public function setUp() {
        $this->text = new Textarea('description', array(
			'class' => 'required',
			'id' => '1337'
		));
		$this->renderer = new Html();
    }

    /**
     * @covers Fafoma\Form\Textarea::render
     */
    public function testRender() {
        $this->assertEquals(
			'<textarea class="required" id="1337" name="description" cols="50" rows="10"></textarea>',
        $this->text->render($this->renderer),
			'->render() returns the textarea');
    }

    /**
     * @covers Fafoma\Form\Textarea::getLabel
     */
    public function testLabel() {
        $this->text->setLabel('Description');
        $this->assertEquals('Description', $this->text->getLabel(),
			'->getLabel() returns the label');
    }

}