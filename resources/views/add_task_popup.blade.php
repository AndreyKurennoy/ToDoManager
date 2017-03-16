@if(isset($task))
    <form onsubmit='return false;' id='add-task-form' class='add-task-form'>
        <input type="hidden" id="id" name="id" value="{{$task->id}}">
        <div class="form-inline">
            <div class="form-group">
                <label for="title" class="col-sm-7 control-label">Название</label>
                <div class="col-sm-5">
                    <input class="form-control" id="title" name="title" value="{{$task->title}}">
                </div>
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label for="date" class="col-sm-6 control-label">Дата в формате:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="date" id="date" placeholder="2017-03-15"
                           value="{{$task->date}}">
                </div>
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label for="description" class="col-sm-6 control-label">Описание</label>
                <div class="col-sm-6">
                <textarea name="description" id="description" cols="30" rows="10"
                          class="form-control">{{$task->description}}</textarea>
                </div>
            </div>
        </div>
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
@else
    <form onsubmit='return false;' id='add-task-form' class='add-task-form'>
        <div class="form-inline">
            <div class="form-group">
                <label for="title" class="col-sm-7 control-label">Название</label>
                <div class="col-sm-5">
                    <input class="form-control" id="title" name="title">
                </div>
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label for="date" class="col-sm-6 control-label">Дата в формате:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="date" id="date" placeholder="2017-03-15">
                </div>
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label for="description" class="col-sm-6 control-label">Описание</label>
                <div class="col-sm-6">
                <textarea name="description" id="description" cols="30" rows="10"
                          class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="status"> Я - выполненая задача! </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default save-task">Send invitation</button>
    </form>
@endif
