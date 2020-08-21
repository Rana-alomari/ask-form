$(function(){
    
    'use strict';
    var userError  = true,
        phoneError = true,
        emailError = false,
        msgError   = true;
    
    $('.username').blur(function(){
        if($(this).val().length < 3){
            $(this).css('border','1px solid indianred');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            userError  = true;
    } else {
        $(this).css('border','1px solid green');
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).parent().find('.asterisx').fadeOut(100);
        userError = false;
    }
    });

    $('.email').blur(function(){
        if($(this).val().length < 7){
            $(this).css('border','1px solid indianred');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            emailError = true;
    } else {
        $(this).css('border','1px solid green');
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).parent().find('.asterisx').fadeOut(100);
        emailError = false;
    }
    });
        
    $('.message').blur(function(){
        if($(this).val().length < 7){
            $(this).css('border','1px solid indianred');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            msgError= true;
    } else {
        $(this).css('border','1px solid green');
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).parent().find('.asterisx').fadeOut(100);
        msgError = false;
    }
    });

    $('.phone').blur(function(){
        if($(this).val().length < 10){
            $(this).css('border','1px solid indianred');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            phoneError = true;
    } else if($(this).val().length > 10){
            $(this).css('border','1px solid indianred');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
        phoneError = true;
    } 
        else {
        $(this).css('border','1px solid green');
        $(this).parent().find('.custom-alert').fadeOut(200);
        $(this).parent().find('.asterisx').fadeOut(100);
            phoneError = false;
    }
    });
    
    // submit form validation
    
    $('.Ask-form').submit(function(e){
      if (userError == true || phoneError == true || emailError == true || msgError == true)  {
          e.preventDefault();
          $('.username, .phone, .message').blur();
      }
    });
    
});