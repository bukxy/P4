var reportComment = {
    
    futurDate: null,
	
	initialisation: function() { 
          
        var context = this;    
        
        context.countdown();
        
		$('.buttonReport').click(function () {           
            context.storage();
            context.countdown();

            $('.buttonReport').css('display', 'none');
            $('.reportTimer').css('display', 'block');
		});
	},
	
	storage: function() {
        
        sessionStorage.setItem('idComment', $('.idComment').text());
        sessionStorage.setItem('dateReport', Date.now());

	},
    
    countdown: function () {  

        this.timer = setInterval(function() {
            
            var dateSignal = sessionStorage.getItem('dateReport');
            
            var valueTimer = 86400000; // 24h 86400000 / 20min 1200000

            this.futurDate = parseInt(dateSignal) + valueTimer;
            
            // Date futur - Date actuelle
            this.expirationTime =  new Date(this.futurDate - Date.now());

            console.log(expirationTime);
            
            hours = expirationTime.getHours();
            minutes = expirationTime.getMinutes();
            seconds = expirationTime.getSeconds();
            
            if (this.futurDate > Date.now()) { 
                $('.reportTimer').html('<p>id: '+ sessionStorage.getItem('idComment') + ' = ' + hours + ' heure(s) ' + minutes + ' minute(s) ' + seconds + ' seconde(s).</p>');

                $('.reportTimer').css('display', 'block');
                //$('.buttonReport').css('display', 'none');

            }
            else if (this.futurDate < Date.now()) {         
                sessionStorage.removeItem('idComment');
                sessionStorage.removeItem('dateReport');
                clearInterval(this.timer);

                $('.reportTimer').css('display', 'none');
                $('.buttonReport').css('display', 'block');

            } else {
                $('.buttonReport').css('background-color', 'rgba(255,0,0,0.3)');
            }
        },1000);
        
	},
}		