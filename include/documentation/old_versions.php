<div class="Text_Header">Older Versions of the Documentation</div>

<!--Only work when connected to tha Internet-->
<?php $pathToOldDocs="http://texttest.carmen.se/TextTest/docs"; ?>

<div class="Text_Normal">
<table border="0">
    <tr>
        <td>
        <div class="Table_Text_Header">Documentation on this site</div>
        <div class="Table_Text_Normal">
        <?php
        
        
        foreach ($all_releases as $release)
        {
           $rel = convertToDocFormat($release);
           print "<li><a class=\"Text_Link\" href=\"index.php?page=".$rel."\">Documentation for ".$release."</a>";
      	
        }
        ?>
        </div>
        <div class="Table_Text_Normal">&nbsp;</div>
        <div class="Table_Text_Header">Documentation from the old site</div>
        <div class="Table_Text_Normal">
        <li><a class="Text_Link" href="<?php echo $pathToOldDocs; ?>/3.8/">Documentation for 3.8</a>
        <li><a class="Text_Link" href="<?php echo $pathToOldDocs; ?>/3.7.1/">Documentation for 3.7.1</a>
        <li><a class="Text_Link" href="<?php echo $pathToOldDocs; ?>/3.7/">Documentation for 3.7</a>
        <li><a class="Text_Link" href="<?php echo $pathToOldDocs; ?>/3.6/">Documentation for 3.6</a>
        <li><a class="Text_Link" href="<?php echo $pathToOldDocs; ?>/3.5.3/">Documentation for 3.5.3</a>
        </div>
        </td>
    </tr>
</table>
</div>

