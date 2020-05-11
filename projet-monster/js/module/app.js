import actions from './actions.js';
import ui from './ui.js';


const SHOWME = document.querySelector('#b6');
const RUN = document.querySelector('#b2');
const NEW = document.querySelector('#b1');
const FIGHT = document.querySelector('#b3');
const SLEEP = document.querySelector('#b4');
const EAT = document.querySelector('#b5');
const WORK = document.querySelector('#b7');
const KILL = document.querySelector('#k');

const NAME = 'Miguel';
const INTERVAL = 2000;

let _start = () => {

	actions.init(NAME,100,0,true);
	ui.displayStatus(actions.get());

	SHOWME.addEventListener("click", (event) => {
        actions.showme();
    });

    RUN.addEventListener("click",(event) =>{
    	actions.run();
    	ui.displayStatus(actions.get());
    });

    FIGHT.addEventListener("click",(event) =>{
    	actions.fight();
    	ui.displayStatus(actions.get());
    });

    WORK.addEventListener("click",(event) =>{
    	actions.work();
    	ui.displayStatus(actions.get());
    });

    EAT.addEventListener("click",(event) =>{
    	actions.eat();
    	ui.displayStatus(actions.get());
    });

    SLEEP.addEventListener("click",(event) =>{
    	actions.sleep();
    	ui.displayStatus(actions.get());
    });





}

export default{
	start : _start
}