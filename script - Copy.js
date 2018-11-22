function serialize(form) {
    var field, l, s = [];
    if (typeof form == 'object' && form.nodeName == "FORM") {
        var len = form.elements.length;
        for (var i=0; i<len; i++) {
            field = form.elements[i];
            if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
                if (field.type == 'select-multiple') {
                    l = form.elements[i].options.length; 
                    for (var j=0; j<l; j++) {
                        if(field.options[j].selected)
                            s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
                    }
                } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
                    s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
                }
            }
        }
    }
    return s.join('&').replace(/%20/g, '+');
}

function postAjax(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}


var form = document.querySelector('.user-form');

if(form) {
	form.addEventListener("submit", function (event) {
		event.preventDefault();

		var thisEl = event.currentTarget;

		var name = thisEl.name.value;
		var surname = thisEl.surname.value;
		var data = serialize(thisEl);
		var url = 'ajax.php';

		// console.log(data);
		postAjax(url, data, function(response){ 
			// JSON.parse() - php: json_decode
			// JSON.strigify() - php: json_encode
			var json = JSON.parse(response);
			console.log(json.name); 
		});


		//todo
			
		if (name == "") {
			alert("Name must be filled");
			
		} else if (surname == "") {
			alert("Surname must be filled");
			
		} else {
			
			
		}	
	});

}	
