<?php namespace lang\types\unittest;

use lang\ClassLoader;

abstract class ImplementationTest extends \unittest\TestCase {
  private static $fixture;

  /**
   * Defines class using implementation trait with a public buffer method.
   *
   * @return void
   */
  #[@beforeClass]
  public static function defineImplementation() {
    $implementation= static::implementation();

    self::$fixture= ClassLoader::defineType(
      $implementation.'Instance',
      ['kind' => 'class', 'extends' => [], 'implements' => [], 'use' => [$implementation]],
      '{ public $buffer; public function __construct($initial) { $this->buffer= (string)$initial; }}'
    );
  }

  #[@test, @values([['', 0], ['Test', 4], ['Über', 4]])]
  public function length_of($value, $expected) {
    $this->assertEquals($expected, self::$fixture->newInstance($value)->length());
  }

  #[@test, @values([
  #  ['T', 0], ['i', 2], ['Ü', 29],
  #  ['y', -1], ['', -1],
  #  [null, -1]
  #])]
  public function indexOf($search, $expected) {
    $this->assertEquals($expected, self::$fixture->newInstance('This is the test string with Ünicode')->indexOf($search));
  }

  #[@test, @values([
  #  ['T', 0], ['i', 31], ['Ü', 29],
  #  ['y', -1], ['', -1],
  #  [null, -1]
  #])]
  public function lastIndexOf($search, $expected) {
    $this->assertEquals($expected, self::$fixture->newInstance('This is the test string with Ünicode')->lastIndexOf($search));
  }

  #[@test, @values([
  #  [0, 'Unittest'], [4, 'test'],
  #  [8, ''], [9, '']
  #])]
  public function substring_with_start($start, $expected) {
    $this->assertEquals($expected, self::$fixture->newInstance('Unittest')->substr($start)->buffer);
  }

  #[@test, @values([
  #  [0, 8, 'Unittest'], [4, 4, 'test'],
  #  [0, -4, 'Unit'], [4, -4, ''],
  #  [8, 0, ''], [9, 1, '']
  #])]
  public function substring_with_start_and_length($start, $length, $expected) {
    $this->assertEquals($expected, self::$fixture->newInstance('Unittest')->substr($start, $length)->buffer);
  }
}