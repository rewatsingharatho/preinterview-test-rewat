<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อที่ 2</title>
</head>

<body>
    <h2>ข้อที่ 2</h2>
    <form method="post">
        <label for="n">ค่าที่ 1:</label>
        <input type="text" name="n" id="n" required>

        <br>

        <label for="i">ค่าที่ 2:</label>
        <input type="text" name="i" id="i" required>

        <br>

        <label for="j">ค่าที่ 3:</label>
        <input type="text" name="j" id="j" required>

        <br>

        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับข้อมูลจากฟอร์ม
        $n = isset($_POST['n']) ? (int)$_POST['n'] : 0;
        $i = isset($_POST['i']) ? (int)$_POST['i'] : 0;
        $j = isset($_POST['j']) ? (int)$_POST['j'] : 0;

        function pp($n, $i, $j)
        {
            for ($num = 1; $num <= $n; $num++) {
                $output = '';

                if ($num % $i == 0) {
                    $output .= 'Ping';
                }

                if ($num % $j == 0) {
                    $output .= 'Pong';
                }
                if ($output) {
                    echo '<p>' .  $num . ' ' . $output   . '</p>';
                }
            }
        }

        pp($n, $i, $j); // ใช้ค่าที่รับจากฟอร์ม
    }
    ?>
</body>

</html>