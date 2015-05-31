<?php namespace lang\types\unittest;

use lang\types\Int64;
use lang\IllegalArgumentException;

class Int64Test extends NumTest {

  /**
   * Returns a number
   *
   * @param  string|double|int $input
   * @return lang.types.Num
   */
  protected function newFixture($input) { return new Int64($input); }

  #[@test, @values(['-9223372036854775808', '9223372036854775807'])]
  public function extremes($value) {
    $this->newFixture($value);
  }

  #[@test, @expect(IllegalArgumentException::class), @values(['-9223372036854775809', '9223372036854775808'])]
  public function boundaries_exceeded($value) {
    $this->newFixture($value);
  }
}