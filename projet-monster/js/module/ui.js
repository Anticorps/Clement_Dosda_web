
const _ACTIONBOX = document.querySelector('#actionbox');
const _STATUSLIST = document.querySelector('#status');
const _MONSTER = document.querySelector('#monster');

let _log = (msg) => {
    _ACTIONBOX.firstElementChild.classList.add('prevLog');
    let log = document.createElement("p");
    log.innerHTML = msg;
    _ACTIONBOX.insertBefore(log, _ACTIONBOX.firstElementChild);
}

let _displayStatus = (monstre) => {

    let etree = _STATUSLIST.children;
    etree[0].innerHTML = "vie : "+monstre.life;
    etree[1].innerHTML = "Argent : "+monstre.money+ "€";
    if(monstre.awake){
    	etree[2].innerHTML = 'Reveiller';
    }else{
    	etree[2].innerHTML = 'Endormi';
    }
}


export default {
    log : _log,
    displayStatus : _displayStatus,
 }