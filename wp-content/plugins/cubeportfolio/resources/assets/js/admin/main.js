(function(){
    var tabs = document.getElementsByClassName('nextcode_galleryTab');

    Array.prototype.forEach.call(tabs, function (tab) {
        tab.addEventListener('click', setActiveClass);
    });

    function setActiveClass(evt) {
        Array.prototype.forEach.call(tabs, function (tab) {
            tab.classList.remove('nextcode_galleryactive_Tab');
        });

        evt.currentTarget.classList.add('nextcode_galleryactive_Tab');
    }


    jQuery(function () {
        jQuery("#fields-list").sortable({
            connectWith: "div",
        });

    });

    jQuery(function () {
        jQuery(".options").sortable({
            connectWith: ".option",
        });

    });


    jQuery('.nextcode_gallerydelete_form').on('click', function () {
        if (!confirm("Are you sure you want to delete this item?")) {
            return false;
        }
    });


//jQuery( ".datepicker" ).datepicker();

    jQuery('body').on('focus', ".datepicker", function () {
        jQuery(this).datepicker({dateFormat: "dd-mm-yy"});
    })

    jQuery('input#select-all').on('change', function () {
        if (this.checked) {
            jQuery('input.item-checkbox').prop('checked', true);
        } else {
            jQuery('input.item-checkbox').prop('checked', false);
        }
    });

    jQuery(document).ready(function () {
        jQuery('#nextcode_gallerytabs')
            .tabs()
            .addClass('ui-tabs-vertical ui-helper-clearfix');

        setTimeout(function () {
            jQuery("#nextcode_gallery_style").show();
        }, 0);


        /* remove,read checked forms */

        jQuery(document).on('change', '.switch-checkbox.mask-switch', function () {
            if (this.checked) {
                jQuery(this).closest('.setting-row').find('.description').removeClass('readonly');
                jQuery(this).closest('.settings-block').find('.setting-row.setting-default').addClass('readonly');
                jQuery(this).closest('.settings-block').find('.setting-row.setting-placeholder').addClass('readonly');
            } else {
                jQuery(this).closest('.setting-row').find('.description').addClass('readonly');
                jQuery(this).closest('.settings-block').find('.setting-row.setting-placeholder').removeClass('readonly');
                jQuery(this).closest('.settings-block').find('.setting-row.setting-default').removeClass('readonly');
            }
        });

        jQuery("#nextcode_gallerysettings_section").click(function (e) {
            e.preventDefault();

            jQuery('.settings-toogled-container').animate({height: 'toggle'}, 200);
            if (jQuery(this).data("status") == "show") {
                nextcodegalleryAnimateRotate(540, 0);
                jQuery(this).data("status", "hide");
            }
            else {
                nextcodegalleryAnimateRotate(0, 540);
                jQuery(this).data("status", "show");
            }
        });

        function nextcodegalleryAnimateRotate(d1, d2) {
            var elem = jQuery("#settings_container_switcher .fa-chevron-down");

            jQuery({deg: d1}).animate({deg: d2}, {
                duration: 300,
                step: function (now) {
                    elem.css({
                        transform: "rotate(" + now + "deg)"
                    });
                }
            });
        }


        var custom_uploader;

        var _custom_media = true;

        jQuery('.nextcode_galleryadd_new_image').click(function (e) {
            e.preventDefault();
            custom_uploader = nextcodegalleryUploader("insert");
            mediaGrabber(custom_uploader, "add", false);
        });

        jQuery(".nextcode_galleryitem_edit a").click(function (e) {
            e.preventDefault();

            custom_uploader = nextcodegalleryUploader("edit");
            var image_id = jQuery(this).data("image-id");
            mediaGrabber(custom_uploader, "edit", image_id);
        });

        function mediaGrabber(uploader, action, image_id) {
            //When a file is selected, grab the URL and set it as the text field's value
            var selected_images = [];
            uploader.on('select', function () {
                attachments = uploader.state().get('selection').toJSON();
                for (var key in attachments) {
                    //jQuery("#nextcode_galleryimages_name[" + id + "]").val(attachments[key].url + ';;;' + jQuery("#" + id).val());
                    selected_images.push({
                        id: attachments[key].id,
                        url: attachments[key].url,
                        name: attachments[key].title
                    });
                }

                if (action == "add") {
                    nextcodegalleryAddItem(selected_images, "image");
                }
                else if (action == "edit") {
                    if (image_id !== false) {
                        nextcodegalleryEditThumbnail(selected_images, image_id);
                    }
                }
            });
            custom_uploader.open();
        }

        function nextcodegalleryUploader(action) {
            var custom_uploader;
            //  var button = jQuery(id);
            //  var id = button.attr('id').replace('_button', '');
            //If the uploader object has already been created, reopen the dialog
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }
            //Extend the wp.media object

            var title, button;
            if (action == "insert") {
                title = "Select images to Insert Into Gallery";
                button = "Insert Into Gallery";
            }
            else if (action == "edit") {
                title = "Choose new Image";
                button = "Change Image";
            }


            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: title,
                button: {
                    text: button
                },
                multiple: true
            });

            return custom_uploader;
        }

        jQuery("#nextcode_galleryadd_video_form").submit(function (e) {
            e.preventDefault();

            var form = jQuery(nextcode_galleryadd_video_form),
                submitBtn = form.find('input[type=submit]'),
                general_data = form.serialize();


            nextcodegalleryAddItem(general_data, "video");

        })

        jQuery('.add_media').on('click', function () {
            _custom_media = false;
        });

        jQuery(".wp-media-buttons-icon").click(function () {
            jQuery(".media-menu .media-menu-item").css("display", "none");
            jQuery("" +
                ":first").css("display", "block");
            jQuery(".separator").next().css("display", "none");
            jQuery('.attachment-filters').val('image').trigger('change');
            jQuery(".attachment-filters").css("display", "none");
        });

        jQuery(".nextcode_galleryadd_new_video").click(function () {
            alert('This is a PRO Feature, you need to purchase licensed version to activate it.')
            //nextcodegalleryModalGallery.show('nextcodegallery-addvideo-modal');
        });

        jQuery(".nextcode_galleryedit_gallery_images").click(function (e) {
            e.preventDefault();
            nextcodegalleryModalGallery.show('nextcodegallery-editimages-modal');
        });

    })


    jQuery(document).ready(function () {
        var doingAjax = false;
        jQuery('#nextcode_galleryimages_form').on('submit', function (e) {
            e.preventDefault();


            if (doingAjax) return false;

            var form = jQuery('#nextcode_galleryimages_form'),
                submitBtn = form.find('input[type=submit]'),
                formData = form.serialize(),
                general_data = {
                    action: "nextcode_gallerysave_gallery",
                    nonce: nextcode_gallerysave.nonce,
                    gallery_id: jQuery("input[name=nextcode_galleryid_gallery]").val(),
                    gallery_name: jQuery("input[name=nextcode_galleryname]").val(),
                    formdata: formData
                };


            jQuery.ajax({
                url: ajaxurl,
                method: 'post',
                data: general_data,
                dataType: 'text',
                beforeSend: function () {
                    doingAjax = true;
                    submitBtn.attr("disabled", 'disabled');
                    submitBtn.parent().find(".spinner").css("visibility", "visible");
                }
            }).always(function () {
                doingAjax = false;
                submitBtn.removeAttr("disabled");
                submitBtn.parent().find(".spinner").css("visibility", "hidden");

            }).done(function (response) {
                if (response == 1) {

                    toastr.success('Saved Successfully');
                } else {
                    toastr.error('Error while saving');
                }
            }).fail(function () {
                toastr.error('Error while saving');
            });

            return false;
        });

        jQuery('.settings-section-heading').on('click', function () {
            var section = jQuery(this).closest('.settings-section-wrap');
            section.toggleClass('active');
        });

        jQuery('#nextcode_galleryedited_images_form').on('submit', function (e) {
            e.preventDefault();

            var form = jQuery('#nextcode_galleryedited_images_form');
            var ready = true;
            form.find("[id^=nextcode_galleryimages_name]").each(function () {
                if (jQuery(this).val().length > 255) {
                    toastr.error('Name field should be less Than 256 character');
                    ready = false;
                    return;
                }
            });
            var submitBtn = form.find('input[type=submit]'),
                formData = form.serialize(),
                general_data = {
                    action: "nextcode_gallerysave_gallery_images",
                    nonce: nextcode_gallerysave.nonce,
                    gallery_id: jQuery("input[name=nextcode_galleryid_gallery]").val(),
                    formdata: formData
                };

            if (ready == true) {
                jQuery.ajax({
                    url: ajaxurl,
                    method: 'post',
                    data: general_data,
                    dataType: 'text',
                    beforeSend: function () {
                        doingAjax = true;
                        submitBtn.attr("disabled", 'disabled');
                        submitBtn.parent().find(".spinner").css("visibility", "visible");
                    }
                }).always(function () {
                    doingAjax = false;
                    submitBtn.removeAttr("disabled");
                    submitBtn.parent().find(".spinner").css("visibility", "hidden");
                }).done(function (response) {
                    if (response == 1) {
                        nextcodegalleryModalGallery.hide("nextcodegallery-editimages-modal");
                        toastr.success('Saved Successfully');
                    } else {
                        toastr.error('Error while saving');
                    }
                }).fail(function () {
                    toastr.error('Error while saving');
                });
            }

            return false;
        });

        jQuery(".nextcode_galleryitem_overlay input[type=checkbox]").change(function () {
            if (jQuery(this).is(':checked')) {
                /* jQuery(this).parent().parent().css({
                 "border": "2px solid #2279e0"
                 });*/
                jQuery(this).parent().addClass("active_item");
            }
            else {
                /*jQuery(this).parent().parent().css({
                 "border": "0px"
                 });*/
                jQuery(this).parent().removeClass("active_item");

            }
        })


        jQuery(".nextcode_galleryremove_selected_images").click(function (e) {
            e.preventDefault();

            if (!confirm("Are you sure you want to delete this item?")) {
                return false;
            }

            var checked_items = [];
            jQuery(".nextcode_galleryitem input:checked").each(function (key, item) {
                checked_items.push(jQuery(this).val());
            })

            general_data = {
                action: "nextcode_galleryremove_gallery_items",
                nonce: nextcode_gallerysave.nonce,
                gallery_id: jQuery("input[name=nextcode_galleryid_gallery]").val(),
                formdata: checked_items
            };

            jQuery.ajax({
                url: ajaxurl,
                method: 'post',
                data: general_data,
                dataType: 'text',
                beforeSend: function () {
                    doingAjax = true;
                    jQuery(".nextcode_galleryremove_selected_images").addClass("disabled_remove_link");
                }
            }).always(function () {
                doingAjax = false;
            }).done(function (response) {
                if (response == 1) {
                    toastr.success('Selected Items Removed Successfully');
                    jQuery(".nextcode_galleryremove_selected_images").removeClass("disabled_remove_link");
                    window.setTimeout('location.reload()', 500)
                } else {
                    toastr.error('Error while removing items');
                }
            }).fail(function () {
                toastr.error('Error while removing items');
            });


        });

        jQuery(".items_checkbox").change(function () {
            var count = jQuery(".nextcode_galleryitem input:checked").length;
            if (count > 0) {
                jQuery(".nextcode_galleryremove_selected_images").show();
                // jQuery("input[name=select_all_items]").prop("checked", true);
            }
            else {
                jQuery(".nextcode_galleryremove_selected_images").hide();
                // jQuery("input[name=select_all_items]").prop("checked", false);
            }
        });

        jQuery("#nextcode_galleryselect_all_items").change(function () {
            if (jQuery(this).attr("checked") == 'checked') {
                jQuery(".nextcode_galleryitem input[type='checkbox']").attr("checked", "checked");
                jQuery(".nextcode_galleryitem_overlay").addClass("active_item");
                jQuery(".nextcode_galleryremove_selected_images").show();
            }
            else {
                jQuery(".nextcode_galleryitem input[type='checkbox']").removeAttr("checked");
                jQuery(".nextcode_galleryitem_overlay").removeClass("active_item");
                jQuery(".nextcode_galleryremove_selected_images").hide();
            }
        })
    });

    jQuery(document).ready(function ($) {
        var fixHelperModifiedList = function (e, tr) {
                tr.css({"background": "#f5f1f1", "opacity": "0.8"});
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function (index) {
                    $(this).width($originals.eq(index).width())
                });
                tr.css({"background": "#FFFFFF", "opacity": "1"});
                return $helper;
            },
            updateIndexList = function (e, ui) {
                $('td.index', ui.item.parent()).each(function (i) {
                    $(this).find("input").val(++i);
                });
            };

        $("#nextcode_gallerysort tbody").sortable({
            helper: fixHelperModifiedList,
            stop: updateIndexList
        }).disableSelection();

        var fixHelperModifiedGrid = function (e, tr) {
                tr.css({"opacity": "0.8"});
                tr.find(".nextcode_galleryitem_title").hide();
                tr.find(".nextcode_galleryitem_overlay").hide();
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function (index) {
                    jQuery(this).width($originals.eq(index).width())
                });
                tr.css({"opacity": "1", "margin-left": "2px"});
                tr.find(".nextcode_galleryitem_title").show();
                tr.find(".nextcode_galleryitem_overlay").show();
                return $helper;
            },
            updateIndexGrid = function (e, ui) {
                jQuery('.nextcode_galleryitem').each(function (i) {
                    jQuery(this).find("input[type=hidden]").val(++i);
                });
            };

        jQuery(".nextcode_galleryitems_list").sortable({
            helper: fixHelperModifiedGrid,
            stop: updateIndexGrid,
            placeholder: 'nextcode_galleryitem'
        }).disableSelection();

        jQuery("#nextcode_gallerydisplay_type").change(function () {
            if (jQuery(this).val() == 0) {
                jQuery(".nextcode_galleryitems_per_page_section").addClass("nextcode_galleryhidden");
            }
            else {
                jQuery(".nextcode_galleryitems_per_page_section").removeClass("nextcode_galleryhidden");
            }
        });

        jQuery("#nextcode_galleryshow_title").change(function () {
            if (!jQuery(this).is(':checked')) {
                jQuery(".nextcode_gallerytitle_position_section").addClass("nextcode_galleryhidden");
            }
            else {
                jQuery(".nextcode_gallerytitle_position_section").removeClass("nextcode_galleryhidden");
            }
        });

        jQuery("input[name=nextcode_galleryview_type]").change(function () {
            var grid_arr = ['0', '1'];
            if (jQuery.inArray(jQuery(this).val(), grid_arr) !== -1) {
                jQuery(".nextcode_gallerydisplay_type_section").removeClass("nextcode_galleryhidden");
                if (jQuery(".nextcode_gallerydisplay_type_section").val() !== 0) {
                    jQuery(".nextcode_galleryitems_per_page_section").removeClass("nextcode_galleryhidden");
                }
            }
            else {
                jQuery(".nextcode_gallerydisplay_type_section").addClass("nextcode_galleryhidden");
                jQuery(".nextcode_galleryitems_per_page_section").addClass("nextcode_galleryhidden");
            }
        });


        jQuery("#gallery_name").bind("keypress keyup", function () {

            jQuery("#gallery_active_name").html(jQuery(this).val());
            jQuery("#edit_name_input").val(jQuery(this).val());
        });

        jQuery("#nextcode_galleryedit_name").click(function (e) {
            e.preventDefault();
            var cur_name = jQuery(this).parent().find("#gallery_active_name").text();
            jQuery(this).parent().find("#gallery_active_name").hide();
            jQuery(this).parent().find("#edit_name_input").removeClass("nextcode_galleryhidden");
            jQuery(this).hide();
            var strLength = jQuery("#edit_name_input").val().length * 2;
            jQuery("#edit_name_input").focus();
            jQuery("#edit_name_input")[0].setSelectionRange(strLength, strLength);
        });
        $(window).click(function () {
//Hide the menus if visible
            jQuery("#nextcode_galleryedit_name").parent().find("#edit_name_input").addClass("nextcode_galleryhidden");
            jQuery("#nextcode_galleryedit_name").parent().find("#gallery_active_name").show();
            jQuery("#nextcode_galleryedit_name").show();
        });
        $('#nextcode_galleryedit_name, #nextcode_galleryactive').click(function (event) {
            event.stopPropagation();
        });


        jQuery("#edit_name_input").bind("keyup keypress", function () {
            jQuery("#gallery_name").val(jQuery(this).val());
            jQuery("#gallery_active_name").text(jQuery(this).val());
        })
        /*jQuery(document).click(function () {
         jQuery("#edit_name_input").hide();
         jQuery("#gallery_active_name").show();

         })*/
    })

    function nextcodegalleryEditThumbnail(data, id) {
        var form, submitBtn;

        var general_data = {
            action: "nextcode_galleryedit_thumbnail",
            nonce: nextcode_gallerysave.nonce,
            gallery_id: jQuery("input[name=nextcode_galleryid_gallery]").val(),
            image_id: id,
            formdata: data
        };

        jQuery.ajax({
            url: ajaxurl,
            method: 'post',
            data: general_data,
            dataType: 'text',
            beforeSend: function () {
                doingAjax = true;
            }
        }).always(function () {
            doingAjax = false;
        }).done(function (response) {
            if (response == 1) {
                toastr.success('Thumbnail Changed Successfully');
                window.setTimeout('location.reload()', 500)
            } else {
                toastr.error('Error while editing');
            }
        }).fail(function () {
            toastr.error('Error while editing');
        });

    }

    function nextcodegalleryAddItem(data, type) {
        var form, submitBtn;
        if (type == "video") {
            form = jQuery('#nextcode_galleryadd_video_form');
            submitBtn = form.find('input[type=submit]');
        }
        var general_data = {
            action: "nextcode_galleryadd_gallery_" + type,
            nonce: nextcode_gallerysave.nonce,
            gallery_id: jQuery("input[name=nextcode_galleryid_gallery]").val(),
            formdata: data
        };


        jQuery.ajax({
            url: ajaxurl,
            method: 'post',
            data: general_data,
            dataType: 'text',
            beforeSend: function () {
                doingAjax = true;
                if (type == "video") {
                    submitBtn.attr("disabled", 'disabled');
                    submitBtn.parent().find(".spinner").css("visibility", "visible");
                }
            }
        }).always(function () {
            doingAjax = false;
            if (type == "video") {
                submitBtn.removeAttr("disabled");
                submitBtn.parent().find(".spinner").css("visibility", "hidden");
            }
        }).done(function (response) {
            if (response == 1) {
                toastr.success(' Added Successfully');
                window.setTimeout('location.reload()', 500)
            } else {
                toastr.error('Error while saving');
            }
        }).fail(function () {
            toastr.error('Error while saving');
        });
    }

    function copyToClipboard(elementId) {
        var aux = document.createElement("input");
        var code = document.getElementById(elementId).innerHTML;
        code = code.replace("&lt;", "<");
        code = code.replace("&gt;", ">");
        code = code.replace("<br>", "");
        code = code.replace("<br>", "");
        aux.setAttribute("value", code);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");

        document.body.removeChild(aux);

    }





})();
