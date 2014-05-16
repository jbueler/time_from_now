Time From Now
===

Time from now will let you add a string modifier to the current time and will return a datetime string in it's place. This would be useful for performing channel entries loops with the `start_on` and `stop_before` parameters.

This will let you use dynamic dates in [situations where you may have had to enable PHP before.](http://ellislab.com/expressionengine/user-guide/add-ons/channel/channel_entries.html#start-on)


	{exp:channel:entries
		channel="value"
		dynamic="no"
		start_on="{exp:time_from_now modifier="-7 days"}"
		stop_before="{exp:time_from_now modifier="+7 days"}"
		show_future_entries="yes"
		parse="inward"}
		
		{title}
		
		{if no_results}{redirect="404"}{/if}
	{/exp:channel:entries}

### Parameters
#### modifier
Takes a string description of the desired time period you want the tag to return. Examples:

1 hour ago

	{exp:time_from_now modifier="-1 hour"}

15 minutes ago

	{exp:time_from_now modifier="-15 minutes"}

2 days from now

	{exp:time_from_now modifier="+2 days"}

More information on modifier strings can be found in the PHP docs for [strtotime](http://us2.php.net/strtotime) any string that `strtotime` can take you can use as the modifier.

#### format
optional format string to change the datetime format returned. Default format is `%Y-%m-%d %H:%i`. Examples:

	{exp:time_from_now modifier="-8 years" format="%D, %F %d, %Y - %g:%i:%s"} 
	{!-- returns a date formated like this "Tue, May 16, 2006 - 10:23:45" --}

Date format strings should use the standard Date Variable Formating from the Expression Engine docs. You can find more examples in their docs [http://ellislab.com/expressionengine/user-guide/templates/date_variable_formatting.html](http://ellislab.com/expressionengine/user-guide/templates/date_variable_formatting.html)
