<?php

namespace App\Http\Livewire;

use App\Models\Order as ModelsOrder;
use App\Models\OrderEditor;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['updateOrders'];
    public $rows_number = 10;

    public $search = '';
    public $sort_field = 'id';
    public $sort_direction = 'asc';
    public $style_sort_direction = 'sorting_asc';

    public $order_status_id = null;
    public $property_type_id = null;
    public $city_id = null;
    public $branch_type_id = null;
    public $date_from = null;
    public $date_to = null;
    public $filters = [];

    public function updateOrders()
    {
        $this->reset();
        $this->date_from = ModelsOrder::min('created_at');
        $this->date_to = ModelsOrder::max('created_at');

        $this->filters['date_from'] = $this->date_from;
        $this->filters['date_to'] = $this->date_to;
    }

    public function mount()
    {
        $this->date_from = ModelsOrder::min('created_at');
        $this->date_to = ModelsOrder::max('created_at');
        $this->filters['date_from'] = $this->date_from;
        $this->filters['date_to'] = $this->date_to;
    }

    public function getMainOrders()
    {
        $this->order_status_id == 'all' ? $this->order_status_id = null : null;
        $this->property_type_id == 'all' ? $this->property_type_id = null : null;
        $this->city_id == 'all' ? $this->city_id = null : null;
        $this->branch_type_id == 'all' ? $this->branch_type_id = null : null;

        $this->filters['order_status_id'] = $this->order_status_id;
        $this->filters['property_type_id'] = $this->property_type_id;
        $this->filters['city_id'] = $this->city_id;
        $this->filters['branch_type_id'] = $this->branch_type_id;
        $this->filters['search'] = $this->search;

        $user = auth()->user();

        if ($user->user_type == 'superadmin') {
            $data = ModelsOrder::data()->filters($this->filters)->orderBy($this->sort_field, $this->sort_direction)->paginate($this->rows_number);
        } else {
            $data = ModelsOrder::data()->where('user_id', $user->id)->filters($this->filters)->orderBy($this->sort_field, $this->sort_direction)->paginate($this->rows_number);
        }

        return $data;
    }

    public function sortBy($field)
    {
        if ($this->sort_field == $field) {
            if ($this->sort_direction === 'asc') {
                $this->sort_direction = 'desc';
                $this->style_sort_direction = 'sorting_desc';
            } else {
                $this->sort_direction = 'asc';
                $this->style_sort_direction = 'sorting_asc';
            }
        } else {
            $this->sort_direction = 'asc';
            $this->style_sort_direction = 'sorting_asc';
        }

        $this->sort_field = $field;
    }

    public function dateFrom()
    {
        $this->filters['date_from'] = $this->date_from;
    }

    public function dateTo()
    {
        $this->filters['date_to'] = $this->date_to;
    }

    public function render()
    {
        $orders = $this->getMainOrders();

        return view('livewire.order', [
            'orders' => $orders,
        ]);
    }

    public function callOrderModal($order_id)
    {
        $this->emit('openOrderModal', $order_id);
    }

    public function closeOrder($order_id)
    {
        $order = ModelsOrder::find($order_id);
        $user = auth()->user();

        if ($order) {
            if ($order->order_status_id == 3) {
                $order->update(['order_status_id' =>  5]);

                if ($user->user_type == 'admin' || $user->user_type == 'superadmin') {
                    $note = "قام المدير $user->name بتغير حالة الطلب";
                }

                OrderEditor::create([
                    'order_id' => $order->id,
                    'user_id' => $user->id,
                    'note' => $note,
                    'action' => 'active',
                ]);
            } else {
                $order->update(['order_status_id' => 3]);

                if ($user->user_type == 'admin' || $user->user_type == 'superadmin') {
                    $note = "قام المدير $user->name بإغلاق الطلب";
                }

                OrderEditor::create([
                    'order_id' => $order->id,
                    'user_id' => $user->id,
                    'note' => $note,
                    'action' => 'cancel',
                ]);
            }
        }

        $this->alert('success', '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => '👍 تم تغيير حالة الطلب بنجاح',
            'timerProgressBar' => true,
        ]);
    }
}
