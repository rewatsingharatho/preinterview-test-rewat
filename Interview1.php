<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อที่ 1</title>
</head>

<body>
    <h2>ข้อที่ 1</h2>
    <form method="post">
        <label for="n">ใส่ค่า n:</label>
        <input type="text" name="n" id="n" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับค่า n จากฟอร์ม
        $n = isset($_POST['n']) ? (int)$_POST['n'] : 0;

        // เรียกใช้ฟังก์ชัน pp และส่งค่า n ไป
        pp($n);
    }

    function pp($n)
    {
        for ($i = 1; $i <= $n; $i++) {
            $output = '';

            if ($i % 3 == 0) {
                $output .= 'Ping';
            }

            if ($i % 5 == 0) {
                $output .= 'Pong';
            }

            if ($output) {
                echo  $i . ' ' . $output . '<br>';
            }
        }
    }
    ?>

</body>

</html>