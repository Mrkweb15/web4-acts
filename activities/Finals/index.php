<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1-6</title>
</head>
<body>
    <div class="exercise">
        <h3 class="title">Exercise 1:</h3>
        <?php
            $txt1 = "Twinkle";
            $txt2 = "star";

            echo '1. Twinkle, Twinkle little star';
            echo '<br/>2. ' . $txt1 .' '. $txt2;

            $txt1 = "Any";
            $txt2 = "Words";
            echo '<br/>3. ' . $txt1 .' '. $txt2;
        ?>
    </div>

    <div class="exercise">
        <h3 class="title">Exercise 2:</h3>
        <p>
            <?php
                $x = 10;
                $y = 7;

                echo '1. ' . $x . ' + ' . $y . ' = ' . $x + $y;
                echo '<br/>2. ' . $x . ' - ' . $y . ' = ' . $x - $y;
                echo '<br/>3. ' . $x . ' * ' . $y . ' = ' . $x * $y;
                echo '<br/>4. ' . $x . ' / ' . $y . ' = ' . $x / $y
            ?>
        </p>
        
    </div>

    <div class="exercise">
        <h3 class="title">Exercise 3:</h3>
        <P>
            <?php
                $value = 8;
                echo "The Value is $value";
                $value += 2;
                echo '<br/>Add 2. Value is now ' . $value;
                $value -= 4;
                echo '<br/>Subtract 4. Value is now ' . $value;
                $value *= 5;
                echo '<br/>Multiply 5. Value is now ' . $value;
                $value /= 3;
                echo '<br/>Divide by 3. Value is now ' . $value;
                $value++;
                echo '<br/>Increment value by one. Value is now ' . $value;
                $value--;
                echo '<br/>Dicrement value by one. Value is now ' . $value;
            ?>
        </P>
    </div>

    <div class="exercise">
        <h3 class="title">Exercise 4:</h3>
        <?php
            $value1 = "Harry";
            $value2 = NULL;

            function vardatatype($var) {
                if (is_string($var)) {
                    return 'string(' . strlen($var) . ') "' . $var . '"';
                } elseif (is_int($var)) {
                    return 'int(' . $var . ')';
                } elseif (is_null($var)) {
                    return 'NULL';
                } else {
                    return gettype($var) . '(' . $var . ')';
                }
            }

            echo vardatatype($value1) . "<br>";
            echo $value1 . "<br>";
            echo "int(28)" . "<br>";
            echo vardatatype($value2);
        ?>
    </div>

    <div class="exercise">
        <h3 class="title">Exercise 5:</h3>
        <?php
            $currentMonth = date('F');

            echo $currentMonth . "<br>";
            if ($currentMonth === 'August') {
                echo "It's August, so it's really hot.";
            } else {
                echo "It's not August, so at least it's not hot.";
            }
        ?>
    </div>

    <div class="exercise">
        <h3 class="title">Exercise 6:</h3>
        <?php
            for ($i = 1; $i <= 12; $i++) {
                for ($j = 1; $j <= 12; $j++) {
                    echo "$i * $j = " . ($i * $j) . "<br>";
                }
                echo "<br>";
            }
        ?>


    </div>
</body>
</html>