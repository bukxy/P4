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

        $('.mobileMyNavMenu').click(function() {
            if ($('#myNavMenu').css('display') === 'none') {
                $('#myNavMenu').css('display', 'block');
            } else {
                $('#myNavMenu').css('display', 'none');         
            }
        });
    }
}		