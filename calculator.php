<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calcustyle.css">
    <title>Simple PHP Calculator</title>
</head>
<body>
    <div class="container">
        <h1>Simple Calculator</h1>
        <form method="post" action="">
            <input type="number" name="num1" step="any" placeholder="Enter first number" required>
            <select name="operation" required>
                <option value="">Select operation</option>
                <option value="add">Add</option>
                <option value="subtract">Subtract</option>
                <option value="multiply">Multiply</option>
                <option value="divide">Divide</option>
            </select>
            <input type="number" name="num2" step="any" placeholder="Enter second number" required>
            <button type="submit" name="calculate">Calculate</button>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = '';

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 == 0) {
                        $result = 'Cannot divide by zero!';
                    } else {
                        $result = $num1 / $num2;
                    }
                    break;
                default:
                    $result = 'Invalid operation!';
            }

            echo "<h2 class='result'>Result: $result</h2>";
        }
        ?>
    </div>
</body>
</html>