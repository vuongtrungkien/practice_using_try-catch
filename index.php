<!DOCTYPE html>
<html>
<head>
    <title>CALCULATOR</title>
    <h3>SIMPLE CALCULATOR</h3>
    <form method="post">
        FirstNumber:<br><input name="num1" type="number"><br>
        <select name="calculations">
            <option>Addition</option>
            <option>Minus</option>
            <option>Division</option>
            <option>multi</option>
        </select><br>
        SecondNumber:<br><input name="num2" type="number"><br>
        <input type="submit">
    </form>

    <?php
    $num1 = '';
    $num2 = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $calculation = $_POST['calculations'];
    }
    $result = 0;

    function checkNumber($num1, $num2)
    {
        if ($num1 == 0 || $num2 == 0) {
            throw new Exception("Error");

        }
        return true;
    }


    function calculate($num1, $num2, $calculation)
    {
        global $result;
        switch ($calculation) {
            case "Addition":
                $result = $num1 + $num2;
                break;
            case "Minus":
                $result = $num1 - $num2;
                break;
            case "Division":
                try {
                  checkNumber($num1,$num2);
                    $result = $num1 / $num2;

                } catch (Exception $e) {
                    echo  'Message: '. $e->getMessage();
                    break;
                }

                break;

            case "multi":
                $result = $num1 * $num2;
                break;
        }
    }

    calculate($num1, $num2, $calculation);
    ?>
</head>
<body>




<h3>Result</h3>
<p>Result = <?php echo $result; ?></p>


</body>
</html>