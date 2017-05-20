$(document).ready(function(){
	
	$('a.delete').click(function(){
		
		var rel = $(this).closest('a.delete');
		
		$.confirm({
			'title'		: 'Подтверждение удаления',
			'message'	: 'Вы решили удалить пункт. <br />После удаления его нельзя будет восстановить! Продолжаем?',
			'buttons'	: {
				'Да'	: {
					'class'	: 'blue',
					'action': function(){
						rel.slideUp();
					}
				},
				'Нет'	: {
					'class'	: 'gray',
					'action': function(){}	// В данном случае ничего не делаем. Данную опцию можно просто опустить.
				}
			}
		});
		
	});
	
});
// $(document).ready(function() {

// 	$('.delete').click(function(){

// 		var rel = $(this).attr("rel");

// 		$.confirm({
// 			'title' 	: 'Подтверждение удаления',
// 			'message' 	: 'После удаления восстановление будет невозможно! Продолжить?',
// 			'buttons' 	: {
// 				'Да' 	: {
// 					'class' : 'blue',
// 					'action' : function(){
// 						location.href = rel;
// 					}
// 				},
// 				'Нет' 	: {
// 					'class'	 : 'gray',
// 					'action' : function(){}
// 				}
// 			}
// 		});

// 	});
// });
