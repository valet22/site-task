let today = new Date().toISOString().slice(0, 10);

document.getElementById('footer_date').innerText += " "+today

function green_table() {
	var green = document.getElementById("testtt");
	green.style.backgroundColor = '#ffffff;';
}

function yellow_table() {
	var yellow = document.querySelectorAll("th");
	yellow.style.background = 'red;';
}

function stock_table() {
	var stock = document.querySelectorAll("th");
	stock.style.background = 'red;';
}