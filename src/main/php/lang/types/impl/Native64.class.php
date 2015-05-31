<?php namespace lang\types\impl;

use lang\IllegalArgumentException;

/**
 * Implements 64-bit natively 
 */
trait Native64 {

  /**
   * Creates a new long long (-2^63 - (2^63)- 1)
   *
   * @param  string|double|int $initial
   */
  public function __construct($initial) {
    if ($initial < -9223372036854775808 || $initial > 9223372036854775807) {
      throw new IllegalArgumentException('Out of range for an int64: '.$initial);
    }
    parent::__construct((int)$initial);
  }

}