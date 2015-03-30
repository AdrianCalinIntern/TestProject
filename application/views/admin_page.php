<!DOCTYPE html>
<html lang="en">
<head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <style type="text/css">
            .container{
                margin: 0px;
                width: 200px;}
            .table {
                width: 63px;
                max-width: 75px;
                margin-bottom: 20px;
                left: 226px;
                top: 90px;}
        </style>
        
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                <style type="text/css">
                    .bs-example{
                        margin: 20px;
                        margin-top: 70px;
                        
                    }
                    .age-example{
                        margin-left: 20px;
                    }
                    .sort-example{
                        margin: 20px;
                        margin-top: 30px;}
                </style>
                
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>
            function makeAjaxCall(){
                $.ajax({
                        type: "post",
                        url: "http://localhost/ci_test/index.php/admin/insert_user",
                        cache: false,				
                        data: $('#userForm').serialize(),
                        success: function (response) {
                            $("#lista_useri").empty();
                            $("#lista_useri").html(response);
                        }
                       
                });
                alert('Succes');
            };
            
            function validations() {
                              
              var pass=document.forms["userForm"]["password"].value;
               if (pass.length < 4) 
                {
                     alert("Your password needs a minimum of four characters");
                            return false;
                }
                if (pass.search(/[A-Z]/)) 
                {
                        alert("Your password needs an uppser case letter");
                            return false;
                }
                if (pass.search(/[0-9]/) < 0) 
                {
                        alert("Your password needs a number");
                        return false;
                }
              
              var username=document.forms["userForm"]["username"].value;
              if (username.length < 1)
                {
                 alert("Username must be filled out");
                 return false;
                }
              var name=document.forms["userForm"]["name"].value;
              if (name.length<1)
                {
                 alert("Name must be filled out");
                 return false;
                }
              var email=document.forms["userForm"]["email"].value;
              atpos = email.indexOf("@");
              dotpos = email.lastIndexOf(".");
              if (atpos < 1 || ( dotpos - atpos < 2 )) 
               {
                    alert("Please enter correct email ID");
                    return false;
               }
              var phone=document.forms["userForm"]["phone"].value;

                if (phone.search(/[0-9]/) < 0)
                {
                 alert("Phone must be filled out");
                 return false;
                }
                if(phone.search(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/))
                {
                   alert("Phone number must have valide form XXX-XXX-XXXX");
                   return false; 
                }
              var description=document.forms["userForm"]["description"].value;
              if (description.length < 1)
                {
                 alert("Description must be filled out");
                 return false;
                }
              
              if (pass.length > 4 && pass.search(/[A-Z]/) > 1 && pass.search(/[0-9]/) > 0 && username.length > 1 && name.length > 1 && atpos > 1 || ( dotpos - atpos > 2 ) && phone.length > 1 && description.length > 1)
              {
                  makeAjaxCall();
              }   
            };

        
           
    </script>
    <script>
            function addCategoryScript(){
                 var remove_category = $('#remove_category').val();
                 var new_category = $('#new_category').val();
                 
                $.ajax({
                        type: "post",
                        url: "http://localhost/ci_test/index.php/admin/edit_category",
                        cache: false,				
                        data: {
                            'remove_category':remove_category,
                            'new_category':new_category
                            
                        },
                        success: function (test) {
                            alert(test);
                        }
                       
                });
                     
              };
    </script>
    <script>
        function sort_asc()
        {
           $.ajax({
                        type: "post",
                        url: "http://localhost/ci_test/index.php/admin/sort_asc",
                        cache: false,				
                        success: function (response) {
                            $("#lista_useri").empty();
                            $("#lista_useri").html(response);
                        }
                       
                });
        }
    </script>
    <script>
        function sort_desc()
        {
           $.ajax({
                        type: "post",
                        url: "http://localhost/ci_test/index.php/admin/sort_desc",
                        cache: false,				
                        success: function (response) {
                            $("#lista_useri").empty();
                            $("#lista_useri").html(response);
                        }
                       
                });
        }
    </script>

</head>
<body>
        <h1>Admin Panel</h1>
         
        <?php
                if (!$this->session->userdata('username')){
                   redirect('Admin');
                }
                
                if($this->session->userdata('rol') != 'admin') {
 
                    redirect('User/select_user');
                }
        ?>

<div class="bs-example">
    <table class="table">
          <thead>
            <tr>
                <th >Id</th>
                <th >Username &nbsp;  <a href="#" onclick="sort_asc();"><b>&#8593</b></a>
                                      <a href="#" onclick="sort_desc();"><b>&#8595</b></a>
                                     </th>
                <th >Phone</th>
                <th >Mail</th>
                <th >Describe</th>
                <th >Name</th>
                <th >Role</th>
                <th>Category</th>
            </tr>
           </thead>
    
                <tbody id="lista_useri"> 
                
        <?php
        //initializez contor pentru referinta
        $contor = 0;
        
        foreach($query as $row)
            {
                echo '<tr>';
                    echo ' <td> ';
                    print $row->user_id.'</td>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->username.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->tel.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->email.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->descriere.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->nume.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->rol.'<br>';
                    echo ' </td> ';
                     echo ' <td> ';
                    print $row->categorie.'<br>';
                    echo ' </td> ';
                    echo '<td> <button href="#editUser" data-toggle="modal" class="btn btn-xs btn-primary" onclick="edit_user('.$contor.')"> Edit </button> </td>';
                echo '</tr>';
                $contor ++;
                }
                ?> 
        </tbody> 
    </table>
</div>

        
        <script>
            // encodez array-ul din php ca sa am acces din js la date
            var query = <?php echo json_encode((array)$query); ?>;
            
            function edit_user(contor) {
                // stochare datele ale userului pe care am facut click
                var date_user = query[contor];
                var modal_append = "<form name='editUser' id='editUser' action=''>\n\
                                        Username:<br>\n\
                                                         <input type='text' name='username_edit' id='username_edit' value='"+date_user['username']+"'><br> \n\
                                        Name:<br> \n\
                                                        <input type='text' name='name_edit' id='name_edit' value='"+date_user['nume']+"'><br>\n\
                                        Email:<br> \n\
                                                        <input type='text' name='email_edit' id='email_edit' value='"+date_user['email']+"'><br>\n\
                                        Phone:<br> \n\
                                                        <input type='text' name='phone_edit' id='phone_edit' value='"+date_user['tel']+"'><br>\n\
                                        Describe:<br> \n\
                                                        <input type='text' name='describe_edit' id='describe_edit' value='"+date_user['descriere']+"'><br>\n\
                                        <input type='hidden' name='user_id_edit' id='user_id_edit' value='"+date_user['user_id']+"'>\n\
                                    </form>";
                
                // golire corpul modalul si il inlocuire cu noul form creat
                $("#edit_modal_body").empty().append(modal_append);
                
                 
                                        };
                                        
                function send_user()
                {
                
                var username = $('#username_edit').val();
                var name =  $('#name_edit').val();
                var email =$('#email_edit').val();
                var phone = $('#phone_edit').val();
                var describe = $('#describe_edit').val();
                var user_id =$('#user_id_edit').val();
                
                $.ajax({
                        type: "post",
                        url: "http://localhost/ci_test/index.php/EditUser/edit",
                        cache: false,
                        data:{
                                'username':username,
                                'name':name,
                                'email':email,
                                'phone':phone,
                                'describe':describe,
                                'user_id':user_id
                        },
                        success: function (response) {
                            $("#lista_useri").empty();
                            $("#lista_useri").html(response);

                        }
                       
                });
  
            };
            
        </script>
        
        
        
<!--Afisare modal creare useri-->
<div class="bs-example">

    <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">New User</a>
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New User</h4>
                </div>
                <div class="modal-body">
                            <form name="userForm" id="userForm" action=""> 
                                    <b>Type :</b><br>
                                                <select name="type"> 
                                                         <option value="admin">Admin</option>
                                                         <option value="user">User</option>
                                               </select><br>
                                     <b>Age Category :</b><br>
                                                <select name="age"> 
                                                    <option value="<18"> < 18</option>
                                                         <option value="18-30 ">18-30</option>
                                                         <option value="30+">30+</option>
                                               </select><br>
                                    <b>Password:</b> <br>
                                                <input type="password" name="password" id="password"><br>
                                    <b>Username:</b> <br>
                                                <input type="text" name="username" id="username"><br>
                                    <b>Name:</b> <br>
                                                <input type="text" name="name" id="name"><br>
                                    <b>Email:</b><br>
                                                <input type="text" name="email" id="email"><br>
                                    <b>Phone no:</b><br>
                                                <input type="text" name="phone" id="phone"><br>
                                    <b>Description:</b><br>
                                                 <textarea rows="4" cols="50" name="description" id="description"> </textarea><br>
                            </form>     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="validations()" value="Submit">Save changes</button>
                </div>
             
                                 
            </div>
        </div>
</div>     
</div>



<!--MODAL CATEGORIE-->
<div class="age-example">

    <a href="#myCategory" class="btn btn-lg btn-primary" data-toggle="modal"> Edit Age Category</a>
    <!-- Modal HTML -->
    <div id="myCategory" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Age Category</h4>
                </div>
                <div class="modal-body">
                            <form name="myCategory" id="myCategory" action=""> 
                                    
                                    <b>Remove Category:</b><br>
                                               <input type="text" name="remove_category" id="remove_category"><br>
                                    
                                    <b>Add new category:</b> <br>
                                                <input type="text" name="new_category" id="new_category"><br>
                                    
                                     
                            </form>     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addCategoryScript()" value="Submit">Save changes</button>
                </div>
             
                                 
            </div>
        </div>
    </div> </div><br><br>


<!--MODAL EDITARE USER-->
<div class="age-example">
<!--<a href="#editUser" class="btn btn-lg btn-primary" data-toggle="modal"> Edit User</a>-->
    
     <!--Modal HTML--> 
    <div id="editUser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <div id="edit_modal_body">
                            <form name="editUser" id="editUser" action=""> 
                                    
                                   
                            </form>  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="send_user()" value="Submit">Save changes</button>
                </div>
             
                                 
            </div>
        </div>
    </div> </div><br><br>


    
</body>
</html>