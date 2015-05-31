<?php namespace lang\types\impl;

/**
 * Implements string functionality using the *mbstring* extension 
 *
 * @ext mbstring
 */
trait Mbstring {

  public function length() {
    return mb_strlen($this->buffer);
  }

  public function substr($start, $length= null) {
    return new self(mb_substr($this->buffer, $start, $length));
  }

  public function indexOf($needle, $start= 0) {
    if ('' === (string)$needle) return -1;
    $p= mb_strpos($this->buffer, $needle, $start);
    return false === $p ? -1 : $p;
  }

  public function lastIndexOf($needle) {
    if ('' === (string)$needle) return -1;
    $p= mb_strrpos($this->buffer, $needle);
    return false === $p ? -1 : $p;
  }
}