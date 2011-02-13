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
namespace Fafoma\Renderer;

/**
 * HTML renderer class.
 *
 * @author Franziskus Domig
 */
class Html extends Renderer {

    /**
     * @var string
     */
    private $form_class = 'form';

    /**
     * @var string
     */
    private $item_class = 'item';

    /**
     * @var string
     */
    private $submit_class = 'submit';

    /**
     * Constructor
     */
    public function __construct() {

    }

    /**
     * @param \Fafoma\Manager $manager
     * @return string
     */
    public function renderForm(\Fafoma\Manager $manager) {
        $str = '<form id="'.$manager->getId().'" method="'
        .$manager->getMethod().'" class="'.$this->form_class.'"'
        .' action="' . $manager->getAction() . '">';

        $str.= '<fieldset>';

        // elements
        foreach ($manager->getElements() as $element) {
            $str.= '<div class="'.$this->item_class.'">';
            $str.= '<label for="'.$element->getId().'">';
            $str.= $element->getLabel();
            $str.= '</label><br />';
            $str.= $element->render($this);
            $str.= '</div>';
        }

        // submit button
        $str.= '<div class="'.$this->submit_class.'">';
        $str.= '<input type="submit" value="Submit" /></div>';

        $str.= '</fieldset>';
        $str.='</form>';
        return $str;
    }
}