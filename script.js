function generatePhoneNumber() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                document.getElementById("result").innerHTML = xhr.responseText;
            } else {
                document.getElementById("result").innerHTML = "Error generating phone number.";
            }
        }
    };
    xhr.open("GET", "generate.php", true);
    xhr.send();
}
