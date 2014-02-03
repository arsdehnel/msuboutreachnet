//initialize it
function init_modal(){

	//make sure it exists
	if(!$('a.modal, button.modal').length){
		//if nothing, get outta here
		return;
	}
	
	//check for IE6
	var $IE6 = typeof document.addEventListener !== 'function' && !window.XMLHttpRequest;
	
	//position the modal
	function sizeModal(){
	
		//modal dimensions
		var $modal 			= $('#modal_window');
		var width			= $('#modal_content').children(':first').outerWidth();
		$modal.css('width', width+'px');
		var $modal_width	= $modal.outerWidth();
		var $modal_height	= $modal.outerHeight();
		var $modal_top		= '-' + Math.floor($modal_height / 2) + 'px';
		var $modal_left		= '-' + Math.floor($modal_width / 2) + 'px';
		
		//setup the modal
		$('#modal_window')
			.css('margin-top', $modal_top)
			.css('margin-left', $modal_left);
			
	}//sizeModal
	
	//for IE6
	function positionModal(){
		//force it into place
		$('#modal_wrapper').css('top', $(document).scrollTop() + 'px');
	}
	
	//show the modal
	function showModal(){
	
		if($IE6){
			positionModal();
		}
		
		//show the wrapper
		$('#modal_wrapper').show();
	
		//size it
		sizeModal();
		
		//reveal the inner modal
		$('#modal_window').css('visibility','visible').show();
		
		//resize window as the images load
		$('#modal_content img').each(function(){
			$(this).load(function(){
				$(this).removeClass('modal_placeholder').show();
				sizeModal();
			});
		});
	}
	
	//insert the modal stuff at the end of the body
	$('body').append('<div id="modal_wrapper"><!--[if IE 6]><iframe id="modal_iframe"></iframe><![endif]--><div id="modal_overlay"></div><div id="modal_window"><div id="modal_bar"><strong>Modal window</strong><a href="#" id="modal_close">Close</a></div><div id="modal_content"></div></div></div>');
	
	//handle the a.model clicks
	$('a.modal, button.modal').live('click',function(){
	
		//check the href
		var $the_link = $(this).attr('href');
		
		//determine the target
		if($the_link.match(/^#./)){
		
			//get content from indicated #anchor and put it in the modal
			$('#modal_content').html($($(this).attr('href')).html());
			showModal();
		
		}else if($the_link.match(/.jpg$/) ||
				 $the_link.match(/.png$/) ||
				 $the_link.match(/.gif$/)){
		
			//get an image with path of the HREF and put it in the modal
			$('#modal_content').html('<p id="modal_image_wrapper"><img src="' + $the_link + '" class="modal_placeholder" /></p>');
			showModal();
				 
		}else{
		
			//must be some ajax content loaded from an external file
			$('#modal_content').load($(this)
									.attr('href')
									.replace('#', ' #'), '', showModal);
		
		}
		
		//setup the modal title
		if($(this).attr('title')){
		
			//if it's got a title, use it
			$('#modal_bar strong').html($(this).attr('title'));
		
		}else if($(this).html() !== ''){
		
			//if no title but there is something within the anchor tag then use that as the title
			$('#modal_bar strong').html($(this).html());
		
		}
		
		//no active link and don't follow the link
		this.blur();
		return false;
	
	});
	
	//setup the hiding clicks
	$('#modal_overlay, #modal_close, .modal_close').live('click',function(){
	
		//hide the wrapper and everything in it
		$('#modal_wrapper').hide();
		
		//hide this because images might load after it's been closed
		$('#modal_window').css('visibility','hidden');
		
		//unbind the image listeners
		$('#modal_content img').each(function(){
			$(this).unbind();
		});
		
		//destroy all modal stuff
		$('#modal_content').html('');
		
		//reset modal title
		$('#modal_bar strong').html('Modal Window');
		
		//no active link and don't follow the link
		this.blur();
		return false;
	
	});
	
	//listen for that browser scroll for IE6
	if($IE6){
		$(window).scroll(function(){
			if($('#modal_wrapper').is(':visible')){
				positionModal();
			}
		});
	}

}

//start up the modal stuff
$(document).ready(function(){
	init_modal();
});