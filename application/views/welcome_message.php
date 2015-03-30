<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>	
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
        </style>

</head>
<body>
 <?php if (!$this->session->userdata('username')){ redirect('Admin'); }?>
    
<h1>User view</h1>

<div class="bs-example">
    <table class="table">
          <thead>
            <tr>
                 <th>Id</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Mail</th>
                <th>Describe</th>
                <th>Name</th>
                <th>Role</th>
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
                                        <center><b>Welcome:\n\
                                                         "+date_user['username']+"</b></center><br> \n\
                                        <b>Your Name:</b><br> \n\
                                                        <input type='text' name='name_edit' id='name_edit' value='"+date_user['nume']+"'><br>\n\
                                        Your Email:<br> \n\
                                                        <input type='text' name='email_edit' id='email_edit' value='"+date_user['email']+"'><br>\n\
                                        Your Phone:<br> \n\
                                                        <input type='text' name='phone_edit' id='phone_edit' value='"+date_user['tel']+"'><br>\n\
                                        Your Describe:<br> \n\
                                                        <input type='text' name='describe_edit' id='describe_edit' value='"+date_user['descriere']+"'><br>\n\
                                        <input type='hidden' name='user_id_edit' id='user_id_edit' value='"+date_user['user_id']+"'>\n\
                                    </form>";
                
                // golire corpul modalul si il inlocuire cu noul form creat
                $("#edit_modal_body").empty().append(modal_append);
                
                 
                                        };
                                        
                function send_user()
                {
                
//                var username = $('#username_edit').val();
                var name =  $('#name_edit').val();
                var email =$('#email_edit').val();
                var phone = $('#phone_edit').val();
                var describe = $('#describe_edit').val();
                var user_id =$('#user_id_edit').val();
                
                $.ajax({
                        type: "post",
                        url: "http://localhost/ci_test/index.php/User/edit",
                        cache: false,
                        data:{
//                                'username':username,
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