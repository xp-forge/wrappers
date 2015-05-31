<?php namespace lang\types\impl;

use lang\IllegalArgumentException;

/**
 * Implements 64-bit with the *bcmath* extension
 *
 * @ext  bcmath
 */
trait Bcmath {

  /**
   * Creates a new long long (-2^63 - (2^63)- 1)
   *
   * @param  string|double|int $initial
   */
  public function __construct($initial) {
    $initial= (string)$initial;
    if (-1 === bccomp($initial, '-9223372036854775808') || 1 === bccomp($initial, '9223372036854775807')) {
      throw new IllegalArgumentException('Out of range for an int64: '.$initial);
    }
    parent::__construct(bcadd($initial, 0));
  }
}