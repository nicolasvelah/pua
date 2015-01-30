 /*SLIDER ADMIN*/
var t=jQuery;
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
                        
    d.attr("id", newId);
    d.show();

    d.find(".attachment").attr("src",n),
    d.find(".attachment").attr("title",l),
    d.find(".attachment").attr("alt",a),
    d.find(".title").attr("value",l),
    d.find(".title").attr("name",tit_name),
    d.find(".url").attr("value",n),
    d.find(".url").attr("name",url_name)

    var removeLink = jQuery("a", d).click(function() {
        jQuery(d).remove();  
        return false;
    });
    jQuery("#duplicate-list").append(d);
    jQuery("#element-max-id").attr("value",counter);
    counter++;
}