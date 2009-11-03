<div id="title">AFL - A Functional Language</div>
<div id="mainContainer">
    <form name="code" action="?e=1" method="POST">
        <div>
            <div id="code_head">Code</div>
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
