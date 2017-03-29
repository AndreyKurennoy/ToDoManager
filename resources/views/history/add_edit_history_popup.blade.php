<form onsubmit='return false;' id='history-form' class='history-form'>
    <input type="hidden" id="id" name="id" value="{{isset($history->id) ? $history->id : ''}}">
    <div class="form-inline">
        <div class="form-group">
            <label for="date" class="col-sm-7 control-label">Дата</label>
            <div class="col-sm-5">
                <input size="16" value="{{isset($history->date) ? $history->date : ''}}" id="date" name="date"
                       class="form-control form_datetime" data-format="yyyy-MM-dd" placeholder="2017-03-15">
            </div>
        </div>
    </div>
    <div class="form-inline">
        <div class="form-group">
            <label for="description" class="col-sm-7 control-label">Описание</label>
            <div class="col-sm-5">
                <textarea name="description" id="description" cols="30" rows="10"
                          class="form-control">{{isset($history->description) ? $history->description : ''}}</textarea>
            </div>
        </div>
    </div>
    <button type="submit"
            @if(isset($history))
                class="btn btn-default update-news"
            @else
                class="btn btn-default save-news"
            @endif
    >
        @if(isset($history))
            Редактировать новость
        @else
            Добавить новость
        @endif
    </button>
</form>