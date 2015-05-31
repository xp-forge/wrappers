<?php namespace lang\types;

final class Double extends Num {

  /**
   * Creates a new double (±5.0 x 10^324 to ±1.7 x 10^308)
   *
   * @param  string|double|int $initial
   */
  public function __construct($initial) {
    parent::__construct((double)$initial);
  }

  /**
   * Rounds the number with the given precision
   *
   * @param  int $precision
   * @param  self
   */
  public function round($precision= 0) {
    return new self(round($this->wrapped, $precision));
  }
}