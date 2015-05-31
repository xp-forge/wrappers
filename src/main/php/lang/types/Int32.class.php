<?php namespace lang\types;

use lang\IllegalArgumentException;

final class Int32 extends Num {

  /**
   * Creates a new int32 (-2^31 - (2^31)- 1)
   *
   * @param  string|double|int $initial
   */
  public function __construct($initial) {
    if ($initial < -2147483648 || $initial > 2147483647) {
      throw new IllegalArgumentException('Out of range for an int32: '.$initial);
    }
     $this->wrapped= (int)$initial;
  }
}