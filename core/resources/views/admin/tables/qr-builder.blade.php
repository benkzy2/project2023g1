@extends('admin.layout')



@section('sidebar', 'overlay-sidebar')



@section('content')

  <div class="page-header">

    <h4 class="page-title">QR Builder</h4>

    <ul class="breadcrumbs">

      <li class="nav-home">

        <a href="{{route('admin.dashboard')}}">

          <i class="flaticon-home"></i>

        </a>

      </li>

      <li class="separator">

        <i class="flaticon-right-arrow"></i>

      </li>

      <li class="nav-item">

        <a href="#">Tables</a>

      </li>

      <li class="separator">

        <i class="flaticon-right-arrow"></i>

      </li>

      <li class="nav-item">

        <a href="#">Table - {{$table->table_no}}</a>

      </li>

      <li class="separator">

        <i class="flaticon-right-arrow"></i>

      </li>

      <li class="nav-item">

        <a href="#">QR Builder</a>

      </li>

    </ul>

    <a href="{{route('admin.table.index')}}" class="btn btn-primary" style="position: absolute; right: 50px;">Back</a>

  </div>

  <div class="row">

    <div class="col-lg-3">

      <div class="card">

          <div class="card-header">

              <h4 class="card-title">Qr Code Generator</h4>

          </div>

          <div class="card-body">

              <form id="qrGeneratorForm" method="POST" enctype="multipart/form-data">

                  @csrf

                  <input type="hidden" name="table_id" value="{{$table->id}}">

                  <div class="form-group">

                      <label for="">Color</label>

                      <input type="text" class="form-control jscolor" name="color" value="{{$table->color}}" onchange="generateQr()">
                      <p class="mb-0 text-warning">If the QR Code cannnot be scanned, then choose a darker color</p>

                  </div>

                  <div class="form-group">

                      <label for="">Size</label>

                      <input class="form-control p-0 range-slider" name="size" type="range" min="200" max="350" value="{{$table->size}}" onchange="generateQr()">

                      <span class="text-white size-text float-right">{{$table->size}}</span>

                  </div>

                  <div class="form-group">

                      <label for="">White Space</label>

                      <input class="form-control p-0 range-slider" name="margin" type="range" min="0" max="5" value="{{$table->margin}}" onchange="generateQr()">

                      <span class="text-white size-text float-right">{{$table->margin}}</span>

                  </div>

                  <div class="form-group">

                      <label for="">Style</label>

                      <select name="style" class="form-control" onchange="generateQr()">

                          <option value="square" {{$table->style == 'square' ? 'selected' : ''}}>Square</option>

                          <option value="round" {{$table->style == 'round' ? 'selected' : ''}}>Round</option>

                      </select>

                  </div>

                  <div class="form-group">

                      <label for="">Eye Style</label>

                      <select name="eye_style" class="form-control" onchange="generateQr()">

                          <option value="square" {{$table->eye_style == 'square' ? 'selected' : ''}}>Square</option>

                          <option value="circle" {{$table->eye_style == 'circle' ? 'selected' : ''}}>Circle</option>

                      </select>

                  </div>

                  <div class="form-group">

                      <label for="">Type</label>

                      <select name="type" class="form-control" onchange="generateQr()">

                          <option value="default" {{$table->type == 'default' ? 'selected' : ''}}>Default</option>
                          <option value="image" {{$table->type == 'image' ? 'selected' : ''}}>Image</option>
                          <option value="text" {{$table->type == 'text' ? 'selected' : ''}}>Text</option>

                      </select>

                  </div>


                  <div id="type-image" class="types">
                      <div class="form-group">

                        <div class="col-12 mb-2">

                          <label for="image"><strong> Image</strong></label>

                        </div>

                        <div class="col-md-12 showImage mb-3">

                          <img src="{{$table->image ? asset('assets/admin/img/tables/'.$table->image) :  asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail qr">

                        </div>

                        <input type="file" name="image" id="image" class="form-control" onchange="generateQr()">

                      </div>

                      <div class="form-group">

                          <label for="">Image Size</label>

                          <input class="form-control p-0 range-slider" name="image_size" type="range" min="1" max="20" value="{{$table->image_size}}" onchange="generateQr()">

                          <span class="text-white size-text float-right d-block">{{$table->image_size}}</span>
                          <p class="mb-0 text-warning">If the QR Code cannnot be scanned, then reduce this size</p>

                      </div>

                      <div class="form-group">

                          <label for="">Image Horizontal Poistion</label>

                          <input class="form-control p-0 range-slider" name="image_x" type="range" min="0" max="100" value="{{$table->image_x}}" onchange="generateQr()">

                          <span class="text-white size-text float-right">{{$table->image_x}}</span>

                      </div>

                      <div class="form-group">

                          <label for="">Image Vertical Position</label>

                          <input class="form-control p-0 range-slider" name="image_y" type="range" min="0" max="100" value="{{$table->image_y}}" onchange="generateQr()">

                          <span class="text-white size-text float-right">{{$table->image_y}}</span>

                      </div>
                  </div>


                  <div id="type-text" class="types">
                      <div class="form-group">

                        <label>Text</label>

                        <input type="text" name="text" value="{{$table->text}}" class="form-control" onchange="generateQr()">

                      </div>

                      <div class="form-group">

                        <label>Text Color</label>

                        <input type="text" name="text_color" value="{{$table->text_color}}" class="form-control jscolor" onchange="generateQr()">

                      </div>

                      <div class="form-group">

                          <label for="">Text Size</label>

                          <input class="form-control p-0 range-slider" name="text_size" type="range" min="1" max="15" value="{{$table->text_size}}" onchange="generateQr()">

                          <span class="text-white size-text float-right d-block">{{$table->text_size}}</span>
                          <p class="mb-0 text-warning">If the QR Code cannnot be scanned, then reduce this size</p>

                      </div>

                      <div class="form-group">

                          <label for="">Text Horizontal Poistion</label>

                          <input class="form-control p-0 range-slider" name="text_x" type="range" min="0" max="100" value="{{$table->text_x}}" onchange="generateQr()">

                          <span class="text-white size-text float-right">{{$table->text_x}}</span>

                      </div>

                      <div class="form-group">

                          <label for="">Text Vertical Position</label>

                          <input class="form-control p-0 range-slider" name="text_y" type="range" min="0" max="100" value="{{$table->text_y}}" onchange="generateQr()">

                          <span class="text-white size-text float-right">{{$table->text_y}}</span>

                      </div>
                  </div>


              </form>

          </div>

      </div>



    </div>

    <div class="col-lg-5">
        <div class="card bg-white">

            <div class="card-header" style="border-bottom: 1px solid #ebecec!important;">

                <h4 class="card-title" style="color: #575962;">Preview</h4>

            </div>

            <div class="card-body text-center py-5">

                <div class="p-3 border-rounded d-inline-block border" style="background-color: #f8f9fa!important;">

                    <img id="preview" src="{{asset('assets/admin/img/tables/' . $table->qr_image)}}" alt="">

                </div>

            </div>
            <div class="card-footer text-center" style="border-top: 1px solid #ebecec!important;">
              <a id="downloadBtn" class="btn btn-success" download="qr-image.png" href="{{asset('assets/admin/img/tables/' . $table->qr_image)}}">Download Image</a>
            </div>
        </div>
        <span id="text-size" style="visibility: hidden;">{{$table->text}}</span>

    </div>


    <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title d-flex justify-content-between"><span>Included QR Code Banners (PSDs)</span> <a class="btn btn-success" href="{{asset('assets/admin/img/qr_banners/QR_Banners_PSDs.zip')}}" download="qr_banners_psds.zip">Download</a></h5>
          </div>
          <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('assets/admin/img/qr_banners/1.png')}}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/admin/img/qr_banners/2.png')}}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/admin/img/qr_banners/3.png')}}" alt="First slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          </div>
          <div class="card-footer text-center">
            <a class="btn btn-success" href="{{asset('assets/admin/img/qr_banners/QR_Banners_PSDs.zip')}}" download="qr_banners_psds.zip">Download PSDs</a>
          </div>
        </div>

      </div>
  </div>



@endsection



@section('scripts')

  <script type="text/javascript">
      function loadDiv(type) {

        $(".types").removeClass('d-block');
        $(".types").addClass('d-none');

        $("#" + "type-" + type).removeClass("d-none");
        $("#" + "type-" + type).addClass("d-block");
      }


      $(document).ready(function() {

        let type = $("select[name='type']").val();
        loadDiv(type);


        $(".range-slider").on("input", function() {

            $(this).next(".size-text").html($(this).val());

        });

      });

      function generateQr() {

          loadDiv($("select[name='type']").val());
          $(".request-loader").addClass('show');


          let fd = new FormData(document.getElementById('qrGeneratorForm'));

          fd.append('size', $("input[name='size']").val());

          fd.append('margin', $("input[name='margin']").val());

          fd.append('image_size', $("input[name='image_size']").val());

          fd.append('image_x', $("input[name='image_x']").val());

          fd.append('image_y', $("input[name='image_y']").val());
          if ($("select[name='type']").val() == 'text') {
            $("#text-size").text($("input[name='text']").val());
            let fontSize = ($("input[name='size']").val() * $("input[name='text_size']").val()) / 100;
            $("#text-size").css("font-size", fontSize);

            let textWidth = $("#text-size").width() == 0 ? 1 : $("#text-size").width();

            fd.append('text_width', textWidth);
          }



          $(".range-slider").attr('disabled', true);



          $.ajax({

              url: "{{route('admin.table.qrgenerate')}}",

              type: 'POST',

              data: fd,

              contentType: false,

              processData: false,

              success: function(data) {

                $(".request-loader").removeClass('show');

                $(".range-slider").attr('disabled', false);

                $("#preview").attr('src', data);
                $("#downloadBtn").attr('href', data);

              }

          });

      }

  </script>

@endsection

