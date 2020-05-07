
const _ACTIONBOX = document.querySelector('#actionbox');
const _STATUSLIST = document.querySelector('#status');
const _MONSTER = document.querySelector('#monster');

let _log = (msg) => {
    _ACTIONBOX.firstElementChild.classList.add('log precedent');
    let log = document.createElement("p");
    log.innerHTML = msg;
    _ACTIONBOX.insertBefore(log, _ACTIONBOX.firstElementChild);
}