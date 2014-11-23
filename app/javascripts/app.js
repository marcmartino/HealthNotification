/*function myIP() {
    if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
    else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.open("GET","http://api.hostip.info/get_json.php",false);
    xmlhttp.send();

    hostipInfo = JSON.parse(xmlhttp.responseText);

    return hostipInfo;
}

var TestObject = Parse.Object.extend("TestObject");
var testObject = new TestObject();
testObject.save(myIP()).then(function(object) {
  console.log("yay! it worked");
});*/
