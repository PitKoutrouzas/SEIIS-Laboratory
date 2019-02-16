<?php
include 'dbConfig.php';
session_start();


/*
 * Function requested by Ajax
 */

ini_set('max_execution_time', 600);
if (isset($_POST['func']) && !empty($_POST['func'])) {
    switch ($_POST['func']) {
        case 'getCalendar':
            getCalendar($_POST['year'], $_POST['month']);
            break;
        case 'getEvents':
            getEvents($_POST['date']);
            break;
        //For Add Event
        case 'addEvent':
            addEvent($_POST['date'], $_POST['title'], $_POST['descr'], $_POST['hours'], $_POST['minutes'], $_POST['type']);
            break;
        case 'updateTheEventPt2':
            updateTheEventPt2($_POST['nevID'], $_POST['ndate'], $_POST['ntitle'], $_POST['ndescr'], $_POST['nhours'], $_POST['nminutes'], $_POST['ntype']);
            break;
        case 'updateTheEvent':
            updateTheEvent($_POST['evID']);
            break;
        case 'deleteEvent':
            deleteEvent($_POST['evID']);
            break;
        case 'getAllEvents':
            getAllEvents($_POST['month']);
            break;
        case 'showDetails':
            showDetails($_POST['evID']);
            break;
        default:
            break;
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
 * Get months options list.
 */
function getAllMonths($selected = '') {
    $options = '';
    for ($i = 1; $i <= 12; $i++) {
        $value = ($i < 01) ? '0' . $i : $i;
        $selectedOpt = ($value == $selected) ? 'selected' : '';
        $options .= '<option value="' . $value . '" ' . $selectedOpt . ' >' . date("F", mktime(0, 0, 0, $i + 1, 0, 0)) . '</option>';
    }
    return $options;
}

/*
 * Get years options list.
 */

function getYearList($selected = '') {
    $options = '';
    for ($i = 2015; $i <= 2025; $i++) {
        $selectedOpt = ($i == $selected) ? 'selected' : '';
        $options .= '<option value="' . $i . '" ' . $selectedOpt . ' >' . $i . '</option>';
    }
    return $options;
}

/*
 * Get events by date
 */

//GET THE EVENTS BASED ON CURRENT DATE
function getEvents($date = '') {
    //Include db configuration file
    include 'dbConfig.php';
    $eventListHTML = '';
    $date = $date ? $date : date("d-m-Y");
    //Get events based on the current date
    $result = $db->query("SELECT eventID,eventTitle FROM calendar WHERE eventDateStart = '" . $date . "'");
    if ($result->num_rows > 0) {
        $eventListHTML = '<h2>Events ' . date("l, d M Y", strtotime($date)) . '</h2>';
        $resultEV = mysqli_query($db, "SELECT eventID,eventTitle,eventDateStart FROM calendar WHERE eventDateStart = '" . $date . "'");
        ?>


        <?php
        while ($row = mysqli_fetch_array($resultEV)) {
            ?>
            <input type="radio" name="ev" value="<?php echo $row["eventID"] ?>"/>
            <a id="<?php echo $row["eventID"] ?>" href="#"><?php echo $row["eventTitle"] ?>
            <?php $newDate = $row["eventDateStart"] ?>
            <?php $newDateDisp = date("d-m-Y", strtotime($newDate)); ?>
                <?php echo $newDateDisp ?></a>
            <br/>

                <?php
            }
            ?>
        <br/> 
        <input id="btnUpdateEvent" type="button" value="Update Event" onclick="updateEvent()"/>
        <input id="btnDeleteEvent" type="button" value="Delete Event" onclick="deleteEvent()"/>
        <?php
    }
}

//GET ALL THE EVENTS OF THE MONTH
function getAllEvents($month) {
    include 'dbConfig.php';
    $result = $db->query("SELECT eventID,eventTitle,eventDateStart FROM calendar where eventDateStart like '%-$month-%'");
    ?>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <input type="radio" name="ev" value="<?php echo $row["eventID"] ?>"/>
        <a id="<?php echo $row["eventID"] ?>" href="#"><?php echo $row["eventTitle"] ?>
        <?php $newDate = $row["eventDateStart"] ?>
        <?php $newDateDisp = date("d-m-Y", strtotime($newDate)); ?>
        <?php echo $newDateDisp ?></a>
        <br/>
        <?php
    }
    ?>
    <br/>
    <input id="btnUpdateEvent" type="button" value="Update Event" onclick="updateEvent()"/>
    <input id="btnDeleteEvent" type="button" value="Delete Event" onclick="deleteEvent()"/>

    <script>

        var minas = "<?php echo $month ?>";
        var monthName = "";
        switch (minas) {
            case "01":
                monthName = "January";
                break;
            case "02":
                monthName = "February";
                break;
            case "03":
                monthName = "March";
                break;
            case "04":
                monthName = "April";
                break;
            case "05":
                monthName = "May";
                break;
            case "06":
                monthName = "June";
                break;
            case "07":
                monthName = "July";
                break;
            case "08":
                monthName = "August";
                break;
            case "09":
                monthName = "September";
                break;
            case "10":
                monthName = "Octomber";
                break;
            case "11":
                monthName = "November";
                break;
            case "12":
                monthName = "December";
                break;
        }

        document.getElementById("theDate2").innerHTML = monthName;
        document.getElementById("theDate").innerHTML = "";

    </script>

    <?php
}

/*
 * Add event to date
 */

function addEvent($date, $title, $descr, $hours, $minutes, $type) {
    //Include db configuration file
    include 'dbConfig.php';
    $buildTime = $hours . ":" . $minutes;
    $resultmax = mysqli_query($db, "select MAX(eventID) from calendar");
    while ($row = mysqli_fetch_array($resultmax)) {
        $countIds = $row['MAX(eventID)'] + 1;
    }
    //Insert the event data into database
    $insert = $db->query("INSERT INTO calendar (eventID,eventTitle,eventDateStart,eventDescription,eventTime,eventType) VALUES ('" . $countIds . "','" . $title . "','" . $date . "','" . $descr . "','" . $buildTime . "','" . $type . "')");
    if ($insert) {
        echo 'ok';
    } else {
        echo 'err';
    }
}

//UPDATE AN EVENT
function updateTheEvent($evID) {
    //Include db configuration file
    include 'dbConfig.php';

    //Get calendar based on the current date
    $result = $db->query("SELECT * FROM calendar WHERE eventID = '" . $evID . "'");

    while ($row = mysqli_fetch_array($result)) {

        $_SESSION["sevID"] = $evID;

        list($hr, $min, $sec) = split('[:]', $row["eventTime"]);

        $_SESSION["shr"] = $hr;
        $_SESSION["smin"] = $min;
        $_SESSION["ssec"] = $sec;
        $_SESSION["stype"] = $row["eventType"];

        $temp = $row["eventDateStart"];
        $temp2 = $newDateDisp = date("d-m-Y", strtotime($temp));

        $_SESSION["sdate"] = $temp2;

        $_SESSION["stitle"] = $row["eventTitle"];
        $_SESSION["sdescr"] = $row["eventDescription"];
        $_SESSION["stype"] = $row["eventType"];


        echo $row["eventDateStart"] . ';' . $row["eventTitle"] . ';' . $row["eventDescription"] . ';' . $row["eventTime"] . ';' . $row["eventType"];
    }
}

function updateTheEventPt2($evID, $date, $title, $descr, $hours, $minutes, $type) {
    //Include db configuration file
    include 'dbConfig.php';
    $buildTime = $hours . ":" . $minutes;
    //Insert the event data into database

    $tempd = $date;
    $tempd2 = $newDateDisp = date("d-m-Y", strtotime($tempd));
    $_SESSION["sdate"] = $tempd2;

    $_SESSION["stitle"] = $title;
    $_SESSION["sdescr"] = $descr;
    $_SESSION["shr"] = $hours;
    $_SESSION["smin"] = $minutes;
    $_SESSION["stype"] = $type;

    $update = $db->query("update calendar set eventDateStart='" . $date . "', eventTitle='" . $title . "',eventDescription='" . $descr . "', eventTime='" . $buildTime . "',eventType='" . $type . "' where eventID='" . $evID . "'");

    if ($update) {
        echo "Update successful!";
    } else {
        echo "Update unsuccessful!";
    }
}

//DELETE AN EVENT
function deleteEvent($evID) {
    //Include db configuration file
    include 'dbConfig.php';
    if ($evID == "undefined") {
        echo 'Please select an event to delete!';
    } else {
        mysqli_query($db, "delete FROM calendar WHERE eventID = '" . $evID . "'");

        if (mysqli_affected_rows($db) > 0) {
            echo 'Delete successful!';
        } else {
            echo 'Delete unsuccessful!';
        }
    }
}

//SHOW THE DETAILS OF AN EVENT
function showDetails($evID) {
    //Include db configuration file
    include 'dbConfig.php';

    //Get calendar based on the current date
    $result = $db->query("SELECT * FROM calendar WHERE eventID = '" . $evID . "'");

    while ($row = mysqli_fetch_array($result)) {
        echo $row["eventDateStart"] . ';' . $row["eventTitle"] . ';' . $row["eventDescription"] . ';' . $row["eventTime"] . ';' . $row["eventType"];
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





/*
 * Get calendar full HTML
 */
function getCalendar($year = '', $month = '') {
    $dateYear = ($year != '') ? $year : date("Y");
    $dateMonth = ($month != '') ? $month : date("m");
    $date = $dateYear . '-' . $dateMonth . '-01';
    $currentMonthFirstDay = date("N", strtotime($date));
    $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7) ? ($totalDaysOfMonth) : ($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35) ? 35 : 42;
    ?>
    <div id="main_content">


        <!--For Add Event-->

        <div id="calendar_section">
            <div id="calender_section">
                <h2>
                    <a href="javascript:void(0);" onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' - 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' - 1 Month')); ?>');">&lt;&lt;</a>
                    <select id="month_dropdown" name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
                    <select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
                    <a href="javascript:void(0);" onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' + 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' + 1 Month')); ?>');">&gt;&gt;</a>
                </h2>

                <div id="event_add" class="none">
                    <p>Add Event on <span id="eventDateView"></span></p>
                    <p>
                        <b>Title: </b> <br/> <textarea rows="2" cols="50" id="eventTitle" name="eventTitle" required></textarea> <br/><br/>
                        <b>Description: </b> <br/> <textarea rows="7" cols="50" id="eventDescription" name="eventDescription"></textarea><br/><br/>
                        <b>Time: </b>
                        <select id="hours" name="hours">
    <?php
    for ($i = 00; $i <= 23; $i++) {
        ?>
                                <option id="<?php echo $i ?>"><?php echo $i ?></option>
        <?php
    }
    ?>
                        </select>
                        :
                        <select id="minutes" name="minutes">
    <?php
    for ($i = 00; $i <= 59; $i++) {
        ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php
    }
    ?>
                        </select>
                        <br/><br/>
                        <b>Type: </b>
                        <select type="text" id="eventType" name="eventType">
                            <option value="Private">Private</option>
                            <option value="Public">Public</option>
                        </select>
                    </p>
                    <input type="hidden" id="eventDate" value=""/>
                    <input type="button" id="addEventBtn" value="Add"/>
                    <input type="button" id="cancelEventBtn1" value="Cancel"/>
                </div>

                <div id="event_edit_no" class="none">
                    Please select an event to update!
                </div>

                <div id="event_details" class="none">
                    <p>Event Details: </span></p>

                    <b>Title:</b> <div id="detailseventTitle"></div> <br/>
                    <b>Description:</b> <div id="detailseventDescription"></div> <br/>
                    <b>Date: </b> <div id="detailseventDate"></div> <br/>
                    <b>Time: </b> <div id="detailseventTime"></div> <br/>
                    <b>Type: </b><div id="detailseventType"></div> <br/>


                    <input type="button" id="cancelEventBtn2" value="Close"/>
                </div>

                <div id="event_edit" class="none">
                    <p>Edit Event: </span></p>
                    <p>
                        <input type="hidden" id="editedeventID" value="<?php echo $_SESSION["sevID"] ?>"/>
                        <b>Title: </b> <br/> <textarea rows="2" cols="50" id="editedeventTitle" name="eventTitle"><?php echo $_SESSION["stitle"] ?></textarea> <br/><br/>
                        <b>Description: </b> <br/> <textarea rows="7" cols="50" id="editedeventDescription" name="eventDescription"> <?php echo $_SESSION["sdescr"] ?></textarea><br/><br/>
                        <b>Date: </b> <input type="text" id="editedeventDate" value="<?php echo $_SESSION["sdate"] ?>"/>
                        <b>Time: </b>
                        <select id="editedhours" name="hours">
    <?php
    for ($i = 00; $i <= 23; $i++) {
        ?>
                                <option id="<?php echo $i ?>" <?php if ($i == $_SESSION["shr"]) {
            echo "selected";
        } ?>><?php echo $i ?></option>
        <?php
    }
    ?>
                        </select>
                        :
                        <select id="editedminutes" name="minutes">
    <?php
    for ($i = 00; $i <= 59; $i++) {
        ?>
                                <option value="<?php echo $i ?>" <?php if ($i == $_SESSION["smin"]) {
            echo "selected";
        } ?>><?php echo $i ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br/><br/>
                        <b>Type: </b>
                        <select type="text" id="editedeventType" name="eventType">
                            <option value="Private" <?php if ($_SESSION["stype"] == "Private") {
                            echo "selected";
                        } ?>>Private</option>
                            <option value="Public" <?php if ($_SESSION["stype"] == "Public") {
                            echo "selected";
                        } ?>>Public</option>
                        </select>
                    </p>

                    <input type="button" id="saveEventBtn" value="Submit Changes"/>
                    <input type="button" id="cancelEventBtn3" value="Cancel"/>
                </div>

                <div id="calender_section_top">
                    <ul>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                        <li>Sun</li>
                    </ul>
                </div>
                <div id="calender_section_bot">
                    <ul>
    <?php
    $dayCount = 1;

    for ($cb = '1'; $cb <= $boxDisplay; $cb++) {
        if (($cb >= $currentMonthFirstDay || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay - 1)) {
            //Current date
            $currentDateDisp = $dayCount . '-' . $dateMonth . '-' . $dateYear;
            $currentDate = $dateYear . '-' . $dateMonth . '-' . $dayCount;
            $eventNum = 0;
            //Include db configuration file
            include 'dbConfig.php';
            //Get number of events based on the current date
            $result = $db->query("SELECT eventTitle FROM calendar WHERE eventDateStart = '" . $currentDate . "'");
            $eventNum = $result->num_rows;
            //Define date cell color
            if (strtotime($currentDate) == strtotime(date("d-m-Y"))) {
                echo '<li date="' . $currentDate . '" class="grey date_cell">';
            } elseif ($eventNum > 0) {
                echo '<li date="' . $currentDate . '" class="light_sky date_cell">';
            } else {
                echo '<li date="' . $currentDate . '" class="date_cell">';
            }



            //Date cell
            echo '<span>';
            echo $dayCount;
            echo '</span>';

            //Hover event popup
            echo '<div id="date_popup_' . $currentDate . '" class="date_popup_wrap none2">';
            echo '<div class="date_window">';
            echo '<div class="popup_event">Events (' . $eventNum . ')</div>';
            echo ($eventNum > 0) ? '<a href="javascript:;" class="popup" onclick="getEvents(\'' . $currentDate . '\',\'' . $currentDateDisp . '\');">view events</a><br/>' : '';
            //For Add Event
            echo '<a class="popup" href="javascript:;" onclick="addEvent(\'' . $currentDate . '\',\'' . $currentDateDisp . '\');">add event</a>';
            echo '</div></div>';

            echo '</li>';
            $dayCount++;
            ?>
                            <?php } else {
                                ?>
                                <li><span>&nbsp;</span></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <br/><br/>

        <div class="event_list_title">

            <a href="#" id="show_all" >Show All</a>
            <h4>Event List For <span id="theDate"></span><span id="theDate2"></span></h4>

            <div id="event_list" class="event_list"> <?php echo getAllEvents($dateMonth); ?> </div>

        </div>


    </div>

    <script type="text/javascript">
        function getCalendar(target_div, year, month) {
            $.ajax({
                type: 'POST',
                url: 'functions.php',
                data: 'func=getCalendar&year=' + year + '&month=' + month,
                success: function (html) {
                    $('#' + target_div).html(html);
                }
            });
        }

        //SHOW CLICKED EVENT DETAILS
        $(document).on('click', 'a', function () {
            var idofclicked = (this.id);


            if ((idofclicked) != "" && (idofclicked) != "show_all") {
                $('#event_details').slideDown('slow');
                $('#event_add').slideUp('slow');
                $('#event_edit_no').slideUp('slow');
                $('#event_edit').slideUp('slow');
            }
            if ((idofclicked) == "show_all") {
                $('#event_details').slideUp('slow');
                $('#event_add').slideUp('slow');
                $('#event_edit_no').slideUp('slow');
                $('#event_edit').slideUp('slow');
            }

            $.ajax({
                type: 'POST',
                url: 'functions.php',
                data: 'func=showDetails&evID=' + idofclicked,
                success: function (msg) {
                    var response = msg.split(';', 5);
                    var var1 = response[0];
                    var var2 = response[1];
                    var var3 = response[2];
                    var var4 = response[3];
                    var var5 = response[4];
                    document.getElementById("detailseventDate").innerHTML = var1;
                    document.getElementById("detailseventTitle").innerHTML = var2;
                    document.getElementById("detailseventDescription").innerHTML = var3;
                    document.getElementById("detailseventTime").innerHTML = var4;
                    document.getElementById("detailseventType").innerHTML = var5;
                }
            });
        });

        //SHOW ALL EVENTS FUNCTION
        $(document).ready(function () {
            $('#show_all').on('click', function () {
                var month = $('#month_dropdown :selected').val();
                if (month < 10) {
                    var month2 = '0' + month;
                }
                $.ajax({
                    type: 'POST',
                    url: 'functions.php',
                    data: 'func=getAllEvents&month=' + month2,
                    success: function (html) {
                        $('#event_list').html(html);
                        $('#event_add').slideUp('slow');
                        $('#event_list').slideDown('slow');

                    }
                });
            });
        });

        //GET EVENTS OF CURRENT DATE
        function getEvents(date, date2) {
            document.getElementById("theDate").innerHTML = date2;
            document.getElementById("theDate2").innerHTML = "";
            $.ajax({
                type: 'POST',
                url: 'functions.php',
                data: 'func=getEvents&date=' + date,
                success: function (html) {
                    $('#event_list').html(html);
                    $('#event_add').slideUp('slow');
                    $('#event_list').slideDown('slow');

                }
            });
        }


        //GET ALL THE EVENTS OF THE MONTH
        function getAllEvents(month) {

            $.ajax({
                type: 'POST',
                url: 'functions.php',
                data: 'func=getAllEvents&month=' + month,
                success: function (html) {
                    $('#event_list').html(html);
                    $('#event_add').slideUp('slow');
                    $('#event_list').slideDown('slow');


                }
            });
        }

        //DELETE AN EVENT
        $(document).ready(function () {
            $('#btnDeleteEvent').on('click', function () {
                $('#event_add').slideUp('slow');
                $('#event_edit_no').slideUp('slow');
                $('#event_details').slideUp('slow');
                $('#event_edit').slideUp('slow');
                var evID = $("input[name='ev']:checked").val();
                $.ajax({
                    type: 'POST',
                    url: 'functions.php',
                    data: 'func=deleteEvent&evID=' + evID,
                    success: function (msg) {
                        alert(msg);
                        window.location.reload();

                    }
                });
            });
        });

        //EDIT AN EVENT
        function updateEvent() {
            var evID = $("input[name='ev']:checked").val();

            if ((evID === undefined)) {

                $('#event_edit_no').slideDown('slow');

                $('#event_add').slideUp('slow');
                $('#event_details').slideUp('slow');
                $('#event_edit').slideUp('slow');
            } else {
                $('#event_edit_no').slideUp('slow');
                $('#event_edit').slideDown('slow');

                $('#event_add').slideUp('slow');
                $('#event_details').slideUp('slow');
            }
        }

        $('#cancelEventBtn1').on('click', function () {
            $('#event_edit').slideUp('slow');
            $('#event_add').slideUp('slow');
            $('#event_edit_no').slideUp('slow');
            $('#event_details').slideUp('slow');
        });
        $('#cancelEventBtn2').on('click', function () {
            $('#event_edit').slideUp('slow');
            $('#event_add').slideUp('slow');
            $('#event_edit_no').slideUp('slow');
            $('#event_details').slideUp('slow');
        });
        $('#cancelEventBtn3').on('click', function () {
            $('#event_edit').slideUp('slow');
            $('#event_add').slideUp('slow');
            $('#event_edit_no').slideUp('slow');
            $('#event_details').slideUp('slow');
        });


        //EDIT AN EVENT
        $(document).ready(function () {
            $('#btnUpdateEvent').on('click', function () {
                var evID = $("input[name='ev']:checked").val();
                $.ajax({
                    type: 'POST',
                    url: 'functions.php',
                    data: 'func=updateTheEvent&evID=' + evID,
                    success: function (msg) {
                        var response = (msg).split(';', 5);
                        var var2 = response[1];
                        var var3 = response[2];

                        $('#editedeventTitle').html(var2);
                        $('#editedeventDescription').html(var3);
                    }
                });
            });
        });

        //ADD AN EVENT
        function addEvent(date, date2) {
            $('#eventDate').val(date);
            $('#eventDateView').html(date2);
            $('#event_add').slideDown('slow');
            $('#event_edit').slideUp('slow');
            $('#event_edit_no').slideUp('slow');
            $('#event_details').slideUp('slow');


        }
        //ADD AN EVENT
        $(document).ready(function () {
            $('#addEventBtn').on('click', function () {
                var date = $('#eventDate').val();
                var title = $('#eventTitle').val();
                var descr = $('#eventDescription').val();
                var hours = $('#hours').val();
                var minutes = $('#minutes').val();
                var type = $('#eventType').val();
                $.ajax({
                    type: 'POST',
                    url: 'functions.php',
                    data: 'func=addEvent&date=' + date + '&title=' + title + '&descr=' + descr + '&hours=' + hours + '&minutes=' + minutes + '&type=' + type,
                    success: function (msg) {
                        if (msg == 'ok') {
                            var dateSplit = date.split("-");
                            $('#eventTitle').val('');
                            alert('Event Created Successfully.');
                            getCalendar('calendar_div', dateSplit[0], dateSplit[1]);
                        } else if (msg == 'err') {
                            alert('Some problem occurred, please try again.');
                        } else {
                            alert(msg);
                        }
                        $('#event_edit').slideUp('slow');
                        $('#event_add').slideUp('slow');
                        $('#event_edit_no').slideUp('slow');
                        $('#event_details').slideUp('slow');
                    }
                });
            });
        });

        //UPDATE THE EVENT TO DATABASE
        function addEvent(date, date2) {
            $('#eventDate').val(date);
            $('#eventDateView').html(date2);
            $('#event_add').slideDown('slow');

            $('#event_edit').slideUp('slow');
            $('#event_edit_no').slideUp('slow');
            $('#event_details').slideUp('slow');
        }
        //UPDATE THE EVENT TO DATABASE
        $(document).ready(function () {
            $('#saveEventBtn').on('click', function () {
                var nevID = $('#editedeventID').val();
                var tempdate = $('#editedeventDate').val();
                var ndate = tempdate.split("-").reverse().join("-");
                var ntitle = $('#editedeventTitle').val();
                var ndescr = $('#editedeventDescription').val();
                var nhours = $('#editedhours').val();
                var nminutes = $('#editedminutes').val();
                var ntype = $('#eventType').val();
                $.ajax({
                    type: 'POST',
                    url: 'functions.php',
                    data: 'func=updateTheEventPt2&nevID=' + nevID + '&ndate=' + ndate + '&ntitle=' + ntitle + '&ndescr=' + ndescr + '&nhours=' + nhours + '&nminutes=' + nminutes + '&ntype=' + ntype,
                    success: function (msg) {
                        alert(msg);
                        $('#event_edit').slideUp('slow');
                        $('#event_edit_no').slideUp('slow');
                        $('#event_details').slideUp('slow');
                        window.location.reload();

                    }
                });
            });
        });

        //POP UP THE ADD AND VIEW EVENT ICON
        //GET THE MONTH IF CHANGED
        //GET THE YEAR IF CHANGED
        $(document).ready(function () {
            $('.date_cell').mouseenter(function () {
                date = $(this).attr('date');
                $(".date_popup_wrap").fadeOut(1);
                $("#date_popup_" + date).fadeIn();
            });
            $('.date_cell').mouseleave(function () {
                $(".date_popup_wrap").fadeOut(1);
            });
            $('.month_dropdown').on('change', function () {
                getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
            });
            $('.year_dropdown').on('change', function () {
                getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
            });

        });
    </script>
    <?php
}
?>