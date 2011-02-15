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

error_reporting(E_ALL);
require_once '../autoload.php';

$mngr = new Fafoma\Manager('example');

$salutation = new Fafoma\Form\Select('salutation', array('class' => 'input required'));
$salutation->addOptions(array(
    new \Fafoma\Form\Option('Mr.', array(), 'mr'),
    new \Fafoma\Form\Option('Mrs.', array(), 'mrs')
));
$salutation->setLabel('Salutation');
$mngr->addElement($salutation);

$firstname = new Fafoma\Form\Text('firstname', array('class' => 'input required'));
$firstname->setLabel('Firstname');
$mngr->addElement($firstname);

$lastname = new Fafoma\Form\Text('lastname', array('class' => 'input required'));
$lastname->setLabel('Lastname');
$mngr->addElement($lastname);

$description = new Fafoma\Form\Textarea('description', array('class' => 'textarea required'));
$description->setLabel('Description');
$mngr->addElement($description);

$renderer = new Fafoma\Renderer\Html();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
<title>Fafoma Example</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="fafoma.css" />
<script type="text/javscript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javscript" src="fafoma.js"></script>
</head>

<body>
<h1>Example fafoma form</h1>
<?php
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $mngr->bind($_POST);
}
echo $renderer->renderForm($mngr);
?>
</body>
</html>
