<?php
class MaxGoogleAnalytics extends DataObjectDecorator{
	public function showAnalyticsData($start = "2005-01-01") {
		try {
			// create an instance of the GoogleAnalytics class using your own Google {email} and {password}
			$ga = new MaxGoogleAnalyticsAPI(GoogleConfig::get_google_config("email"),GoogleConfig::get_google_config("password"));
		
			// set the Google Analytics profile you want to access - format is 'ga:123456';
			$ga->setProfile('ga:'.GoogleConfig::get_google_config("profile"));
		
			$today = date("Y-m-d");
			
			if ($start == "now") {$start = $today;}
			// set the date range we want for the report - format is YYYY-MM-DD
			$ga->setDateRange($start,$today);
		
			// get the report for date and country filtered by Australia, showing pageviews and visits
			$report = $ga->getReport(
				array(
					//'dimensions'=>urlencode('ga:date,ga:country'),
					'metrics'=>urlencode('ga:pageviews,ga:uniquePageviews,ga:visits'),
					//'filters'=>urlencode('ga:country=@Australia'),
					//'sort'=>'-ga:pageviews'
					)
				);
		
			//print out the $report array
			//print "<pre>";
			//print_r($report);
			//print "</pre>";
			
			return $report['ga:visits']; 
			
		} catch (Exception $e) { 
			//print 'Error: ' . $e->getMessage(); 
		}
		
	} 
}
// EOF
