(function($){

	jQuery(document).ready(function(){
		/**
		 * check mobile menu and toggle appearance.
		 */
		$("body").click(function(ev){

  			ev.stopPropagation();
			var full 		= $("body").width();
			var width_menu 	= $("#cbp-spmenu-s2").width();
			var right 	 	=  $("#cbp-spmenu-s2").css('right');
			var offset 		= $( this ).offset();


  			var pos = ev.pageX ;

  			if(full - pos > width_menu && right != '-190px'){
  				// hide menu here
  				$("#showRight").trigger("click");
  			}

		})
	});

	function showNotification(params) {

            // remove existing notification
            jQuery('div.notification').remove();
            var $class = 'success';
            if(!params.success)
            	$class = 'fail';
            $('body').prepend('<div class="notification '+$class+'"><div class="container"><div class="msg">'+params.msg+'</div></div></div>');
            $notification = $('div.notification');
            $notification.hide().prependTo('body')
                .fadeIn('fast')
                .delay(1000)
                .fadeOut(3000, function() {
                   jQuery(this).remove();
                });
    }

	$(document).ready(function(){
		$('.nav-tabs  a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		})

		var val = $('form.form-contact').validate({
				rules: {
                        user_name: "required",
                   },
                 messages: {
                 		user_name : rab_global.validate.required_user_name,
						user_email :{
                 			required : rab_global.validate.required_user_email,
                 		// 	email    : 'Chưa đúng định dạng email'
                 		},
                 		content 	: rab_global.validate.required_content,
                 		user_phone 	: rab_global.validate.required_phone,
                    }
			});

		var $btn = $('form.form-contact').find(".btn");

		$('form.form-contact').submit(function(){

			var data = $( this ).serialize();

			if(!val.form())
				return false;
			var $btn = $('form.form-contact').find(".btn");

			jQuery.ajax({

		        type : "POST",
		        url : rab_global.ajaxUrl,
		        data : data,
		        beforeSend: function(){
		        	$btn.button('loading');
		        },
		        success: function(response) {
		        	$btn.button('reset');
		        	showNotification(response);
		        }
		      });

			return false;
		})
	});


})(jQuery);

(function($){

	var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
		menuRight = document.getElementById( 'cbp-spmenu-s2' ),
		menuTop = document.getElementById( 'cbp-spmenu-s3' ),
		menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
		//showLeft = document.getElementById( 'showLeft' ),
		showRight = document.getElementById( 'showRight' ),
		// showTop = document.getElementById( 'showTop' ),
		// showBottom = document.getElementById( 'showBottom' ),
		// showLeftPush = document.getElementById( 'showLeftPush' ),
		// showRightPush = document.getElementById( 'showRightPush' ),
		body = document.body;

	// showLeft.onclick = function() {
	// 	classie.toggle( this, 'active' );
	// 	classie.toggle( menuLeft, 'cbp-spmenu-open' );
	// 	disableOther( 'showLeft' );
	// };
	showRight.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( menuRight, 'cbp-spmenu-open' );
		disableOther( 'showRight' );
	};
	// showTop.onclick = function() {
	// 	classie.toggle( this, 'active' );
	// 	classie.toggle( menuTop, 'cbp-spmenu-open' );
	// 	disableOther( 'showTop' );
	// };
	// showBottom.onclick = function() {
	// 	classie.toggle( this, 'active' );
	// 	classie.toggle( menuBottom, 'cbp-spmenu-open' );
	// 	disableOther( 'showBottom' );
	// };
	// showLeftPush.onclick = function() {
	// 	classie.toggle( this, 'active' );
	// 	classie.toggle( body, 'cbp-spmenu-push-toright' );
	// 	classie.toggle( menuLeft, 'cbp-spmenu-open' );
	// 	disableOther( 'showLeftPush' );
	// };
	// showRightPush.onclick = function() {
	// 	classie.toggle( this, 'active' );
	// 	classie.toggle( body, 'cbp-spmenu-push-toleft' );
	// 	classie.toggle( menuRight, 'cbp-spmenu-open' );
	// 	disableOther( 'showRightPush' );
	// };

	function disableOther( button ) {
		// if( button !== 'showLeft' ) {
		// 	classie.toggle( showLeft, 'disabled' );
		// }
		if( button !== 'showRight' ) {
			classie.toggle( showRight, 'disabled' );
		}
		// if( button !== 'showTop' ) {
		// 	classie.toggle( showTop, 'disabled' );
		// }
		// if( button !== 'showBottom' ) {
		// 	classie.toggle( showBottom, 'disabled' );
		// }
		// if( button !== 'showLeftPush' ) {
		// 	classie.toggle( showLeftPush, 'disabled' );
		// }
		// if( button !== 'showRightPush' ) {
		// 	classie.toggle( showRightPush, 'disabled' );
		// }
	}
})(jQuery);