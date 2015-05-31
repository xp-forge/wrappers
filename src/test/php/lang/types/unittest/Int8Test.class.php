<?php namespace lang\types\unittest;

use lang\types\Int8;
use lang\IllegalArgumentException;

class Int8Test extends NumTest {

  /**
   * Returns a number
   *
   * @param  string|double|int $input
   * @return lang.types.Num
   */
  protected function newFixture($input) { return new Int8($input); }

  #[@test, @values([-128, 127])]
  public function extremes($value) {
    $this->newFixture($value);
  }

  #[@test, @expect(IllegalArgumentException::class), @values([-129, 128])]
  public function boundaries_exceeded($value) {
    $this->newFixture($value);
  }
}