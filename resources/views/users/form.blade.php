 <div class="form-group">
    <label>{{ __('common.name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $record->name or null }}" required>
</div>

<div class="form-group">
    <label>{{ __('common.email') }}</label>
    <input type="email" class="form-control" name="email" value="{{ $record->email or null }}" required>
</div>

<div class="form-group">
    <label>{{ __('common.phone') }}</label>
    <input type="text" class="form-control" name="phone" value="{{ $record->phone or null }}" required>
</div>