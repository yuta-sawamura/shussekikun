<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Stripe\Stripe;
use App\User;
use App\Models\Organization;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->organization = Organization::find($this->user->organization_id);

            return $next($request);
        });
    }

    public function index()
    {
        if ($this->organization->premium_flg !== 1) {
            $type = 'subscribe';
        } elseif ($this->organization->premium_flg === 1 && $this->user->subscribed('main')) {
            $type = 'cancel';
        }

        return view('admin.subscription.index')->with([
            'type' => $type ?? null
        ]);
    }

    public function subscribe(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $this->user->newSubscription('main', env('STRIPE_PLAN_ID'))->create($request->stripeToken);
            $this->organization->premium_flg = 1;
            $this->organization->save();

            return redirect('admin/premium')->with('success_message', '支払いに成功しました。');
        } catch (\Exception $ex) {
            return redirect('admin/premium')->with('error_message', '支払いに失敗しました。');
        }
    }

    public function cancel(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $this->user->subscription('main')->cancelNow();
            $this->organization->premium_flg = null;
            $this->organization->save();

            return redirect('admin/premium')->with('success_message', '支払いをキャンセルしました。');
        } catch (\Exception $ex) {
            return redirect('admin/premium')->with('error_message', 'キャンセルに失敗しました。');
        }
    }
}
