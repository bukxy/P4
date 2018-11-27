var front = {

    initialisation: function() { 

        var context = this;
        context.event();

        console.log('front');

	},
	
    event: function() {

        $('.mobileMyNavMenu').click(function() {
            if ($('#myNavMenu').css('display') === 'none') {
                $('#myNavMenu').css('display', 'block');
            } else {
                $('#myNavMenu').css('display', 'none');         
            }
        });
    }
}		