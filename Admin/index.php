<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$msg='';

if(isset($_POST['submit'])){
   $categories_id=get_safe_value($con,$_POST['categories_id']);
   $name=get_safe_value($con,$_POST['name']);
   $mrp=get_safe_value($con,$_POST['mrp']);
   $price=get_safe_value($con,$_POST['price']);
   $qty=get_safe_value($con,$_POST['qty']);
   $short_desc=get_safe_value($con,$_POST['short_desc']);
   $description=get_safe_value($con,$_POST['description']);
   $meta_title=get_safe_value($con,$_POST['meta_title']);
   $meta_desc=get_safe_value($con,$_POST['meta_desc']);
   $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
      $res=mysqli_query($con,"SELECT * from product where name='$name'");
      $check=mysqli_num_rows($res);
      if ($check>0) {
         if (isset($_GET['id']) && $_GET['id']!='') {
            $getData=mysqli_fetch_assoc($res);
            if ($id==$getData['id']) {
             
         }else{
            $msg = "Product already exist";
            }   
         }else{
            $msg = "Product already exist";
         }
      }

     if($msg=='') {
         if (isset($_GET['id']) && $_GET['id']!='') {
               mysqli_query($con,"UPDATE product SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'");
         }else{
               mysqli_query($con,"INSERT into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status) Values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1')"); 
            }
         header('location: product.php');
         die();
     }
}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post">
                           <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Categories</label><select class="form-control" name="categories_id">
                                 <option>Select Category</option>
                                 <?php
                                    $res=mysqli_query($con,"SELECT id, categories FROM categories order by id ");
                                    while($row=mysqli_fetch_assoc($res)){
                                       echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                    }
                                 ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="name" class=" form-control-label">Name</label><input type="text" id="name" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
                           </div>
                           <div class="form-group">
                              <label for="mrp" class=" form-control-label">MRP</label><input type="text" id="mrp" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
                           </div>
                           <div class="form-group">
                              <label for="price" class=" form-control-label">Price</label><input type="text" id="name" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
                           </div>
                           <div class="form-group">
                              <label for="qty" class=" form-control-label">Qty</label><input type="text" id="qty" name="qty" placeholder="Enter product qty" class="form-control" required value="<?php echo $qty?>">
                           </div>
                           <div class="form-group">
                              <label for="image" class=" form-control-label">Image</label><input type="file" id="image" name="image" class="form-control" required>
                           </div>
                           <div class="form-group">
                              <label for="short_desc" class=" form-control-label">Short Description</label><input type="text" id="short_desc" name="short_desc" placeholder="Enter product short_desc" class="form-control" required value="<?php echo $short_desc?>">
                           </div>
                           <div class="form-group">
                              <label for="description" class=" form-control-label">Description</label><textarea id="description" name="description" placeholder="Enter product Description" class="form-control" required><?php echo $description?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="meta_title" class=" form-control-label">Meta Title</label><textarea id="meta_title" name="meta_title" placeholder="Enter product meta_title" class="form-control" required><?php echo $meta_title?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="meta_desc" class=" form-control-label">Meta desc</label><textarea id="meta_desc" name="meta_desc" placeholder="Enter product meta_desc" class="form-control" required><?php echo $meta_desc?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="meta_keyword" class=" form-control-label">Meta Keyword</label><textarea id="meta_keyword" name="meta_keyword" placeholder="Enter product meta_keyword" class="form-control" required><?php echo $meta_keyword?></textarea>
                           </div>
                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg;?></div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
 require('footer.inc.php');
?>