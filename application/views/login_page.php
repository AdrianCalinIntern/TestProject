<html>
   
    <head>
                <style>label{display: block;}</style>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                
                <script>
                        function ressetPasword()
                        {
                            var email = $('#email').val();
                            $.ajax({
                            type: "post",
                            url: "http://localhost/ci_test/index.php/resetPassword/resetPass",
                            cache: false,	
                            data: {
                                'email':email
                            },
                            success: function (test) {
                                alert(test);
                            }
                       
                          });
                            
                        }
                </script>
                <script>
                    function validation()
                    {
                         var email=document.forms["resetPassword"]["email"].value;
                         atpos = email.indexOf("@");
                         dotpos = email.lastIndexOf(".");
                         if (atpos < 1 || ( dotpos - atpos < 2 )) 
                            {
                                alert("Please enter correct email ID");
                                return false;
                             }
                         else{
                                ressetPasword();
                         }
                    }
                 </script>
    </head>
    <body>
    <center> <h1>Login</h1></center>
            <center><?php echo form_open('admin'); ?>
                <?php echo form_label('Username', 'username').'<br>'; 
                      echo form_input('username', set_value('username'), 'id="username"')."<br>";
                      
                      echo form_label('Password', 'password').'<br>'; 
                      echo form_password('password', '', 'id="password"')."<br><br>";
                      echo form_submit('submit', 'Login');
                ?>
            <?php echo form_close();?>
            <?php echo validation_errors(); ?></center>
        
        
        
        <!--MODAL CATEGORIE-->
<div class="age-example">
<center><a href="#resetPassword"  data-toggle="modal"> Reset Password</a></center>
    
    <!-- Modal HTML -->
    <div id="resetPassword" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Reset Password</h4>
                </div>
                <div class="modal-body">
                            <form name="resetPassword" id="resetPassword" action=""> 
                                    
                                     <b>Email Address</b><br>
                                               <input type="email" name="email" id="email"><br> 
                            </form>     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="validation()" value="Submit">Send</button>
                </div>
             
                                 
            </div>
        </div>
    </div> </div><br><br>
    </body>
</html>