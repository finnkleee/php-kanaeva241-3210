<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 500PX;
            margin: auto;
        }

        .calculator_wrapper {
            max-width: 216px; 
            
            border: 1px solid black;
            border-radius: 5px;
            padding: 5px;
        }

        input[type="text"] { 
            width: 207px; 
            height: 40px; 
            font-size: 1.25rem; 
            margin-bottom: 10px; 
        }

        button { 
            width: 50px; 
            height: 40px; 
            font-size: 1.125rem; 
            margin: 2px; 
        }

        .buttons{

        }

        .oper{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: auto;
        }
        .oper button{
            width: 70px;
        }
    </style>
</head>
<body>
    <header class="header">
            <?php
                echo "<div class = 'zadanie'><h1>2.2. Домашняя работа: Calculator</h1></div>";
            ?>
    </header>
    
    <div class="calculator_wrapper">
        <input type="text" id="display" readonly>
        <div class="buttons">
            <?php
                $btns = [
                '7', '8', '9', '/',
                '4', '5', '6', '*',
                '1', '2', '3', '-',
                '(', '0', ')', '+'
                ];
                foreach ($btns as $btn) {
                echo "<button onclick=\"append('$btn')\">$btn</button>";
                }
            ?>
            <div class="oper">
                <button onclick="backspace()">←</button>
                <button onclick="clearDisplay()">C</button>
                <button onclick="calculate()">=</button>
            </div>
            
        </div>
    </div>
    <script>
        let errorShown = false;

        function append(char) {
            const display = document.getElementById("display");
            if (errorShown) {
                display.value = "";
                errorShown = false;
            }
            display.value += char;
        }
        
        function clearDisplay() {
            document.getElementById("display").value = "";
            errorShown = false;
            }

        function backspace() {
            const display = document.getElementById("display");
            display.value = display.value.slice(0, -1);
            errorShown = false;
            }

        function calculate() {
            const input = document.getElementById("display").value;
            if (!input) return;

            fetch("main.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "expression=" + encodeURIComponent(input),
            })
                .then((response) => response.text())
                .then((result) => {
                const display = document.getElementById("display");
                if (result.startsWith("Ошибка")) {
                    display.value = result;
                    errorShown = true;
                } else {
                    display.value = parseFloat(result);
                    errorShown = false;
                }
                })
                .catch(() => {
                document.getElementById("display").value = "Ошибка соединения";
                errorShown = true;
                });
            }
    </script>
</body>
</html>