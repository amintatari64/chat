<?php
if (!isset($_COOKIE['name'])) {
?>
    <script>
        window.location = 'login.php'
    </script>;
<?php
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>chat</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="bg-info bg-opacity-50 shadow d-flex flex-column justify-content-center align-items-center" style="height: 450px;">
                    <div id="container" class="mx-1 px-3 overflow-auto mt-1 w-100" style="height: 400px;direction: rtl;">
                        <!--
                        <div class="d-flex justify-content-evenly align-items-center w-50">
                            <div class="rounded-pill bg-danger bg-opacity-25"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg></div>
                            <div class="px-2 pt-1 pb-2 mt-2 bg-light rounded-3 shadow-sm d-flex flex-column justify-content-center align-items-center">
                                <div class="align-self-start text-wrap" style="font-size: 13px;">محمدامین</div>
                                <div>سلام ، چطوری؟</div>
                                <div class="mt-1 align-self-end" style="font-size: 10px;">19:20</div>
                            </div>
                        </div>
                    -->
                    </div>
                    <div class="m-1 w-75 d-flex flex-column justify-content-center align-items-center" style="height: 50px;">
                        <div class="input-group">
                            <input type="text" id="message" class="form-control shadow-sm" placeholder="type your message..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <a onclick="send()" class="btn btn-primary d-flex flex-column justify-content-center align-items-center" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg></a>
                            <abutton type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logout">
                                logout
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-3 text-warning" id="exampleModalLabel">Warning!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-black">
                    Do you want to logout?
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-success" data-bs-dismiss="modal">No</a>
                    <script>
                        //logout
                        function logout() {
                            const xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4) {
                                    if (xhttp.status === 200) {
                                        if (xhttp.response == "tr") {
                                            window.location = 'login.php';
                                        } else {
                                            alert("در هنگام انجام عملیات خطایی رخ داد");
                                        }
                                    } else {
                                        alert('خطا در برقراری ارتباط!');
                                    }
                                }
                            }
                            xhttp.open("GET", "config.php?logout=tr");
                            xhttp.send();
                        }
                    </script>
                    <a class="btn btn-outline-danger" onclick="logout()">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/message.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>