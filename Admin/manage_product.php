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
$meta_desc='';
$meta_keyword='';
$msg='';
$image_required='required';
if (isset($_GET['id']) && $_GET['id']!='') {
   $image_required='';
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
      /*$image=$row['image'];*/
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

if(isset($_POST['submit'])){
   $categories_id=get_safe_value($con,$_POST['categories_id']);
   $name=get_safe_value($con,$_POST['name']);
   $mrp=get_safe_value($con,$_POST['mrp']);
   $price=get_safe_value($con,$_POST['price']);
   $qty=get_safe_value($con,$_POST['qty']);
   $img=get_safe_value($con,$_POST['images']);
   $short_desc=get_safe_value($con,$_POST['short_desc']);
   $description=get_safe_value($con,$_POST['description']);
   $meta_title=get_safe_value($con,$_POST['meta_title']);
   $meta_desc=get_safe_value($con,$_POST['meta_desc']);
   $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
      $res=mysqli_query($con,"SELECT * from product");
      $check=mysqli_num_rows($res);
         if (isset($_GET['id']) && $_GET['id']!='') {
            $getData=mysqli_fetch_assoc($res);
            if ($id==$getData['id']) {
             
         }else{
            $msg = "Product already exist";
            }   
         }
      /*if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' || $_FILES['image']['type']!='image/jpg' || $_FILES['image']['type']!='image/jpeg')){
         $msg = "Please Select only PNG, JPG or JPEG format";
      }*/

     if($msg=='') {

         if (isset($_GET['id']) && $_GET['id']!='') {
            /*if ($_FILES['image']['name']!='') {
               $image=$_FILES['image']['name'];
               move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH.$_FILES['image']['name']);
               $update_sql= "UPDATE product SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$img',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
            }else{
               $update_sql= "UPDATE product SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
            }
               mysqli_query($con,$update_sql);*/
               mysqli_query($con,"UPDATE product SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'");
            
         }else{
               $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH.$image);
               mysqli_query($con,"INSERT into product(categories_id,name,mrp,price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status) Values('$categories_id','$name','$mrp','$price','$qty','$img','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1')"); 
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
                        <form method="post" enctype="multipart/form-data">
                           <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Categories</label><select class="form-control" name="categories_id">
                                 <option>Select Category</option>
                                 <?php
                                    $res=mysqli_query($con,"SELECT id, categories FROM categories order by id ");
                                    while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$categories_id){
                                          echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                    }
                                       else {
                                          echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                    }
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
                              <label for="image" class=" form-control-label">Image</label><input type="file" id="image" name="images" class="form-control" <?php echo $image_required ?>>
                           </div>
                           <div class="form-group">
                              <label for="short_desc" class=" form-control-label">Short Description</label><input type="text" id="short_desc" name="short_desc" placeholder="Enter product short_desc" class="form-control" required value="<?php echo $short_desc?>">
                           </div>
                           <div class="form-group">
                              <label for="description" class=" form-control-label">Description</label><textarea id="description" name="description" placeholder="Enter product Description" class="form-control" required><?php echo $description?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="meta_title" class=" form-control-label">Meta Title</label><textarea id="meta_title" name="meta_title" placeholder="Enter product meta_title" class="form-control" ><?php echo $meta_title?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="meta_desc" class=" form-control-label">Meta desc</label><textarea id="meta_desc" name="meta_desc" placeholder="Enter product meta_desc" class="form-control" ><?php echo $meta_desc?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="meta_keyword" class=" form-control-label">Meta Keyword</label><textarea id="meta_keyword" name="meta_keyword" placeholder="Enter product meta_keyword" class="form-control" ><?php echo $meta_keyword?></textarea>
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