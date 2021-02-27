<table>
<?php
$e=range('A','Z');
// print_r(count($e));
// echo floor(count($e)/4);

for($i=0;$i<count($e);$i=$i+4){
?>
<tr>
    <?php for($k=0;$k<4;$k++){?>
        <?php if($i+$k>=count($e)){echo "<td></td>";}else{
            ?>
        <td><?=$range('A','Z')[$i+$k];?></td>
    <?php 
        }
}?>
</tr>
<?php
}?>
</table>

<table>



<?php

foreach(range("A","Z") as $key => $value){

    echo ($key%4==0)?"<tr>":"";

        echo "<td>";
        echo $value;
        echo "</td>";

    echo ($key%4==3)?"</tr>":"";


}

?>

</table>



<!-- `id`, `num`, `mem`, `movie`, `moviedate`, `session`, `orderdate`, `seat`, `qt`, `food`, `money`, `ordertime` -->
<!-- post:memname,movieid,date,session -->