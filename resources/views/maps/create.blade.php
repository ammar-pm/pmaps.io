      <p class="small text-uppercase">{{ __('common.addmap') }}</p>
      <div class="panel panel-default panel-body">
          <form action="/maps" method="POST">
          <input type="hidden" name="legendorder" id="legendsort" value=''>          
          @include('maps.form')
      </div>
      <!-- End Panel -->