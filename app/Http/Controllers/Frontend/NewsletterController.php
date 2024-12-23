<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionVerification;
use App\Models\NewsletterSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class NewsletterController extends Controller
{
    public function newsLetterRequest(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $existSubscriber = NewsletterSubscribe::where('email', $request->email)->first();

        if (!empty($existSubscriber)) {
            if ($existSubscriber->is_verified == 0) {
                $existSubscriber->verified_token = Str::random(25);
                $existSubscriber->save();
                 // set mail config
                MailHelper::setMailConfig();
                // send mail
                Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));
                return response(['status' => 'success', 'message' => 'A verification link has been sent to your email please check']);
            }elseif ($existSubscriber->is_verified == 1) {
                return response(['status' => 'error', 'message' => 'You Already Subscribed With this Email.']);
            }
        }else {
            $subscriber = new NewsletterSubscribe();
            $subscriber->email = $request->email;
            $subscriber->verified_token = Str::random(25);
            $subscriber->is_verified = 0;
            $subscriber->save();

            // set mail config
            MailHelper::setMailConfig();

            // send mail
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));
            return response(['status' => 'success', 'message' => 'A Verification link has been Sent to your Email. Please Check.']);
        }
    }

    public function newsLetterEmailVerify($token){
        $verify = NewsletterSubscribe::where('verified_token', $token)->first();

        if ($verify) {
            $verify->verified_token = 'verified';
            $verify->is_verified = 1;
            $verify->save();

            toastr()->success('Email Verification Successfully');
            return redirect()->route('home');
        }else{
            toastr()->error('Invalid Token');
            return redirect()->route('home');
        }
    }
}
