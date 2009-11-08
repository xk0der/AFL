<?php

require_once('debug.php');

class Interpreter {
    private $symbolTable;
    const F_NAME = 0;

    public function __construct() {
        // Predfined internal functions
        $this->symbolTable = array(
         '+_VAR_VAR' =>     array('rvalue' => '+ a b', 'args' => array('a','b')),
         '*_VAR_VAR' =>     array('rvalue' => '* a b', 'args' => array('a','b')),
         '/_VAR_VAR' =>     array('rvalue' => '/ a b', 'args' => array('a','b')),
         '\_VAR_VAR' =>     array('rvalue' => '\ a b', 'args' => array('a','b')),
         '%_VAR_VAR' =>     array('rvalue' => '% a b', 'args' => array('a','b')),
         '-_VAR_VAR' =>     array('rvalue' => '- a b', 'args' => array('a','b')),
         '&_VAR_VAR' =>     array('rvalue' => '& a b', 'args' => array('a','b')),
         '&&_VAR_VAR' =>    array('rvalue' => '&& a b', 'args' => array('a','b')),
         '|_VAR_VAR' =>     array('rvalue' => '| a b', 'args' => array('a','b')),
         '||_VAR_VAR' =>    array('rvalue' => '|| a b', 'args' => array('a','b')),
         '^_VAR_VAR' =>     array('rvalue' => '^ a b', 'args' => array('a','b')),
         '~_VAR' =>         array('rvalue' => '~ a', 'args' => array('a')),
         '.._VAR' =>        array('rvalue' => '.. a', 'args' => array('a')),
         '.._VAR_VAR' =>    array('rvalue' => '.. a b', 'args' => array('a', 'b')),
         '.._VAR_VAR_VAR' => array('rvalue' => '.. a b c', 'args'=> array('a', 'b', 'c')),
         '<<_VAR_VAR' =>    array('rvalue' => '<< a b', 'args' => array('a', 'b')),
         '>>_VAR_VAR' =>    array('rvalue' => '>> a b', 'args' => array('a', 'b')),
         '<_VAR_VAR' => array('rvalue' => '< a b', 'args' => array('a', 'b')),
         '>_VAR_VAR' => array('rvalue' => '> a b', 'args' => array('a', 'b')),
         '==_VAR_VAR' => array('rvalue' => '== a b', 'args' => array('a', 'b')),
         '<=_VAR_VAR' => array('rvalue' => '<= a b', 'args' => array('a', 'b')),
         '>=_VAR_VAR' => array('rvalue' => '>= a b', 'args' => array('a', 'b')),
         '!=_VAR_VAR' => array('rvalue' => '!= a b', 'args' => array('a', 'b')),
         '!_VAR' => array('rvalue' => '! a', 'args' => array('a')),
        );
    }

    public function run (&$program) {
        $output = "";
        $line = preg_split("/\n/", $program);
        for($i = 0; $i < sizeof($line); $i++ )
        {
            $line[$i] = trim(str_replace("("," ( ", $line[$i]));
            $line[$i] = trim(str_replace(")"," ) ", $line[$i]));
            $line[$i] = trim(str_replace("["," [ ", $line[$i]));
            $line[$i] = trim(str_replace("]"," ] ", $line[$i]));
            $line[$i] = trim(preg_replace("/\s+/"," ", $line[$i]));
            if($line[$i] != "")
            {
                DEBUG::log("Processing : ".htmlentities($line[$i]));
                $output .= $this->process($line[$i]);
            }
        }
        DEBUG::dump("Symbol Table", $this->symbolTable);
        return $output;
    }

    private function process ($code) {
            $output = "";

            if(substr($code, 0, 1) == ";") return ""; // Line is a comment 

            else if(strpos($code, " = ") === False)
            {
                $output .= $this->execute($code) . "\n";
            }
            else
            {
                list($lvalue, $rvalue) = explode(" = ", $code);
                $lvalue = trim($lvalue);
                $rvalue = trim($rvalue);
                $this->storeSymbol($lvalue, $rvalue);
            }
            return $output;
    }

    private function storeSymbol ($lvalue, $rvalue) {
        $sig = $this->createSignature($lvalue);
        $args = $this->getArgs($lvalue);
        $this->symbolTable[$sig] = array ( 'rvalue' => $rvalue,  'args' => $args);
    }

    private function getArgs($lvalue) {
        $l = explode(" ", $lvalue);
        $retval = array();
        for($i = 1; $i < sizeof($l); $i++) {
            $retval[$i-1] = $l[$i];
        }
        return $retval;
    }

    private function createSignature ($lvalue) {
        $l = explode(" ", $lvalue);
        $sig = $l[Interpreter::F_NAME];
        
        if(substr($l[0], 0, 1) == "[" || (isset($l[1]) && substr($l[1], 0, 1) == "[")  ) {
            return false;
        }

        if(!(strpos($lvalue, ('(')) === False )) return false;

        for($i = 1 ; $i < sizeof($l); $i++ ) {
            if(is_numeric($l[$i])) {
                $sig .= "_" . $l[$i];
            } else if ($l[$i] != "") {
                $sig .= "_VAR"; 
            }
        }
        return $sig; 
    }

    private function createRawSignature ($lvalue, $index) {
        $l = explode(" ", $lvalue);
        $sig = $l[Interpreter::F_NAME];

        if(is_bool($index) && $index == False) {
            $index = sizeof($l);
        }

        if(substr($l[0], 0, 1) == "[" || (isset($l[1]) && substr($l[1], 0, 1) == "[")  ) {
            return False;
        }
        
        if(!(strpos($lvalue, ('(')) === False )) return False;

        for($i = 1 ; $i < sizeof($l); $i++ ) {
            if($l[$i] != "") {
                if($i <= $index)
                {
                    $sig .= "_VAR"; 
                } else {
                    $sig .= "_".$l[$i];
                }
            }
        }
        return $sig; 
    }

    private function execute ($code) {
        $output = "";
        $sig = $this->createSignature($code); 

        $safe_code = htmlentities($code);
        $safe_sig = htmlentities($sig);
        $raw_sig = "";
        $safe_raw_sig = "";
        $foundRawSig = false;

        if(     !(strpos($code, "@^" ) === False) 
          ||    !(strpos($code, "@$") === False)
          ||    !(strpos($code, "@@") === False)
          ) {
            $code = $this->expandLists($code);
            DEBUG::log("Expand list new code :".$code);
        }

        if($sig) DEBUG::log("Executing : Code = ".$safe_code." | Signature = ".$safe_sig);

        if($sig && isset($this->symbolTable[$sig]))
        {
            DEBUG::log("Matched terminating signature : $safe_sig | rvalue = ".htmlentities($this->symbolTable[$sig]['rvalue']));
            $rvalue = $this->symbolTable[$sig]['rvalue'];
            $raw_sig = $this->createRawSignature($rvalue, false);
       

            if(isset($this->symbolTable[$raw_sig])) {
                $output = $this->execute($rvalue);
            } else {
                $output = $rvalue; 
            }
            $foundRawSig = true;

            $rvalue = $output;
            while(!(strpos($rvalue,"(") === False)) $rvalue = $this->processComplex($rvalue);
            $output = $rvalue;
                
            if(sizeof(explode(" ", $output)) > 1) {
                $output = $this->execute($output);
            }
        }
       
       
        for($k = 0; !$foundRawSig && $k < sizeof(explode(" ", $code)); $k++)  {
            $raw_sig = $this->createRawSignature($code, $k);

            if($raw_sig === False) break;
        
            if(trim($raw_sig) == "") return "";
            
            $safe_raw_sig = htmlentities($raw_sig);
            
            DEBUG::log("Executing : Code = ".$safe_code." | raw signature : ".$safe_raw_sig);

            if(isset($this->symbolTable[$raw_sig]))
            {
                $foundRawSig = true;
                DEBUG::log("Matched raw signature : ".$safe_raw_sig);
            
                
                $args = $this->symbolTable[$raw_sig]['args'];
                $rvalue = $this->symbolTable[$raw_sig]['rvalue'];
                $l = explode(" ", $code);

                for($i = 0; $i < sizeof($args); $i++)
                {
                    if(isset($l[$i + 1])) {
                        $rvalue = trim(str_replace(" ".$args[$i]." ", " ".$l[$i + 1]." ", " ".$rvalue." "));
                        $rvalue = trim(str_replace(" #".$args[$i]." ", " #".$l[$i + 1]." ", " ".$rvalue." "));
                    } else {
                        $output .= "Error $code - Argument count mismatch\n";
                    }
                }
                

                while(!(strpos($rvalue,"(") === False)) $rvalue = $this->processComplex($rvalue);
                if(!(strpos($rvalue,"[") === False)) {$output .= $this->execute($rvalue); break;}

                $r = explode(" ", $rvalue);
                DEBUG::dump("Arguments", $r);
                switch($r[0]) {
                    case "+":
                           $output .= $this->add($r[1], $r[2]); 
                        break;
                    case "-":
                           $output .= $this->substract($r[1], $r[2]); 
                        break;
                    case "*";
                           $output .= $this->multiply($r[1], $r[2]); 
                        break;
                    case "/":
                           $output .= $this->divide($r[1], $r[2]);
                           break;
                    case "\\":
                           $output .= $this->divide_int($r[1], $r[2]);
                           break;
                    case "%":
                           $output .= $this->modulus($r[1], $r[2]);
                           break;
                    case "&&":
                           $output .= $this->f_and($r[1], $r[2]);
                           break;
                    case "||":
                           $output .= $this->f_or($r[1], $r[2]);
                           break;
                    case "&":
                           $output .= $this->b_and($r[1], $r[2]);
                           break;
                    case "|":
                           $output .= $this->b_or($r[1], $r[2]);
                           break;
                    case "^":
                           $output .= $this->b_xor($r[1], $r[2]);
                           break;
                    case "~":
                           $output .= $this->b_complement($r[1]);
                           break;
                    case "<<":
                           $output .= $this->leftShift($r[1], $r[2]);
                           break;
                    case ">>":
                           $output .= $this->rightShift($r[1], $r[2]);
                           break;
                    case "<":
                           $output .= $this->f_less($r[1], $r[2]);
                           break;
                    case ">":
                           $output .= $this->f_greater($r[1], $r[2]);
                           break;
                    case "<=":
                           $output .= $this->f_less_or_equal($r[1], $r[2]);
                           break;
                    case ">=":
                           $output .= $this->f_greater_or_equal($r[1], $r[2]);
                           break;
                    case "==":
                           $output .= $this->f_equal($r[1], $r[2]);
                           break;
                    case "!=":
                           $output .= $this->f_notEqual($r[1], $r[2]);
                           break;
                    case "!":
                           $output .= $this->f_not($r[1]);
                           break;
                    case "..":
                           if(isset($r[3])) { 
                               $output .= $this->createRange($r[1], $r[2], $r[3]);
                           } else if(isset($r[2])) {
                               $output .= $this->createRange($r[1], $r[2], 1);
                           } else {
                               $output .= $this->createRange(0 ,$r[1], 1);
                           }
                           break;
                    default:
                           DEBUG::log("Recursing :".htmlentities($rvalue));
                           $output .= $this->execute($rvalue);
                        break;
                }
            }

            if($foundRawSig) break;
        }
        

        if(!$foundRawSig)
        {
            if(!(strpos($code, "(") === False)) {
                $newcode = $code;
                
                while (strpos($newcode, "(") != False )
                {
                    DEBUG::log("Processing Complex : $safe_code");
                    $newcode = $this->processComplex($newcode);
                }
                
                if(sizeof(explode(" ", $newcode)) > 1) {
                    $output .= $this->execute($newcode);
                }
            } 
            else if(!(strpos($code, '[') === False)) {
                list($lvalue, $rvalue) = explode('[', $code);
                $lvalue = trim($lvalue);
                $rvalue = substr($rvalue, 0, strpos($rvalue, ']'));
                $listVal = explode(",", $rvalue);

                if(strlen($lvalue) != 0) {
                    for($i = 0; $i < sizeof($listVal); $i++) {
                        $newCode = trim($lvalue." ".trim($listVal[$i]));
                        $output .= $this->execute($newCode)."\n";
                    }
                } else {
                    $output .= "[".$rvalue."]";
                }
            } else {
                if( preg_match("/^[0-9]+$/",trim($code)) != False ) {
                    $output .= $safe_code;
                } else {
                    $output .= "<span class='error'>Error: No match found for symbol `$safe_code'</span>";
                }
            }
        }

        Debug::log("Output : ".$output);

        return $output;
    }

    private function expandLists($code) {
        $appendAtEnd = True; // AppendAt End
        $listCode = '@@';

        if(!(strpos($code, '@$') === False)) $listCode = '@$';
        else if(!(strpos($code, '@^')=== False)) {$listCode = '@^'; $appendAtEnd = False;}

        $listAT = strpos($code, $listCode);
        $prefix = substr($code, 0, $listAT);

        $_t = substr($code, $listAT + 2, strlen($code));

        $i_nextValList = false;
        if(sizeof(explode(':', $_t)) == 4) {
            list($initVal, $i_nextValList, $i_nextVal, $i_condition) = explode(':', $_t);
        } else {
            list($initVal, $i_nextVal, $i_condition) = explode(':', $_t);
        }
        
        $initVal = str_replace('[', '', $initVal);
        $initVal = str_replace(']', '', $initVal);

        $initVal = explode(",", $initVal);
        $_t = array();
        
        for($i = 0; $i < sizeof($initVal); $i++)
        {
            if(trim($initVal[$i]) != "") {
                $_t[sizeof($initVal)] = $initVal[$i]; 
            }
        }

        $initVal = $_t;

        $b_condition = True;
       
        if(!($i_nextValList === False)) $i_nextValList = trim($i_nextValList);
        $i_nextVal = trim($i_nextVal);
        $i_condition = trim($i_condition);

        $nextVal = "";
        for( $i = strpos($i_nextVal, '#') + 1; substr($i_nextVal, $i, 1) != " " && $i < strlen($i_nextVal); $i++) {
            $nextVal .= substr($i_nextVal, $i, 1);
        }
        
        $i_nextVal = preg_replace('/\#[0-9]+/','#', $i_nextVal);
        $output = trim(implode(',',$initVal));
        $comma = "";
        if(strlen($output) > 0) $comma = ", ";
        while($b_condition) {

            if(!($i_nextValList === False)) {
                $nextCode = $i_nextValList;
                while(!(strpos($nextCode, '#') === False )) $nextCode = trim(str_replace(" # ", " ".$nextVal." ", " ".$nextCode." "));
                $nextListVal = $this->execute($nextCode);
            }

            $nextCode = $i_nextVal;
            while(!(strpos($nextCode, '#') === False )) $nextCode = trim(str_replace(" # ", " ".$nextVal." ", " ".$nextCode." "));
            $nextVal = $this->execute($nextCode);
            
            $condition = trim(str_replace(" # ", " ".$nextVal." ", " ".$i_condition." "));
            $b_condition = intval($this->execute($condition)) == 0 ? False : True;

            $val = $nextVal;
            if(!($i_nextValList === False)) $val = $nextListVal;
            
            if($appendAtEnd) $output .= $comma.$val;
            else $output = $val.$comma.$output;
            $comma = ", ";
        }

        $initVal = explode(',', $output);

        DEBUG::dump("Expanded List", $initVal);

        return $prefix." [ ".$output." ]";
    }

    private function processComplex($code) {
        list ($output, $openParen, $closeParen) = $this->extractParen($code);
        DEBUG::log("Next Code : ".$output);

        $flag = false;
        $output = $this->execute($output);

        $raw_sig = $this->createRawSignature($output, false);
        if(isset($this->symbolTable[$raw_sig])) {
            $newcode = substr($code, 0, $openParen)."(".$output.")".substr($code, $closeParen+ 1, strlen($code));
        } else {
            $newcode = substr($code, 0, $openParen).$output.substr($code, $closeParen + 1, strlen($code));
        }
        DEBUG::log("Old Code : ".htmlentities($code)." , New Code : ".htmlentities($newcode));

        return $newcode;
    }

    private function extractParen($code) {
        $startParen = 0;
        $endParen = 0;
        for($i = 0; $i < strlen($code); $i++) {
            $c = substr($code, $i, 1);
            if($c == "(") $startParen = $i;
            if($c == ")") {
                $endParen = $i;
                break;
            }
        }

        $output = trim(substr($code, $startParen+1, ($endParen - $startParen) - 1)); 

        return array( $output, $startParen, $endParen);
    }

    private function createRange($rangeStart , $rangeEnd, $step) {
        if($step == 0) { 
            DEBUG::log("<span class='error'>.. $rangeEnd $rangeEnd $step (Warning): range operator was passed ZERO as `step' value</span>");
            return $rangeStart;
        }

        $output = "[";
        
        for($i = $rangeStart; $step >= 0 ? $i <= $rangeEnd : $i >= $rangeEnd; $i += $step) {
            $output .= "".$i.", "; 
        }

        if($output == "[") {
            $output = "";
        } else {
            $output = substr($output, 0, strlen($output) - 2). "]";
        }

        return $output;
    }
    
    private function f_less ($num1, $num2) {
        return ($num1) < ($num2) ? 1 : 0;
    } 
    
    private function f_less_or_equal ($num1, $num2) {
        return ($num1) <= ($num2) ? 1 : 0;
    } 
    
    private function f_greater ($num1, $num2) {
        return ($num1) > ($num2) ? 1 : 0;
    } 
    
    private function f_greater_or_equal ($num1, $num2) {
        return ($num1) >= ($num2) ? 1 : 0;
    } 
    
    private function f_notEqual ($num1, $num2) {
        return ($num1) != ($num2) ? 1 : 0;
    }
    
    private function f_equal ($num1, $num2) {
        return ($num1) == ($num2) ? 1 : 0;
    }
    
    private function f_not($num1) {
        return (intval($num1) == 0) ? 1 : 0;
    }

    private function f_and ($num1, $num2) {
        return (intval($num1) && intval($num2)) ? 1 : 0;
    } 
    
    private function f_or ($num1, $num2) {
        return intval($num1) || intval($num2) ? 1 : 0;
    } 
    
    private function b_and ($num1, $num2) {
        return intval($num1) & intval($num2);
    }
    
    private function b_or ($num1, $num2) {
        return intval($num1) | intval($num2);
    }
    
    private function b_xor ($num1, $num2) {
        return intval($num1) ^ intval($num2);
    }
    
    private function leftShift ($num1, $num2) {
        return intval($num1) << intval($num2);
    }
    
    private function rightShift ($num1, $num2) {
        return intval($num1) >> intval($num2);
    }

    private function b_complement($num1) {
        return ~intval($num1);
    }

    private function add ($num1, $num2) {
        return $num1 + $num2;
    }

    private function multiply ($num1, $num2) {
        return $num1 * $num2;
    }

    private function substract ($num1, $num2) {
        return $num1 - $num2;
    }

    private function divide($num1, $num2) {
        if($num2 == 0) return "<span class='error'>Error: Division by ZERO `/ $num1 $num2'</span>\n";
        return floatval($num1) / floatval($num2);
    }
    
    private function divide_int($num1, $num2) {
        if($num2 == 0) return "<span class='error'>Error: Division by ZERO `/ $num1 $num2'</span>\n";
        return (int)(intval($num1) / intval($num2));
    }

    private function modulus($num1, $num2) {
        if($num2 == 0) return "<span class='error'>Error: Division by ZERO `% $num1 $num2'</span>\n";
        return floatval($num1) % floatval($num2);
    }

}
