<?php namespace lang\types\unittest;

use lang\IllegalArgumentException;

abstract class NumTest extends \unittest\TestCase {

  /**
   * Returns a number
   *
   * @param  string|double|int $input
   * @return lang.types.Num
   */
  protected abstract function newFixture($input);

  #[@test, @values(['0', 0, '1', 1, '-1', -1])]
  public function can_create_from($value) {
    $this->newFixture($value);
  }

  #[@test, @values([
  #  [0, 0], [0.0, 0], ['0', 0], ['0.0', 0],
  #  [1, 1], [1.0, 1], ['1', 1], ['1.0', 1], ['+1', 1], ['+1.0', 1],
  #  [-1, -1], [-1.0, -1], ['-1', -1], ['-1.0', -1]
  #])]
  public function intVal($value, $expected) {
    $this->assertEquals($expected, $this->newFixture($value)->intVal());
  }

  #[@test, @values([
  #  [0, 0.0], [0.0, 0.0], ['0', 0.0], ['0.0', 0.0],
  #  [1, 1.0], [1.0, 1.0], ['1', 1.0], ['1.0', 1.0], ['+1', 1.0], ['+1.0', 1.0],
  #  [-1, -1.0], [-1.0, -1.0], ['-1', -1.0], ['-1.0', -1.0]
  #])]
  public function doubleVal($value, $expected) {
    $this->assertEquals($expected, $this->newFixture($value)->doubleVal());
  }

  #[@test, @values([1, 1.0, '1', '+1'])]
  public function equals_these($other) {
    $this->assertEquals($this->newFixture(1), $this->newFixture($other));
  }

  #[@test]
  public function can_be_cast_to_string() {
    $this->assertEquals('1', (string)$this->newFixture(1));
  }
}