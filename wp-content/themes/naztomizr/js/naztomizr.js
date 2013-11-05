/**
  * Some admin scripts
  *
  * @package Naztomizr
  * @since Naztomizr 1.0
  */
  
// Save us from the WP force type
var $j = jQuery;

$j(function(){
/////////////////////////////// begin sitewide functions ////////////////////////////////

/**																						*
  *-------------------------------------------------------------------------------------*
  * 								WAYPOINTS STICKY	  								*
  *	----------------------------------------------------------------------------------- *
  *						http://imakewebthings.com/jquery-waypoints/  					*
  *										 Holy Shit!										*
  *-------------------------------------------------------------------------------------*/
$j('#nav-below').waypoint('sticky', {
	wrapper	: '<div class="nav-below-sticky-wrapper" />',
	offset	: 100 //100px is reletive to header ht
});

/**																						*
  *-------------------------------------------------------------------------------------*
  * 								ISOTOPE FRONT PAGE	  								*
  *	----------------------------------------------------------------------------------- *
  *						http://isotope.metafizzy.co I bow to you. 						*
  *						 And that Mary Lou: http://bit.ly/IveJtX						*
  *-------------------------------------------------------------------------------------*/

// first let's wrap our function to run only on the home page
if($j('body.home').length > 0){
		
	//let's get rid of the links in the secondary menu only for portfolio_category
	$j('.menu-item-object-portfolio_category a').attr('href', '#');
	
	//then let's take the class we entered in the custom menu and turn it into a data-filter
	var strExtract = "data-filter-";
	$j('#menu-portfolio-menu li.menu-item').each(function(i){ //not including the li that're not menu.item
		//taking the first class... is it always the first class?? could be dangerous? 
		thingOne = $j('#menu-portfolio-menu li.menu-item:eq('+i+')').attr("class").split(' ')[0];
		//console.log(i+'= '+thingOne);
		newThingOne = thingOne.replace(strExtract, '');
		$j('#menu-portfolio-menu li.menu-item:eq('+i+')').attr("data-filter", '.'+newThingOne);
		//special case for Isotope ALL filter.
		$j('.data-filter-all').attr("data-filter", "*");
	});
	
	//now let's engage isotope
	
	//centered portfolio	
  $j.Isotope.prototype._getCenteredMasonryColumns = function() {
    this.width = this.element.width();
    
    var parentWidth = this.element.parent().width();
    
                  // i.e. options.masonry && options.masonry.columnWidth
    var colW = this.options.masonry && this.options.masonry.columnWidth ||
                  // or use the size of the first item
                  this.$filteredAtoms.outerWidth(true) ||
                  // if there's no items, use size of container
                  parentWidth;
    
    var cols = Math.floor( parentWidth / colW );
    cols = Math.max( cols, 1 );

    // i.e. this.masonry.cols = ....
    this.masonry.cols = cols;
    // i.e. this.masonry.columnWidth = ...
    this.masonry.columnWidth = colW;
  };
  
  $j.Isotope.prototype._masonryReset = function() {
    // layout-specific props
    this.masonry = {};
    // FIXME shouldn't have to call this again
    this._getCenteredMasonryColumns();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }
  };

  $j.Isotope.prototype._masonryResizeChanged = function() {
    var prevColCount = this.masonry.cols;
    // get updated colCount
    this._getCenteredMasonryColumns();
    return ( this.masonry.cols !== prevColCount );
  };
  
  $j.Isotope.prototype._masonryGetContainerSize = function() {
    var unusedCols = 0,
        i = this.masonry.cols;
    // count unused columns
    while ( --i ) {
      if ( this.masonry.colYs[i] !== 0 ) {
        break;
      }
      unusedCols++;
    }
    
    return {
          height : Math.max.apply( Math, this.masonry.colYs ),
          // fit container to columns that have been used;
          width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
        };
  }; 
  
	//initialize isotope
	$j('#isotope').isotope({
		//first let's get sort data
		getSortData 	: {
			year : function ( $elem ) {
				return parseInt( $elem.find('.portfolio-year').text(), 10 );
			}
		},
		// options
		//itemSelector : '.naztomizr_portfolio',
		layoutMode  	: 'masonry',
		sortBy			: 'year',
		sortAscending	: false
	})
	
	//filter items when filter link is clicked
	$j('#menu-portfolio-menu li').click(function(){
		//var smthngElse = $j(this).attr('data-filter');
		//console.log('clicked '+smthngElse);
		var selector = $j(this).attr('data-filter');
		$j('#isotope').isotope({ filter: selector });
		return false;
	});
	
	
	//Now let's add a little hover direction
	
	$j(function() {
			
				$j('#isotope > article section div a').each( function() { $j(this).hoverdir(); } );

			});
} // end isotope front page if statement




	
////////// end sitewide functions //////////////////
});
