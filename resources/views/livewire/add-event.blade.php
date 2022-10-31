<div class="container">

@if(session()->has('success'))
    <div class="row">
    <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
@endif
@if($errors->all())
    @foreach($errors->all() as $error)
    <div class="row">
        <div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
            <strong>{{$error}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    @endforeach
@endif
<h4>ثیت رویداد :</h4>
         <br>
    <div class="row">
        <div class="col-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">نام رویداد</span>
            <input type="text" class="form-control" placeholder="نام برای رویداد انتخاب کنید" wire:model="name_input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">توضیح رویداد</span>
                <textarea class="form-control" placeholder="درباره رویداد توضیح بدید" wire:model="description_event" id="floatingTextarea2" style="height: 50px"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
        <button type="button" class="btn btn-outline-success" wire:click="add_event">ذخیره</button>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
        <div class="events-container">
        <span class="events__title">رویداد های امروز :</span>
        @forelse($events as $event)

        <ul class="events__list">
            <li class="events__item">
                <div class="events__item--left">
                <span class="events__name">{{$event['event']}}</span>
                <span class="events__date">{{$event['description']}}</span>
                </div>
                <span wire:click="delete_event({{$event['id']}})" class="danger__tag">حذف</span>
            </li>
            </ul>

            @empty
            <h4 class="events__title" style="color:red">رویدادی وجود ندارد</h4>
        @endforelse
      </div>
        </div>
    </div>

    @if ($events->count()>1)
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <input type="checkbox" name="holiday" class="btn-check"  id="btncheck" autocomplete="off" wire:click='delete_All_Events '>
            <label class="btn btn-outline-danger"  for="btncheck">حذف تمام رویداد های امروز</label>
        </div>
    </div>
    @endif




    <div class="row">
        <div class="col-6">
            @if($holiday_status)
            <input type="checkbox" name="holiday" class="btn-check"  id="btncheck" autocomplete="off" wire:click='set_holiday_today'>
            <label class="btn btn-outline-success"  for="btncheck">فعال کردن امروز</label>
            @else
            <input type="checkbox" name="holiday" class="btn-check"  id="btncheck" autocomplete="off" wire:click='set_holiday_today'>
            <label class="btn btn-outline-danger"  for="btncheck">تعطیل کردن امروز</label>
            @endif

        </div>
    </div>

</div>




