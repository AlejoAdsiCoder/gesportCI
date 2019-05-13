<div class="container">
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Cedula</label>
    <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp" placeholder="Ingrese su email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Ingrese su contraseña">
  </div>
  <input type="submit" class="btn btn-primary" value="Login" id="submit">
  <div id='err_msg' style='display: none'>  
    <div id='content_result'>  
    <div id='err_show' class="w3-text-red">  
    <div id='msg'> </div>  
    </div></div></div>  
</form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script type="text/javascript">  
  
        // Ajax post  
        $(document).ready(function(){  
        $("#submit").click(function(e){
          e.preventDefault();  
        var cedula = $("#cedula").val();  
        var password = $("#pwd").val();  
        // Returns error message when submitted without req fields.  
        if(cedula=='' || password=='')  
        {  
        jQuery("div#err_msg").show();  
        jQuery("div#msg").html("All fields are required");  
        }  
        else  
        {  
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>Login/check_login",  
        data: {name: user_name, pwd: password},  
        cache: false,  
        success: function(result){  
            if(result!=0){  
                // On success redirect.  
            window.location.replace(result);  
            }  
            else  
                jQuery("div#err_msg").show();  
                jQuery("div#msg").html("Login Failed");  
        }  
        });  
        }  
        return false;  
        });  
        });  
        </script>   