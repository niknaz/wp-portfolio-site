/**
  * Some admin scripts
  *
  * @package Naztomizr
  * @since Naztomizr 1.0
  */
  
// Save us from the WP force type
var $j = jQuery;

$j(function(){
////////// begin sitewide functions /////////////////

//sticky the menu currently not in use
//$j('#sticky-header').waypoint('sticky');

/**																						*
  *-------------------------------------------------------------------------------------*
  * 								ISOTOPE FRONT PAGE	  								*
  *	----------------------------------------------------------------------------------- *
  *						http://isotope.metafizzy.co I bow to you. 						*
  *-------------------------------------------------------------------------------------*/

// first let's wrap our function to run only on the home page
if($j('body.home').length > 0){
		
	//let's get rid of the links in the secondary menu
	//note: deliberately using this class selector to isolate only classes that 
	//      are added from the portfolio_category
	$j('.menu-item-object-portfolio_category a').attr('href', '#');
	
	//then let's take the class we entered in the custom menu and turn it into a data-filter
	var strExtract = "data-filter-";
	$j('#menu-portfolio-menu li.menu-item').each(function(i){ //not including the li that's not a menu.item
		//taking the first class... could be dangerous? 
		thingOne = $j('#menu-portfolio-menu li.menu-item:eq('+i+')').attr("class").split(' ')[0];
		//console.log(i+'= '+thingOne);
		newThingOne = thingOne.replace(strExtract, '');
		$j('#menu-portfolio-menu li.menu-item:eq('+i+')').attr("data-filter", '.'+newThingOne);
		//special case for Isotope ALL filter.
		$j('.data-filter-all').attr("data-filter", "*");
	});
	
	//now let's engage isotope
	//initialize isotope
	$j('#isotope').isotope({
		// options
		//itemSelector : '.naztomizr_portfolio',
		layoutMode   : 'masonry'
	})
	
	//filter items when filter link is clicked
	$j('#menu-portfolio-menu li').click(function(){
		//var smthngElse = $j(this).attr('data-filter');
		//console.log('clicked '+smthngElse);
		var selector = $j(this).attr('data-filter');
		$j('#isotope').isotope({ filter: selector });
		return false;
	});
	
} // end isotope if statement


	
////////// end sitewide functions //////////////////
});
