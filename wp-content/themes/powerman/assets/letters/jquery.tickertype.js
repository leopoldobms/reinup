var $ = jQuery.noConflict();


    
    
var tickerIterations = 0;
var currentTickerIteration = 0;
$(document).ready(function () {
	
	    if ($('.ticker-area').length > 0) {
  // load the ticker
	//createTicker();
	
		}

}); 

function createTicker( parentClass ){
	if (typeof $('.ticker-area').attr('alt') != 'undefined'){
		tickerIterations = $('.ticker-area').attr('alt');
	}
	// put all list elements within .ticker-area into array
	var tickerLIs = $("." + parentClass + " .ticker-area ul").children();
	
	tickerItems = new Array();
	
	if (tickerLIs.length > 0){
		tickerItems[parentClass] = new Array();
		tickerLIs.each(function(el) {
			var _elLength = jQuery(this).html().replace(' ','').length;
			if (_elLength > 0){				
				tickerItems[parentClass].push( jQuery(this).html() );
			}
		});
		i = 0;
		console.log(tickerItems[parentClass].length);
		if (tickerItems[parentClass].length > 0) 
			rotateTicker( parentClass );
	}
}

function rotateTicker( parentClass ){
	console.log(parentClass);
	console.log(tickerItems[parentClass]);
	if( i == tickerItems[parentClass].length ){
	  i = 0;
		if( tickerIterations > 0 ){
			console.log( "tickerIterations: " +tickerIterations );
			currentTickerIteration++;
			console.log( "currentTickerIteration: " + currentTickerIteration );
			if( currentTickerIteration >= tickerIterations ){
				console.log( "Done iterating" );
				return false;
			}
		}
	}
	
  tickerText = tickerItems[parentClass][i];
 
	c = 0;
	typetext( parentClass );
	setTimeout( "rotateTicker()", 5000 );
	i++;
  
}

var isInTag = false;
function typetext( parentClass ) {	

	var thisChar = tickerText.substr(c, 1);
	if( thisChar == '<' ){ isInTag = true; }
	if( thisChar == '>' ){ isInTag = false; }
	$('.' + parentClass + '.ticker-area').html("&nbsp;" + tickerText.substr(0, c++));
	if(c < tickerText.length+1)
		if( isInTag ){
			typetext();
		}else{
			setTimeout("typetext()", 28);
		}
	else {
		c = 1;
		tickerText = "";
	}	
}
