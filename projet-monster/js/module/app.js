import actions from './actions.js';


const _SHOWME = document.querySelector('#b6');

const NAME = 'Miguel';
const INTERVAL = 2000;

let _start = () => {

	actions.init(NAME,100,0,true);

	_SHOWME.addEventListener("click", (event) => {
        actions.showme();
    });
}

export default{
	start : _start
}