
const ACTIONBOX = document.querySelector('#actionbox');
const STATUSLIST = document.querySelector('#status');
const MONSTER = document.querySelector('#monster');

let _log = (msg) => {
    ACTIONBOX.firstElementChild.classList.add('prevLog');
    let log = document.createElement("p");
    log.innerHTML = msg;
    ACTIONBOX.insertBefore(log, ACTIONBOX.firstElementChild);
}

let _displayStatus = (monstre) => {

    let etree = STATUSLIST.children;
    MONSTER.firstElementChild.innerHTML = monstre.name;
    etree[0].innerHTML = "vie : "+monstre.life;
    etree[1].innerHTML = "Argent : "+monstre.money+ "€";
    if(monstre.awake){
    	etree[2].innerHTML = 'Reveiller';
    }else{
    	etree[2].innerHTML = 'Endormi';
    }

    if(monstre.life<25){
        MONSTER.style.backgroundColor="red";
    }else if(monstre.life<50){
        MONSTER.style.backgroundColor="orange";
    }else if(monstre.life < 75){
        MONSTER.style.backgroundColor="yellow";
    }else{
        MONSTER.style.backgroundColor="green";
    }

    if(monstre.money<5){
        MONSTER.style.border = "5px solid black";
    }else if(monstre.money<15){
        MONSTER.style.border = "10px solid black";
    }else if(monstre.money < 25){
        MONSTER.style.border = "15px solid black";
    }else{
        MONSTER.style.border = "20px solid black";
    }
}


export default {
    log : _log,
    displayStatus : _displayStatus,
 }