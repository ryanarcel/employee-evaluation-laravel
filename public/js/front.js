 /*===== Written by Ryan Arcel Galendez =====*/
      
 $(document).ready(function(){
    $('#hr-login').click(function(){
        $('.avatar').hide(300);
        $('.content').hide(300);
        $('.hrlogin').show(300);
    })

    $('.hr-loginback').click(function(){
        $('.avatar').show(300);
        $('.content').show(300);
        $('.hrlogin').hide(300);
    })

    $('#teacher-login').click(function(){
        $('.avatar').hide(300);
        $('.content').hide(300);
        $('.teachlogin').show(300);
    })

    $('.teach-loginback').click(function(){
        $('.avatar').show(300);
        $('.content').show(300);
        $('.teachlogin').hide(300);
    })

    $('.errorAlert').delay(300).fadeIn(500).delay(3000).fadeOut(500);

  })