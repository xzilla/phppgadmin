<?php
// $Id: decorator.inc.php,v 1.1.2.4 2005/03/09 12:21:10 jollytoad Exp $

// This group of functions and classes provides support for
// resolving values in a lazy manner (ie, as and when required)
// using the Decorator pattern.

###TODO: Better documentation!!!

// Construction functions:

function field($fieldName, $default = null) {
	return new FieldDecorator($fieldName, $default);
}

function merge() {
	return new ArrayMergeDecorator(func_get_args());
}

function concat() {
	return new ConcatDecorator(func_get_args());
}

function noEscape($value) {
	if (is_a($value, 'Decorator')) {
		$value->esc = false;
		return $value;
	}
	return new Decorator($value, false);
}

// Resolving functions:

function value(&$var, &$fields, $esc = null) {
	if (is_a($var, 'Decorator')) {
		$val = $var->value($fields);
		if (!$var->esc) $esc = null;
	} else {
		$val = $var;
	}
	if (is_string($val)) {
		switch($esc) {
			case 'xml':
				###TODO: proper escaping for XML
			case 'html':
				return htmlentities($val);
			case 'url':
				return urlencode($val);
		}
	}
	return $val;
}

function value_xml(&$var, &$fields) {
	return value($var, $fields, 'xml');
}

function value_xml_attr($attr, &$var, &$fields) {
	$val = value($var, $fields, 'xml');
	if (!empty($val))
		return " {$attr}=\"{$val}\"";
	else
		return '';
}

function value_url(&$var, &$fields) {
	return value($var, $fields, 'url');
}

// Underlying classes:

class Decorator
{
	var $esc = true;
	
	function Decorator($value, $esc = true) {
		$this->v = $value;
		$this->esc = $esc;
	}
	
	function value() {
		return $this->v;
	}
}

class FieldDecorator extends Decorator
{
	function FieldDecorator($fieldName, $default = null) {
		$this->f = $fieldName;
		if ($default !== null) $this->d = $default;
	}
	
	function value($fields) {
		return isset($fields[$this->f]) ? $fields[$this->f] : (isset($this->d) ? $this->d : null);
	}
}

class ArrayMergeDecorator extends Decorator
{
	function ArrayMergeDecorator($arrays) {
		$this->m = $arrays;
	}
	
	function value($fields) {
		$accum = array();
		foreach($this->m as $var) {
			$accum = array_merge($accum, value($var, $fields));
		}
		return $accum;
	}
}

class ConcatDecorator extends Decorator
{
	function ConcatDecorator($values) {
		$this->c = $values;
	}
	
	function value($fields) {
		$accum = '';
		foreach($this->c as $var) {
			$accum .= value($var, $fields);
		}
		return $accum;
	}
}
?>
