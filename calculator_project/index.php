<?php

class Calculator {
    private $num1;
    private $num2;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function add() {
        return $this->num1 + $this->num2;
    }

    public function subtract() {
        return $this->num1 - $this->num2;
    }

    public function multiply() {
        return $this->num1 * $this->num2;
    }

    public function divide() {
        if ($this->num2 == 0) {
            return "Cannot divide by zero";
        }
        return $this->num1 / $this->num2;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    
    $calculator = new Calculator($num1, $num2);
    $result = "";
    
    switch ($operation) {
        case "add":
            $result = $calculator->add();
            break;
        case "subtract":
            $result = $calculator->subtract();
            break;
        case "multiply":
            $result = $calculator->multiply();
            break;
        case "divide":
            $result = $calculator->divide();
            break;
        default:
            $result = "Invalid operation";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="component">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 bg-white shadow">
                        <h2 class="bg-danger-subtle text-center">PHP Calculator</h2>
                        <form method="post" class="p-4 w-100">
                            <input type="number" name="num1"class="my-2 py-1 px-3 w-100" required placeholder="Enter first number"><br>
                            <input type="number" name="num2" class="my-2 py-1 px-3 w-100" required placeholder="Enter second number"><br>
                            <select name="operation" class="my-2 py-1 px-3 w-100">
                                <option value="select">---select---</option>
                                <option value="add">Addition</option>
                                <option value="subtract">Subtraction</option>
                                <option value="multiply">Multiplication</option>
                                <option value="divide">Division</option>
                                <option value="modulo">Modulo</option>
                            </select><br>
                            <button type="submit" class="my-2 py-1 px-3 w-100">Calculate</button>
                        </form>
                        <?php if (isset($result)) { echo "<h3>Result: $result</h3>"; } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>