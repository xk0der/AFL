<div id="title"><div style='float: left;'><a href="help.php" title="View AFL documentaion">Documentation</a></div><div style='text-align: right;'>AFL - A Functional Language
</div></div>

<table width="100%" cols="50%,50%" height="100%" border="0px" cellspacing="0px" cellpadding="0px">
    <tr height="100%">
        <td style="vertical-align: top;" width="50%">
            <form name="code" action="?e=1" method="POST">
                    <div id="code_head">
                        <div style="float:left;">Code
                            <img src="image/question.png" align="top" title="Write your code in the text box below" >
                        </div>
                        <div style="text-align:right;">
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
                    
                    <div>
                        <div style='float: left;'>
                            <input type="submit" value="Execute" title="Passes the AFL code above to the server for execution.">
                        </div>
                        <div style="text-align: right;">
                            <label style="font-size: 12px;">
                                <input type="checkbox" <?= AFL::$disableTrace ?> name="disableTrace"> Disable Internal Trace &nbsp;&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
            </form>

            <div style="height:100%; width:100%;">
                <div id="output_head">Output
                    <img src="image/question.png" align="top" title="Output of AFL code execution gets displayed below" >
                </div>
                <div id="outputContainer">
                    <pre><?= AFL::$output ?></pre>
                </div>
            </div>
        </td>

        <td>
            <div id="debug_head">Internal Trace Dump
                <img src="image/question.png" align="top" title="Internal PHP state dumps for AFL." >
            </div>
            <div id="debug">
                <pre><?= AFL::$debugLog ?></pre>
            </div>
        </td>
    </tr>
</table>
<table width="100%">
<tr>
<td>
<div style="margin:auto; text-align:center; background: #cccccc; padding:3px;">
<p id="footer" style="margin:0px; padding:0px;">
(c) 2009, Amit Singh (xk0der), All Rights Reserved.
</p>
<p style="font-size: 10px; margin:0px; padding:0px;">
<a href="http://xkoder.com">http://xkoder.com</a> | <a href="http://blog.xkoder.com">blog.xkoder.com</a>
</p>
</td>
</tr>
</div>
</table>

