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

        <p>
            <pre>+ VAR VAR</pre>
            Sum of two numbers.
        </p>

        <p>
            <pre>- VAR VAR</pre>
            Subtraction of two numbers.
        </p>

        <p>
            <pre>/ VAR VAR</pre>
            Division of two number - result is float.
        </p>

        <p>
            <pre>\ VAR VAR</pre>
            Integer Division.
        </p>

        <p>
            <pre>% VAR VAR</pre>
            Modulus of two numbers.
        </p>

        <p>
            <pre>* VAR VAR</pre>
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

        <p>
            <pre>&amp;&amp; VAR VAR</pre>
            Boolean AND
        </p>

        <p>
            <pre>|| VAR VAR</pre>
            Boolean OR.
        </p>

        <p>
            <pre>! VAR</pre>
            Boolean NOT.
        </p>
    </div>

    <div>

        <h3><a name="bitwise"></a>Bitwise Functions</h3>

        <p>
            <pre>&amp; VAR VAR</pre>
            Bitwise AND.
        </p>

        <p>
            <pre>| VAR VAR</pre>
            Bitwise OR.
        </p>

        <p>
            <pre>~ VAR</pre>
            Complement.
        </p>
        
        <p>
            <pre>&lt;&lt; VAR VAR</pre>
            Left shift
        </p>
        
        <p>
            <pre>&gt;&gt; VAR VAR</pre>
            Right shift
        </p>
    </div>

    <div>
        <h3><a name="comparison"></a>Comparison Functions</h3>

        <p>
            <pre>&lt; VAR VAR</pre> 
            Less than.
        </p>

        <p>
            <pre>&gt; VAR VAR</pre> 
            Greater than.
        </p>

        <p>
            <pre>&lt;= VAR VAR</pre> 
            Less than OR equal to.
        </p>

        <p>
            <pre>&gt;= VAR VAR</pre> 
            Greater than OR equal to.
        </p>

        <p>
            <pre>== VAR VAR</pre> 
            Equal to.
        </p>

        <p>
            <pre>!= VAR VAR</pre> 
            Not equal to.
        </p>
    </div>


    <div>
        <h3><a name="userdef"></a>User defined functions</h3>

        <p>
            <pre>f arg1 arg2 = expression</pre>
            Define function "f" with arguments arg1 arg2
        </p>

        <p>
            <pre>f 1 2</pre>
            Call the above function with arguments 1 2
        </p>
    </div>

    <div>
        <h3><a name="lists"></a>Lists</h3>

        <p>
            <pre>[ 1, 2, 3 ]</pre> 
            List with three values
        </p>

        <p>
            <pre>[]</pre>
            Empty List
        </p>
    </div>

    <div>
        <h3><a name="listexpand"></a>List Expansion</h3>

        <p>
            <pre>.. END_VALUE</pre> 
            Create list with values 0 to END_VALUE
        </p>

        <p>
            <pre>.. START_VALUE END_VALUE</pre>
            Create list with values START_VALUE to END_VALUE
        </p>

        <p>
            <pre>.. START_VALUE END_VALUE STEP</pre>
            Create list with values between START_VALUE and END_VALUE with difference of STEP from start to end.
        </p>
    </div>

    <div>
        <h3><a name="listbuild"></a>List Builder</h3>

        <p>
            <pre>@@ INITIAL_LIST : NEXT_VALUE_FUNCTION : CONDITION</pre>
            Build a list starting with inital value, next value
        </p>
        
        <p>
            <pre>@@ INITIAL_LIST : NEXT_LIST_ITEM_FUNCTION : NEXT_VALUE_FUNCTION : CONDITION</pre>
            Build a list starting with inital value, next value
        </p>

        <p>
        By default list builder token appends the next list item to the list. You can prepend the next list item by using '@^' to build a list. 
        '@$' is a synonym for '@@' which mean append to list.
        </p>


    </div>

</div>
