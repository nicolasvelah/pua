var elementCounter = jQuery("input[name=element-max-id]").val();

jQuery(document).ready(function() {  

    jQuery("#add-featured-post").click(
        function(){
            var arg = [];
            arg[0] = ["select","element-page-id-"];
            duplicar(arg);
        });

    /* Spesific theme */

    jQuery("#add-spesific-theme").click(
        function(){
            var arg = [];
            arg[0] = ["input","grid_sp-"];
            arg[1] = ["input","page_id_theme-","page_id"];
            duplicar(arg);
        }
    );


    jQuery("#featured-posts-list").sortable( {
        stop: function(event, ui) {
            var i = 0;
         
            jQuery("li", this).each(function() {
                setElementId(this, i);                    
                i++;
            });
                             
            elementCounter = i;
            jQuery("input[name=element-max-id]").val(elementCounter);
        }
    });

    /*Remove duplicate element*/

    function removeElement(element) {
        jQuery(element).remove();
    }  

    /*Duplicate elements*/

    function duplicar(arg){

        var elementRow = jQuery("#front-page-element-placeholder").clone();
        var newId = "front-page-element-" + elementCounter;
                        
        elementRow.attr("id", newId);
        elementRow.show();

        jQuery.each( arg, function( i, val ) {
            var type = arg[i][0];
            var new_name = arg[i][1]; 
            var page_id = arg[i][2];

            if(page_id){
                name_fields(type, new_name, elementCounter, elementRow, page_id);
            }else{
                name_fields(type, new_name, elementCounter, elementRow);
            }
        });
                         
        var labelField = jQuery("label", elementRow);
        labelField.attr("for", "element-page-id-" + elementCounter); 
                    
        var removeLink = jQuery("a", elementRow).click(function() {
            removeElement(elementRow);  
            return false;
        });

        elementCounter++;
        jQuery("input[name=element-max-id]").val(elementCounter);
                         
        jQuery("#duplicate-list").append(elementRow);
                        
        return false;
    }


    function name_fields(type, new_name, elementCounter, elementRow, page_id){
        if(page_id){
            jQuery('.' + page_id, elementRow).attr("name", new_name + elementCounter);
        }else{
            var inputField = jQuery(type, elementRow);
            inputField.attr("name", new_name + elementCounter);
        }
    }
    if(slider_activate == true){
        var imported = document.createElement('script');
        imported.src = templateUrl + '/admin/js/slider.js';
        document.head.appendChild(imported);
    } 

       
});

function pru(){alert('pruuu');};

function setElementId(element, id) {
    var newId = "front-page-element-" + id;    
                          
    jQuery(element).attr("id", newId);               
                    
    var inputField = jQuery("select", element);
    inputField.attr("name", "element-page-id-" + id); 
                     
    var labelField = jQuery("label", element);
    labelField.attr("for", "element-page-id-" + id); 
}
