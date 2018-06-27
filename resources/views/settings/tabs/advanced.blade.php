<div class="form-group">
  <label>{{ __('common.google_analytics_id') }}</label>
  <input type="text" class="form-control" name="settings[analytics]" value="{{ Config::get('analytics') }}">
</div>

<div class="form-group">
  <label>{{ __('common.fb_app_id') }}</label>
  <input type="text" class="form-control" name="settings[facebook_app]" value="{{ Config::get('facebook_app') }}">
</div>

<div class="form-group">
	<label>{{ __('common.custom_css') }}</label>
	<textarea class="form-control" name="settings[css]" rows="3">{{ Config::get('css') }}</textarea>
</div>

<div class="form-group">
	<label>{{ __('common.carto_username') }}</label>
	<input type="text" class="form-control" name="settings[carto_user]" value="{{ Config::get('carto_user') }}">
</div>

<div class="form-group">
	<label>{{ __('common.carto_api_key') }}</label>
	<input type="text" class="form-control" name="settings[carto_key]" value="{{ Config::get('carto_key') }}">
</div>

<div class="form-group">
	<label>{{ __('common.default_tileset_url') }}</label>
	<input type="text" class="form-control" name="settings[tileset]" value="{{ Config::get('tileset') }}">
</div>