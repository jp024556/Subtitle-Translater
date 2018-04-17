$( '#upload' )
  .submit( function( e ) {
	 $('#response').html('Translating <img src="images/loader.gif" />');
    $.ajax( {
      url: 'includes/uploadHelper.php',
      type: 'POST',
      data: new FormData( this ),
      processData: false,
      contentType: false,
	  success: function(response){
			$('#response').html(response);
		}
    } );
	
    e.preventDefault();
  } );
  
$( '.result' )
  .click( function( e ) {
	  var d = $(this).val();
	  var that = $(this).parent();
	  
	$(this).html('Translating <img src="images/loader.gif" />');
    $.ajax( {
      url: 'includes/uploadHelperNative.php',
      type: 'POST',
      data: d,
	  success: function(response){
			$(that).html(response);
		}
    } );
	
    e.preventDefault();
  } );
  
  $( '.dwds' )
  .click( function( e ) {
	  var d = $(this).attr('data-id');
	  console.log(d);
    $.ajax( {
      url: 'includes/countDwds.php',
      type: 'POST',
      data: "id="+d
    } );
  } );
