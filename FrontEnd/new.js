function send_message(){
    
    var name=jQuery("#name").val();
    var email=jQuery("#email").val(); 
    var mobile=jQuery("#mobile").val(); 
    var message=jQuery("#message").val();
   
    if(name==""){
       alert('Please enter name');
    }else if(email==""){
        alert('Please enter email');
    }else if(mobile==""){
        alert('Please enter email');
    } else if(message==""){
        alert('Please enter email');
    }else{
        jQuery.ajax({
            url:'send_message.php',
            type:'post',
            data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
            success:function(result){
                alert(result);
            }

        });
    }      
}

function user_register(){
    jQuery('.field_error').html('');
    var name=jQuery("#name").val();
    var email=jQuery("#email").val(); 
    var mobile=jQuery("#mobile").val(); 
    var password=jQuery("#password").val();
    var is_error='';
   
    if(name==""){
       jQuery('#name_error').html('Please enter name');
       is_error='yes';
    }
    if(email==""){
        jQuery('#email_error').html('Please enter email');
        is_error='yes';
     }
     if(mobile==""){
        jQuery('#mobile_error').html('Please enter mobile');
        is_error='yes';
     }
     if(password==""){
        jQuery('#password_error').html('Please enter password');
        is_error='yes';
     }if(is_error==''){
        jQuery.ajax({
            url:'register_submit.php',
            type:'post',
            data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
            success:function(result){
                if(result=='exists'){
                    jQuery('#error_msg').html('Email ID already exists.');
                }if(result=='inserted'){
                    jQuery('#done_msg').html('Registration Complete.');

                }
            }

        });
    }      
}

function user_login(){
    jQuery('.field_error').html('');
 
    var email=jQuery("#login_email").val(); 
    
    var password=jQuery("#login_password").val();
    var is_error='';
   

    if(email==""){
        jQuery('#login_email_error').html('Please enter email');
        is_error='yes';
     }
 
     if(password==""){
        jQuery('#login_password_error').html('Please enter password');
        is_error='yes';
     }if(is_error==''){
        jQuery.ajax({
            url:'login_submit.php',
            type:'post',
            data:'email='+email+'&password='+password,
            success:function(result){
                if(result=='wrong'){
                    jQuery('#login_password_error').html('Email or Password incorrect');
                }if(result=='valid'){
                    window.location.href='index.php'

                }
            }

        });
    }      
}

function manage_cart(pid,type){
    var qty=jQuery('#qty').val();
    jQuery.ajax({
        url:'manage_cart.php',
        type:'post',
        data:'pid='+pid+'&qty='+qty+'&type='+type,
        success:function(result){
            if(type=='remove'){
                window.location.href=window.location.href;
            }
            jQuery('.htc__qua').html(result);

        }
    });

}