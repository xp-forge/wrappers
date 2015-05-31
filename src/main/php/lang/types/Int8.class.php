<?php namespace lang\types;

use lang\IllegalArgumentException;

final class Int8 extends Num {

  /**
   * Creates a new int8 (-2^7 - (2^7)- 1)
   *
   * @param  string|double|int $initial
   */
  public function __construct($initial) {
    if ($initial < -128 || $initial > 127) {
      throw new IllegalArgumentException('Out of range for an int8: '.$initial);
    }
     $this->wrapped= (int)$initial;
  }
}