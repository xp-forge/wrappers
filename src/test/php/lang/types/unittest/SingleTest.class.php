<?php namespace lang\types\unittest;

use lang\types\Single;
use lang\IllegalArgumentException;

class SingleTest extends NumTest {

  /**
   * Returns a number
   *
   * @param  string|double|int $input
   * @return lang.types.Num
   */
  protected function newFixture($input) { return new Single($input); }

  #[@test, @values([
  #  [2.49, 1, 2.5], 
  #  [2.4999999, 1, 2.5],
  #  [2.49, 2, 2.49],
  #  [2.485, 2, 2.49],
  #  [2.484, 2, 2.48],
  #  [2.4, 0, 2.0],
  #  [2.5, 0, 3.0]
  #])]
  public function round($value, $precision, $expected) {
    $this->assertEquals($expected, $this->newFixture($value)->round($precision)->doubleVal());
  }
}