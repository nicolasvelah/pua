
    var elementCounter = 0;
    jQuery(document).ready(function() {           
        jQuery("#add-featured-post").click(function() {
            var elementRow = jQuery("#front-page-element-placeholder").clone();
            var newId = "front-page-element-" + elementCounter;
                
            elementRow.attr("id", newId);
            elementRow.show();
                
            var inputField = jQuery("select", elementRow);
            inputField.attr("name", "element-page-id-" + elementCounter); 
                 
            var labelField = jQuery("label", elementRow);
            labelField.attr("for", "element-page-id-" + elementCounter); 
 
            elementCounter++;
            jQuery("input[name=element-max-id]").val(elementCounter);
                 
            jQuery("#featured-posts-list").append(elementRow);
                
            return false;
        });         
    });


var removeLink = jQuery("a", elementRow).click(function() {
    removeElement(elementRow);  
    return false;
});

function removeElement(element) {
    jQuery(element).remove();
}