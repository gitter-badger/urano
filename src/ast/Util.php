<?php

namespace UranoCompiler\Ast;

use \UranoCompiler\Ast\Stmt\BlockStmt;
use \UranoCompiler\Parser\Parser;

class Util
{
  static function makeBlock($body, Parser $parser)
  {
    $string_builder = [];

    if ($body instanceof BlockStmt) {
      $string_builder[] = $body->format($parser);
    } else {
      $string_builder[] = '[';
      $string_builder[] = PHP_EOL;
      $string_builder[] = '  ';
      $string_builder[] = $body->format($parser);
      $string_builder[] = ']';
    }

    return implode($string_builder);
  }
}
