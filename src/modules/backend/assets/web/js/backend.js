$(document).ready(function () {
    console.log('ready');

    $(document).on('click', 'a.ajax-link', function (event) {
		event.preventDefault();
		var that = this;
		if($(that).data('confirm') && !confirm($(that).data('confirm'))) {
			return false;
		}
		jQuery.ajax({'cache': false, 'type': 'POST', 'dataType': 'json', 'data':$(that).data('params'), 'success': function (response) {
			parseResponse(response);
		}, 'error': function (response) {
			alert(response.responseText);
		}, 'beforeSend': function() {

		}, 'complete': function() {

		}, 'url': that.href});
		return false;
	});

	$(document).on('change', '.do-change-value', function(event) {
		event.preventDefault();
		var that = this;

		var url = $(that).data('url');
		var id = $(that).data('id');
		var attrname = $(that).data('attrname');
		jQuery.ajax({'cache': false, 'type': 'POST', 'dataType': 'json', 'data':{'value': 1 * that.checked, 'id':id, 'attrname':attrname}, 'success': function (response) {
		}, 'error': function (response) {			
		}, 'beforeSend': function() {
		}, 'complete': function() {
			//$(that).attr('disabled', false);
		}, 'url': url});
	});	

	$('select.ajax-select').change(function() {
		var that = this;
		if($(that).data('confirm') && !confirm($(that).data('confirm'))) {
			return false;
		}
		jQuery.ajax({'cache': false, 'type': 'POST', 'dataType': 'json', 'data':{value: $(that).val(), '_csrf': $(that).attr('csrf')}, 'success': function (response) {
			parseResponse(response);
		}, 'error': function (response) {
			alert(response.responseText);
		}, 'beforeSend': function() {

		}, 'complete': function() {

		}, 'url': $(that).data('url')});
		return false;	
	});

});

function parseResponse(response)
{
	if (response.error) {
		showError(response.error);
	}
	if (response.refresh) {
		window.location.reload(true);
	}
	if (response.redirect) {
		window.location.href = response.redirect;
	}
	if(response.replaces instanceof Array)
	{
		for(var i = 0, ilen = response.replaces.length; i < ilen; i++)
		{
			$(response.replaces[i].what).replaceWith(response.replaces[i].data);
		}
	}
	if(response.append instanceof Array)
	{
		for(i = 0, ilen = response.append.length; i < ilen; i++)
		{
			$(response.append[i].what).append(response.append[i].data);
		}
	}
	if(response.js)
	{
		$("body").append(response.js);
	}	
}
/*--------jQuery debounce----------*/
(function(window,undefined){
  '$:nomunge'; 
  var $ = window.jQuery || window.Cowboy || ( window.Cowboy = {} ),
    jq_throttle;
  
  $.throttle = jq_throttle = function( delay, no_trailing, callback, debounce_mode ) {
    var timeout_id,
      last_exec = 0;
    if ( typeof no_trailing !== 'boolean' ) {
      debounce_mode = callback;
      callback = no_trailing;
      no_trailing = undefined;
    }
    // is executed.
    function wrapper() {
      var that = this,
        elapsed = +new Date() - last_exec,
        args = arguments;
      function exec() {
        last_exec = +new Date();
        callback.apply( that, args );
      };
      
      function clear() {
        timeout_id = undefined;
      };
      
      if ( debounce_mode && !timeout_id ) {
        exec();
      }
      timeout_id && clearTimeout( timeout_id );
      
      if ( debounce_mode === undefined && elapsed > delay ) {
        exec();
        
      } else if ( no_trailing !== true ) {
        timeout_id = setTimeout( debounce_mode ? clear : exec, debounce_mode === undefined ? delay - elapsed : delay );
      }
    };
    if ( $.guid ) {
      wrapper.guid = callback.guid = callback.guid || $.guid++;
    }
    
    // Return the wrapper function.
    return wrapper;
  };
  
  
  $.debounce = function( delay, at_begin, callback ) {
    return callback === undefined
      ? jq_throttle( delay, at_begin, false )
      : jq_throttle( delay, callback, at_begin !== false );
  };
  
})(this);

/*----------------END jQuery debounce----------*/