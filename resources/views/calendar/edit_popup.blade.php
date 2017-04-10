<form onsubmit='return false;' id='add-task-form' class='add-task-form'>
    <input type="hidden" id="id" name="id" value="{{$task->id}}">
    <div class="form-inline">
        <div class="form-group">
            <div class="col-sm-8">
                <label for="title" class="control-label">Название</label>
            </div>
            <div class="col-sm-4">
                <input size="16" class="form-control" id="title" name="title" value="{{$task->title}}" @if($task->date < date('Y-m-d')) disabled @endif>
            </div>
        </div>
    </div>
    <div class="form-inline">
        <div class="form-group">
            <label for="date" class="col-sm-7 control-label">Дата в формате:</label>
            <div class="col-sm-5">
                <input size="16" type="text" name="date" id="date" value="{{$task->date}}" data-format="yyyy-MM-dd"
                       placeholder="2017-03-15" class="form-control form_datetime" @if($task->date < date('Y-m-d')) disabled @endif>
            </div>
        </div>
    </div>
    <div class="form-inline">
        <div class="form-group">
            <label for="description" class="col-sm-6 control-label">Описание</label>
            <div class="col-sm-6">
                <textarea name="description" id="description" cols="30" rows="10"
                          class="form-control" @if($task->date < date('Y-m-d')) disabled @endif>{{$task->description}}</textarea>
            </div>
        </div>
    </div>
    <select name="category_id">
        <option selected value="">Категория</option>
        @foreach($categories as $value)
            @if($task->category_id == $value->id){
            <option selected style="background-color: {{$value->color}};" value="{{$value->id}}">{{$value->title}}</option>
            }
            @endif
            <option style="background-color: {{$value->color}};" value="{{$value->id}}">{{$value->title}}</option>
        @endforeach
    </select>
    <div class="form-inline">
        <div class="form-group">
            <div class="checkbox">
                <label><input type="checkbox" name="status" {{$task->status == 1 ? 'checked="checked"' : ''}}> Я -
                    выполненая задача! </label>
            </div>
        </div>
    </div>

    @if($task->date >= date('Y-m-d'))
        <button type="submit" class="btn btn-default edit-task">Send invitation</button>
        <button class="btn btn-danger remove">Remove</button>
    @endif


</form>