<?php

echo html_entity_decode($slide);
echo html_entity_decode($panel1);
echo html_entity_decode($panel2);
echo html_entity_decode($panel3);
echo html_entity_decode($panel4);
echo html_entity_decode($panel5);
echo html_entity_decode($panel6);
?>
<script>
    $(function(){
        $('.index-col1:first').attr("style","width:265px; padding-left: 7px;");
        $('.index-col2:first').attr("style","text-align:center;padding:0 63px 0 63px;");
        $('.index-col3:first').attr("style","width:271px;");
    });
</script>