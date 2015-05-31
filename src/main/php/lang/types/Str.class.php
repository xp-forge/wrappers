<?php namespace lang\types;

final class Str implements \lang\Value {
  private $buffer;
  public static $EMPTY;

  use StrImpl;

  static function __static() {
    self::$EMPTY= new self('');
  }

  /**
   * Creates a new string
   *
   * @param  string $initial
   */
  public function __construct($initial) {
    $this->buffer= (string)$initial;
  }

  /**
   * Returns whether this string starts with a given fragment.
   *
   * @param   string|self $fragment
   * @return  bool
   */
  public function startsWith($fragment) {
    $l= strlen($fragment);
    return $l > 0 && 0 === strncmp($this->buffer, $fragment, $l);
  }

  /**
   * Returns whether this string ends with a given fragment.
   *
   * @param   string|self $fragment
   * @return  bool
   */
  public function endsWith($fragment) {
    $l= strlen($fragment);
    return $l > 0 && $l <= $this->length() && 0 === substr_compare($this->buffer, $fragment, -$l, $l);
  }

  /**
   * Returns whether a given substring is contained in this string
   *
   * @param   string|self $fragment
   * @return  bool
   */
  public function contains($fragment) {
    return -1 !== $this->indexOf($fragment);
  }

  /**
   * Concatenates the given argument to the end of this string and returns 
   * a new Str instance.
   * 
   * @param   string|self $arg
   * @return  self
   */
  public function concat($arg) {
    return new self($this->buffer.$arg);
  }

  /**
   * Compare the given value to this object
   *
   * @param   var $cmp
   * @return  int
   */
  public function compareTo($cmp) {
    return $cmp instanceof self ? strcmp($cmp->buffer, $this->buffer) : -1;
  }

  /**
   * Returns a hashcode for this string object
   *
   * @return  string
   */
  public function hashCode() {
    return md5($this->buffer);
  }

  /**
   * Returns a string representation of this string
   *
   * @return  string
   */
  public function toString() {
    return nameof($this).'("'.$this->buffer.'")';
  }

  /**
   * Returns a string representation of this string
   *
   * @return  string
   */
  public function __toString() {
    return $this->buffer;
  }
}