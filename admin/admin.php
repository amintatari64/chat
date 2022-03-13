<html>
    <div id="div"></div>
</html>
<script>
    function check() {
    document.getElementById('div');
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4) {
            if (xhttp.status === 200) {
                div.innerHTML = xhttp.response;
            } else {
                alert("خطا در برقراری ارتباط!");
            }
        }
    }
    xhttp.open("GET", "../config.php?admin=tr");
    xhttp.send();
}
setInterval(check, 100);
</script>