<?php

echo '<table align="center" width="800" border="1">';

echo "Total: <b>".$arr['total']."</b> records";
echo "  <a href='?page=1' style='margin-left: 10px'>FrontPage</a>  ";
if($page > 1){
    echo "  <a href='?page=".($page-1)."' style='margin-left: 10px'>Previous</a>  ";
}
if($arr['pageNum'] > $page){
    echo "  <a href='?page=".($page+1)."' style='margin-left: 10px'>Next</a>  ";
}
echo "  <a href='?page={$arr['pageNum']}' style='margin-left: 10px'>Last Page</a>  ";

echo '</td></tr>';

echo '</table>';