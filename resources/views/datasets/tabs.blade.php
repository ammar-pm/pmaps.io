<ul class="nav nav-tabs text-center">
	  <li class="nav-item active"><a href="#general" class="nav-link" data-toggle="tab"><i class="fa fa-clipboard fa-lg"></i><br>{{ __('common.general') }}</a></li>

	  @if($record->type != 'arcgis')

	  <li class="nav-item"><a href="#styles" class="nav-link" data-toggle="tab"><i class="fa fa-paint-brush fa-lg"></i><br> {{ __('common.styles') }}</a></li>
	  <li class="nav-item"><a href="#popup" class="nav-link" data-toggle="tab"><i class="fa fa-info-circle fa-lg"></i><br> {{ __('common.popup') }}</a></li>
	  @if(in_array($record->file_type, config('pmaps.csv')))
	  <li class="nav-item"><a href="/table/{{ isset($record->id) ? $record->id : "" }}" target="_blank" class="nav-link"><i class="fa fa-table fa-lg"></i><br> {{ __('common.table') }}</a></li>
	  @endif

	  @endif
</ul>
			       