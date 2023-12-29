<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อที่ 3</title>
</head>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $inputArray = isset($_POST['inputArray']) ? $_POST['inputArray'] : '';
    $searchChar = isset($_POST['searchChar']) ? $_POST['searchChar'] : '';

    // แยกข้อมูลใน inputArray เป็นอาร์เรย์
    $inputArray = explode(', ', $inputArray);

    // ค้นหาตำแหน่งของ searchChar ใน inputArray
    $foundItems = [];
    $foundPositions = [];
    foreach ($inputArray as $index => $item) {
        $position = stripos($item, $searchChar);

        if ($position !== false && !in_array($item, $foundItems)) {
            $foundItems[] = $item;
            $foundPositions[] = $position;
        }
    }

    // แสดงผลลัพธ์
    if (empty($foundItems)) {
        $resultsMessage = 'No results found';
    } else {
        $resultsMessage = '[' . implode(', ', $foundItems) . ']<br>' . implode(', ', $foundPositions);
    }
}

?>



<body>
    <h2>ข้อที่ 3</h2>
    <form method="post">
        <label for="inputArray">ใส่ข้อมูลตัวอักษรโดยคั่นด้วย "," :</label>
        <input type="text" name="inputArray" id="inputArray" required>

        <br>

        <label for="searchChar">ใส่ตัวอักษรที่ต้องการค้นหา:</label>
        <input type="text" name="searchChar" id="searchChar" required>

        <br>

        <button type="submit">Submit</button>
    </form>

    <?php if (isset($resultsMessage)) : ?>
        <p><?php echo $resultsMessage; ?></p>
    <?php endif; ?>
</body>

</html>