var deleteControl = {
	
    event: function() {
        
        $('#deletePostJS').click(function(){

            var txt;
            if (confirm("Etes vous sûr de bien vouloir supprimer cet article ?")) {
                txt = "You pressed OK!";
            } else {
                txt = "You pressed Cancel!";
            }
        });
        
        $('#deleteCommentJS').click(function (){ 

            $('#newBooking').css('display', 'block');
            $("#infos").css('width', '500px');
            $('#closeMenu').css('display', 'block');
            $('#openMenu').css('display', 'none');  
        })
    
        $('#closeMenu').click(function (){
            $('#newBooking').css('display', 'none');
            $("#infos").css('width', '0px');
            $('#openMenu').css('display', 'block');
            $('#closeMenu').css('display', 'none');
        })
    }
}		