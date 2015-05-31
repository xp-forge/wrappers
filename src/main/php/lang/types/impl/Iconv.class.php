<?php namespace lang\types\impl;

/**
 * Implements string functionality using the *iconv* extension 
 *
 * @ext iconv
 */
trait Iconv {

  public function length() {
    return iconv_strlen($this->buffer);
  }

  public function substr($start, $length= null) {
    if (null === $length) {
      return new self(iconv_substr($this->buffer, $start));
    } else {
      return new self(iconv_substr($this->buffer, $start, $length));
    }
  }

  public function indexOf($needle, $start= 0) {
    $p= iconv_strpos($this->buffer, $needle, $start);
    return false === $p ? -1 : $p;
  }

  public function lastIndexOf($needle) {
    $p= iconv_strrpos($this->buffer, $needle);
    return false === $p ? -1 : $p;
  }
}