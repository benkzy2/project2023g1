@foreach ($inputs as $key => $input)
    {{-- input type text --}}
    @if ($input->type == 1)
        <form class="ui-state-default" action="{{ route('admin.reservation.inputDelete') }}" method="post"
            data-id="{{ $input->id }}" data-id="{{ $input->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="input_id" value="{{ $input->id }}">
            <div class="form-group">
                <label for="">{{ $input->label }} @if ($input->required == 1)
                        <span>**</span>
                    @elseif($input->required == 0)
                        (Optional)
                    @endif
                </label>
                <div class="row">
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="" value=""
                            placeholder="{{ $input->placeholder }}">
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('admin.reservation.inputEdit', $input->id) . '?language=' . request()->input('language') }}"
                            target="_blank">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @elseif ($input->type == 7)
        <form class="ui-state-default" action="{{ route('admin.reservation.inputDelete') }}" method="post"
            data-id="{{ $input->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="input_id" value="{{ $input->id }}">
            <div class="form-group">
                <label for="">{{ $input->label }} @if ($input->required == 1)
                        <span>**</span>
                    @elseif($input->required == 0)
                        (Optional)
                    @endif
                </label>
                <div class="row">
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="" value=""
                            placeholder="{{ $input->placeholder }}">
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('admin.reservation.inputEdit', $input->id) . '?language=' . request()->input('language') }}"
                            target="_blank">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @elseif ($input->type == 2)
        <form class="ui-state-default" action="{{ route('admin.reservation.inputDelete') }}" method="post"
            data-id="{{ $input->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="input_id" value="{{ $input->id }}">
            <div class="form-group">
                <label for="">{{ $input->label }} @if ($input->required == 1)
                        <span>**</span>
                    @elseif($input->required == 0)
                        (Optional)
                    @endif
                </label>
                <div class="row">
                    <div class="col-md-10">
                        <select class="form-control" name="">
                            <option value="" selected disabled>{{ $input->placeholder }}</option>
                            @foreach ($input->reservation_input_options as $key => $option)
                                <option value="">{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-1">
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('admin.reservation.inputEdit', $input->id) . '?language=' . request()->input('language') }}"
                            target="_blank">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @elseif ($input->type == 3)
        <form class="ui-state-default" action="{{ route('admin.reservation.inputDelete') }}" method="post"
            data-id="{{ $input->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="input_id" value="{{ $input->id }}">
            <div class="form-group">
                <label for="">{{ $input->label }} @if ($input->required == 1)
                        <span>**</span>
                    @elseif($input->required == 0)
                        (Optional)
                    @endif
                </label>
                <div class="row">
                    <div class="col-md-10">
                        @foreach ($input->reservation_input_options as $key => $option)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="customRadio{{ $option->id }}" name="customRadio"
                                    class="custom-control-input">
                                <label class="custom-control-label"
                                    for="customRadio{{ $option->id }}">{{ $option->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('admin.reservation.inputEdit', $input->id) . '?language=' . request()->input('language') }}"
                            target="_blank">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @elseif ($input->type == 4)
        <form class="ui-state-default" action="{{ route('admin.reservation.inputDelete') }}" method="post"
            data-id="{{ $input->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="input_id" value="{{ $input->id }}">
            <div class="form-group">
                <label for="">{{ $input->label }} @if ($input->required == 1)
                        <span>**</span>
                    @elseif($input->required == 0)
                        (Optional)
                    @endif
                </label>
                <div class="row">
                    <div class="col-md-10">
                        <textarea class="form-control" name="" rows="5" cols="80" placeholder="{{ $input->placeholder }}"></textarea>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('admin.reservation.inputEdit', $input->id) . '?language=' . request()->input('language') }}"
                            target="_blank">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @elseif ($input->type == 5)
        <form class="ui-state-default" action="{{ route('admin.reservation.inputDelete') }}" method="post"
            data-id="{{ $input->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="input_id" value="{{ $input->id }}">
            <div class="form-group">
                <label for="">{{ $input->label }} @if ($input->required == 1)
                        <span>**</span>
                    @elseif($input->required == 0)
                        (Optional)
                    @endif
                </label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control datepicker" autocomplete="off"
                            placeholder="{{ $input->placeholder }}">
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('admin.reservation.inputEdit', $input->id) . '?language=' . request()->input('language') }}"
                            target="_blank">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @elseif ($input->type == 6)
        <form class="ui-state-default" action="{{ route('admin.reservation.inputDelete') }}" method="post"
            data-id="{{ $input->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="input_id" value="{{ $input->id }}">
            <div class="form-group">
                <label for="">{{ $input->label }} @if ($input->required == 1)
                        <span>**</span>
                    @elseif($input->required == 0)
                        (Optional)
                    @endif
                </label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control timepicker" autocomplete="off"
                            placeholder="{{ $input->placeholder }}">
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('admin.reservation.inputEdit', $input->id) . '?language=' . request()->input('language') }}"
                            target="_blank">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endforeach
