<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfessionalModel as Professional;
use DB;

use PayPal\Core\PPHttpConfig;
use PayPal\Service\AdaptivePaymentsService;
use PayPal\Types\AP\PayRequest;
use PayPal\Types\AP\Receiver;
use PayPal\Types\AP\ReceiverList;


class ProfessionalListingController extends Controller
{
    public function index()
    {
        $custom = true;
        $title = "Professional Listing";
        $professional_list = DB::table('tbl_professionals')->get();

        $search_list = array();
        $states = DB::table("states")->get();

        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }

        return view('frontend.pages.professional.index', compact('custom', 'professional_list', 'title', 'all_states', 'search_list'));
    }

    public function detailView($uid)
    {
        $user = Professional::where('user_id', '=', $uid)->get();
        return view('frontend.pages.professional.view', compact('user'));
    }


    public function config()
    {
        // Credentials
        // https://developer.paypal.com/developer/accounts/

        // AppId
        // https://www.paypal-apps.com/user/my-account/applications/manage#most_recent

        return [
            'mode' => 'sandbox',
            'acct1.AppId' => 'APP-80W284485P519543T',
            'acct1.UserName' => 'harinder_personal3_api1.techo13.com',
            'acct1.Password' => 'YCR6GFUSX9RR468D',
            'acct1.Signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AmK3cOCjjJz6KdYlHVigp.FRFA6N',
        ];
    }

    public function redirect($payKey = '')
    {
        $url = redirect('https://www.sandbox.paypal.com/webapps/adaptivepayment/flow/pay?expType=light&payKey='.$payKey);

        return $url;
    }


    public function professionalPay() {

        $requestEnvelope = ['errorLanguage' => 'fr_FR'];
        $actionType = 'PAY';
        $cancelUrl = 'http://localhost/hd/public/url-payment-cancel';
        $returnUrl = 'http://localhost/hd/public/url-payment-success';

        $currencyCode = 'EUR';

        // Your request
        $_POST['receiverEmail'] = ['someone@example.com'];
        $_POST['receiverAmount'] = ['3.00'];

        $receiver = [];
        for ($i = 0; $i < count($_POST['receiverEmail']); ++$i) {
            // Parallel Payments
            $receiver[$i] = new Receiver();
            $receiver[$i]->email = $_POST['receiverEmail'][$i];
            $receiver[$i]->amount = $_POST['receiverAmount'][$i];
        }
        $receiverList = new ReceiverList($receiver);
        $payRequest = new PayRequest($requestEnvelope, $actionType, $cancelUrl,
            $currencyCode, $receiverList, $returnUrl);

        // Set the correct the value 1, 3, 4, ...
        // PPHttpConfig::$DEFAULT_CURL_OPTS[CURLOPT_SSLVERSION] = 4;

        $config = $this->config();
        $service = new AdaptivePaymentsService($config);
        $response = $service->Pay($payRequest);

        if (strtoupper($response->responseEnvelope->ack) == 'FAILURE') {
            die($response->error);
        }
        if (strtoupper($response->responseEnvelope->ack) == 'SUCCESS') {
            print_r($response);
            // return $this->redirect($response->payKey);
        }

        die("end");
        // return view('payment.checkout');
    }
    
    
}
