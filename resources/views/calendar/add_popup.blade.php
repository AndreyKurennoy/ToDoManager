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
                <input size="16" type="text" name="date" id="date" value="{{$task->date}}" readonly placeholder="2017-03-15" class="form-control form_datetime">
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