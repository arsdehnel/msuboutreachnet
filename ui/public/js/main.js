//alias the global object
//alias jQuery so we can potentially use other libraries that utilize $
//alias Backbone to save us on some typing
(function(exports, $, bb){
 
  //document ready
  $(function(){
 
    /**
     ***************************************
     * Cached Globals
     ***************************************
     */
    var $window, $body, $document;
 
    $window  = $(window);
    $document = $(document);
    $body   = $('body');
        		
  });//end document ready
  
	$.ajaxPrefilter( function( options, originalOptions, jqXHR ) {
		options.url = 'http://d.msuboutreach.dev/api/v1' + options.url;
    });  
    
    var error_template = Handlebars.compile($("#error-template").html());
    var menu_item_confirm = Handlebars.compile($("#menu-item-confirm").html());
  
  var MenuItems = bb.Collection.extend({
  
  	url: '/menu/items',
  
  });
  
  var MenuItem = bb.Model.extend({

  	urlRoot: '/menu/item',
  	idAttribute: "menu_item_id"
  
  });
  
  var menuItemsList = bb.View.extend({
  	el: '.bb-page',
  	render: function(){
  		var that = this;
  		var menuItems = new MenuItems();
  		menuItems.fetch({
  			success: function(menuItems){
				var template = _.template($('#menu_items_template').html(), {menuItems: menuItems.models});
		  		that.$el.html(template);
  			}
  		});
  	}
  });
  
  var menuItem = bb.View.extend({
  	el: '.bb-page',
  	render: function(options){
  		if( options.id ){	
  			var that = this;
  			var menu_item = new MenuItem({menu_item_id:options.id});
  			menu_item.fetch({
  				success: function(menu_item){
					var template = _.template($('#menu_item_template').html(), {menu_item: menu_item});
					that.$el.html(template);
  				}
  			});
  		}else{
			var template = _.template($('#menu_item_template').html(), {menu_item: null});
			this.$el.html(template);
  		}
  	},
  	removeConfirm: function(options){
		var that = this;
		var menu_item = new MenuItem({menu_item_id:options.id});
		menu_item.fetch({
			success: function(menu_item){
				var template = menu_item_confirm( menu_item.attributes[0] );
				that.$el.html(template);
			}
		});
  	},
  	events: {
  		'submit .form-menu-item'   : 'saveMenuItem',
  		'submit .form-remove-item' : 'removeMenuItem'
  	},
  	saveMenuItem: function(e){
  		var menuData = $(e.currentTarget).serializeObject();
  		var menu_item = new MenuItem();
  		menu_item.save(menuData, {
  			success: function(menu_item){
  				router.navigate('',{trigger:true});
  			},
  			error: function( menu_item, xhr, options ){
  				var responseObj = $.parseJSON(xhr.responseText);
  				$('.bb-page').prepend(error_template({error_header: 'Error: '+responseObj.error.type, error_text: responseObj.error.message}));
  			}
  		});
  		return false;
  	},
  	removeMenuItem: function(e){
  		console.log('destroy');
  		var menuData = $(e.currentTarget).serializeObject();
  		console.log(menuData);
  		var menu_item = new MenuItem({menu_item_id:menuData.menu_item_id});
  		console.log(menu_item);
  		menu_item.destroy({
  			success: function(){
  				console.log('success');
  				router.navigate('',{trigger:true});
  			},
  			error: function( menu_item, xhr, options ){
  				console.log('error');
  				console
  				var responseObj = $.parseJSON(xhr.responseText);
  				$('.bb-page').prepend(error_template({error_header: 'Error: '+responseObj.error.type, error_text: responseObj.error.message}));
  			}
  		});
  		return false;
  	}  	
  })
  
  var menu_items = new menuItemsList();
  var menu_item = new menuItem();
  
  var Router = bb.Router.extend({
  
  	routes: {
  		''           : 'home',
  		'new'        : 'editMenuItem',
  		'edit/:id'   : 'editMenuItem',
  		'remove/:id' : 'removeMenuItem'
  	}
  
  });
  
  var router = new Router();
  
  router.on('route:home',function(){
  	menu_items.render();
  });
  router.on('route:editMenuItem',function(id){
  	menu_item.render({id:id});
  });
  router.on('route:removeMenuItem',function(id){
  	menu_item.removeConfirm({id:id});
  });
  
  bb.history.start();
 
}(this, jQuery, Backbone));

$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
      if (o[this.name] !== undefined) {
          if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
          }
          o[this.name].push(this.value || '');
      } else {
          o[this.name] = this.value || '';
      }
  });
  return o;
};