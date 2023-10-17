<!DOCTYPE html>
<html>
<head>
    <title>Visit Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        div {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h2>Visit Counter</h2>
    <p>Counter for how many times the link has been clicked</p>
    <div>
        <?php
        $visitsFile = "visits.txt";

        if (file_exists($visitsFile)) {
            $visits = (int) file_get_contents($visitsFile);
            $visits++;
        } else {
            $visits = 1;
        }

        file_put_contents($visitsFile, $visits);

        echo "Number of website visits: " . $visits;
        ?>
    </div>
</body>
</html>
