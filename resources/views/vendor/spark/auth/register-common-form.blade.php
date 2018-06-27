<form class="form-horizontal" role="form">
    @if (Spark::usesTeams() && Spark::onlyTeamPlans())
        
        <div class="form-group" :class="{'has-error': registerForm.errors.has('team')}" v-if=" ! invitation">
            <label class="col-md-4 control-label">Organization</label>

            <div class="col-md-6">
                <input type="name" class="form-control" name="team" v-model="registerForm.team" autofocus>

                <span class="help-block" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
                </span>
            </div>
        </div>
    @endif   

    <!-- Team Slug (Only Shown When Using Paths For Teams) -->
    <!-- <div class="form-group" :class="{'has-error': registerForm.errors.has('team_slug')}" v-if=" ! invitation">
        <label class="col-md-4 control-label">Organization</label>

        <div class="col-md-6">
            <input type="name" class="form-control" name="team_slug" v-model="registerForm.team_slug" autofocus required>

            <span class="help-block" v-show="registerForm.errors.has('team_slug')">
                @{{ registerForm.errors.get('team_slug') }}
            </span>
        </div>
    </div> -->



    <!-- Name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('name')}">
        <label class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input type="name" class="form-control" name="name" v-model="registerForm.name" autofocus required>

            <span class="help-block" v-show="registerForm.errors.has('name')">
                @{{ registerForm.errors.get('name') }}
            </span>
        </div>
    </div>

    <!-- Email Address -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('email')}">
        <label class="col-md-4 control-label">Email</label>

        <div class="col-md-6">
            <input type="email" class="form-control" name="email" v-model="registerForm.email" required>

            <span class="help-block" v-show="registerForm.errors.has('email')">
                @{{ registerForm.errors.get('email') }}
            </span>
        </div>
    </div>

    <!-- Phone Number -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('phone')}">
        <label class="col-md-4 control-label">Phone</label>

        <div class="col-md-6">
            <input type="tel" class="form-control" name="phone" v-model="registerForm.phone" placeholder="+" required>

            <span class="help-block" v-show="registerForm.errors.has('phone')">
                @{{ registerForm.errors.get('phone') }}
            </span>
        </div>
    </div>


    <!-- Password -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password')}">
        <label class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password" v-model="registerForm.password" required>

            <span class="help-block" v-show="registerForm.errors.has('password')">
                @{{ registerForm.errors.get('password') }}
            </span>
        </div>
    </div>

    <!-- Password Confirmation -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password_confirmation')}">
        <label class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation" v-model="registerForm.password_confirmation" required>

            <span class="help-block" v-show="registerForm.errors.has('password_confirmation')">
                @{{ registerForm.errors.get('password_confirmation') }}
            </span>
        </div>
    </div>

    <div class="form-group" :class="{'has-error': registerForm.errors.has('usage')}">
        <label class="col-md-4 control-label">Usage</label>
        <div class="col-md-6">
        <select class="form-control" name="usage" v-model="registerForm.usage" required>
            <option value="" disabled>Please Select</option>
            @foreach(config('pmaps.usage') as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>

        <span class="help-block" v-show="registerForm.errors.has('usage')">
            @{{ registerForm.errors.get('usage') }}
        </span>

        </div>
    </div>

    <!-- Terms And Conditions -->
    <div v-if=" ! selectedPlan || selectedPlan.price == 0">
        <div class="form-group" :class="{'has-error': registerForm.errors.has('terms')}">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" v-model="registerForm.terms" required>
                        I Accept The <a href="/terms" target="_blank">Terms Of Service</a>. 
                    </label>

                    <span class="help-block" v-show="registerForm.errors.has('terms')">
                        @{{ registerForm.errors.get('terms') }}
                    </span>

                    <hr>

                     <p class="text-muted small">You'll receive provisional access until verification is completed.</p>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary btn-block" @click.prevent="register" :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Registering
                    </span>

                    <span v-else>
                        <i class="fa fa-btn fa-check-circle"></i>Register
                    </span>
                </button>

                <br>
                <p>Already have an account? <a href="/login">Login here</a>
            </div>
        </div>
    </div>
</form>
