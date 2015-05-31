<?php namespace lang\types\unittest;

use lang\types\Int32;
use lang\IllegalArgumentException;

class Int32Test extends NumTest {

  /**
   * Returns a number
   *
   * @param  string|double|int $input
   * @return lang.types.Num
   */
  protected function newFixture($input) { return new Int32($input); }

  #[@test, @values([-2147483648, 2147483647])]
  public function extremes($value) {
    $this->newFixture($value);
  }

  #[@test, @expect(IllegalArgumentException::class), @values(['-2147483649', '2147483648'])]
  public function boundaries_exceeded($value) {
    $this->newFixture($value);
  }
}