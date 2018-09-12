var myField = document.theform.mytelephone;
var myError = document.getElementById('formerror');

myField.onchange = function() {
        var myPattern = new RegExp("\\d{3}[\\-]\\d{3}[\\-]\\d{4}", "i");
        var isValid = this.value.search(myPattern) >= 0;

        if (!(isValid)) {
            myError.innerHTML = "Input does not match expected pattern. xxx-xxx-xxxx";
        } else { //pattern not valid
            myError.innerHTML = "";
        } //pattern is valid

    } // myField has changed

//si se pone en el html el placeholder y el pattern se pueden llamar aqui con el this
/*var inputFields = document.theform.getElementsByTagName("input");

for (key in inputFields) {

	var myField = inputFields[key];
	var myError = document.getElementById('formerror');

	myField.onchange = function() {
		var myPattern = this.pattern;
		var myPlaceholder = this.placeholder;
		var isValid = this.value.search(myPattern) >= 0;

		if (!(isValid)) {
			myError.innerHTML = "Input does not match expected pattern. " + myPlaceholder;
		} else { //pattern not valid
			myError.innerHTML = "";
		} //pattern is valid

	} // myField has changed



} // inputFields*/