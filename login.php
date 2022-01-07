<?php 
    require('top.php');
    $msg='';
    if (isset($_POST['submit'])) {
        $name=get_safe_value($con, $_POST['name']);
    $email=get_safe_value($con, $_POST['email']);
    $mobile=get_safe_value($con, $_POST['mobile']);
    $password=get_safe_value($con, $_POST['password']);
    $added_on=date('Y-m-d h:i:s');
    

    $check_user=mysqli_num_rows(mysqli_query($con, "select * from users where email='$email'"));
    if ($check_user==0) {
        mysqli_query($con, "INSERT into users (name, email, mobile, password, added_on) VALUES('$name', '$email', '$mobile', '$password', '$added_on')");

    header("location:login.php");
    }else{

        $msg='user already exist!!!';
    }
    }
    
?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(188, 188, 188, 188) no-repeat scroll center center / cover ; height: 100px;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login/Register</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Login</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="contact-form" action="login_submit.php" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="email" name="email" id="login_name" placeholder="Your Email*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="password" id="login_password" placeholder="Your Password*" style="width:100%">
                                        </div>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="submit" class="fv-btn">Login</button>
                                    </div>
                                </form>
                                <div class="form-output">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </div> 
                
                </div>
                

                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Register</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="contact-form" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="name" placeholder="Your Name*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="email" name="email" placeholder="Your Email*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="number" name="mobile" placeholder="Your Mobile*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="password" placeholder="Your Password*" style="width:100%">
                                        </div>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="submit" onclick="user_register()" class="fv-btn">Register</button>
                                    </div>
                                    <div class="field_error"><?php echo $msg;?></div>
                                </form>
                                <div class="form-output">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </div> 
                
                </div>
                    
            </div>
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
<?php require('footer.php'); ?>