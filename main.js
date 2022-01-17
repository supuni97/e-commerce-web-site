let btn1 = document.querySelectorAll("#plus-btn");
let btn2 = document.querySelectorAll("#minus-btn");
let price = document.querySelectorAll("#price");
let t_price = document.querySelector("#t_price");


let total2 = 0;


for(let i = 0; i<btn1.length; i++){         //print sub total in the begining
	
	price1 = parseInt(price[i].innerHTML);
	total2 = total2+price1;	
	t_price.innerHTML = total2;
}


for(let i = 0; i<btn1.length; i++){               //presing plus button

	btn1[i].addEventListener('click', () => {


		let count = document.querySelectorAll('#quantity');
		number = count[i].value;
		count[i].value = ++number;
		total2 = 0;
		if(number!=1){
			btn2[i].removeAttribute("disabled");
		}
		
		price[i].innerHTML = price[i].innerHTML*number/--number;

		for(let j = 0; j<btn1.length; j++){

			price1 = parseInt(price[j].innerHTML);
			total2 = total2+price1;	
			t_price.innerHTML = total2;	
		}
		
	});
}



for(let i = 0; i<btn1.length; i++){                   //pressing minus button

	btn2[i].addEventListener('click', () => {
		let count = document.querySelectorAll('#quantity');
		number = count[i].value;
		count[i].value = --number;
		total2 = 0;
		if(number==1){
 			btn2[i].setAttribute("disabled", "disabled");
 		}
		
		price[i].innerHTML = price[i].innerHTML*number/++number;
		
		for(let j = 0; j<btn1.length; j++){

			price1 = parseInt(price[j].innerHTML);
			total2 = total2+price1;	
			t_price.innerHTML = total2;	
		}
	});
}


