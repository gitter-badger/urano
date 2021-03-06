<?php

namespace UranoCompiler\Parselets;

use \UranoCompiler\Parser\TokenReader;
use \UranoCompiler\Ast\Expr\Expr;
use \UranoCompiler\Ast\Expr\OperatorExpr;
use \UranoCompiler\Lexer\Token;

class BinaryOperatorParselet implements IInfixParselet
{
  public $precedence;
  public $is_right;

  public function __construct($precedence, $is_right)
  {
    $this->precedence = $precedence;
    $this->is_right = $is_right;
  }

  public function parse(TokenReader $parser, Expr $left, Token $token)
  {
    $right = $parser->_expr($this->precedence - ($this->is_right ? 1 : 0));
    return new OperatorExpr($left, $token->getTag(), $right);
  }

  public function getPrecedence()
  {
    return $this->precedence;
  }
}
