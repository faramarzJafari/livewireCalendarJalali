<div>
          <!-- جستجوی رویداد بر مبنای  سرتیتر -->
          <!-- <label for="basic-url" class="form-label">جستجوی رویداد</label> -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">تیتر رویداد</span>
            <input wire:model="wordSearch" type="search" class="form-control" placeholder="جستجو" id="basic-url" aria-describedby="basic-addon3">
          </div>
         
          @if($events)
          <ul class="events__list">
          @foreach($events as $event)
         
            <li class="events__item">
              <div class="events__item--left">
              <a href="{{route('addEvent',['timestamp'=>$event->days->timestamp])}}" > 
                <span class="events__name">{{$event->event}}</span>
                <span class="events__date">{{$event->description}}</span>
                </a>
              </div>
              <div>
              <span class="danger__tag">{{$event->days->day}} / {{$event->days->month}}</span>
              </div>
            </li>
                    
          @endforeach
        </ul>
        @endif
</div>
