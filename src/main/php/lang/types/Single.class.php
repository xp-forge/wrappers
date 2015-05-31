<?php namespace lang\types;

final class Single extends Num {

  /**
   * Creates a new single (-3.4 x 10^38 to +3.4 x 10^38), a.k.a "float"
   *
   * @param  string|double|int $initial
   */
  public function __construct($initial) {
     $this->wrapped= (double)$initial;
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