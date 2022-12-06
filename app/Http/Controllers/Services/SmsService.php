<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsService extends Controller
{
    protected $url = "https://mobile.net.sa/sms/gw/";
    protected $userName = '966553255011';
    protected $userPassword = '258076';
    protected $numbers = '966597555447, 966597000855';
    protected $userSender = 'Al_madar'; #Indvidual Al_madar #Collection Al_madar_AD
    protected $msg = 'اختبار نظام الرسائل الفورية';
    protected $by = 'standard';
    protected $infos = 'YES';
    protected $YesRepeat = 1;
    protected $dateTimeSendLater = '2014-12-30--23:59:00';
    protected $xml = '';

    public function send($user)
    {
        $data =  array(
            'userName' => $this->userName,
            'userPassword' => $this->userPassword,
            'userSender' => $this->userSender,
            'numbers' => $this->numbers,
            'msg' => "كود التحقق: $user->verification_code",
            'By' => $this->by
        );

        return Http::get($this->url, $data)->json();
    }

    public function collection($customers, $marketers, $officers, $message, $option = null)
    {
        $this->setNumbers($customers, $marketers, $officers);

        $this->userSender = "Al_madar-AD";

        $dataPOST =  array(
            'userName' => $this->userName,
            'userPassword' => $this->userPassword,
            'userSender' => $this->userSender,
            'numbers' => $this->numbers,
            'msg' => $message,
            'By' => $this->by
        );

        if ($option == 'repeat') {
            $dataPOST['YesRepeat'] = $this->YesRepeat;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPOST);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        // curl_setopt($ch, CURLE_HTTP_NOT_FOUND, 1);
        $FainalResult = curl_exec($ch);
        curl_close($ch);

        return $FainalResult;
    }

    public function sendInd($numbers, $message, $option = null)
    {
        $customers_phones = Customer::findMany($numbers)->pluck('phone')->toArray();

        $this->userSender = "Al_madar";

        $numbers_json_string = json_encode($customers_phones);

        $search = ['[', ']', '"0', '"'];

        $replace = ['', '', '966', ''];

        $this->numbers = str_replace($search, $replace, $numbers_json_string);

        $dataPOST =  array(
            'userName' => $this->userName,
            'userPassword' => $this->userPassword,
            'userSender' => $this->userSender,
            'numbers' => $this->numbers,
            'msg' => $message,
            'By' => $this->by
        );

        if ($option == 'repeat') {
            $dataPOST['YesRepeat'] = $this->YesRepeat;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPOST);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        // curl_setopt($ch, CURLE_HTTP_NOT_FOUND, 1);
        $FainalResult = curl_exec($ch);
        curl_close($ch);

        return $FainalResult;
    }


    public function errors($SendingResult)
    {
        if ($SendingResult == "1") {
            return "تم إرسال الرسالة بنجاح";
        } elseif ($SendingResult == "1010") {
            return "معلومات ناقصة.. اسم المستخدم أو كلمة المرور أو في محتوى الرسالة أو الرقم";
        } elseif ($SendingResult == "1020") {
            return "بيانات الدخول خاطئة";
        } elseif ($SendingResult == "1030") {
            return "نفس الرسالة مع نفس الاتجاه توجد في الملحق، انتظر عشر ثواني قبل إعادة إرسالها";
        } elseif ($SendingResult == "1040") {
            return "حروف غير معترف بها ";
        } elseif ($SendingResult == "1050") {
            return "الرسالة فارغة، السبب:الانتقاء قد سبب حذف محتوى الرسالة";
        } elseif ($SendingResult == "1060") {
            return "اعتماد غير كافي لعميلة الإرسال";
        } elseif ($SendingResult == "1070") {
            return "رصيدك 0 ، غير كافي لعملية الإرسال";
        } elseif ($SendingResult == "1080") {
            return "رسالة غير مرسلة ، خطأ في عملية إرسال رسالة";
        } elseif ($SendingResult == "1090") {
            return "تكرير عملية الانتقاء أنتج الرسالة";
        } elseif ($SendingResult == "1100") {
            return "عذرا ، لم يتم إرسال الرسالة. حاول في وقت لاحق";
        } elseif ($SendingResult == "1110") {
            return "عذرا، هناك اسم مرسل خاطئ ثم استعماله، حاول من جديد تصحيح الاسم";
        } elseif ($SendingResult == "1120") {
            return "عذرا ، هذا البلد الذي تحاول الإرسال له لا تشمله شبكتنا";
        } elseif ($SendingResult == "1130") {
            return "عذرا، راجع المشرف على شبكاتنا باعتبار الشبكة المحددة في حسابكم";
        } elseif ($SendingResult == "1140") {
            return "عذرا ، تجاوزت الحد الأقصى لأجزاء الرسائل. حاول إرسال عدد أقل من الأجزاء";
        } elseif ($SendingResult == "1150") {
            return "هذه الرسالة مكررة بنفس رقم الجوال واسم المرسل ونص الرسالة";
        } elseif ($SendingResult == "1160") {
            return "هناك مشكلة في مدخلات تاريخ وتوقيت الإرسال اللاحق";
        } else {
            return $SendingResult;
        }
    }

    public function setNumbers($customers, $marketers, $officers,)
    {
        $customers_phones = [];
        $marketers_phones = [];
        $officers_phones = [];

        if ($customers) {
            $customers_phones = Customer::where('status', 1)->get()->pluck('phone')->toArray();
        }

        if ($marketers) {
            $marketers_phones = User::where('user_type', 'marketer')->where('user_status', 'active')->get()->pluck('phone')->toArray();
        }

        if ($officers) {
            $officers_phones = User::where('user_type', 'office')->where('user_status', 'active')->get()->pluck('phone')->toArray();
        }

        $numbers =  array_merge($customers_phones, $marketers_phones, $officers_phones);

        $numbers_json_string = json_encode($numbers);

        $search = ['[', ']', '"0', '"'];
        $replace = ['', '', '966', ''];
        $this->numbers = str_replace($search, $replace, $numbers_json_string);
    }
}
