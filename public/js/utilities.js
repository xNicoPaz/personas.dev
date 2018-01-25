/* No es una libreria, la hice yo*/

var tableSort = function(table, index, sortAscToggle){
	var rows = table.find('tbody tr');
	
	rows.sort(function(a, b){
		aValue = $(a).find('td:eq(' + index + ')').attr('data-value');
		bValue = $(b).find('td:eq(' + index + ')').attr('data-value');

		if(sortAscToggle){
			if(aValue < bValue){
				return 1;
			}else{
				if(bValue < aValue){
					return -1;
				}else{
					return 0;		
				}
			}
		}else{
			if(aValue > bValue){
				return 1;
			}else{
				if(bValue > aValue){
					return -1;
				}else{
					return 0;		
				}
			}
		}
	});

	rows.detach().appendTo(table);
};