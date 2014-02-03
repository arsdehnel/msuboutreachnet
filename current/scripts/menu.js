jQuery(document).ready(function()
{
	jQuery("li.menuItem").each(function()
	{
		if(jQuery(this).hasClass("perm_on"))
		{
			jQuery(this).next("li.divider").css("background", "none").end().prev("li.divider").css("background", "none");
		}
	});
	
	jQuery("li.menuItem").mouseenter(function()
	{
		if(!jQuery(this).hasClass("perm_on"))
		{
			if(jQuery(this).children("img").attr("alt") == "Home")
			{
				jQuery(this).addClass("home_on").next("li.divider").hide().end().prev("li.divider").hide();
			}
			else
			{
				jQuery(this).addClass("on").next("li.divider").hide().end().prev("li.divider").hide();
			}
		}
	}).mouseleave(function()
	{
		if(!jQuery(this).hasClass("perm_on"))
		{
			if(jQuery(this).children("img").attr("alt") == "Home")
			{
				jQuery(this).removeClass("home_on").next("li.divider").show().end().prev("li.divider").show();
			}
			else
			{
				jQuery(this).removeClass("on").next("li.divider").show().end().prev("li.divider").show();
			}
		}
	});
});

function onMenuClick(menuId) {
  document.cookie = 'selectedMenuId=' + menuId;
}
