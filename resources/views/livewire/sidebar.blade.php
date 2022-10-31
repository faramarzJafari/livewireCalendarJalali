<div>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">تنظیمات جدول</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <hr>
          @livewire('search')
      <hr>
      <div>
        <h5 >تعطیلی ایام روز :</h5>
      <div class="row">
           <div class="col-7">
            <input type="checkbox" wire:click="set_holiday_week('شنبه')" class="btn-check" id="btncheck1" autocomplete="off">
            <label class="btn btn-outline-danger " for="btncheck1">شنبه ها</label>
           </div>               
      </div>
       <div class="row">
         <div class="col-7">
          <input type="checkbox" wire:click="set_holiday_week('یکشنبه')" class="btn-check" id="btncheck2" autocomplete="off">
          <label class="btn btn-outline-danger" for="btncheck2">یکشنبه ها</label>
         </div>
       </div>
       <div class="row">
           <div class="col-7">
            <input type="checkbox" wire:click="set_holiday_week('دوشنبه')" class="btn-check" id="btncheck3" autocomplete="off">
            <label class="btn btn-outline-danger" for="btncheck3">دوشنبه ها</label>
           </div>
       </div>
       <div class="row">
       <div class="col-7">
            <input type="checkbox" wire:click="set_holiday_week('سه شنبه')" class="btn-check" id="btncheck4" autocomplete="off">
            <label class="btn btn-outline-danger" for="btncheck4">سه شنبه ها</label>
           </div>
       </div>
       <div class="row">
       <div class="col-7">
            <input type="checkbox" wire:click="set_holiday_week('چهارشنبه')" class="btn-check" id="btncheck5" autocomplete="off">
            <label class="btn btn-outline-danger" for="btncheck5">چهارشنبه ها</label>
           </div>
       </div>
       <div class="row">
       <div class="col-7">
            <input type="checkbox" wire:click="set_holiday_week('پنجشنبه')" class="btn-check" id="btncheck6" autocomplete="off">
            <label class="btn btn-outline-danger" for="btncheck6">پنجشنبه ها</label>
           </div>
       </div>
       <div class="row">
       <div class="col-7">
            <input type="checkbox" wire:click="set_holiday_week('جمعه')" class="btn-check" id="btncheck7" autocomplete="off">
            <label class="btn btn-outline-danger" for="btncheck7">جمعه ها</label>
           </div>
       </div>
    </div>
        
    </div>
   
  </div>
</div>
