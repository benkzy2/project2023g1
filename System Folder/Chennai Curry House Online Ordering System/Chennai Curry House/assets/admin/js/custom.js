$(function($) {
    "use strict";
    
  // Sidebar Search

  $(".sidebar-search").on('input', function() {
    let term = $(this).val().toLowerCase();
    // console.log('Term: ', term);

    if (term.length > 0) {
      $(".sidebar ul li.nav-item").each(function(i) {
        let menuName = $(this).find("p").text().toLowerCase();
        let $mainMenu = $(this);

        // if any main menu is matched
        if (menuName.indexOf(term) > -1) {
          $mainMenu.removeClass('d-none');
          $mainMenu.addClass('d-block');
        } else {
          let matched = 0;
          let count = 0;
          // search sub-items of the current main menu (which is not matched)
          $mainMenu.find('span.sub-item').each(function(i) {
            // if any sub-item is matched  of the current main menu, set the flag
            if ($(this).text().toLowerCase().indexOf(term) > -1) {
              count++;
              matched = 1;
            }
          });
          
          
          // if any sub-item is matched  of the current main menu (which is not matched)
          if (matched == 1) {
            $mainMenu.removeClass('d-none');
            $mainMenu.addClass('d-block');
          } else {
            $mainMenu.removeClass('d-block');
            $mainMenu.addClass('d-none');
          }
        }
      });
    } else {
      $(".sidebar ul li.nav-item").addClass('d-block');
    }
  });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
    /* ***************************************************
    ==========datatables start==========
    ******************************************************/
    $('#basic-datatables').DataTable({
    });
    /* ***************************************************
    ==========datatables end==========
    ******************************************************/
    
    
    // lazy load init
    var lazyLoadInstance = new LazyLoad();
    
    /* ***************************************************************
    ==========disabling default behave of form submits start==========
    *****************************************************************/
    $("#ajaxEditForm").attr('onsubmit', 'return false');
    $("#ajaxForm").attr('onsubmit', 'return false');
    /* *************************************************************
    ==========disabling default behave of form submits end==========
    ***************************************************************/
    
    
    
    /* ***************************************************
    ==========bootstrap datepicker start==========
    ******************************************************/
    $('.datepicker').datepicker({
        autoclose: true
    });
    /* ***************************************************
    ==========bootstrap datepicker end==========
    ******************************************************/
    
    
    
    /* ***************************************************
    ==========fontawesome icon picker start==========
    ******************************************************/
    $('.icp-dd').iconpicker();
    /* ***************************************************
    ==========fontawesome icon picker upload end==========
    ******************************************************/
    
    
    /* ***************************************************
    ==========Summernote initialization start==========
    ******************************************************/
    $(".summernote").each(function(i) {
        let theight;
        let $summernote = $(this);
        if ($(this).data('height')) {
            theight = $(this).data('height');
        } else {
            theight = 200;
        }
        $('.summernote').eq(i).summernote({
            height: theight,
            dialogsInBody: true,
            dialogsFade: false,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['height', ['height']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            },
            callbacks: {
                onImageUpload: function(files) {
                    $(".request-loader").addClass('show');
                    
                    let fd = new FormData();
                    fd.append('image', files[0]);
                    
                    $.ajax({
                        url: imgupload,
                        method: 'POST',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $summernote.summernote('insertImage', data);
                            $(".request-loader").removeClass('show');
                        }
                    });
                    
                }
            }
        });
    });
    
    
    
    $(document).on('click', ".note-video-btn", function() {
        
        let i = $(this).index();
        
        if ($(".summernote").eq(i).parents(".modal").length > 0) {
            
            setTimeout(() => {
                $("body").addClass('modal-open');
            }, 500);
        }
    });
    
    
    /* ***************************************************
    ==========Summernote initialization end==========
    ******************************************************/
    
    
    
    
    $('.icp-dd').iconpicker();
    
    
    /* ***************************************************
    ==========Summernote initialization end==========
    ******************************************************/
    
    
    
    /* ***************************************************
    ==========Bootstrap Notify start==========
    ******************************************************/
    function bootnotify(message, title, type) {
        var content = {};
        
        content.message = message;
        content.title = title;
        content.icon = 'fa fa-bell';
        
        $.notify(content, {
            type: type,
            placement: {
                from: 'top',
                align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            allow_dismiss: true,
            delay: 4000,
        });
    }
    /* ***************************************************
    ==========Bootstrap Notify end==========
    ******************************************************/
    
    
    
    /* ***************************************************
    ==========Form Submit with AJAX Request Start==========
    ******************************************************/
    $("#submitBtn").on('click', function(e) {
        $(e.target).attr('disabled', true);
        
        $(".request-loader").addClass("show");
        
        let ajaxForm = document.getElementById('ajaxForm');
        let fd = new FormData(ajaxForm);
        let url = $("#ajaxForm").attr('action');
        let method = $("#ajaxForm").attr('method');
        
        if ($("#ajaxForm .summernote").length > 0) {
            $("#ajaxForm .summernote").each(function(i) {
                let content = $(this).summernote('code');
                
                fd.delete($(this).attr('name'));
                fd.append($(this).attr('name'), content);
            });
        }
        
        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $(e.target).attr('disabled', false);
                $(".request-loader").removeClass("show");
                
                $(".em").each(function() {
                    $(this).html('');
                })
                
                if (data == "success") {
                    location.reload();
                }
                
                // if error occurs
                else if (typeof data.error != 'undefined') {
                    for (let x in data) {
                        if (x == 'error') {
                            continue;
                        }
                        document.getElementById('err' + x).innerHTML = data[x][0];
                    }
                }
            }
        });
    });
    
    $("#permissionBtn").on('click', function() {
        $("#permissionsForm").trigger("submit");
    });
    
    $("#langBtn").on('click', function() {
        $("#langForm").trigger("submit");
    });
    /* ***************************************************
    ==========Form Submit with AJAX Request End==========
    ******************************************************/
    
    
    
    
    /* ***************************************************
    ==========Form Prepopulate After Clicking Edit Button Start==========
    ******************************************************/
    $(".editbtn").on('click', function() {
        
        let datas = $(this).data();
        delete datas['toggle'];
        
        for (let x in datas) {
            if ($("#in" + x).hasClass('summernote')) {
                $("#in" + x).summernote('code', datas[x]);
            } else if ($("#in" + x).data('role') == 'tagsinput') {
                if (datas[x].length > 0) {
                    let arr = datas[x].split(" ");
                    for (let i = 0; i < arr.length; i++) {
                        $("#in" + x).tagsinput('add', arr[i]);
                    }
                } else {
                    $("#in" + x).tagsinput('removeAll');
                }
            } else if ($("input[name='" + x + "']").attr('type') == 'radio') {
                $("input[name='" + x + "']").each(function(i) {
                    if ($(this).val() == datas[x]) {
                        $(this).prop('checked', true);
                    }
                });
            } else {
                $("#in" + x).val(datas[x]);
            }
        }
        
    });
    
    
    /* ***************************************************
    ==========Form Prepopulate After Clicking Edit Button End==========
    ******************************************************/
    
    
    
    
    /* ***************************************************
    ==========Form Update with AJAX Request Start==========
    ******************************************************/
    $("#updateBtn").on('click', function(e) {
        
        $(".request-loader").addClass("show");
        
        let ajaxEditForm = document.getElementById('ajaxEditForm');
        let fd = new FormData(ajaxEditForm);
        let url = $("#ajaxEditForm").attr('action');
        let method = $("#ajaxEditForm").attr('method');
        
        if ($("#ajaxEditForm .summernote").length > 0) {
            $("#ajaxEditForm .summernote").each(function(i) {
                let content = $(this).summernote('code');
                fd.delete($(this).attr('name'));
                fd.append($(this).attr('name'), content);
            })
        }
        
        $.ajax({
            url: url,
            method: method,
            data: fd,
            contentType: false,
            processData: false,
            success: function(data) {
                
                $(".request-loader").removeClass("show");
                
                $(".em").each(function() {
                    $(this).html('');
                })
                
                if (data == "success") {
                    location.reload();
                }
                
                // if error occurs
                else if (typeof data.error != 'undefined') {
                    for (let x in data) {
                        if (x == 'error') {
                            continue;
                        }
                        document.getElementById('eerr' + x).innerHTML = data[x][0];
                    }
                }
            }
        });
    });
    /* ***************************************************
    ==========Form Update with AJAX Request End==========
    ******************************************************/
    
    
    
    /* ***************************************************
    ==========Delete Using AJAX Request Start==========
    ******************************************************/
    $('.deletebtn').on('click', function(e) {
        e.preventDefault();
        
        $(".request-loader").addClass("show");
        
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, delete it!',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                $(this).parent(".deleteform").trigger('submit');
            } else {
                swal.close();
                $(".request-loader").removeClass("show");
            }
        });
    });
    /* ***************************************************
    ==========Delete Using AJAX Request End==========
    ******************************************************/
    
    
    /* ***************************************************
    ==========Close Ticket Using AJAX Request Start==========
    ******************************************************/
    $('.close-ticket').on('click', function(e) {
        e.preventDefault();
        
        $(".request-loader").addClass("show");
        
        swal({
            title: 'Are you sure?',
            text: "You want to close this ticket!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, close it!',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                swal.close();
                $(".request-loader").removeClass("show");
            } else {
                swal.close();
                $(".request-loader").removeClass("show");
            }
        });
    });
    /* ***************************************************
    ==========Delete Using AJAX Request End==========
    ******************************************************/
    
    
    /* ***************************************************
    ==========Delete Using AJAX Request Start==========
    ******************************************************/
    $(document).on('change', '.bulk-check', function() {
        let val = $(this).data('val');
        let checked = $(this).prop('checked');
        
        // if selected checkbox is 'all' then check all the checkboxes
        if (val == 'all') {
            if (checked) {
                $(".bulk-check").each(function() {
                    $(this).prop('checked', true);
                });
            } else {
                $(".bulk-check").each(function() {
                    $(this).prop('checked', false);
                });
            }
        }
        
        
        // if any checkbox is checked then flag = 1, otherwise flag = 0
        let flag = 0;
        $(".bulk-check").each(function() {
            let status = $(this).prop('checked');
            
            if (status) {
                flag = 1;
            }
        });
        
        // if any checkbox is checked then show the delete button
        if (flag == 1) {
            $(".bulk-delete").addClass('d-inline-block');
            $(".bulk-delete").removeClass('d-none');
        }
        // if no checkbox is checked then hide the delete button
        else {
            $(".bulk-delete").removeClass('d-inline-block');
            $(".bulk-delete").addClass('d-none');
        }
    });
    
    $('.bulk-delete').on('click', function(e) {
        e.preventDefault();
        
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, delete it!',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                $(".request-loader").addClass('show');
                let href = $(this).data('href');
                let ids = [];
                
                // take ids of checked one's
                $(".bulk-check:checked").each(function() {
                    if ($(this).data('val') != 'all') {
                        ids.push($(this).data('val'));
                    }
                });
                
                let fd = new FormData();
                for (let i = 0; i < ids.length; i++) {
                    fd.append('ids[]', ids[i]);
                }
                
                $.ajax({
                    url: href,
                    method: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        
                        $(".request-loader").removeClass('show');
                        if (data == "success") {
                            location.reload();
                        }
                    }
                });
            } else {
                swal.close();
            }
        });
        
    });
    /* ***************************************************
    ==========Delete Using AJAX Request End==========
    ******************************************************/
    
    
    //  image (id) preview js/
    $(document).on('change', '#image', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.showImage img').attr('src', e.target.result);
        };
        
        reader.readAsDataURL(file);
    })
    //  image (class) preview js/
    $(document).on('change', '.image', function(event) {
        let $this = $(this);
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            $this.prev('.showImage').children('img').attr('src', e.target.result);
        };
        
        reader.readAsDataURL(file);
    });
    
    // datepicker & timepicker
    $("input.datepicker").datepicker();
    $('input.timepicker').timepicker();
    
    
    // select2
    $('.select2').select2();
    
    
    // Realtime Order Notification
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = false;
    
    var pusher = new Pusher(pusherAppKey, {
        cluster: pusherCluster
    });
    
    var channel = pusher.subscribe('order-placed-channel');
    channel.bind('order-placed-event', function(data) {
        if ($("#refreshOrder").length > 0) {
            $(".request-loader").addClass("show");
            $("#refreshOrder").load(location.href + " #refreshOrder", function() {
                $(".request-loader").removeClass("show");
            });
        }
        
        audio.play();
        
        // show notification
        var content = {};
        
        content.message = 'New Order Received!';
        content.title = 'Success';
        content.icon = 'fa fa-bell';
        
        $.notify(content, {
            type: 'success',
            placement: {
                from: 'top',
                align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            delay: 2000,
        });
    });


    var waiterCallChannel = pusher.subscribe('waiter-called-channel');
    waiterCallChannel.bind('waiter-called-event', function(data) {
        waiterCallAudio.play();
        
        // show notification
        var content = {};
        
        content.message = '<strong class="text-danger">Table - ' + data.table + '</strong> is calling for a waiter.';
        content.title = 'Call for a waiter!';
        content.icon = 'fa fa-bell';
        
        $.notify(content, {
            type: 'secondary',
            placement: {
                from: 'top',
                align: 'right'
            },
            delay: 0,
        });
    });
    
});