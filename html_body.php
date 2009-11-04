<div id="title">AFL - A Functional Language</div>
<div id="mainContainer">
    <form name="code" action="?e=1" method="POST">
        <div>
            <div id="code_head">Code
            
            <select id="code_snippet" onchange="var v = document.getElementById('code_snippet'); 
                                                var p = document.getElementById('program');
                                                p.value = v.value;"
                                                >

            <?php 
                foreach($snippet as $key => $value) {
                    echo "<option value='".$snippet[$key]["code"]."'>".$snippet[$key]["name"]."</option>\n";
                }
            ?>

            </select>
            
            </div>
            <textarea name="program" id="program" rows="10" cols="80"><?= AFL::$program ?></textarea>
        </div>
        <div>
            <input type="submit" value="Execute">
        </div>
    </form>
    <div id="outputContainer">
        <div id="output_head">Output</div>
        <pre><?= AFL::$output ?></pre>
    </div>
</div>
<div id="debug">
<div id="debug_head">Internal Trace Dump</div>
<pre>
<?= AFL::$debugLog ?>
</pre>
</div>
