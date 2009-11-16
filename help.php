<html>
<head>
<title>AFL - A Functional Language : Documentation </title>
<style>
    div {
        border: 1px solid #dddddd;
        padding: 5px;
        margin: 2px;
    }

    pre {
        color: #0000ff;
        font-size: 12px;
    }

    p {
        font-size: 12px;
    }

    h3 {
        color: #006544;
    }

    a:link {
        color: #006DAE;
        text-decoration: none;
        border-bottom: 1px dotted #cccccc;
    }

    a:visited {
        color: #006DAE;
        text-decoration: none;
        border-bottom: 1px dotted #cccccc;
    }

    a:hover {
        background: #FFAC00;
        color: #ffffff;
        border-bottom: 1px solid #FF0000;
        text-decoration: none;
        -moz-border-radius: 3px;
    }

    a:active {
        color: #006DAE;
        text-decoration: none;
        border-bottom: 1px dotted #cccccc;
    }

    .code {
        color: #000000;
        background: #cccccc;
        width: 30%;
        border: 1px dotted #888888;
        padding: 3px;
    }
</style>
</head>
<body>
<div style="background: #ffffff;">
<h2><a href=".">AFL - A Functional Language</a></h2>
<a name='intro'></a>
    <div>
        <h3>Introduction</h3>
        <p>
        As the name implies AFL is a functional language. The goal of creating AFL was to create an easy to parse functional language and help         me refurbish my PHP knowledge. :)
        </p>
        <p>
         Use the table of contents below to find out what's available, how to use things, what can be done and what can't.
        </p>
        <p>
        You may also want to try out AFL code snippets available from a drop down at this page <a href='.'>AFL - A Functional Language</a>
        </p>
    </div>

    <div>
        <a name='toc'></a><h3>Table of contents</h3>
        <ol>
            <li> <a href="#intro">Introduction</a>
            <li> <a href="#inbuilt">Inbuilt functions</a>
            <ol>
                <li> <a href="#math">Math functions</a>
                <li> <a href="#bool">Boolean functions</a>
                <li> <a href="#bitwise">Bitwise functions</a>
            </ol>
            <li> <a href="#userdef">User defined functions</a>
            <li> <a href="#lists">Lists</a>
            <ol>
                <li> <a href="#listexpand">lists expansion</a>
                <li> <a href="#listbuild">List builder</a>
                <li> <a href="#listop">List operators</a>
            </ol>
            <li> <a href='#comments'>Comments</a>
            <li> <a href='#complex'>Complex expression</a>
            <li> <a href='#limitations'>Limitations and special notes</a>
        </ol>
    </div>
        
    <div>
    <a name="inbuilt"></a><h3>Inbuilt functions </h3>
    AFL provides inbuilt functions to perform following operations:
        <ul>
            <li> <b>Arithmetic operations</b> <br>
                 <p>Result of all arithmetic operations is either float or integer depending on the context.</p>
            <li> <b>Boolean operations</b> <br>
                <p>
                In AFL boolean TRUE is represented by 1<br>
                and boolean FALSE is represented by 0.<br>
                All boolean functions return either TRUE or FALSE i.e 1 or 0.
                </p>

            <li> <b>Bitwise operations</b><br>
                <p>
                Bitwise functions allow you to manipulate individual bits in integer number.
                </p>
        </ul>
    </div>

    <div>

        <h3><a name="math"></a>Math Functions</h3>

            <pre>+ VAR VAR</pre>
        <p>
            Sum of two numbers.
        </p>

            <pre>- VAR VAR</pre>
        <p>
            Subtraction of two numbers.
        </p>

            <pre>/ VAR VAR</pre>
        <p>
            Division of two number - result is float.
        </p>

            <pre>\ VAR VAR</pre>
        <p>
            Integer Division.
        </p>

            <pre>% VAR VAR</pre>
        <p>
            Modulus of two numbers.
        </p>

            <pre>* VAR VAR</pre>
        <p>
            Product of two numbers.
        </p>

<b>Examples:</b>
<pre class="code">
/ 24 2
* 7 9
- 2 10
% 4 3
\ 10 3
</pre>

<b>Output:</b>
<pre class="code">
12
63
-8
1
3
</pre>

    </div>

    <div>
        <h3><a name="bool"></a>Boolean Functions</h3>

            <pre>&amp;&amp; VAR VAR</pre>
        <p>
            Boolean AND
        </p>

            <pre>|| VAR VAR</pre>
        <p>
            Boolean OR.
        </p>
            
            <pre>^ VAR VAR</pre>
        <p>
            Exclusive OR.
        </p>

            <pre>! VAR</pre>
        <p>
            Boolean NOT.
        </p>

<b>Examples:</b>
<pre class="code">
&amp;&amp; 1 0
|| 1 0
^ 1 1
! 0
</pre>

<b>Output:</b>
<pre class="code">
0
1
0
1
</pre>
    </div>

    <div>

        <h3><a name="bitwise"></a>Bitwise Functions</h3>

            <pre>&amp; VAR VAR</pre>
        <p>
            Bitwise AND.
        </p>

            <pre>| VAR VAR</pre>
        <p>
            Bitwise OR.
        </p>

            <pre>~ VAR</pre>
        <p>
            Complement.
        </p>
        
            <pre>&lt;&lt; VAR VAR</pre>
        <p>
            Left shift
        </p>
        
        <p>
            <pre>&gt;&gt; VAR VAR</pre>
            Right shift
        </p>

<b>Examples:</b>
<pre class="code">
& 4 3
| 4 3
~ 4
&lt;&lt; 4 1
&gt;&gt; 4 1
</pre>

<b>Output:</b>
<pre class="code">
0
7
-5
8
2
</pre>
    </div>

    <div>
        <h3><a name="comparison"></a>Comparison Functions</h3>

            <pre>&lt; VAR VAR</pre> 
        <p>
            Less than.
        </p>

            <pre>&gt; VAR VAR</pre> 
        <p>
            Greater than.
        </p>

            <pre>&lt;= VAR VAR</pre> 
        <p>
            Less than OR equal to.
        </p>

            <pre>&gt;= VAR VAR</pre> 
        <p>
            Greater than OR equal to.
        </p>

            <pre>== VAR VAR</pre> 
        <p>
            Equal to.
        </p>

            <pre>!= VAR VAR</pre> 
        <p>
            Not equal to.
        </p>

<b>Examples:</b>
<pre class="code">
&lt; 4 9
&gt; 4 9
&lt;= 4 9
&gt;= 4 9
== 4 9
!= 4 9
</pre>

<b>Output:</b>
<pre class="code">
1
0
1
0
0
1
</pre>
    </div>

    <div>
        <h3><a name="userdef"></a>User defined functions</h3>
            
        <p>
            <b>Defining/creating functions</b><br>
            You can define functions by using the following syntax.
        </p>
            <pre>f argument(s) = expression</pre>
        <p>
            A function may accept ZERO or more arguments. 
        </p>
        Examples:
        <pre class='code'>
i = 10
f n = + n 1
pi = / 22 7
g a b c = + (* a c) (* b c)
        </pre>
        <p>
            <b>Calling/using functions</b><br>
            To call a function type it's name followed by values for the arguments. Another definite way to call a function is by enclosing the function name and arguments within parentheses '( )'.
        </p>
        Examples:
        <pre class='code'>
i
f 10
(pi)
g (i) 7 8
        </pre>
       <p>
       In the above examples parentheses around 'pi' are optional. But while calling function 'g' with 'i' as one of the argument, you need to enclose 'i' with parentheses. This is required so that function 'i' gets called and its value is used as the first argument of function 'g'.
       </p>
        <p>
        <b>Simulating IF conditions for a function</b><br>
        Suppose you have a math function defined as follows
        </p>
    <pre>
     F n = 2n 
         | 1 IF n = 0 
     </pre>
        <p>
        To define such a function in AFL you write the following code
        </p>
        <pre class='code'>
f n = * 2 n
f 0 = 1
        </pre>
        <p>
            So to simulate IF conditions for a function, you provide as many definitions for the function as needed to meet the given criteria. Appropriate function will be called based on the argument being passed, when the function is invoked.
        </p>
    </div>

    <div>
        <h3><a name="lists"></a>Lists</h3>

            <pre>[ 1, 2, 3 ]</pre> 
        <p>
            List with three values
        </p>

            <pre>[]</pre>
        <p>
            Empty List
        </p>

        <p>
            Lists in AFL are very limited in functionality. Refer to <a href='#limitations'>limitations</a> section for more information.
        </p>
    </div>

    <div>
        <h3><a name="listexpand"></a>List Expansion</h3>

            <pre>.. END_VALUE</pre> 
        <p>
            Create list with values 0 to END_VALUE
        </p>

            <pre>.. START_VALUE END_VALUE</pre>
        <p>
            Create list with values START_VALUE to END_VALUE
        </p>

            <pre>.. START_VALUE END_VALUE STEP</pre>
        <p>
            Create list with values between START_VALUE and END_VALUE with difference of STEP from start to end.
        </p>
<b>Examples:</b>
<pre class="code">
.. 10
.. 1 10
.. 1 10 2
</pre>

<b>Output:</b>
<pre class="code">
[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
[1, 3, 5, 7, 9]
</pre>
    </div>

    <div>
        <h3><a name="listbuild"></a>List Builder</h3>

            <pre>@@ INITIAL_LIST : NEXT_VALUE : CONDITION</pre>
        <p>
            Build a list starting with inital value, next value
        </p>
        
            <pre>@@ INITIAL_LIST : NEXT_LIST_ITEM : NEXT_VALUE : CONDITION</pre>
        <p>
            Build a list starting with inital value, next value
        </p>

        <p>
        By default list builder token appends the next list item to the list. You can prepend the next list item by using '@^' to build a list. 
        '@$' is a synonym for '@@' which mean append to list.
        </p>

        <pre>NEXT_VALUE</pre>
        <p>
            This is the expression or a function which will calculate the next value for building the list and for the CONDITION part.<br>
            The expression needs to have exactly one argument prefixed with the '#' symbol, for example:
            <pre class='code'> - #10 1</pre>
            The value prefixed with '#' will be used as the starting value for the list builder.
        </p>
        
        <pre>CONDITION</pre>
        <p>
            This result of the CONDITION determines whether list building continues or stops. If the CONDITION expression results in a False value, list building is stopped. If the CONDITION expression results in a True value, list building continues.<br>
            The CONDITION expression needs to have at least ONE argument as the symbol '#'. This will be replaced with whatever NEXT_VALUE evaluates to.
            Example of a CONDITION expression:
            <pre class='code'> &gt; # 0 </pre>
        </p>    

        <pre>NEXT_LIST_ITEM</pre>
        <p>
            This section, if present, calculates the next value that will be put into the list being built.
            Like the CONDITION expression, NEXT_LIST_ITEM expression too needs to have at least ONE argument as the symbol '#', which will be replaced with the results of evaluation of NEXT_VALUE expression.
            Example:
            <pre class='code'> * # 2 </pre>
        </p>
<br>     

<p><b>Example of 3-TUPLE List Builder</b></p>
<pre class='code'>
 @@ [] : - #10 1 : &gt; # 0
</pre>
<p>The above code will output:</p>
<pre class='code'>[ 9, 8, 7, 6, 5, 4, 3, 2, 1, 0 ]</pre>
   
<br>     

<p><b>Example of 4-TUPLE List Builder</b></p>
<pre class='code'>
 @$ [] : * # 2 : - #10 1 : &gt; # 0
</pre>
<p>The above code will output:</p>
<pre class='code'>[ 20, 18, 16, 14, 12, 10, 8, 6, 4, 2 ]</pre>
<p> Note that we can use '@$' in place of '@@'. They both mean append new items at the end of list. </p>

<br>     

<p><b>Example of 4-TUPLE Prepend List Builder</b></p>
<pre class='code'>
 @^ [100, 200] : + # 2 : - #10 2 : &gt; # 0
</pre>
<p>The above code will output:</p>
<pre class='code'>[ 4, 6, 8, 10, 12, 100, 200 ]</pre>
<p>Apart from the prepend list builder, the examples also shows the use of non-empty list as initial value. </p>
    </div>
    
    <div>
        <h3><a name="listop"></a>List operators</h3>
            <pre>@& LIST</pre>
        <p>
            List length : This operator computes the length of the list.
        </p>
            <pre>@# VAR LIST</pre>
        <p>
            List Item: Use this operator to extract a list item out of a list.<br>
            VAR is the index of the item in the list. Indexes start with ZERO (0). 
        </p>

<b>Examples:</b>
<pre class="code">
@& [1,2,3,4]
@# 2 [1,2,3,4]
</pre>
<b>Output:</b>
<pre class="code">
4
3
</pre>

    </div>
    
    <div>
        <h3><a name="comments"></a>Comments</h3>

        <p>
            You may insert comments into AFL code by starting a line with a semi-colon ';'.<br>
            Comments need to be on a line of their own.
        </p>
            Example:
            <pre class='code'>
; This is a comment
f a b = + a b <span style='color:red; font-weight: bold;'>; This won't work</span>
            </pre>
    </div>
    
    <div>
        <h3><a name="complex"></a>Complex expressions</h3>

        <p>
            You may use output of one function as input of another function to create complex expressions.
        </p>
            Example:
            <pre class='code'>
f a = + a 1
g b = + a 2
f (g 7)
            </pre>

            <p>Notice how we used parentheses around 'g 7' to tell AFL that this is a function call, evaluate it first. Had we not used parentheses, AFL would have complained about not being able to found a matching signature for 'f g 7', i.e. a function named f accepting two arguments.
            <br>

            So the rule of the thumb is to always enclose functions in parentheses when passing their result to another function. See another example below.
            </p>
            Example:
            <pre class='code'>
i = 10
f a = * a 2
f (i)
f 3
            </pre>
            <p>
            As you can see 'i' is a function which takes no arguments and always returns 10. To pass its result to 'f' we need to enclose it inside parentheses as shown. Literal values can be passed without parentheses.
            </p>
            <p>
            You may use as many deeply nested functions using parentheses, as the need may be.
            </p>
            Example:
            <pre class='code'>
+ 1 (+ 2 (+ 3 4))
            </pre>
        </p>
    </div>
    <div>
        <h3><a name="limitations"></a>Limitations and special notes</h3>
        
        <p>
        There are some intentional limitations to the AFL language to keep it simple. Most of them are quite obvious from the documentation above.
        The things that are not obvious are listed here.
        </p>

        <p>
            <b> Lists can only be used as the last argument for a function or expression </b><br>
            This limitation, as stated in the introduction, is to keep the parsing simple. Since list-builder's output is a list hence list-builders too can only be used at the end of an expression.
        </p>
    </div>
</div>

<div style="margin:auto; text-align:center; background: #cccccc; padding:3px;">
<p style="margin:0px; padding:0px; font-size: 10px; font-weight: bold;">
(c) 2009, Amit Singh (xk0der), All Rights Reserved.
</p>
<p style="font-size: 10px; margin:0px; padding:0px;">
<a href="http://xkoder.com">http://xkoder.com</a> | <a href="http://blog.xkoder.com">blog.xkoder.com</a>
</p>
</div>
</body>
</html>
