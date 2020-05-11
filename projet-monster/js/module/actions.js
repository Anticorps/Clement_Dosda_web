
import ui from './ui.js';


let monster = {
    name : undefined,
    life : 100,
    money : 0,
    awake : true
}


let _init = (n,l,m,a) => {
	monster.name = n;
	monster.life = l;
	monster.money = m;
	monster.awake = a;
}

let _showme = () => {
    	alert(`Nom: ${monster.name} \nVie: ${monster.life} \nArgent: ${monster.money} \nReveillé: ${monster.awake}`);
	}

let _get = () => monster;

let _run = () => {
	if(monster.awake && monster.life > 2){
		monster.life --;
		ui.log("votre monstre ce met a courir");
	}else{
		ui.log("votre monstre n'est pas en capacité de courir");
	}
	
}

let _fight = () => {
	if(monster.awake && monster.life > 4){
		monster.life = monster.life -3;
		ui.log('votre monstre se bat')
	}
	else{
		ui.log("votre monstre n'est pas en capacité de se batre");
	}
}

let _work = () => {
	if(monster.awake && monster.life > 1){
		monster.life --;
		monster.money = monster.money+2;
		ui.log('votre monstre travaille')
	}
	else{
		ui.log("votre monstre n'est pas en capacité de travailler");
	}
}

let _eat = () => {
	if(monster.awake && monster.money > 2){
		monster.life = monster.life + 2;
		monster.money = monster.money-3;
		ui.log('votre monstre mange')
	}
	else{
		ui.log("votre monstre n'est pas en capacité de manger");
	}
}

let _sleep = () => {
	if(monster.awake){
		monster.awake = false;
		ui.log("votre monstre s'endort");
		setTimeout(()=>{
			monster.awake = true;
			monster.life = monster.life + 2;
			ui.log("votre monstre se reveile");
			ui.displayStatus(actions.get());
		},10000);
	}
}

export default{
	showme : _showme,
	init : _init,
	get : _get,
	run : _run,
	fight : _fight,
	work : _work,
	eat : _eat,
	sleep : _sleep
}