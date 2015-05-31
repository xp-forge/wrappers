<?php namespace lang\types;

abstract class Num implements \lang\Value {
  protected $wrapped;

  /** @return int */
  public function intVal() { return (int)$this->wrapped; }

  /** @return double */
  public function doubleVal() { return (double)$this->wrapped; }

  /**
   * Compare the given value to this object
   *
   * @param   var $cmp
   * @return  int
   */
  public function compareTo($cmp) {
    return $cmp instanceof self ? (int)($this->wrapped - $cmp->wrapped) : -1;
  }

  /**
   * Returns a hashcode for this number object
   *
   * @return  string
   */
  public function hashCode() {
    return (string)$this->wrapped;
  }

  /**
   * Returns a string representation of this number
   *
   * @return  string
   */
  public function toString() {
    return nameof($this).'('.$this->wrapped.')';
  }

  /** @return string */ 
  public function __toString() { return (string)$this->wrapped; }
}