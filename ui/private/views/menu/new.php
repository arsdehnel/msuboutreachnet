<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/main.css">

        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Pro2ject name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/menu/new">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	<a href="#/new" class="btn btn-primary">New Menu Item</a><hr>
    <div class="container bb-page">
    
    	<h3>bb stuff load here</h3>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>
	</div>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script src="/js/vendor/bootstrap.min.js"></script>
	<script src="/js/vendor/underscore-1.5.2.min.js"></script>
	<script src="/js/vendor/backbone-1.1.0.js"></script>
	<script src="/js/vendor/handlebars-1.3.0.js"></script>
	<script type="text/template" id="menu_item_template">
		<form class="form-horizontal form-menu-item" role="form">
			<h2><%= menu_item ? 'Update' : 'Create' %> Menu Item</h2>
		  <div class="form-group">
		    <label for="parent_menu_item_id" class="col-sm-2 control-label">Parent ID</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="parent_menu_item_id" name="parent_menu_item_id" placeholder="Parent ID" value="<%= menu_item ? menu_item.attributes[0].parent_menu_item_id : '' %>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="menu_code" class="col-sm-2 control-label">Menu Code</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="menu_code" name="menu_code" placeholder="Menu Code" value="<%= menu_item ? menu_item.attributes[0].menu_code : '' %>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="disp_text" class="col-sm-2 control-label">Text</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="disp_text" name="disp_text" placeholder="Text" value="<%= menu_item ? menu_item.attributes[0].disp_text : '' %>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="link_href" class="col-sm-2 control-label">URL</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="link_href" name="link_href" placeholder="URL" value="<%= menu_item ? menu_item.attributes[0].link_href : '' %>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="item_class" class="col-sm-2 control-label">Class</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="item_class" name="item_class" placeholder="Class" value="<%= menu_item ? menu_item.attributes[0].item_class : '' %>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="read_order" class="col-sm-2 control-label">Read Order</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="read_order" name="read_order" placeholder="Read Order" value="<%= menu_item ? menu_item.attributes[0].read_order : '' %>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="read_order" class="col-sm-2 control-label">Status</label>
		    <div class="col-sm-10">
		      <select name="status_code" id="status_code" class="form-control">
		      	<option value="A" <%= menu_item ? ( menu_item.attributes[0].status_code == 'A' ? ' selected' : '' ) : '' %>>Active</option>
		      	<option value="I" <%= menu_item ? ( menu_item.attributes[0].status_code == 'I' ? ' selected' : '' ) : '' %>>Inactive</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="read_order" class="col-sm-2 control-label">Access Ctrl Mstr ID</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="access_ctrl_mstr_id" name="access_ctrl_mstr_id" placeholder="Access ID" value="<%= menu_item ? menu_item.attributes[0].access_ctrl_mstr_id : '' %>">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
			    <input type="hidden" id="menu_item_id" name="menu_item_id" value="<%= menu_item ? menu_item.attributes[0].menu_item_id : '' %>">
		      <button type="submit" class="btn btn-default form-save">Save</button>
		    </div>
		  </div>
		</form>
	</script>
	<script type="text/template" id="menu_items_template">
	<form class="menu_item_form">
	  <table class="table table-striped">
	  	<thead>
	  	  <tr>
	  	    <th>
	  	      ID
	  	    </th>
	  	    <th>
	  	      Parent ID
	  	    </th>
	  	    <th>
	  	      Menu Code
	  	    </th>
	  	    <th>
	  	      Text
	  	    </th>
	  	    <th>
	  	      URL
	  	    </th>
	  	    <th>
	  	      Class
	  	    </th>
	  	    <th>
	  	      Read Order
	  	    </th>
	  	    <th>
	  	      Status
	  	    </th>
	  	    <th>
	  	      Access ID
	  	    </th>
	  	    <th>
	  	      Actions
	  	    </th>
	  	  </tr>
	  	</thead>
	  	<tbody>
	  		<% _.each( menuItems, function(item){ %>

		  	  <tr>
		  	    <td><%= item.get('menu_item_id') %></td>
		  	    <td><%= item.get('parent_menu_item_id') %></td>
		  	    <td><%= item.get('menu_code') %></td>
		  	    <td><%= item.get('disp_text') %></td>
		  	    <td><%= item.get('link_href') %></td>
		  	    <td><%= item.get('item_class') %></td>
		  	    <td><%= item.get('read_order') %></td>
		  	    <td><%= item.get('status_code') %></td>
		  	    <td><%= item.get('access_ctrl_mstr_id') %></td>
		  	    <td>
		  	    	<a href="#/edit/<%= item.get('menu_item_id') %>" class="btn btn-success">Edit</a>
		  	    	<a href="#/remove/<%= item.get('menu_item_id') %>" class="btn btn-danger">Delete</a>
		  	    </td>
		  	  </tr>
	  		
	  		<% }); %>
	  	</tbody>
	  	<tfoot id="menu_item_form_handle">
	  	</tfoot>
	  </table>
	</form>
	</script>
	<script id="error-template" type="text/x-handlebars-template">
	  <div class="error">
	  	{{#if error_header}}
	  		<h6>{{error_header}}</h6>
	  	{{/if}}
	  	{{error_text}}
	  </div>
	</script>
	<script id="menu-item-confirm" type="text/x-handlebars-template">
		<form class="form-horizontal form-remove-item" role="form">
			<h2>Remove Menu Item</h2>
			<p>Are you sure you want to remove <strong>{{disp_text}} [{{link_href}}]</strong>?</p>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
			    <input type="hidden" id="menu_item_id" name="menu_item_id" value="{{menu_item_id}}">
		      <button type="submit" class="btn btn-success form-save">Yes</button>
		      <a href="#/" class="btn btn-danger form-save">No</a>
		    </div>
		  </div>
		</form>
	</script>
	<script src="/js/main.js"></script>
    </body>
</html>
