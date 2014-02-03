<?php

class MenuController extends \BaseController {

	/**
	 * Return all menu items
	 *
	 * @return Response
	 */
	public function getItems()
	{
		$menu_items = Menu::where('parent_menu_item_id', 0)->get();
		return Response::json($menu_items->toArray());
	}
	
	public function newItems()
	{
		echo 'test';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getItem($id)
	{
	    $menu_item = Menu::where('menu_item_id', $id)
	                 ->take(1)
	                 ->get();
		return Response::json($menu_item->toArray());
   	}

	/**
	 * Save either a new item or an update to an existing item
	 *
	 * @return Response
	 */
	public function saveItem($id = null)
	{
		if( is_null( $id ) ):
			$menu = new Menu;
		else:
			$menu = Menu::find($id);
		endif;
	    $menu->parent_menu_item_id 	= Input::get('parent_menu_item_id');
	    $menu->menu_code 			= Input::get('menu_code');
	    $menu->disp_text		 	= Input::get('disp_text');
	    $menu->link_href 			= Input::get('link_href');
	    $menu->item_class 			= Input::get('item_class');	    
	    $menu->read_order 			= Input::get('read_order');	    
	    $menu->status_code 			= Input::get('status_code');	    
	    $menu->access_ctrl_mstr_id	= Input::get('access_ctrl_mstr_id');	    
//	    $menu->created_by 			= Auth::user()->id;
	 
	    // Validation and Filtering is sorely needed!!
	    // Seriously, I'm a bad person for leaving that out.
	 
	    $menu->save();
		return Response::json($menu->toArray());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function removeItem($id)
	{
	    $menu = Menu::find($id);
	    $menu->delete();
		return Response::json(array(
			'error'		=> false,
			'message'	=> 'Menu item deleted'
		), 200);
	}
	
}