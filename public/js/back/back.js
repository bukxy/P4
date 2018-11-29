var back = {

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

        $('.deleteUser').click(function(e){

            var result = confirm("Etes vous sûr de vouloir supprimer cet utilisateur ?");
        
            if (!result) {
                e.preventDefault();
            }

        });

        $('.mobileNavMenuBack').click(function() {
            if ($('.sidebar').css('display') === 'none') {
                $('.sidebar').css('display', 'block');
            } else {
                $('.sidebar').css('display', 'none');         
            }
        });
    }
}		