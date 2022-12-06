<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Services\SmsService;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class SMS extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $listeners = ['updateCustomers', 'confirmed', 'indConfirmed'];

    protected $paginationTheme = 'bootstrap';
    public $rows_number = 10;
    public $search = '';
    public $filters = [];

    public $all_customers = false;
    public $all_officers = false;
    public $all_marketers = false;

    public $message = '';
    public $indv_message = '';
    public $customers_ids = [];
    public $customer_ids = [];
    public $select_all = false;

    public function getCustomers()
    {
        $this->filters['search'] = $this->search;

        return Customer::data()->filters($this->filters)->where('status', 1)->paginate($this->rows_number);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'select_all') {
            if ($this->select_all) {
                $this->customers_ids = Customer::where('status', 1)->pluck('id')->toArray();
                $this->customer_ids = $this->customers_ids;
                $this->select_all = true;
            } else {
                $this->customers_ids = [];
                $this->customer_ids = $this->customers_ids;
                $this->select_all = false;
            }
        }

        if ($propertyName == 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $customers = $this->getCustomers();
        // if ($customers->count() < 9) {
        //     $this->resetPage();
        // }
        return view('livewire.s-m-s', [
            'customers' => $customers,
            'select_all' => $this->select_all
        ]);
    }

    public function sendAll(SmsService $smsService)
    {
        if (!$this->message) {
            $this->alert('warning', 'تحذير', [
                'toast' => true,
                'position' => 'center',
                'timer' => 9000,
                'showConfirmButton' => true,
                'confirmButtonText' => 'حسنا',
                'text' => "يرجى إدخال نص الرسالة لو سمحت",
                'timerProgressBar' => true,
            ]);
            return false;
        }

        if ($this->all_customers || $this->all_marketers || $this->all_officers) {
            $result = $smsService->collection($this->all_customers, $this->all_marketers, $this->all_officers, $this->message);
            $this->messages($result, $smsService, 'confirmed');
        } else {
            $this->alert('warning', 'تحذير', [
                'toast' => true,
                'position' => 'center',
                'timer' => 9000,
                'showConfirmButton' => true,
                'confirmButtonText' => 'حسنا',
                'text' => "يرجى اختيار الفئة لإرسال الرسائل لها",
                'timerProgressBar' => true,
            ]);

            return false;
        }
    }

    public function confirmed(SmsService $smsService)
    {
        $result = $smsService->collection($this->all_customers, $this->all_marketers, $this->all_officers, $this->message, 'repeat');
        $this->messages($result, $smsService, 'confirmed');
    }

    public function indConfirmed(SmsService $smsService)
    {
        $result = $smsService->sendInd($this->customer_ids, $this->indv_message, 'repeat');
        $this->messages($result, $smsService, 'indConfirmed');
    }

    public function messages($result, $smsService, $button)
    {
        if ($result == '1') {
            $this->alert('success', '', [
                'toast' => true,
                'position' => 'center',
                'timer' => 3000,
                'text' => '👍 لقد تم إرسال الرسائل بنجاح',
                'timerProgressBar' => true,
            ]);
        } else {
            if ($result == '1150') {
                $this->alert('question', 'رسالة مكررة 😰😰😰😰', [
                    'toast' => true,
                    'timer' => null,
                    'position' => 'center',
                    'text' => $smsService->errors($result) . "\n\n هل تريد تأكيد عملية الإرسال 🤔",
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'نعم',
                    'showCancelButton' => true,
                    'cancelButtonText' => 'لا',
                    'onConfirmed' => $button,
                ]);
            } elseif ($result == '1010') {
                $this->alert('warning', 'معلومات ناقصة', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1020') {
                $this->alert('warning', 'تحذير', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1030') {
                $this->alert('warning', 'رسالة موجودة مسبقا', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1040') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1050') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1060') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1070') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1080') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1090') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1100') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1110') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1120') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1130') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1140') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1150') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            } elseif ($result == '1160') {
                $this->alert('warning', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 9000,
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'حسنا',
                    'text' => $smsService->errors($result),
                    'timerProgressBar' => true,
                ]);
            }
        }
    }

    public function addRemove($customer_id)
    {
        if (!in_array($customer_id, $this->customer_ids)) {
            array_push($this->customer_ids, $customer_id);
        } else {
            if (($key = array_search($customer_id, $this->customer_ids)) !== false) {
                unset($this->customer_ids[$key]);
            }
        }
    }

    public function send(SmsService $smsService)
    {
        if (!$this->indv_message) {
            $this->alert('warning', 'تحذير', [
                'toast' => true,
                'position' => 'center',
                'timer' => 9000,
                'showConfirmButton' => true,
                'confirmButtonText' => 'حسنا',
                'text' => "يرجى إدخال نص الرسالة لو سمحت",
                'timerProgressBar' => true,
            ]);
            return false;
        }

        if (!$this->customer_ids) {
            $this->alert('warning', 'تحذير', [
                'toast' => true,
                'position' => 'center',
                'timer' => 9000,
                'showConfirmButton' => true,
                'confirmButtonText' => 'حسنا',
                'text' => "يرجى اختيار عميل واحد على الاقل",
                'timerProgressBar' => true,
            ]);
            return false;
        }

        $result = $smsService->sendInd($this->customer_ids, $this->indv_message);
        $this->messages($result, $smsService, 'indConfirmed');
    }
}
