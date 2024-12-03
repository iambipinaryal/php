<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        .calculator input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .calculator select, .calculator input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            background-color: #f8f8f8;
        }
        .result {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form method="POST" action="">
            <input type="text" name="num1" placeholder="Enter first number" required>
            <input type="text" name="num2" placeholder="Enter second number" required>
            <select name="operation" required>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (*)</option>
                <option value="divide">Division (/)</option>
            </select>
            <input type="submit" name="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $num1 = floatval($_POST['num1']);
            $num2 = floatval($_POST['num2']);
            $operation = $_POST['operation'];
            $result = "";

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
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Error: Division by zero";
                    }
                    break;
                default:
                    $result = "Invalid operation";
            }

            echo "<div class='result'>Result: $result</div>";
        }
        ?>
    </div>
</body>
</html>