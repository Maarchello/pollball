function GetXmlHttp(){
  var xmlhttp;
  try {xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
    try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) { xmlhttp = false;}}
  if (!xmlhttp && typeof XMLHttpRequest!="undefined") {xmlhttp = new XMLHttpRequest();}
  return xmlhttp;
}
function AjaxPostSend(url,data,func){
    var req = GetXmlHttp();
    req.onreadystatechange = function() { 
        if (req.readyState == 4) {
			func(req.responseText);
        }
    }
    req.open("POST", url, true); 
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	req.send(data);
	func("Ожидаю ответа сервера...");
}
function AjaxGetSend(url,data,output){
	var statusElem = document.getElementById(output);
	var req = GetXmlHttp();
	req.onreadystatechange = function(){
		if (req.readyState == 4) {
			func(req.responseText);
        }
	}
	req.open("GET", url, true);
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	req.send('none');
	func("Ожидаю ответа сервера...");
}
