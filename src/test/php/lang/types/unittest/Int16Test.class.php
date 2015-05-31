<?php namespace lang\types\unittest;

use lang\types\Int16;
use lang\IllegalArgumentException;

class Int16Test extends NumTest {

  /**
   * Returns a number
   *
   * @param  string|double|int $input
   * @return lang.types.Num
   */
  protected function newFixture($input) { return new Int16($input); }

  #[@test, @values([-32768, 32767])]
  public function extremes($value) {
    $this->newFixture($value);
  }

  #[@test, @expect(IllegalArgumentException::class), @values([-32769, 32768])]
  public function boundaries_exceeded($value) {
    $this->newFixture($value);
  }
}