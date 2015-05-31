<?php namespace lang\types;

abstract class Num extends \lang\Object {
  protected $wrapped;

  /** @return int */
  public function intVal() { return (int)$this->wrapped; }

  /** @return double */
  public function doubleVal() { return (double)$this->wrapped; }

  /**
   * Returns whether a given object is equal to this object
   *
   * @param   var $cmp
   * @return  bool
   */
  public function equals($cmp) {
    return $cmp instanceof self && $cmp->wrapped === $this->wrapped;
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
    return $this->getClassName().'('.$this->wrapped.')';
  }

  /** @return string */ 
  public function __toString() { return (string)$this->wrapped; }
}