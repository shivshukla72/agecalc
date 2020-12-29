<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<style>
    body {
        position: relative;

    }

    .box {
        border-radius: 5px;
        padding: 1%;
        border-style: none;
        background-color: linen;
    }

    .maindiv {
        position: absolute;
        margin-top: 8%;
        left: 20%;
        right: 20%;
        height: 40vh;
        border: 2px solid black;
        border-radius: 10px;
        background-color: aquaslice;
    }

    .button {
        border-radius: 5px;
        padding: 1%;
        border-style: none;
        font-weight: bold;
        font-size: 18px;

    }

    h2 {
        text-align: center;
    }
</style>

<body>
    <div class="maindiv">
        <h2>Age Calculator</h2>
        <form method="post" id="submit" style="text-align: center;">
            <label for="DOB"><b>Your Date of Birth:</b></label>
            <!-- <input type="number" name="year" class="box" style="width: 10%;" id="year"> -->
            <select name="year" id="year" class="box" style="width: 10%;">
                <?php
                for ($year = 1995; $year <= date("Y"); $year++)
                    echo "<option value='$year'>$year</option>";
                ?>
            </select>
            <label for="year">Year</label>
            <select name="month" class="box" style="width: 10%;" id="month">
                <option value="0"></option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
            <label for="month">Month</label>
            <select name="date" class="box" id="date">
                <?php
                for ($date = 0; $date <= 31; $date++)
                    echo "<option value='$date'>$date</option>";
                ?>
            </select>
            <label for="date">Date</label>
            <select name="hour" class="box" id="hour">
                <?php
                for ($hour = 1; $hour <= 24; $hour++)
                    echo "<option value='$hour'>$hour</option>";
                ?>
            </select>
            <label for="hour">Hour</label>
            <select class="box" name="min" id="min" style="width:7%">
                <?php
                for ($min = 0; $min <= 59; $min++)
                    echo "<option value='$min'>$min</option>";
                ?>
            </select>
            <label for="min">Min</label>
            <select type="number" class="box" name="sec" id="sec" style="width:7%">
                <?php
                for ($sec = 0; $sec <= 59; $sec++)
                    echo "<option value='$sec'>$sec</option>";
                ?>
            </select>
            <label for="sec">Sec</label>
            <div style="text-align: center; padding-top:5%;">
                <input type="submit" class="button" name="submit" value="CALCULATE">
            </div>
        </form>
        <div style="position: absolute; left:20% ">
            <h2 id="show"></h2>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        var interval;
        var final;
        var data;

        $("#submit").submit(function(evt) {
            evt.preventDefault();

            agecalculate();
            var year = document.getElementById('year').value;
            var month = document.getElementById('month').value;
            var date = document.getElementById('date').value;
            var hour = document.getElementById('hour').value;
            var min = document.getElementById('min').value;
            var sec = document.getElementById('sec').value;
            data = {
                'year': year,
                'month': month,
                'date': date,
                'hour': hour,
                'min': min,
                'sec': sec
            }

        })


        function agecalculate() {


            $.ajax({
                url: 'agecalc.php',
                type: 'post',
                dateType: 'JSON',
                data: data,
                success: function(response) {
                    final = response;
                    document.getElementById('show').innerHTML = final;
                    if (interval == undefined) {
                        interval = setInterval(function() {

                            agecalculate();

                        }, 1000)
                    }

                }

            })
        }
    });
</script>


</html>