<form onsubmit='return false;' id='add-task-form' class ='add-task-form'>
    @if(isset($task))
        <input type="hidden" id="id" name="id" value="{{$task->id}}">
    @endif
    <div class="form-inline">
        <div class="form-group">
            <label for="title" class="col-sm-7 control-label">Название</label>
            <div class="col-sm-5">
                <input class="form-control" id="title" name="title" value="{{isset($task) ? $task->title : ''}}">
            </div>
        </div>
    </div>
    <div class="form-inline">
        <div class="form-group">
            <label for="date" class="col-sm-6 control-label">Дата в формате:</label>
            <div class="col-sm-5">
                <input class="form-control" name="date" id="date" placeholder="2017-03-15" value="{{isset($task) ? $task->date : ''}}">
            </div>
        </div>
    </div>
    <div class="form-inline">
        <div class="form-group">
            <label for="description" class="col-sm-6 control-label">Описание</label>
            <div class="col-sm-6">
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{isset($task) ? $task->description : ''}}</textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-default {{isset($task) ? 'edit-task' : 'save-task'}}">Send invitation</button>
    <button class="btn btn-danger {{isset($task) ? 'remove' : ''}}">Remove</button>
</form>
