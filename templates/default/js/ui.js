var $j = jQuery.noConflict();

$j(function(){


	//Открытие и закрытие выпадающего меню
	//=================================================================
	var	$menu = $j('.s_user_menu'),
			$trigger = $menu.children('.s_user_menu__trigger');
			
	$trigger.click(function(){
		$menu.toggleClass('open');
	});
	
	$j(document).click(function(event){
		if($j(event.target).closest('.s_user_menu').length == 0 && $j(event.target).closest('.s_user_menu__content').length == 0)
			$menu.removeClass('open');
	});
	
	
});