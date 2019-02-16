<?php
/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
	switch($_POST['func']){
		case 'getCalendar':
			getCalendar($_POST['year'],$_POST['month']);
			break;
		case 'getEvents':
			getEvents($_POST['date']);
			break;
		//For Add Event
		case 'addEvent':
			addEvent($_POST['date'],$_POST['title']);
			break;
		default:
			break;
	}
}

/*
 * Get calendar full HTML
 */
function getCalendar($year = '',$month = '')
{
	$dateYear = ($year != '')?$year:date("Y");
	$dateMonth = ($month != '')?$month:date("m");
	$date = $dateYear.'-'.$dateMonth.'-01';
	$currentMonthFirstDay = date("N",strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
    
    
    
    
?>
<div class="event_list_title">
    
    <a href="#">Show All</a>
    <h4>Event List For <span id="theDate"></span></h4>
    
    <div id="event_list" class="event_list"> <?php echo getAllEvents($dateMonth); ?> </div>
    
    
        
</div>
        <!--For Add Event-->
        

	<div id="calender_section">
		<h2>
        	<a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>
            <select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
			<select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
            <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>
        </h2>
		
        <div id="event_add" class="none">
        	<p>Add Event on <span id="eventDateView"></span></p>
            <p>
                <b>Title: </b> <br/> <textarea rows="2" cols="50" id="eventTitle" ></textarea> <br/><br/>
                <b>Description: </b> <br/> <textarea rows="7" cols="50" id="eventDescription" value=""></textarea><br/><br/>
                <b>Time: </b>
                <select id="hours">
                       <?php 
                       for($i=00;$i<=23;$i++)
                       {
                           ?>
                           <option id="<?php echo $i ?>"><?php echo $i ?></option>
                           <?php
                       }
                       ?>
                    </select>
                :
                <select id="minutes">
                       <?php 
                       for($i=00;$i<=59;$i++)
                       {
                           ?>
                           <option value="<?php echo $i ?>"><?php echo $i ?></option>
                           <?php
                       }
                       ?>
                    </select>
                <br/><br/>
                <b>Type: </b>
                <select type="text" id="eventType">
                    <option value="1">Private</option>
                    <option value="2">Public</option>
                </select>
            </p>
            <input type="hidden" id="eventDate" value=""/>
            <input type="button" id="addEventBtn" value="Add"/>
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
                
				for($cb='1';$cb<=$boxDisplay;$cb++){
					if(($cb >= $currentMonthFirstDay || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay-1)){
						//Current date
						$currentDateDisp = $dayCount.'-'.$dateMonth.'-'.$dateYear;
                        $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
						$eventNum = 0;
						//Include db configuration file
						include 'dbConfig.php';
						//Get number of events based on the current date
						$result = $db->query("SELECT title FROM events WHERE date = '".$currentDate."' AND status = 1");
						$eventNum = $result->num_rows;
						//Define date cell color
						if(strtotime($currentDate) == strtotime(date("d-m-Y"))){
							echo '<li date="'.$currentDate.'" class="grey date_cell">';
						}elseif($eventNum > 0){
							echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
						}else{
							echo '<li date="'.$currentDate.'" class="date_cell">';
						}
                        
                        
                        
						//Date cell
						echo '<span>';
						echo $dayCount;
						echo '</span>';
						
						//Hover event popup
						echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none2">';
						echo '<div class="date_window">';
						echo '<div class="popup_event">Events ('.$eventNum.')</div>';
						echo ($eventNum > 0)?'<a href="javascript:;" onclick="getEvents(\''.$currentDate.'\',\''.$currentDateDisp.'\');">view events</a><br/>':'';
						//For Add Event
						echo '<a href="javascript:;" onclick="addEvent(\''.$currentDate.'\',\''.$currentDateDisp.'\');">add event</a>';
						echo '</div></div>';
						
						echo '</li>';
						$dayCount++;
			?>
			<?php }else{ 
                        ?>
                        <li><span>&nbsp;</span></li>
                        <?php
                        } 
                } ?>
			</ul>
		</div>
	</div>

	<script type="text/javascript">
		function getCalendar(target_div,year,month){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getCalendar&year='+year+'&month='+month,
				success:function(html){
					$('#'+target_div).html(html);
				}
			});
		}
		
		function getEvents(date,date2){
            document.getElementById("theDate").innerHTML = date2;
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getEvents&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_add').slideUp('slow');
					$('#event_list').slideDown('slow');
				}
			});
		}
        
        function getAllEvents(month){
            document.getElementById("theDate").innerHTML = month;
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getAllEvents&month='+month,
				success:function(html){
					$('#event_list').html(html);
					$('#event_add').slideUp('slow');
					$('#event_list').slideDown('slow');
				}
			});
		}
        
		//For Add Event
		function addEvent(date,date2){
			$('#eventDate').val(date);
			$('#eventDateView').html(date2);
			$('#event_add').slideDown('slow');
		}
		//For Add Event
		$(document).ready(function(){
			$('#addEventBtn').on('click',function(){
				var date = $('#eventDate').val();
				var title = $('#eventTitle').val();
                var descr = $('#eventDescription').val();
                var hours = $('#hours').val();
                var minutes = $('#minutes').val();
                var type = $('#eventType').val();
				$.ajax({
					type:'POST',
					url:'functions.php',
					data:'func=addEvent&date='+date+'&title='+title+'&descr='+descr+'&hours='+hours+'&minutes='+minutes+'&type='+type,
					success:function(msg){
						if(msg == 'ok'){
							var dateSplit = date.split("-");
							$('#eventTitle').val('');
							alert('Event Created Successfully.');
							getCalendar('calendar_div',dateSplit[0],dateSplit[1]);
						}else if(msg == 'err'){
                            alert('Some problem occurred, please try again.');
						}
                        else{
                            alert(msg);
                        }
					}
				});
			});
		});
		
		$(document).ready(function(){
			$('.date_cell').mouseenter(function(){
				date = $(this).attr('date');
				$(".date_popup_wrap").fadeOut();
				$("#date_popup_"+date).fadeIn();	
			});
			$('.date_cell').mouseleave(function(){
				$(".date_popup_wrap").fadeOut();		
			});
			$('.month_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			//$(document).click(function(){
			//	$('#event_list').slideUp('slow');
			//});
		});
	</script>
<?php
}

/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 01)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*
 * Get years options list.
 */
function getYearList($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}

/*
 * Get events by date
 */


function getEvents($date = ''){
	//Include db configuration file
	include 'dbConfig.php';
	$eventListHTML = '';
	$date = $date?$date:date("d-m-Y");
	//Get events based on the current date
	$result = $db->query("SELECT id,title FROM events WHERE date = '".$date."' AND status = 1");
	if($result->num_rows > 0){
		$eventListHTML = '<h2>Events '.date("l, d M Y",strtotime($date)).'</h2>';
        $resultEV = mysqli_query($db, "SELECT id,title,date FROM events WHERE date = '".$date."' AND status = 1");
        
        ?>
        
            <form action="editEvent2.php" method="post">
                
                <?php
                while ($row = mysqli_fetch_array($resultEV))
                {
                    ?>
                    <input type="radio" name="ev" value="<?php echo $row["id"] ?>"/>
                    <a href="#"><?php echo $row["title"] ?>
                    <?php echo $row["date"] ?></a>
                    <br/>
                
                <?php
                }
                ?>
            
        <input type="submit" name="action" value="Update Event"/>
        <input type="submit" name="action" value="Delete Event"/>
        </form>
        <?php
	}
	
    
}

function getAllEvents($month){
        include 'dbConfig.php';
        $result = $db->query("SELECT id,title,date FROM events where date like '%-$month-%'");
        ?>
            <form action="editEvent2.php" method="post">
                <?php
        while ($row = mysqli_fetch_array($result))
                {
                    ?>
                    <input type="radio" name="ev" value="<?php echo $row["id"] ?>"/>
                    <a href="#"><?php echo $row["title"] ?>
                    <?php $newDate = $row["date"] ?>
                    <?php $newDateDisp = date("d-m-Y", strtotime($newDate)); ?>
                    <?php echo $newDateDisp ?></a>
                    <br/>
                <?php
                }
                ?>
                    <input type="submit" name="action" value="Update Event"/>
                    <input type="submit" name="action" value="Delete Event"/>
                    </form>
                    <?php
    }

/*
 * Add event to date
 */
function addEvent($date,$title){
	//Include db configuration file
	include 'dbConfig.php';
	$currentDate = date("Y-m-d H:i:s");
	//Insert the event data into database
	$insert = $db->query("INSERT INTO events (title,date,created,modified) VALUES ('".$title."','".$date."','".$currentDate."','".$currentDate."')");
	if($insert){
		echo 'ok';
	}else{
		echo 'err';
	}
}
?>