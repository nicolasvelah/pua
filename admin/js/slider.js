 /*SLIDER ADMIN*/
var t=jQuery;

/*Drag and drop order*/
contenedor = jQuery( "#duplicate-list" );
item_order = jQuery( ".postbox" );
contenedor.sortable({
    update: function(event, ui) {
      contenedor.children('div').each(function(index){
        jQuery(this).attr('id', 'slide-element-' + (index + 1));

        jQuery(this).find("input.title").attr('name', 'img_title-'+ (index + 1));

        jQuery(this).find("input.url").attr('name', 'img_url-'+ (index + 1));

        jQuery(this).find("input.order").attr('value', index + 1);
        jQuery(this).find("input.order").attr('name', 'img_order-'+ (index + 1));

        jQuery(this).append('<input type="text" value="1" name="neworder">');

        /*jQuery(this).find("a").attr('id', 'remove'+ (index + 1));
        id = jQuery(this).find("a").attr('onclick');
        id = id.split(',');
        id = id[1];
        jQuery(this).find("a").attr('onclick', 'get_delete_data('+ (index + 1) + ', ' + id + ')');*/
      });
    }
});
contenedor.disableSelection();
/*End Drag and drop order*/


jQuery("#insert-image").click(function(e){
    //alert('lklegoi');
    e.preventDefault();
    var i,l;
    return t.uploader?(t.uploader.open(),void 0):(l=window.slideshow_jquery_image_gallery_backend_script_editSlideshow,i="","object"==typeof l&&"object"==typeof l.localization&&void 0!==l.localization.uploaderTitle&&l.localization.uploaderTitle.length>0&&(i=l.localization.uploaderTitle),t.uploader=wp.media.frames.slideshow_jquery_image_galler_uploader=wp.media({frame:"select",title:i,multiple:!0,library:{type:"image"}}),
    t.uploader.on("select",function(){
        var e,i,l=t.uploader.state().get("selection").toJSON();
        for(i in l)l.hasOwnProperty(i)&&(e=l[i],insertImageSlide(e.id,e.title,e.description,e.url,e.alt))
    }),
    t.uploader.open(),void 0)
});


function insertImageSlide(i,l,s,n,a){
    var d = jQuery('#slide_item').clone();
    var newId = "slide-element-"+ counter;
    var tit_name = 'img_title-'+counter;
    var url_name = 'img_url-'+counter;
    var order_name = 'img_order-'+counter;
                        
    d.attr("id", newId);
    d.show();

    d.find(".attachment").attr("src",n),
    d.find(".attachment").attr("title",l),
    d.find(".attachment").attr("alt",a),
    d.find(".title").attr("value",l),
    d.find(".title").attr("name",tit_name),
    d.find(".url").attr("value",n),
    d.find(".url").attr("name",url_name)
    d.find(".order").attr("value",counter),
    d.find(".order").attr("name",order_name)

    var removeLink = jQuery("a", d).click(function() {
        jQuery(d).remove();
        counter--;  
        return false;
    });
    jQuery("#duplicate-list").append(d);
    jQuery("#element-max-id").attr("value",counter);
    counter++;
}

function get_delete_data(id_slide, id_cat_slide){

    cat_id = id_cat_slide;

    if(id_slide == null){
        slide_id = "";
    }else{
        slide_id = "&slide_id=" + id_slide;
    }
    jQuery("#display").empty();
    jQuery.ajax({
        url: adminUrl + "admin-ajax.php",
        type:"POST",
        data:"action=delete_puaslide&cat_slide_id=" + cat_id + slide_id,
         
        success:function(results){
            if(results == 'cat0'){
                location.reload();
            }else{
                window.location.href = adminUrl + "admin.php?page=slider_settings&id=" + cat_id;
            }
        }
    });
}