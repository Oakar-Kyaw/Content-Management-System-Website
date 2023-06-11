$(document).ready (function(){
    
     let div_box="<div id='loading-wallpaper'><div id='loading-circle'></div></div>";
$('body').prepend(div_box)
$('#loading-wallpaper').delay(200).fadeOut(1000,function(){
    $(this).remove();
})	
})

///function LoadUserOnline(){
//$.get('function.php?useronline=result',function (data){
 //  $('.useronlines').text(data);
//})

//}

//setInterval(function (){LoadUserOnline()},300)