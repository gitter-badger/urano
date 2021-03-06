<?php

namespace UranoCompiler\Ast\Stmt;

use \UranoCompiler\Ast\Util;
use \UranoCompiler\Parser\Parser;

class ForeachStmt implements Stmt
{
  public $by_reference;
  public $alias;
  public $generator;
  public $body;

  public function __construct($by_reference, $alias, $generator, $body)
  {
    $this->by_reference = $by_reference;
    $this->alias = $alias;
    $this->generator = $generator;
    $this->body = $body;
  }

  public function format(Parser $parser)
  {
    $is_simple = !($this->body instanceof BlockStmt);
    $string_builder = ['foreach '];
    $string_builder[] = $this->alias;
    $string_builder[] = ' in ';
    $string_builder[] = $this->generator->format($parser);
    $string_builder[] = ' ';

    if ($is_simple) {
      $string_builder[] = "\n";
      $parser->openScope();
      $string_builder[] = $parser->indent();
      $parser->closeScope();
    }

    $string_builder[] = $this->body->format($parser);
    return implode($string_builder);
  }
}
