<?php
$variable = array(1,2,3);

if(is_numeric($variable)){
    echo var_dump($variable);
} else{
    echo gettype($variable);
}
?>