<?php

namespace App\Http\Controllers;

use App\Enums\AdminRole;
use App\Enums\OrderStatus;
use App\Enums\SupportStatus;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PromotionRequest;
use App\Jobs\SendMailCustomerCare;
use App\Mail\MailCustomerCare;
use App\Models\Admin;
use App\Models\Promotion;
use App\Models\Support;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function index(): View
    {
        $supports = Support::query()->orderBy('status')->orderByDesc('created_at')->paginate(10);

        return view('admin.support.index', [
            'supports' => $supports,
        ]);
    }

    public function response(Request $request, Support $support): RedirectResponse
    {
        $response = $request->get('response');
        $data = [
            'title' => 'Response from '.env('APP_NAME'),
            'response' => $response,
        ];
        $template = new MailCustomerCare($data);
        $mail = new SendMailCustomerCare($template, $support->email);
        dispatch($mail);
        $support->status = SupportStatus::SUCCESSFUL;
        $support->response = $response;
        $support->save();

        return redirect()->back();
    }

    public function filter(Support $support): RedirectResponse
    {
        $support->status = SupportStatus::FILTERED;
        $support->save();

        return redirect()->back();
    }


}
