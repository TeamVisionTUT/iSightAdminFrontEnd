function myFunction(){
    var x = Math.floor((Math.random() * 123456789) + 9);
    document.getElementById("demo").innerHTML = x;
}
function disable(){
	document.getElementById('click').setAttribute("disabled", "disabled"); 
}

function sum(){
	var days = document.rental.numdays2.value;
	
	if (isNaN(days)){
		document.getElementById('txtPrice').value = "";
	}
	else{
		var price = 500.50;
		var sum = parseFloat(days) * parseFloat(price);
		var sum = sum.toFixed(2);
			 
		document.getElementById('txtPrice').value = "R" + sum;
	}
}

function showDetails(){
	var orderNum = document.getElementById("demo").innerHTML;
	var amount = document.rental.txtPrice.value;
	document.getElementById("report").value = "Your order number is " + orderNum;
	document.getElementById("report").value += "\nThe amount you have to pay is " + amount;
}

function clearOrderNum(){
	document.getElementById("demo").innerHTML = "";
	document.getElementById('click').disabled = false; 
}

function GetDays(){
    var dropdt = new Date(document.getElementById("drop_date").value);
    var pickdt = new Date(document.getElementById("pick_date").value);
    return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
}

function cal(){
    if(document.getElementById("drop_date")){
		document.getElementById("numdays2").value=GetDays();
    }  
}