<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อที่ 4</title>
</head>

<body>

    <h2>ข้อที่ 4</h2>
    <form method="post">
        <label for="start_day">Date x dd:</label>
        <input type="text" name="start_day" id="start_day" required>
        <label for="start_month">mm:</label>
        <input type="text" name="start_month" id="start_month" required>
        <label for="start_year">yyyy:</label>
        <input type="text" name="start_year" id="start_year" required>

        <br>

        <label for="end_day">Date y dd:</label>
        <input type="text" name="end_day" id="end_day" required>
        <label for="end_month">mm:</label>
        <input type="text" name="end_month" id="end_month" required>
        <label for="end_year">yyyy:</label>
        <input type="text" name="end_year" id="end_year" required>

        <br>

        <label for="selected_day">Date m dd:</label>
        <input type="text" name="selected_day" id="selected_day" required>
        <label for="selected_month">mm:</label>
        <input type="text" name="selected_month" id="selected_month" required>
        <label for="selected_year">yyyy:</label>
        <input type="text" name="selected_year" id="selected_year" required>

        <br>
        <button type="submit">Submit</button>
        <br></br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $startDay = $_POST['start_day'];
        $startMonth = $_POST['start_month'];
        $startYear = $_POST['start_year'];

        $endDay = $_POST['end_day'];
        $endMonth = $_POST['end_month'];
        $endYear = $_POST['end_year'];

        $selectedDay = $_POST['selected_day'];
        $selectedMonth = $_POST['selected_month'];
        $selectedYear = $_POST['selected_year'];

        $startDate = new DateTime("$startYear-$startMonth-$startDay");
        $endDate = new DateTime("$endYear-$endMonth-$endDay");
        $selectedDate = new DateTime("$selectedYear-$selectedMonth-$selectedDay");

        $interval = $selectedDate->diff($startDate);
        $daysDifference = $interval->days;

        if ($selectedDate >= $startDate && $selectedDate <= $endDate) {
            echo "true, $daysDifference Days";
        } else {
            if ($selectedDate < $startDate) {
                echo "false, -$daysDifference Days ";
            } else {
                echo "false, $daysDifference Days";
            }
        }
    }
    ?>


</body>

</html>