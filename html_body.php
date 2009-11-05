<div id="title">AFL - A Functional Language</div>
<div id="mainContainer">
    <form name="code" action="?e=1" method="POST">
        <div>
            <div id="code_head">
                <div style="float:left;">Code
                    <img src="image/question.png" align="top" title="Write your code in the text box below" >
                </div>
            <div style="width:100%; text-align:right;">
            Load example:
            <select id="code_snippet" onchange="var v = document.getElementById('code_snippet'); 
                                                var p = document.getElementById('program');
                                                p.value = v.value;"
                                                >
                    <option value="; Write your code below
                    " 
                    >-Select snippet-</option>
            <?php 
                foreach($snippet as $key => $value) {
                    echo "<option value='".$snippet[$key]["code"]."'>".$snippet[$key]["name"]."</option>\n";
                }
            ?>

            </select>
            </div>
            
            </div>
            <textarea name="program" id="program" rows="10" cols="80"><?= AFL::$program ?></textarea>
        </div>
        <div>
            <input type="submit" value="Execute" title="Passes the AFL code above to the server for execution.">
        </div>
    </form>
    <div id="outputContainer">
        <div id="output_head">Output
            <img src="image/question.png" align="top" title="Output of AFL code execution gets displayed below" >
        </div>
        <pre><?= AFL::$output ?></pre>
    </div>
</div>
<div id="debug">
<div id="debug_head">Internal Trace Dump
    <img src="image/question.png" align="top" title="Internal PHP state dumps for AFL." >
</div>
<pre>
<?= AFL::$debugLog ?>
</pre>
</div>
