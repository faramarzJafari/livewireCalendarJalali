
 
 <div class="container">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calendar</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>

  <div class="main-container-wrapper">
    <main>
      <div class="calendar-container">
        <div class="calendar-container__header">
          
          
          
          <button wire:click="previous_month" class="calendar-container__btn calendar-container__btn--right"  title="ماه قبل">
            <i class="icon ion-ios-arrow-forward"  ></i>
          </button>
          <h2 class="calendar-container__title">{{$month_of_year}} {{$year}}</h2>
          <button wire:click="next_month"  class="calendar-container__btn calendar-container__btn--left" title="ماه بعد">
            <i class="icon ion-ios-arrow-back"></i>
          </button>
        </div>
        <div class="calendar-container__body">
          <div class="calendar-table">
            <div class="calendar-table__header">
              <div class="calendar-table__row">
                <div class="calendar-table__col">شنبه</div>
                <div class="calendar-table__col">یکشنبه</div>
                <div class="calendar-table__col">دوشنبه</div>
                <div class="calendar-table__col">سه شنبه</div>
                <div class="calendar-table__col">چهارشنبه</div>
                <div class="calendar-table__col">پنج شنبه</div>
                <div class="calendar-table__col">جمعه</div>
              </div>
            </div>        

<div class="calendar-table__body">
      @php $count_num_day=0 @endphp
      @for($row_loop=0;$row_loop<$row;$row_loop++)
          <div class="calendar-table__row"> 
          @for($day_loop=1;$day_loop<=7;$day_loop++)

            @if($Calendar_Alignment[$count_num_day]['active']==1)
                  @if($Calendar_Alignment[$count_num_day]['istoday'])
                       
                        @if($Calendar_Alignment[$count_num_day]['event']==true)
                            <div class="calendar-table__col calendar-table__event calendar-table__today">
                            
                            <span class="a" wire:click="show_events({{$Calendar_Alignment[$count_num_day]['timestamp']}})">
                            <div class="calendar-table__item page__container" style="border-color:chartreuse; border-style:solid">
                              {{$Calendar_Alignment[$count_num_day]['day']}}
                            </div>
</span>
                            
                            </div>

                        @elseif($Calendar_Alignment[$count_num_day]['holiday']==true)
                            <div class="calendar-table__col calendar-table__holiday calendar-table__today">
                            
                            <span class="a" wire:click="show_events($Calendar_Alignment[$count_num_day]['timestamp'])">
                            <div class="calendar-table__item page__container" style="border-color:chartreuse; border-style:solid" >
                              {{$Calendar_Alignment[$count_num_day]['day']}}
                              </div>
                            </span>
                            
                            
                            </div>
                        @else
                            <div class="calendar-table__col"  >
                            <span class="a" wire:click="show_events({{$Calendar_Alignment[$count_num_day]['timestamp']}})">
                            <div class="calendar-table__item page__container" style="border-color:chartreuse; border-style:solid">
                              {{$Calendar_Alignment[$count_num_day]['day']}}
                              </div>
                            </span>
                            
                            
                            </div>
                        @endif

                  @else
                        @if($Calendar_Alignment[$count_num_day]['event']==true)
                            @if($Calendar_Alignment[$count_num_day]['holiday']==false)
                            <div class="calendar-table__col calendar-table__event">
                            
                            <span class="a" wire:click="show_events({{$Calendar_Alignment[$count_num_day]['timestamp']}})">
                            <div class="calendar-table__item page__container">
                              {{$Calendar_Alignment[$count_num_day]['day']}}
                              </div>
                            </span>
                            
                            
                            </div>
                            @endif
                            @if($Calendar_Alignment[$count_num_day]['holiday']==true)
                            <div class="calendar-table__col calendar-table__holiday">
                             
                                <span class="a" wire:click="show_events({{$Calendar_Alignment[$count_num_day]['timestamp']}})">
                                <div class="calendar-table__item page__container">
                                  {{$Calendar_Alignment[$count_num_day]['day']}}
                                  </div>
                                </span>
                            
                            
                            </div>
                            @endif
                        @elseif($Calendar_Alignment[$count_num_day]['holiday']==true)
                            <div class="calendar-table__col calendar-table__holiday">
                              
                                <span class="a" wire:click="show_events({{$Calendar_Alignment[$count_num_day]['timestamp']}})">
                                <div class="calendar-table__item page__container">
                                  {{$Calendar_Alignment[$count_num_day]['day']}}
                                  </div>
                                </span>
                            
                            
                            </div>
                        @else
                            <div class="calendar-table__col">
                              
                                <span class="a" wire:click="show_events({{$Calendar_Alignment[$count_num_day]['timestamp']}})">
                                <div class="calendar-table__item page__container">
                                  {{$Calendar_Alignment[$count_num_day]['day']}}
                                  </div>
                                </span>
                               
                              
                            </div>
                        @endif
                  @endif
            @elseif($Calendar_Alignment[$count_num_day]['active']==0)
              <div class="calendar-table__col calendar-table__inactive">
                
                  <span >
                  <div class="calendar-table__item page__container">
                    {{$Calendar_Alignment[$count_num_day]['day']}}
                    </div>
                  </span>
                  
                
              </div>

            @endif

            @php $count_num_day++ @endphp
      @endfor
      </div>
@endfor
              
                
            </div>
          </div>


          <div class="events-container">
        <span class="events__title">رویداد های این امروز :</span>
        <ul class="events__list">
          @forelse($events as $event)
            <li class="events__item">
              <div class="events__item--left">
                <span class="events__name">{{$event['event']}}</span>
                <span class="events__date">{{$event['description']}}</span>
              </div>
            </li>
          @empty
          <strong style="color: red;">رویدادی برای امروز وجود ندارد</strong>
          @endforelse
          
        </ul>
      </div>


    </main>
  </div>



  


</body>
</html></div>














