<?php namespace lang\types\unittest;

use lang\types\Str;

class StrTest extends \unittest\TestCase {

  #[@test, @values(['', 'Test'])]
  public function can_create_from($value) {
    new Str($value);
  }

  #[@test, @values([['', 0], ['Test', 4], ['Über', 4]])]
  public function length_of($value, $expected) {
    $this->assertEquals($expected, (new Str($value))->length());
  }

  #[@test, @values([
  #  ['T', 0], ['i', 2], ['Ü', 29], [new Str('e'), 10],
  #  ['y', -1], ['', -1], [new Str(''), -1],
  #  [null, -1]
  #])]
  public function indexOf($search, $expected) {
    $this->assertEquals($expected, (new Str('This is the test string with Ünicode'))->indexOf($search));
  }

  #[@test, @values([
  #  ['T', 0], ['i', 31], ['Ü', 29], [new Str('e'), 35],
  #  ['y', -1], ['', -1], [new Str(''), -1],
  #  [null, -1]
  #])]
  public function lastIndexOf($search, $expected) {
    $this->assertEquals($expected, (new Str('This is the test string with Ünicode'))->lastIndexOf($search));
  }

  #[@test, @values([
  #  ['', false], ['Test', false], ['u', false],
  #  ['U', true], ['Unit', true], ['Unittest', true]
  #])]
  public function startsWith($fragment, $expected) {
    $this->assertEquals($expected, (new Str('Unittest'))->startsWith($fragment));
  }

  #[@test, @values([
  #  ['', false], ['Test', false], ['T', false],
  #  ['t', true], ['test', true], ['Unittest', true]
  #])]
  public function endsWith($fragment, $expected) {
    $this->assertEquals($expected, (new Str('Unittest'))->endsWith($fragment));
  }

  #[@test, @values([
  #  ['', false], ['Test', false], ['T', false],
  #  ['t', true], ['test', true], ['Unittest', true],
  #  ['tt', true]
  #])]
  public function contains($fragment, $expected) {
    $this->assertEquals($expected, (new Str('Unittest'))->contains($fragment));
  }

  #[@test, @values([
  #  [0, 'Unittest'], [4, 'test'],
  #  [8, ''], [9, '']
  #])]
  public function substring_with_start($start, $expected) {
    $this->assertEquals(new Str($expected), (new Str('Unittest'))->substr($start));
  }

  #[@test, @values([
  #  [0, 8, 'Unittest'], [4, 4, 'test'],
  #  [0, -4, 'Unit'], [4, -4, ''],
  #  [8, 0, ''], [9, 1, '']
  #])]
  public function substring_with_start_and_length($start, $length, $expected) {
    $this->assertEquals(new Str($expected), (new Str('Unittest'))->substr($start, $length));
  }

  #[@test]
  public function concat() {
    $this->assertEquals(new Str('Unittests are great'), (new Str('Unittests'))->concat(' are great'));
  }

  #[@test]
  public function concat_empty() {
    $this->assertEquals(new Str('Unittests'), (new Str('Unittests'))->concat(Str::$EMPTY));
  }

  #[@test]
  public function equals_itself() {
    $fixture= new Str('Test');
    $this->assertEquals($fixture, $fixture); 
  }

  #[@test]
  public function equals_another_instance_with_same_buffer() {
    $this->assertEquals(new Str('Test'), new Str('Test')); 
  }

  #[@test]
  public function equals_empty() {
    $this->assertEquals(Str::$EMPTY, new Str('')); 
  }

  #[@test]
  public function can_be_cast_to_string() {
    $this->assertEquals('Test', (string)new Str('Test'));
  }
}