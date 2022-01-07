<?php
require('top.inc.php');
$categories='';
$msg='';
if (isset($_GET['id']) && $_GET['id']!='') {
   $id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"SELECT * from categories where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $categories=$row['categories'];
      prx($categories);
   }else{
      header('location: categories.php');
      die();
   }
}

if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['categories']);
      $res=mysqli_query($con,"SELECT * from categories where categories='$categories'");
      $check=mysqli_num_rows($res);
      if ($check>0) {
         if (isset($_GET['id']) && $_GET['id']!='') {
            $getData=mysqli_fetch_assoc($res);
            if ($id==$getData['id']) {
             
         }else{
            $msg = "Category already exist";
            }   
         }else{
            $msg = "Category already exist";
         }
      }

     if($msg=='') {
         if (isset($_GET['id']) && $_GET['id']!='') {
               mysqli_query($con,"UPDATE categories SET categories='$categories' where id='$id'");
         }else{
               mysqli_query($con,"INSERT into categories(categories,status) Values('$categories','1')"); 
            }
         header('location: categories.php');
         die();
     }
}
?>
   <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post">
                           <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Category</label><input type="text" id="categories" name="categories" placeholder="Enter category name" class="form-control" required value="<?php echo $categories ?>">
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