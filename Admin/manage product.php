 <?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$meta_title='';
$meta_description='';
$meta_keyword='';

$msg='';
if (isset($_GET['id']) && $_GET['id']!='') {
   $id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"SELECT * from product where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $categories_id=$row['categories_id'];
      $name=$row['name'];
      $mrp=$row['mrp'];
      $price=$row['price'];
      $qty=$row['qty'];
      $image=$row['image'];
      $short_desc=$row['short_desc'];
      $description=$row['description'];
      $meta_title=$row['meta_title'];
      $meta_desc=$row['meta_desc'];
      $meta_keyword=$row['meta_keyword'];
   }else{
      header('location: product.php');
      die();
   }
}

if(isset($_POST['submit'])) {
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
               mysqli_query($con,"INSERT into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status) Values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_description','$meta_keyword',1)"); 

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
                        <div class="card-header"><strong>Products</strong><small> Form</small></div>
                        <form method="post">
                           <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Category</label>
                              <select class="form-control" name="categories_id">
                                 <option>Select Category</option>
                                 <?php
                                    $res=mysqli_query($con,"SELECT id, categories FROM categories order by categories desc");
                                    while($row=mysqli_fetch_assoc($res)){
                                       echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                    }
                                 ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Product Name</label><input type="text" id="categories" name="name" placeholder="Enter Product Name" class="form-control" required value="<?php echo $name?>">
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">MRP</label><input type="text" id="categories" name="mrp" placeholder="Enter Product mrp" class="form-control" required value="<?php echo $mrp?>">
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Price</label><input type="text" id="categories" name="price" placeholder="Enter Product price" class="form-control" required value="<?php echo $price?>">
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Qty</label><input type="text" id="categories" name="qty" placeholder="Enter Product Quantity" class="form-control" required value="<?php echo $qty?>">
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Image</label><input type="file" name="image" class="form-control" required >
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Short Description</label>
                              <textarea name="short_desc" placeholder="Enter Product short_description" class="form-control" required>
                                 <?php echo $short_desc?>
                              </textarea>
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Description</label>
                              <textarea name="description" placeholder="Enter Product description" class="form-control" required>
                                 <?php echo $description?>
                              </textarea>
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Meta Title</label>
                              <textarea name="meta_title" placeholder="Enter Product meta_title" class="form-control">
                                 <?php echo $meta_title?>
                              </textarea>
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Meta_Description</label>
                              <textarea name="meta_desc" placeholder="Enter Product Meta_Description" class="form-control">
                                 <?php echo $meta_description?>
                              </textarea>
                           </div>

                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Meta Keyword</label>
                              <textarea name="meta_keyword" placeholder="Enter Product meta_keyword" class="form-control">
                                 <?php echo $meta_keyword?>
                              </textarea>
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