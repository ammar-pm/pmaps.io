<?php

namespace App\Providers;

use Config;
use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;
use Carbon\Carbon;
use Mail;
use App\Mail\RegisterNotify;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'pMaps',
        'product' => 'pMaps',
        'street' => '14 Nablus Road',
        'location' => 'Palestine',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'info@pmaps.io';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [ 'ibrahim@hellodeveloper.com', 'moad@hellodeveloper.com', 'anada@quartetoffice.org', 'lkuttab@quartetoffice.org'
        //
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront();

        Spark::freeTeamPlan()
            ->features([
                'Community Maps', 'Unlimited Users', 'Unlimited Maps'
            ]);


        Spark::validateUsersWith(function () {
            return [
                'name'      => 'required|max:255',
                'usage'    => 'required',
                'email'     => 'required|email|max:255|unique:users',
                'phone'     => 'required|numeric',
                'password'  => 'required|confirmed|min:6',
                'vat_id'    => 'max:50|vat_id',
                'terms'     => 'required|accepted',
            ];
        });

        Spark::createUsersWith(function ($request) {
            $user = Spark::user();
            $data = $request->all();
            $user->forceFill([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'usage' => $data['usage'],
                'password' => bcrypt($data['password']),
                'last_read_announcements_at' => Carbon::now(),
                'trial_ends_at' => Carbon::now()->addDays(Spark::trialDays()),
            ])->save();

            Mail::to(Config::get('email'))->send(new RegisterNotify($user));

            return $user;
        });

        Spark::noAdditionalTeams();

    }
}
