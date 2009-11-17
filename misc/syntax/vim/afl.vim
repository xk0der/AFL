" Vim syntax file
" Language:		AFL - A Functional language
" Maintainer:	amit@xkoder.com
" URL:			http://xkoder.com/afl
" Version:		0.0.1
" Last Change:	17/Nov/2009
"
" Optimized for -lang afl

" Quit when a syntax file was already loaded
if exists("b:current_syntax")
  finish
endif

" List of AFL functions
" Maths
"syn match aflFunction  /+/ 
"syn match aflFunction  /-/ 
"syn match aflFunction  /*/ 
"syn match aflFunction  /\// 
"syn match aflFunction  /\\/ 
"syn match aflFunction  /%/

" Boolean
syn match aflFunction /&&\d/
syn match aflFunction "||"
syn match aflFunction "!"

" Bitwise
syn match aflFunction "&"
syn match aflFunction "|"
syn match aflFunction "^"
syn match aflFunction "<<"
syn match aflFunction ">>"

" Relational
syn match aflFunction "<"
syn match aflFunction ">"
syn match aflFunction "=="
syn match aflFunction "!="
syn match aflFunction "<="
syn match aflFunction ">="

" List expansion
syn match aflFunction "\.\."

" List operators 
syn match aflFunction "@&"
syn match aflFunction "@#"

" Comments
syn region aflComment		start=";[^a-zA-Z0-9|\r\n]" end="$" contains=aflTodo

" List builder
syn region aflListBuilder   start="@@" end="$" contains=ALL 
syn region aflListBuilder   start="@\^" end="$" contains=ALL
syn region aflListBuilder   start="@\$" end="$" contains=ALL

"integer number
syn match  aflNumber			"\<\d\+\(\(l\|u\|ul\|ll\|ull\)\{,1\}\)\>"
syn match  aflNumber			"\<\d\+e\(\([+-]\)\{,1\}\)\d\+\>"
"floating point number
syn match  aflNumber			"\<\d\+\.\d*\>"
syn match  aflNumber			"\(\(\<\d\+\)\{,1\}\)\(\(\.\)\{,1\}\)\d\+e\(\([+-]\)\{,1\}\)\d\+\(\(f\)\{,1\}\)\>"
syn match  aflNumber			"\d\+\.\d*[def]\>"

syn match aflListSep ","
syn match aflList "\[.*\]" contains=aflListSep,aflNumber

syn match aflPlaceHolder "#" 
syn match aflParen "("
syn match aflParen ")"
syn match aflEqual "="
syn match aflDefinition ".* =" contains=aflEqual

syn match aflTodo "TODO"
syn match aflTodo "XXX"

hi def link aflComment		Comment
hi def link aflFunction	    Function
hi def link aflListBuilder  Conditional
hi def link aflNumber		Number
hi def link aflList         String
hi def link aflPlaceHolder  Define
hi def link aflParen        Conditional
hi def link aflDefinition   Type
hi def link aflEqual        Conditional
hi def link aflTodo         Todo

"hi def link fbPreProc		PreProc
"hi def link fbOption		PreProc
"hi def link fbThis			PreProc
"hi def link fbCommentTags	PreProc
"hi def link fbDefine		Define
"hi def link fbLabel			Label
"hi def link fbCond			Conditional
"hi def link fbRepeat		Repeat
"hi def link fbError			Error
"hi def link fbStatement		Conditional
"hi def link fbString		String
"hi def link fbSpecial		Special
"hi def link fbTodo			Todo
"hi def link aflFunction		Function
"hi def link fbType			Type
"hi def link fbFilenum 		Type
"hi def link fbBlockComment	Comment

let b:current_syntax = "afl"

" vim: ts=4
