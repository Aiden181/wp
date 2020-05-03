<<<<<<< HEAD
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hello World</title>
    </head>

    <body>
        <?php
        # <- Another Way To Comment
        $name = "Aiden Ly"; //Student Name
        $year = "1";
        define("Pi", 3.14);
        echo "<h1>Hello World! </h1>";


        echo "<p>My name is: $name. I am a year $year student <p>";
        echo Pi;

        $helloWorld = "Hello " . "World.";
        echo "<p>$helloWorld </p>";

        $year++;
        $year += 1;
        echo "$year";

        echo "</br>";

        if (5 != 5.0) echo "Not Equal";
        if (5 !== 5.0) echo "Not Identical";

        echo "</br>";

        $array = ['A', 'B', 'C'];
        for ($i = 0; $i < count($array); $i++) {
            echo "$array[$i]";
        }

        $array1 = ['A' => 'Apple', 'B' => 'Banana', 'C' => 'Cat'];

        foreach ($array1 as $key => $value) {
            echo "<p> Element " . $key . "has the value " .
                $value . "or" . $array1[$key] . "</p>";
        }
        $love = "I love you";
        $greeting1 = "Hello World, \n$love";
        $greeting2 = "Hello World, \n$love";

        echo $greeting2;

        function hello($name1, $year1)
        {
            echo "<p>My name is: $name1. I am a year $year1 student <p>";
        }
        hello($name, $year);


        function divide($num, $den)
        {
            return ($den == 0) ?
                "Denominator can't be zero" : ($num / $den);
        }

        $result = divide(10,4);
        echo "$result";

        ?>

    </body>

    </html>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body>
    
</body>
</html>
>>>>>>> 1ad0af3280008b455386f68760c3d375e5b69815
