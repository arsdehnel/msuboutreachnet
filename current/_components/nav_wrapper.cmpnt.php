<!-- begin navbar -->
<?
	$menu_rs = fnc_rs_lookup( "SELECT *
								FROM vue_menu_output
								WHERE code = 'main_menu'
								  AND site_id = " . $_SESSION['site_id'] . "
								  AND menu_level = 'MCD'
								  AND (
								       (coalesce(user_id," . $_SESSION['user_id'] . ") = " . $_SESSION['user_id'] . "
								          AND view_security_level > " . $_SESSION['security_level'] . "
								          and user_check = 'Y') 
								     OR view_security_level <= " . $_SESSION['security_level'] . "
								      )
								ORDER BY sort_order" );
									
	if(!$menu_rs){
		echo "No menu options found.";
	}else{
		echo '<ol id="nav" class="navbar">';
		

		while($menu_rec = pg_fetch_array( $menu_rs )){
				
			echo '<li class="menuItem">';
			echo '<a href="#">' . $menu_rec['display_text'] . '</a>';
			
			$submenu_rs = fnc_rs_lookup( "SELECT *
						  				  FROM vue_menu_output
										  WHERE code = 'main_menu'
										    AND site_id = " . $_SESSION['site_id'] . "
										    AND mstr_id = " . $menu_rec['dtl_id'] . "
										    AND menu_level = 'MIM'
										    AND (
										         (coalesce(user_id," . $_SESSION['user_id'] . ") = " . $_SESSION['user_id'] . "
										            AND view_security_level > " . $_SESSION['security_level'] . "
										            and user_check = 'Y') 
										       OR view_security_level <= " . $_SESSION['security_level'] . "
										        )
										  ORDER BY sort_order" );
										  
			if( $submenu_rs ){
			
				echo '<ol class="subnav">';
				
				while( $submenu_rec = pg_fetch_array( $submenu_rs )){
						
					echo '<li><a href="' . $submenu_rec['url'] . '" target="' . $submenu_rec['target'] . '">' . $submenu_rec['display_text'] . '</a></li>';
		
				}
						
				echo '</ol>';
			
			}
			
			echo '</li>';
					
		}
		
		echo '</ol>';
				
	}			
?>
<!-- end navbar -->