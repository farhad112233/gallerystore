x=window.innerWidth;
hide(x);
function hide(x) {
    if (x<700) {    
            $("#b").click(function(){
                $("#myDropdown").slideToggle(500);
        })
    }else{
        $("#myDropdown").css("display","inline");
    }
}

$(document).click(function(event){
    if (window.innerWidth<700) {     	
        f=event.target.className;
        j=f.indexOf("dropbtn");
        // alert(j);
        if(j==-1){
            $("#myDropdown").slideUp(500);
        }    
    }
})

function resiz() {
    x=window.innerWidth;
    hide(x);
}


/*    kode dorost
if (window.innerWidth<700) {        

  $("#b").click(function(){
        $("#myDropdown").slideToggle(500);
    })
    $(document).click(function(event){	
        f=event.target.className;
        j=f.indexOf("dropbtn");
        // alert(j);
        if(j==-1){
            $("#myDropdown").slideUp(500);
        }    
    })
}
*/