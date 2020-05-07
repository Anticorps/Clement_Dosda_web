
//import {log, displayStatus} from './ui.js';

let name;
let life;
let money;
let awake;


let _init = (n,l,m,a) => {
	name = n;
	life = l;
	money = m;
	awake = a;
}

export default{
	showme(){
    alert(`Nom: ${name} \nVie: ${life} \nArgent: ${money} \nReveillé: ${awake}`);
	},
	init : _init
}