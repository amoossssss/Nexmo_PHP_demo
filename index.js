var url = window.location.toString();

if (url.indexOf("?") != -1) {
	var querystring = url.split("?")[1];
}

var str = "";

function getValue(_querystring, _name){

	var getstring = _querystring.split("&");
	var pair ;

	console.log(getstring);

	for (i = 0; i < getstring.length; i++) {

		console.log("getstring[i]:"+getstring[i]);

		pair = getstring[i].split("=");

		console.log("PAIR[0]:"+pair[0]);
		console.log("PAIR[1]:"+pair[1]);

		if(pair[0] == _name){
			return pair[1];
		}

	}
	return "n/a";
};

if(getValue(querystring,"try") == "try"){
	alert("密碼錯誤請再試一次");
}


document.getElementById('sms_name').textContent  = getValue(querystring,"name");


function postIndexForm() {
	document.getElementById('verifyForm').submit();
}

function postSmsForm() {
	document.getElementById('req_id').value = getValue(querystring,"id");
	document.getElementById('userName').value = getValue(querystring,"name");
	document.getElementById('verifyCode').submit();
}
