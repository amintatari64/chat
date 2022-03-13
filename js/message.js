//check message
function check() {
    var message = document.getElementById('message');
    var container = document.getElementById('container');
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4) {
            if (xhttp.status === 200) {
                container.innerHTML = xhttp.response;
            } else {
                message.value = "خطا در برقراری ارتباط!";
                message.disabled = "disabled";
                //alert('خطا در برقراری ارتباط!');
            }
        }
    }
    xhttp.open("GET", "config.php?check=tr");
    xhttp.send();
}
setInterval(check, 100);
//send message
function send() {
    var message = document.getElementById('message');
    if (message.value.length != 0) {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4) {
                if (xhttp.status !== 200) {
                    alert('خطا در برقراری ارتباط!');
                } else {
                    if (xhttp.response == "tr") {
                        message.value = "";
                    }
                }
            }
        }
        xhttp.open("GET", "config.php?message=" + message.value);
        xhttp.send();
    }
}
//logout
function logout() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4) {
            if (xhttp.status === 200) {
                window.location = 'login.php';
            } else {
                message.value = "خطا در برقراری ارتباط!";
                message.disabled = "disabled";
                //alert('خطا در برقراری ارتباط!');
            }
        }
    }
    xhttp.open("GET", "config.php?logout=tr");
    xhttp.send();
}