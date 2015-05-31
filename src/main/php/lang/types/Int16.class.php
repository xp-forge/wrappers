<?php namespace lang\types;

use lang\IllegalArgumentException;

final class Int16 extends Num {

  /**
   * Creates a new short (-2^15 - (2^15)- 1)
   *
   * @param  string|double|int $initial
   */
  public function __construct($initial) {
    if ($initial < -32768 || $initial > 32767) {
      throw new IllegalArgumentException('Out of range for an int16: '.$initial);
    }
    parent::__construct((int)$initial);
  }
}