<?php
//chang timezone to tehran
date_default_timezone_set('Asia/Tehran');
//message class
class message
{
    //send message
    function send($txt)
    {
        $db = mysqli_connect("localhost", "root", "", "chat");
        $name = $_COOKIE['name'];
        $time = date('H:i');
        $sql = "INSERT INTO chat (name,txt,time) VALUES ('$name','$txt','$time')";
        mysqli_query($db, $sql);
    }
    //show new message
    function show()
    {
        $db = mysqli_connect("localhost", "root", "", "chat");
        $sql = "SELECT * FROM chat ";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while ($info = $result->fetch_assoc()) {
                echo '<div class="d-flex justify-content-evenly align-items-center w-50">
    <div class="rounded-pill bg-danger bg-opacity-25"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg></div>
    <div class="px-2 pt-1 pb-2 mt-2 bg-light rounded-3 shadow-sm d-flex flex-column justify-content-center align-items-center">
        <div class="align-self-start text-wrap" style="font-size: 13px;">'. $info['name'] .'</div>
        <div>' . $info['txt'] .'</div>
        <div class="mt-1 align-self-end" style="font-size: 10px;">' . $info['time'] .'</div>
    </div>
</div>';
            }
        }
    }
}
//login
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    setcookie('name', $name, time() + 86400, '/');
    echo 'ok';
}
//logout
if (isset($_GET['logout'])) {
    setcookie('name', "", time() - 3600, '/');
    echo "tr";
}
//check new message
if (isset($_GET['check'])) {
    $show = new message();
    $show->show();
}
//send message
if (isset($_GET['message'])) {
    $txt = $_GET['message'];
    $control = new message();
    $control->send($txt);
    echo "tr";
}
