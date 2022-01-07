<?php
require('top.inc.php');
         mysqli_query($con,"INSERT into product(categories_id,name,mrp,price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status) Values('10','nasenge','5','100','10','home.png','sfjhjefh','dhgjkdfk','sdjfhjdsh','sjfsdksdh','sfjsdfkd','1')");
?>