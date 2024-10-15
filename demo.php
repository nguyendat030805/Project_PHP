<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{
        background-color: aqua;
        width: 30%;
        border: 2px solid black;
        text-align: center;
    }
</style>
<body>
    <form action="" method="post">
        <h1>Bảng Điểm Của Em</h1>
        Semester 1: <input type="text" name="element" required> <br> <br>
        Semester 2: <input type="text" name="element2" required> <br> <br>
        Year: 
        <select name="element4" required>
            <option value="1">1</option>
            <option value="2">2</option>
        </select><br> <br>
        Summarise: <input type="text" name="element3" value="<?php error_reporting(0); echo test(); ?>"> <br> <br>
        <h2 class="dh"><?php echo isset($dh) ? $dh : ''; ?></h2> 
        <input type="submit" value="OK" name="submit">
        <input type="reset" value="Cancel">
    </form>

    <?php
        error_reporting(0);     
        $tb = "";
        $dh = ""; 

        function test() {
            global $tb, $dh; 

            if (isset($_POST['submit'])) {
                $m1 = $_POST["element"];
                $m2 = $_POST["element2"];
                $year = $_POST["element4"];
                
                if (is_numeric($m1) && is_numeric($m2)) {
                    if ($year == 1) {
                        $tb = ($m1 + $m2) / 2;
                    } else {
                        $tb = ($m1 + ($m2 * 3)) / 4;
                    }
                    if ($tb >= 8 && $tb <= 10) {
                        $dh = "Học sinh giỏi"; 
                    } elseif ($tb >= 6.5 && $tb < 8) {
                        $dh = "Học sinh khá";
                    } elseif ($tb >= 5 && $tb < 6.5) {
                        $dh = "Học sinh trung bình";
                    } 
                    elseif ($tb >= 2.5 && $tb < 4.9) {
                        $dh = "Học sinh Yếu";}
                    elseif ($tb >= 1 && $tb < 2.4) {
                        $dh = "Ngu học lại đi con";}
                    else {
                        $dh = "Điểm không hợp lệ";
                    }
                } else {
                    echo "Vui lòng nhập số hợp lệ cho điểm.";
                }
            }
            return $tb; 
        }
        test();
    ?>
</body>

</html>