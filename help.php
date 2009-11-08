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
</style>
<div>
<h2>AFL - A Functional Language </h2>
    <div>
        <p>
        As the name implies AFL is a pure functional language. The goal of creating AFL was to create an easy to parse functional language and help         me refurbish my PHP knowledge. :)
        </p>
        <p>
        While writing AFL code, understand that it is just a hobby project and hence the parser relies on white-spaces to separate language tokens.
        <b>Hence white spaces are significant so use them liberally</b>
        </p>
    </div>

    <div>
        <h3>Math Functions</h3>

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
    </div>

    <div>
        <h3>Boolean Functions</h3>

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

        <h3>Bitwise Functions</h3>

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
    </div>

    <div>
        <h3>Comparison Functions</h3>

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
        <h3>User defined functions</h3>

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
        <h3>Lists</h3>

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
        <h3>List Expansion</h3>

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
        <h3>List Builder</h3>

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
