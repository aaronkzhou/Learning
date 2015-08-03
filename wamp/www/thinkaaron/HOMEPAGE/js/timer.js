function show(){  
	var today;  
	today = new Date();
	
	var myMonth = "";
	if (today.getMonth()==0){
		myMonth = "January";
	}else if(today.getMonth()==1){
		myMonth = "February";
	}else if(today.getMonth()==2){
		myMonth = "March";
	}else if(today.getMonth()==3){
		myMonth = "April";
	}else if(today.getMonth()==4){
		myMonth = "May";
	}else if(today.getMonth()==5){
		myMonth = "June";
	}else if(today.getMonth()==6){
		myMonth = "July";
	}else if(today.getMonth()==7){
		myMonth = "August";
	}else if(today.getMonth()==8){
		myMonth = "September";
	}else if(today.getMonth()==9){
		myMonth = "October";
	}else if(today.getMonth()==10){
		myMonth = "November";
	}else if(today.getMonth()==11){
		myMonth = "December";
	}
	
	var myday="";
	if (today.getDay()==0){
		myday="Sunday";
	}else if (today.getDay()==1){
		myday="Monday";
	}else if (today.getDay()==2){
		myday="Tuesday";
	}else if (today.getDay()==3){
		myday="Wednesday";
	}else if (today.getDay()==4){
		myday="Thursday";
	}else if (today.getDay()==5){
		myday="Friday";
	}else if (today.getDay()==6){
		myday="Saturday";
	}
	
	var myhour="";
	if (today.getHours()<10){
		myhour = "0" + today.getHours();
	}else{
		myhour = today.getHours();
	}
	
	
	var myminute="";
	if (today.getMinutes()<10){
		myminute = "0" + today.getMinutes();
	}else{
		myminute = today.getMinutes();
	}
	
	var mysecond="";
	if (today.getSeconds()<10){
		mysecond = "0" + today.getSeconds();
	}else{
		mysecond = today.getSeconds();
	}

	
	timeString = myday + ", "+ myMonth + " " + today.getDate() + ", " + today.getFullYear() + " " + myhour + ":" + myminute + ":" + mysecond;

//	timeString = today.toLocaleString();

	document.getElementById("time").innerHTML = timeString;  
	setTimeout("show()",1000);
} 