      var myVar; 
    

      function myFunction(){
      
           
            var title = document.getElementById('title').value; 
            
          
            var notDate = new Date(document.getElementById('time').value); 
            var currentDate = new Date(); 
            seconds = notDate - currentDate; 
            document.getElementById("client").reset();
            myVar = setTimeout(alertFunc, seconds, title);  
            
        }

  
   

        function alertFunc(title){
          var ass_title = title; 
          
         

      // If the user agreed to get notified
      // Let's try to send ten notifications
      if (window.Notification && Notification.permission === "granted") {
        var i = 0;
        // Using an interval cause some browsers (including Firefox) are blocking notifications if there are too much in a certain time.
        var interval = window.setInterval(function () {
          // Thanks to the tag, we should only see the "Hi! 9" notification
          
          var n = new Notification(ass_title,  {tag: 'soManyNotification'});
          if (i++ == 9) {
                window.clearInterval(interval);
              }
          
        }, 200);
        document.getElementById("client").reset();
        
      }
  
      // If the user hasn't told if they want to be notified or not
      // Note: because of Chrome, we are not sure the permission property
      // is set, therefore it's unsafe to check for the "default" value.
      else if (window.Notification && Notification.permission !== "denied") {
        Notification.requestPermission(function (status) {
          // If the user said okay
          if (status === "granted") {
            var i = 0;
            // Using an interval cause some browsers (including Firefox) are blocking notifications if there are too much in a certain time.
            var interval = window.setInterval(function () {
              // Thanks to the tag, we should only see the "Hi! 9" notification
              var n = new Notification(ass_title, {tag: 'soManyNotification'});
              if (i++ == 9) {
                window.clearInterval(interval);
              }
            }, 200);
          
          document.getElementById("client").reset();
          // Otherwise, we can fallback to a regular modal alert
        }else {
            alert("Hi!");
          }
        }); 
    }
}