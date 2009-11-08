<style>
    div {
        border: 1px solid gray;
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
<div style="background: #ffffff;">
<h2><a href=".">AFL - A Functional Language</a></h2>
<a name='intro'></a>
    <div>
        <h3>Introduction</h3>
        <p>
        As the name implies AFL is a pure functional language. The goal of creating AFL was to create an easy to parse functional language and help         me refurbish my PHP knowledge. :)
        </p>
        <p>
        While writing AFL code, understand that it is just a hobby project and hence the parser relies on white-spaces to separate language tokens.
        <b>Hence white spaces are significant so use them liberally</b>
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
            </ol>
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
% 6 3
\ 2 3
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

            <pre>! VAR</pre>
        <p>
            Boolean NOT.
        </p>
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
    </div>


    <div>
        <h3><a name="userdef"></a>User defined functions</h3>

            <pre>f arg1 arg2 = expression</pre>
        <p>
            Define function "f" with arguments arg1 arg2
        </p>

            <pre>f 1 2</pre>
        <p>
            Call the above function with arguments 1 2
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
<pre class='code'>[ 4, 6, 8, 10, 12, 200 ]</pre>
<p>We have used two items in the initial list instead of an empty list here.</p>




    </div>

</div>
