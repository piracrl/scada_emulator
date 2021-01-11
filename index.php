<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCADA</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.1/src/easytimer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>ООО "СЛК" – Показатели станков</h1>
    <div class="machines">

        <div class="machine_1">
            <?php
                $onoff = array("Выключен");
                $temper = array("0");
                $hod = array("0");
                $obor = array("0");
            ?>
            <div class="data">
                <img class="machine-img" src="img/machine.svg">
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/on.png">
                        <p>Вкл/Выкл : </p>
                    </div>
                    <div class="on" id="on" style="display: inline-block;">
                        <?=$onoff[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/temp.png">
                        <p>Температура : </p>
                    </div>
                    <div class="temp" id="temp1" style="display: inline-block;">
                        <?=$temper[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/gear.png">
                        <p>Ход двигателя : </p>
                    </div>
                    <div class="hod" id="hod" style="display: inline-block;">
                        <?=$hod[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/revs.svg">
                        <p>Обороты : </p>
                    </div>
                    <div class="obor" style="display: inline-block;">
                        <?=$obor[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/timer.png">
                        <p>Время работы:</p>
                    </div>
                    <div id="basicUsage">00:00:00</div>
                </div>
            </div>
            <?php
                $con_str= new mysqli('localhost', 'root', '', 'machines');
                if ($con_str->connect_error) {
                    die("Connection failed: " . $con_str->connect_error);
                }

                $result= $con_str->query("SELECT * FROM `machine_1`");
                 if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        array_push($onoff, $row['on_off']);
                        array_push($temper, $row['temperature']);
                        array_push($hod, $row['stroke']);
                        array_push($obor, $row['revs']);
                        }
                }
                $con_str->close();
            ?>
            <script>

            </script>
            <script>
                var onoff = <?php echo json_encode($onoff);?>;
                var temper = <?php echo json_encode($temper);?>;
                var hoder = <?php echo json_encode($hod);?>;
                var oborer = <?php echo json_encode($obor);?>;
                var previous = '';
                var checker = 0;
                var stopwatch1 = new Timer();
                var stopwatch2 = new Timer();
                var stopwatch3 = new Timer();
                stopwatch1.addEventListener('secondsUpdated', function(e) {
  $('#basicUsage').html(stopwatch1.getTimeValues().toString());
});
                stopwatch2.addEventListener('secondsUpdated', function(e) {
  $('#basicUsage2').html(stopwatch2.getTimeValues().toString());
});
                stopwatch3.addEventListener('secondsUpdated', function(e) {
  $('#basicUsage3').html(stopwatch3.getTimeValues().toString());
});


                function updateP(){
                    var ran = Math.floor(Math.random() * onoff.length-1) +1;



                    $(".on").html(onoff[ran]);
                    if (onoff[ran]!= "Включен") {
                    	stopwatch1.pause();
                    	previous = onoff[ran];
                    } else if (previous == "Выключен" && onoff[ran]== "Включен") {
                    	stopwatch1.start();
                    	previous = "";
                    }
                    if (onoff[ran]!= "Включен") {
                        $(document.getElementById("on")).css("background", "#ff6f69");
                    } else if (onoff[ran] === "Включен") {
                        $(document.getElementById("on")).css("background", "#88d8b0");
                    }
                    if (temper[ran] > 50 && temper[ran] < 70) {
                        $(document.getElementById("temp1")).css("background", "#ffcc5c");
                    } else if (temper[ran] <= 50) {
                        $(document.getElementById("temp1")).css("background", "#88d8b0");
                    }
                    if (hoder[ran] != "функц") {
                        $(document.getElementById("hod")).css("background", "#ff6f69");
                    } else {
                        $(document.getElementById("hod")).css("background", "#88d8b0");
                    }
                    $(".temp").html(temper[ran]);
                    $(".hod").html(hoder[ran]);
                    $(".obor").html(oborer[ran]);

                    checker++;
            massPopChart.data.datasets[0].data.push(temper[ran]);
            massPopChart.update();
            massPopChart2.data.datasets[0].data.push(oborer[ran]);
            massPopChart2.update();
            if (checker > 10) {
                        massPopChart.data.datasets[0].data.shift();
                        massPopChart2.data.datasets[0].data.shift();
                    }

                    table.row.add( [
                        checker,
                        onoff[ran],
                        temper[ran],
                        hoder[ran],
                        oborer[ran]
                    ] ).draw(false);


                    }


                document.addEventListener('keydown', function (event) {
                  if (event.key === 's' || event.key === 'ы') {
                    timero = setInterval(updateP, 2000);
                    stopwatch1.start();
                  }
                  if (event.key === 'p' || event.key === 'з') {
                    alert("Сбор остановлен");
                    timero = clearInterval(timero);
                    stopwatch1.pause();
                  }
                });

            </script>
        </div>

        <div class="machine_2">
            <?php
                $onoff2 = array("Выключен");
                $temper2 = array("0");
                $hod2 = array("0");
                $obor2 = array("0");
            ?>
            <div class="data">
                <img class="machine-img" src="img/machine.svg">
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/on.png">
                        <p>Вкл/Выкл : </p>
                    </div>
                    <div class="on2" id="on2" style="display: inline-block;">
                        <?=$onoff2[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/temp.png">
                        <p>Температура : </p>
                    </div>
                    <div class="temp2" id="temp2" style="display: inline-block;">
                        <?=$temper2[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/gear.png">
                        <p>Ход двигателя : </p>
                    </div>
                    <div class="hod2" id="hod2" style="display: inline-block;">
                        <?=$hod2[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/revs.svg">
                        <p>Обороты : </p>
                    </div>
                    <div class="obor2" style="display: inline-block;">
                        <?=$obor2[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/timer.png">
                        <p>Время работы:</p>
                    </div>
                    <div id="basicUsage2">00:00:00</div>
                </div>
            </div>
            <?php
                $con_str2= new mysqli('localhost', 'root', '', 'machines');
                if ($con_str2->connect_error) {
                    die("Connection failed: " . $con_str2->connect_error);
                }

                $result2= $con_str2->query("SELECT * FROM `machine_2`");
                 if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                        array_push($onoff2, $row2['on_off']);
                        array_push($temper2, $row2['temperature']);
                        array_push($hod2, $row2['stroke']);
                        array_push($obor2, $row2['revs']);
                        }
                }
                $con_str2->close();
            ?>
            <script>
                var onoff2 = <?php echo json_encode($onoff2);?>;
                var temper2 = <?php echo json_encode($temper2);?>;
                var hoder2 = <?php echo json_encode($hod2);?>;
                var oborer2 = <?php echo json_encode($obor2);?>;
                var previous2 = '';
                var checker2 = 0;
                function updateP2(){
                    var ran2 = Math.floor(Math.random() * onoff2.length-1) +1;

                    table2.row.add( [
                        checker,
                        onoff[ran2],
                        temper[ran2],
                        hoder[ran2],
                        oborer[ran2]
                    ] ).draw(false);

                    $(".on2").html(onoff2[ran2]);
                    if (onoff2[ran2]!= "Включен") {
                    	stopwatch2.pause();
                    	previous2 = onoff2[ran2];
                    } else if (previous2 == "Выключен" && onoff2[ran2]== "Включен") {
                    	stopwatch2.start();
                    	previous2 = "";
                    }
                    if (onoff2[ran2]!= "Включен") {
                        $(document.getElementById("on2")).css("background", "#ff6f69");
                    } else if (onoff2[ran2] === "Включен") {
                        $(document.getElementById("on2")).css("background", "#88d8b0");
                    }
                    if (temper2[ran2] > 50 && temper2[ran2] < 70) {
                        $(document.getElementById("temp2")).css("background", "#ffcc5c");
                    } else if (temper2[ran2] <= 50) {
                        $(document.getElementById("temp2")).css("background", "#88d8b0");
                    }
                    if (hoder2[ran2] != "функц") {
                        $(document.getElementById("hod2")).css("background", "#ff6f69");
                    } else {
                        $(document.getElementById("hod2")).css("background", "#88d8b0");
                    }
                    $(".temp2").html(temper2[ran2]);
                    $(".hod2").html(hoder2[ran2]);
                    $(".obor2").html(oborer2[ran2]);

                    checker2++;
            massPopChart.data.datasets[1].data.push(temper[ran2]);
            massPopChart.update();
            massPopChart2.data.datasets[1].data.push(oborer[ran2]);
            massPopChart2.update();
                    if (checker2 > 10) {
                        massPopChart.data.datasets[1].data.shift();
                        massPopChart2.data.datasets[1].data.shift();
                    }


                    }

                document.addEventListener('keydown', function (event) {
                  if (event.key === 's' || event.key === 'ы') {
                    timero2 = setInterval(updateP2, 2000);
                    stopwatch2.start();
                  }
                  if (event.key === 'p' || event.key === 'з') {
                    timero2 = clearInterval(timero2);
                    stopwatch2.pause();
                  }
                });

            </script>


        </div>
        <div class="machine_3">
            <?php
                $onoff3 = array("Выключен");
                $temper3 = array("0");
                $hod3 = array("0");
                $obor3 = array("0");
            ?>
            <div class="data">
                <img class="machine-img" src="img/machine.svg">
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/on.png">
                        <p>Вкл/Выкл : </p>
                    </div>
                    <div class="on3" id="on3" style="display: inline-block;">
                        <?=$onoff3[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/temp.png">
                        <p>Температура : </p>
                    </div>
                    <div class="temp3" id="temp3" style="display: inline-block;">
                        <?=$temper3[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/gear.png">
                        <p>Ход двигателя : </p>
                    </div>
                    <div class="hod3" id="hod3" style="display: inline-block;">
                        <?=$hod3[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/revs.svg">
                        <p>Обороты : </p>
                    </div>
                    <div class="obor3" style="display: inline-block;">
                        <?=$obor3[0]?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="heading">
                        <img class="header-icon" src="img/timer.png">
                        <p>Время работы:</p>
                    </div>
                    <div id="basicUsage3">00:00:00</div>
                </div>
            </div>
            <?php
                $con_str3= new mysqli('localhost', 'root', '', 'machines');
                if ($con_str3->connect_error) {
                    die("Connection failed: " . $con_str3->connect_error);
                }

                $result3= $con_str3->query("SELECT * FROM `machine_1`");
                 if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) {
                        array_push($onoff3, $row3['on_off']);
                        array_push($temper3, $row3['temperature']);
                        array_push($hod3, $row3['stroke']);
                        array_push($obor3, $row3['revs']);
                        }
                }
                $con_str3->close();
            ?>
            <script>
                var onoff3 = <?php echo json_encode($onoff3);?>;
                var temper3 = <?php echo json_encode($temper3);?>;
                var hoder3 = <?php echo json_encode($hod3);?>;
                var oborer3 = <?php echo json_encode($obor3);?>;
                var previous3 = '';
                var checker3 = 0;
                function updateP3(){
                    var ran3 = Math.floor(Math.random() * onoff3.length-1) +1;
                    $(".on3").html(onoff3[ran3]);
                    if (onoff3[ran3]!= "Включен") {
                    	stopwatch3.pause();
                    	previous3 = onoff3[ran3];
                    } else if (previous3 == "Выключен" && onoff3[ran3]== "Включен") {
                    	stopwatch3.start();
                    	previous3 = "";
                    }
                    if (onoff3[ran3]!= "Включен") {
                        $(document.getElementById("on3")).css("background", "#ff6f69");
                    } else if (onoff3[ran3] === "Включен") {
                        $(document.getElementById("on3")).css("background", "#88d8b0");
                    }
                    if (temper3[ran3] > 50 && temper3[ran3] < 70) {
                        $(document.getElementById("temp3")).css("background", "#ffcc5c");
                    } else if (temper3[ran3] <= 50) {
                        $(document.getElementById("temp3")).css("background", "#88d8b0");
                    }
                    if (hoder3[ran3] != "функц") {
                        $(document.getElementById("hod3")).css("background", "#ff6f69");
                    } else {
                        $(document.getElementById("hod3")).css("background", "#88d8b0");
                    }
                    $(".temp3").html(temper3[ran3]);
                    $(".hod3").html(hoder3[ran3]);
                    $(".obor3").html(oborer3[ran3]);

                    checker3++;
                    massPopChart.data.datasets[2].data.push(temper[ran3]);
                    massPopChart2.data.datasets[2].data.push(oborer[ran3]);
                    if (checker3 > 10) {
                        massPopChart.data.datasets[2].data.shift();
                        massPopChart2.data.datasets[2].data.shift();
                    }
                    massPopChart.update();
                    massPopChart2.update();

                    table3.row.add( [
                        checker,
                        onoff[ran3],
                        temper[ran3],
                        hoder[ran3],
                        oborer[ran3]
                    ] ).draw(false);

                    }

                document.addEventListener('keydown', function (event) {
                  if (event.key === 's' || event.key === 'ы') {
                    timero3 = setInterval(updateP3, 2000);
                    stopwatch3.start();
                  }
                  if (event.key === 'p' || event.key === 'з') {
                    timero3 = clearInterval(timero3);
                    stopwatch3.pause();
                  }
                });
            </script>
        </div>
    </div>

    <div class="graphs">
        <div class="container">
            <canvas id="myChart"></canvas>
        </div>
        <div class="container">
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    <div class="tables">
        <h1>Станок 1</h1>
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Номер</th>
                    <th>Вкл/Выкл</th>
                    <th>Температура</th>
                    <th>Ход двигателя</th>
                    <th>Обороты</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <h1>Станок 2</h1>
        <table id="table_id2" class="display">
            <thead>
                <tr>
                    <th>Номер</th>
                    <th>Вкл/Выкл</th>
                    <th>Температура</th>
                    <th>Ход двигателя</th>
                    <th>Обороты</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <h1>Станок 3</h1>
        <table id="table_id3" class="display">
            <thead>
                <tr>
                    <th>Номер</th>
                    <th>Вкл/Выкл</th>
                    <th>Температура</th>
                    <th>Ход двигателя</th>
                    <th>Обороты</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

<script>

         var table2 = $('#table_id2').DataTable({
    // insert this section
    "language": {
        "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
    }});
                table2.draw();


         var table = $('#table_id').DataTable({
    // insert this section
    "language": {
        "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
    }});
                table.draw();


        var table3 = $('#table_id3').DataTable({
    // insert this section
    "language": {
        "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
    }});
                table3.draw();


        var massPopChart = new Chart(myChart, {
        type: 'line',
        data: {
            labels: ['','','','','','','','','',''],
            datasets: [{
                label: 'Станок 1',
                data:[

                ],
                borderColor: 'green'
            }, {
                label: 'Станок 2',
                data:[

                ],
                borderColor: 'red'
            }, {
                label: 'Станок 3',
                data:[

                ],
                borderColor: 'blue'
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Температура станков',
                fontSize: 24
            }
        }
    });
    </script>
    <script>
        var massPopChart2 = new Chart(myChart2, {
        type: 'line',
        data: {
            labels: ['','','','','','','','','',''],
            datasets: [{
                label: 'Станок 1',
                data:[

                ],
                borderColor: 'green'
            }, {
                label: 'Станок 2',
                data:[

                ],
                borderColor: 'red'
            }, {
                label: 'Станок 3',
                data:[

                ],
                borderColor: 'blue'
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Обороты станков',
                fontSize: 24
            }
        }
    });
    </script>
</body>
</html>
