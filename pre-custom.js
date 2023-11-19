function displayTime(){
    var dateTime = new Date();
    var hrs =  dateTime.getHours();
    var min =  dateTime.getMinutes();
    var sec =  dateTime.getSeconds();
    var session =  document.getElementById('session');

    if(hrs >= 12){
        session.innerHTML = 'PM';
    }else{
        session.innerHTML ='AM';
    }

    // if(hrs > 12){
    //     hrs = hrs - 12;
    // }

    document.getElementById('hours').innerHTML = hrs;
    document.getElementById('minutes').innerHTML = min;
    document.getElementById('seconds').innerHTML = sec;
    


    var modaldateTime = new Date();
    var modalhrs =  modaldateTime.getHours();
    var modalmin =  modaldateTime.getMinutes();
    var modalsec =  modaldateTime.getSeconds();
    var modalSession =  document.getElementById('modalSession');

    if(modalhrs >= 12){
        modalSession.innerHTML = 'PM';
    }else{
        modalSession.innerHTML ='AM';
    }

    document.getElementById('modalHours').innerHTML = modalhrs;    
    document.getElementById('modalMinutes').innerHTML = modalmin;      
    document.getElementById('modalSeconds').innerHTML = modalsec;
    
    
}

setInterval(displayTime, 10) ;

