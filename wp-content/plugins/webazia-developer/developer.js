/*
* Deleta item
*/
function deletItens(gal_id){
if(confirm('Are you sure to you want Delete this?')==true){
	jQuery("#ids").attr("value",gal_id);
	jQuery("#del").submit();
	}
}

/*
* Editar item
*/
function editItem(gal_id){
	jQuery("#iten_id").attr("value",gal_id);
	jQuery("#edit").submit();
}


/*
 * Atualiza op��es
 */
function xml_gallery_update_options(){
	if( /^[0-9]+$/.test( jQuery("#qtd").val() ) ){
		jQuery("#xml_gallery").submit();
		jQuery(".msg").addClass("updated");
		jQuery(".msg").text("Updated with sucessfully");
		jQuery(".msg").fadeIn("slow");
	}else{
		jQuery(".msg").addClass("error");
		jQuery(".msg").html("Invalid value");
		jQuery(".msg").fadeIn("slow");
	}
}