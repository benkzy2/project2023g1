(function ($) {
    "use strict";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // make input fields RTL
    $("select[name='language_id']").on('change', function () {
        $(".request-loader").addClass("show");

        // product category load according to language selection
        $("#category").removeAttr('disabled');

        let langid = $(this).val();
        $.get(mainurl + "/admin/product/" + langid + "/getcategory", function (data) {
            let options = `<option value="" disabled selected>Select a category</option>`;
            for (let i = 0; i < data.length; i++) {
                options += `<option value="${data[i].id}">${data[i].name}</option>`;
            }

            $(".categoryData").html(options);

        });

        $("#bcategory").removeAttr('disabled');
        $.get(mainurl + "/admin/blog/" + langid + "/getcats", function (data) {
            let options = `<option value="" disabled selected>Select a category</option>`;
            for (let i = 0; i < data.length; i++) {
                options += `<option value="${data[i].id}">${data[i].name}</option>`;
            }
            $("#bcategory").html(options);

        });

        if ($(this).parents('form').hasClass('create')) {
            $.get(mainurl + "/admin/rtlcheck/" + $(this).val(), function (data) {
                $(".request-loader").removeClass("show");
                if (data == 1) {
                    $("form.create input").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.create select").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.create textarea").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.create .summernote").each(function () {
                        $(this).addClass('rtl text-right');
                    });

                } else {
                    $("form.create input, form.create select, form.create textarea").removeClass('rtl');
                    $("form.create .summernote").removeClass('rtl text-right');
                }
            });
        } else if ($(this).parents('form').hasClass('modal-form')) {
            $.get(mainurl + "/admin/rtlcheck/" + $(this).val(), function (data) {
                $(".request-loader").removeClass("show");
                if (data == 1) {
                    $("form.modal-form input").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.modal-form select").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.modal-form textarea").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.modal-form .nicEdit-main").each(function () {
                        $(this).addClass('rtl text-right');
                    });

                } else {
                    $("form.modal-form input, form.modal-form select, form.modal-form textarea").removeClass('rtl');
                    $("form.modal-form .nicEdit-main").removeClass('rtl text-right');
                }
            });
        } else {
            // make input fields RTL
            $.get(mainurl + "/admin/rtlcheck/" + $(this).val(), function (data) {
                $(".request-loader").removeClass("show");
                if (data == 1) {
                    $("form input").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form select").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form textarea").each(function () {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form .summernote").each(function () {
                        $(this).siblings('.note-editor').find('.note-editable').addClass('rtl text-right');
                    });

                } else {
                    $("form input, form select, form textarea").removeClass('rtl');
                    $("form.modal-form .summernote").siblings('.note-editor').find('.note-editable').removeClass('rtl text-right');
                }
            });
        }


    });

    // footer bottom image preview
    $("#footer_bottom_img").on('change', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.footer_bottom_img img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // intro section video background preview
    $(document).on('change', '#intro_video_image', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.intro_video_image img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // intro section signature preview
    $(document).on('change', '#intro_signature', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.intro_signature img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // slider background image preview
    $(document).on('change', '#bg_image', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.bg_image img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // slider background image preview
    $(document).on('change', '#bg_image', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.bg_image img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // slider shape image preview
    $(document).on('change', '#slider_shape_img', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.slider_shape_img img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // slider bottom image preview
    $(document).on('change', '#slider_bottom_img', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.slider_bottom_img img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // testimonial background image preview
    $(document).on('change', '#textimonial_bg', function () {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.textimonial_bg img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });

    // Dropzone initialization
    Dropzone.options.myDropzone = {
        acceptedFiles: '.png, .jpg, .jpeg',
        url: storeUrl,
        success: function (file, response) {
            $("#sliders").append(`<input type="hidden" name="slider_images[]" id="slider${response.file_id}" value="${response.file_id}">`);

            // Create the remove button
            var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");


            // Capture the Dropzone instance as closure.
            var _this = this;

            // Listen to the click event
            removeButton.addEventListener("click", function (e) {
                // Make sure the button click doesn't submit the form:
                e.preventDefault();
                e.stopPropagation();

                _this.removeFile(file);

                rmvimg(response.file_id);
            });

            // Add the button to the file preview element.
            file.previewElement.appendChild(removeButton);

            if (typeof response.error != 'undefined') {
                if (typeof response.file != 'undefined') {
                    document.getElementById('errpreimg').innerHTML = response.file[0];
                }
            }
        }
    };

    function rmvimg(fileid) {
        // If you want to the delete the file on the server as well,
        // you can do the AJAX request here.

        $.ajax({
            url: removeUrl,
            type: 'POST',
            data: {
                fileid: fileid
            },
            success: function (data) {
                $("#slider" + fileid).remove();
            }
        });

    }


    //   load product slider images
    $.get(loadImgs, function (data) {
        for (var i = 0; i < data.length; i++) {
            $("#imgtable").append('<tr class="trdb" id="trdb' + data[i].id + '"><td><div class="thumbnail"><img style="width:150px;" src="' + mainurl + '/assets/front/img/product/sliders/' + data[i].image + '" alt="Ad Image"></div></td><td><button type="button" class="btn btn-danger pull-right rmvbtndb" data-indb="' + data[i].id + '"><i class="fa fa-times"></i></button></td></tr>');
        }
    });


    //   remove existing images
    $(document).on('click', '.rmvbtndb', function () {
        let indb = $(this).data('indb');
        $(".request-loader").addClass("show");
        $.ajax({
            url: rmvdbUrl,
            type: 'POST',
            data: {
                fileid: indb
            },
            success: function (data) {
                $(".request-loader").removeClass("show");
                $("#trdb" + indb).remove();
                var content = {};

                content.message = 'Slider image deleted successfully!';
                content.title = 'Success';
                content.icon = 'fa fa-bell';

                $.notify(content, {
                    type: 'success',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    time: 1000,
                    delay: 0,
                });
            }
        });
    });

    var today = new Date();
    $("#submissionDate").datepicker({
        autoclose: true,
        endDate: today,
        todayHighlight: true
    });
    $("#startDate").datepicker({
        autoclose: true,
        endDate: today,
        todayHighlight: true
    });

    $("#socialForm").on("submit", function (e) {
        e.preventDefault();
        $("#inputIcon").val($(".iconpicker-component").find('i').attr('class'));
        document.getElementById('socialForm').submit();
    });

    $('.chackFeature').on('click', function () {
        let featureId = $(this).attr('data');
        if ($(this).is(':checked')) {
            $.get(mainurl + '/admin/product/feature/check/' + featureId + ',1', function (response) {
                if (response == "done") {
                    location.reload();
                }
            })
        } else {
            $.get(mainurl + '/admin/product/feature/check/' + featureId + ',0', function (response) {
                if (response == "done") {
                    location.reload();
                }
            })
        }
    });

    $('.chackSpecial').on('click', function () {
        let specialId = $(this).attr('data');
        if ($(this).is(':checked')) {
            $.get(mainurl + '/admin/product/special/check/' + specialId + ',1', function (response) {
                if (response == "done") {
                    location.reload();
                }
            })
        } else {
            $.get(mainurl + '/admin/product/special/check/' + specialId + ',0', function (response) {
                if (response == "done") {
                    location.reload();
                }
            })
        }
    });


    $('.featPcat').on('click',function(){
        let featureId = $(this).attr('data');
        if($(this).is(':checked')){
            $.get(mainurl+'/admin/pcategory/feature/check/'+featureId+',1',function (response) {
                if (response == "done") {
                    location.reload();
                }
            });
        } else {
            $.get(mainurl+'/admin/pcategory/feature/check/'+featureId+',0',function (response) {
                if (response == "done") {
                    location.reload();
                }
            });
        }
    });
})(jQuery); 