<?php

namespace UranoCompiler\Lexer;

class SymbolTable
{
  private $table   = [];
  private $counter =  0;

  public function add(&$value)
  {
    $pointer = $this->counter;
    $this->table[$pointer] = $value;
    $this->counter++;
    return $pointer;
  }

  public function get($pointer)
  {
    return $this->table[$pointer];
  }
}
