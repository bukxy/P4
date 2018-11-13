var myEvents = {

    initialisation: function() { 

        var context = this;
        context.event();

	},
	
    event: function() {

        $('.deletePost').click(function(e){

            var result = confirm("Etes vous sûr de vouloir supprimer cet article ?");
        
            if (!result) {
                e.preventDefault();
            }

        });

        $('.deleteComment').click(function(e){

            var result = confirm("Etes vous sûr de vouloir supprimer ce commentaire ?");
        
            if (!result) {
                e.preventDefault();
            }

        });

        $('#controlMobileNav').click(function(){
            $('#controlMobileNav').css('display', 'block');
            $("#infos").css('width', '500px');
            $('#closeMenu').css('display', 'block');
            $('#openMenu').css('display', 'none');  
        });
    }
}		