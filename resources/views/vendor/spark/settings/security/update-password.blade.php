<spark-update-password inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">{{ __('common.updatepassword') }}</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                {{ __('common.passwordupdated') }}
            </div>

            <form class="form-horizontal" role="form">
                <!-- Current Password -->
                <div class="form-group" :class="{'has-error': form.errors.has('current_password')}">
                    <label class="col-md-4 control-label">{{ __('common.currentpassword') }}</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="current_password" v-model="form.current_password">

                        <span class="help-block" v-show="form.errors.has('current_password')">
                            @{{ form.errors.get('current_password') }}
                        </span>
                    </div>
                </div>

                <!-- New Password -->
                <div class="form-group" :class="{'has-error': form.errors.has('password')}">
                    <label class="col-md-4 control-label">{{ __('common.password') }}</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password" v-model="form.password">

                        <span class="help-block" v-show="form.errors.has('password')">
                            @{{ form.errors.get('password') }}
                        </span>
                    </div>
                </div>

                <!-- New Password Confirmation -->
                <div class="form-group" :class="{'has-error': form.errors.has('password_confirmation')}">
                    <label class="col-md-4 control-label">{{ __('common.confirmpassword') }}</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation" v-model="form.password_confirmation">

                        <span class="help-block" v-show="form.errors.has('password_confirmation')">
                            @{{ form.errors.get('password_confirmation') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            {{ __('common.update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-password>
