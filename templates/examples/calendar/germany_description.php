<h2 class="first">Setting up the Calendar</h2>

<p>There are several properties that are used to change localization settings:</p>

<ul class="properties">
	<li><strong>LOCALE_MONTHS</strong> - The setting that determines which length of month labels should be used. Possible values are "short" and "long".</li>
	<li><strong>LOCALE_WEEKDAYS</strong> - The setting that determines which length of weekday labels should be used. Possible values are "1char", "short", "medium", and "long".</li>

	<li><strong>MONTHS_SHORT  </strong> - The short month labels for the current locale. Default: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]</li>
	<li><strong>MONTHS_LONG</strong> - The long month labels for the current locale. Default: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]</li>

	<li><strong>WEEKDAYS_1CHAR</strong> - The 1-character weekday labels for the current locale. Default: ["S", "M", "T", "W", "T", "F", "S"]</li>
	<li><strong>WEEKDAYS_SHORT</strong> - The short weekday labels for the current locale. Default: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]</li>
	<li><strong>WEEKDAYS_MEDIUM</strong> - The medium weekday labels for the current locale. Default: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]</li>
	<li><strong>WEEKDAYS_LONG</strong> - The long weekday labels for the current locale. Default: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]</li>
</ul>

<p>In addition, the Calendar provides special configuration properties for determining how incoming dates and date ranges should be formatted. By default, the date format for input to the Calendar is mm/dd/yyyy. Ranges are separated by a dash ("-") and lists of dates are delimited using a comma (","). Using these properties, the initial formatting of date can be easily modified:</p>

<ul class="properties">
	<li><strong>DATE_DELIMITER</strong> - The value used to delimit individual dates in a date string passed to various Calendar functions. Default: ","</li>
	<li><strong>DATE_FIELD_DELIMITER</strong> - The value used to delimit date fields in a date string passed to various Calendar functions. Default: "/"</li>
	<li><strong>DATE_RANGE_DELIMITER</strong> - The value used to delimit date ranges in a date string passed to various Calendar functions. Default: "-"</li>

	<li><strong>MDY_MONTH_POSITION</strong> - The position of the month in a month/day/year date string. Default: 1</li>
	<li><strong>MDY_DAY_POSITION</strong> - The position of the day in a month/day/year date string. Default: 2</li>
	<li><strong>MDY_YEAR_POSITION</strong> - The position of the year in a month/day/year date string. Default: 3</li>


	<li><strong>MD_MONTH_POSITION</strong> - The position of the month in a month/day date string. Default: 1</li>
	<li><strong>MD_DAY_POSITION</strong> - The position of the day in a month/day date string. Default: 2</li>

	<li><strong>MY_MONTH_POSITION</strong> - The position of the month in a month/year date string. Default: 1</li>
	<li><strong>MY_YEAR_POSITION</strong> - The position of the year in a month/year date string. Default: 2</li>
</ul>

<p>In our tutorial, we will create a German Calendar that is set up both to accept dates in the standard German format (dd.mm.yyyy) and present the labels in German. Note that all of our date label values will contain special characters in Unicode notation. Also, we will present the weekday labels in the "short" format, which will amount to 2 characters in this example.</p>

<textarea name="code" class="JScript" cols="60" rows="1">
		YAHOO.example.calendar.cal1 = new YAHOO.widget.Calendar("cal1","cal1Container",
																	{ LOCALE_WEEKDAYS:"short",
																	  START_WEEKDAY: 1,
																	  MULTI_SELECT: true
																	} );

		// Correct formats for Germany: dd.mm.yyyy, dd.mm, mm.yyyy

		YAHOO.example.calendar.cal1.cfg.setProperty("DATE_FIELD_DELIMITER", ".");

		YAHOO.example.calendar.cal1.cfg.setProperty("MDY_DAY_POSITION", 1);
		YAHOO.example.calendar.cal1.cfg.setProperty("MDY_MONTH_POSITION", 2);
		YAHOO.example.calendar.cal1.cfg.setProperty("MDY_YEAR_POSITION", 3);

		YAHOO.example.calendar.cal1.cfg.setProperty("MD_DAY_POSITION", 1);
		YAHOO.example.calendar.cal1.cfg.setProperty("MD_MONTH_POSITION", 2);

		// Date labels for German locale

		YAHOO.example.calendar.cal1.cfg.setProperty("MONTHS_SHORT",   ["Jan", "Feb", "M\u00E4r", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"]);
		YAHOO.example.calendar.cal1.cfg.setProperty("MONTHS_LONG",    ["Januar", "Februar", "M\u00E4rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"]);
		YAHOO.example.calendar.cal1.cfg.setProperty("WEEKDAYS_1CHAR", ["S", "M", "D", "M", "D", "F", "S"]);
		YAHOO.example.calendar.cal1.cfg.setProperty("WEEKDAYS_SHORT", ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"]);
		YAHOO.example.calendar.cal1.cfg.setProperty("WEEKDAYS_MEDIUM",["Son", "Mon", "Die", "Mit", "Don", "Fre", "Sam"]);
		YAHOO.example.calendar.cal1.cfg.setProperty("WEEKDAYS_LONG",  ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"]);
</textarea>

<p>Next, we can set some selected dates and the current pagedate using our newly configured date format, and render the Calendar:</p>

<textarea name="code" class="JScript" cols="60" rows="1">
		YAHOO.example.calendar.cal1.select("1.10.2006-8.10.2006");
		YAHOO.example.calendar.cal1.cfg.setProperty("PAGEDATE", "10.2006");
		YAHOO.example.calendar.cal1.render();
</textarea>