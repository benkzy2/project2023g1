
<div class="card">
    <div class="card-header">
      <div class="card-title">Create Input</div>
    </div>

    <form id="ajaxForm" action="{{route('admin.reservation.form.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="language_id" value="{{$lang_id}}">
        <div class="form-group">
            <label for=""><strong>Field Type</strong></label>
            <div class="">
                <div class="form-check form-check-inline">
                    <input name="type" class="form-check-input" type="radio" id="inlineRadio1" value="1" v-model="type" @change="typeChange()">
                    <label class="form-check-label" for="inlineRadio1">Text Field</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="type" class="form-check-input" type="radio" id="inlineRadio7" value="7" v-model="type" @change="typeChange()">
                    <label class="form-check-label" for="inlineRadio7">Number Field</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="type" class="form-check-input" type="radio" id="inlineRadio2" value="2" v-model="type" @change="typeChange()">
                    <label class="form-check-label" for="inlineRadio2">Select</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="type" class="form-check-input" type="radio" id="inlineRadio3" value="3" v-model="type" @change="typeChange()">
                    <label class="form-check-label" for="inlineRadio3">Checkbox</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="type" class="form-check-input" type="radio" id="inlineRadio4" value="4" v-model="type" @change="typeChange()">
                    <label class="form-check-label" for="inlineRadio4">Textarea</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="type" class="form-check-input" type="radio" id="inlineRadio5" value="5" v-model="type" @change="typeChange()">
                    <label class="form-check-label" for="inlineRadio5">Datepicker</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="type" class="form-check-input" type="radio" id="inlineRadio6" value="6" v-model="type" @change="typeChange()">
                    <label class="form-check-label" for="inlineRadio6">Timepicker</label>
                </div>
            </div>
            <p id="errtype" class="mb-0 text-danger em"></p>
        </div>

        <div class="form-group">
            <label>Required</label>
            <div class="selectgroup w-100">
                <label class="selectgroup-item">
                    <input type="radio" name="required" value="1" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Yes</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="required" value="0" class="selectgroup-input">
                    <span class="selectgroup-button">No</span>
                </label>
            </div>
            <p id="errrequired" class="mb-0 text-danger em"></p>
        </div>

        <div class="form-group">
            <label for=""><strong>Label Name</strong></label>
            <div class="">
                <input type="text" class="form-control" name="label" value="" placeholder="Enter Label Name">
            </div>
            <p id="errlabel" class="mb-0 text-danger em"></p>
        </div>

        <div class="form-group" v-if="placeholdershow">
            <label for=""><strong>Placeholder</strong></label>
            <div class="">
                <input type="text" class="form-control" name="placeholder" value="" placeholder="Enter Placeholder">
            </div>
            <p id="errplaceholder" class="mb-0 text-danger em"></p>
        </div>


        <div class="form-group" v-if="counter > 0" id="optionarea">
            <label for=""><strong>Options</strong></label>
            <div class="row mb-2 counterrow" v-for="n in counter" :id="'counterrow'+n">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="options[]" value="" placeholder="Option label">
                </div>

                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-md text-white btn-sm" @click="removeOption(n)"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <p id="erroptions.0" class="mb-2 text-danger em"></p>
            <button type="button" class="btn btn-success btn-sm text-white" @click="addOption()"><i class="fa fa-plus"></i> Add Option</button>
        </div>


        <div class="form-group text-center">
            <button id="submitBtn" type="submit" class="btn btn-primary btn-sm">ADD FIELD</button>
        </div>
    </form>

</div>
