<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อที่ 5</title>
</head>

<body>

    <?php
    session_start();

    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = [];
        $_SESSION['currentIndex'] = -1;
    }

    function inputUrl($url)
    {
        if (!empty($url)) {
            if (!preg_match('/^(http:\/\/|https:\/\/|www\.)/', $url)) {
                $url = "www.$url";
            }

            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $_SESSION['currentIndex']++;
                $_SESSION['history'][$_SESSION['currentIndex']] = $url;
                echo "Website URL '$url' added to history.<br>";
            } else {
                echo "format url ไม่ถูกต้อง.<br>";
            }
        } else {
            echo "กรุณาใส่ url<br>";
        }
    }

    function goPrevious()
    {
        if ($_SESSION['currentIndex'] > 0) {
            $_SESSION['currentIndex']--;
            echo "You are now on the previous website: {$_SESSION['history'][$_SESSION['currentIndex']]}<br>";
        } else {
            echo "No website to previous.<br>";
        }
    }

    function goNext()
    {
        if ($_SESSION['currentIndex'] < count($_SESSION['history']) - 1) {
            $_SESSION['currentIndex']++;
            echo "You are now on the next website: {$_SESSION['history'][$_SESSION['currentIndex']]}<br>";
        } else {
            echo "No website to go.<br>";
        }
    }

    function currentWebsite()
    {
        if ($_SESSION['currentIndex'] >= 0 && $_SESSION['currentIndex'] < count($_SESSION['history'])) {
            echo "Now you on: {$_SESSION['history'][$_SESSION['currentIndex']]}<br>";
        } else {
            echo "No website visited yet.<br>";
        }
    }

    function showAllHistory()
    {
        if (count($_SESSION['history']) > 0) {
            echo "Website History:<br>";
            foreach ($_SESSION['history'] as $index => $url) {
                echo "$index: $url<br>";
            }
        } else {
            echo "No website visited yet.<br>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $command = $_POST['command'];
        $url = $_POST['url'];

        switch ($command) {
            case 'input':
                inputUrl($url);
                break;
            case 'prev':
                goPrevious();
                break;
            case 'next':
                goNext();
                break;
            case 'current':
                currentWebsite();
                break;
            case 'all':
                showAllHistory();
                break;
            default:
                echo "Invalid command.<br>";
                break;
        }
    }
    ?>

    <h2>ข้อที่ 5:</h2>
    <form method="post">
        <label for="command">คำสั่ง:</label>
        <input type="text" name="command" id="command" required>
        <br>
        <label for="url">URL:</label>
        <input type="text" name="url" id="url">
        <br>
        <button type="submit">Submit</button>
    </form>
    <ul>
        <li><code>ตัวอย่าง url ที่ถูกต้อง "https://www.google.com/" </code></li>
    </ul>

</body>

</html>