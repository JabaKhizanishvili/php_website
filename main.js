$('.login-wrap').hide()

$(document).ready(()=> {
   $("#login").click(()=> {
       $('.login-wrap').toggle(200);
       window.addEventListener('click', function(e){   
        if (document.querySelector('.login-wrap').contains(e.target) && document.querySelector('.login-wrap').style.display != 'none'){
        }else{
            if(!(document.querySelector('#login').contains(e.target))){
                $('.login-wrap').hide(200)
            }
        }
   })
})

})

$(window).on('load', function(){
    $('.centerdiv').fadeOut(1000);
})


