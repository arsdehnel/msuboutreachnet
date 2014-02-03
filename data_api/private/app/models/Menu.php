<?php
 
class Menu extends Eloquent {
 
    protected $table = 'menu_items';
    public $primaryKey = 'menu_item_id';
    protected $softDelete = true;
 
}