<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserService;
use App\Models\Branch;
use App\Models\City;
use App\Models\Customer;
use App\Models\Direction;
use App\Models\LandType;
use App\Models\Licensed;
use App\Models\Mediator;
use App\Models\Neighborhood;
use App\Models\Order;
use App\Models\PropertyType;
use App\Models\Street;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function customerOrder($user_id)
    {
        $user = User::find($user_id);

        if (!$user || $user->user_status == 'inactive') {
            abort(404, 'This user is not found.');
        } else {
            if ($user->user_type != 'marketer') {
                abort(404);
            }
        }

        return view('admin-panel.customer-order', ['user_id' => $user_id]);
    }

    public function home()
    {
        return view('admin-panel.statistics');
    }

    public function newUser()
    {
        $user = auth()->user();

        if ($user) {
            if ($user->user_status == 'active') {
                return redirect()->route('panel.home');
            }
        }
        return view('admin-panel.new-user');
    }

    public function users()
    {
        $users = User::all();
        return view('admin-panel.users', compact(['users']));
    }

    public function user(User $user)
    {
        return view('admin-panel.user-view', ['user' => $user]);
    }


    public function offers()
    {
        return view('admin-panel.offers');
    }

    public function reservations()
    {
        return view('admin-panel.reservations');
    }

    public function orders()
    {
        return view('admin-panel.orders');
    }

    public function ordersMarketer()
    {
        return view('admin-panel.orders-marketer');
    }


    public function order(Order $order)
    {
        $user = auth()->user();

        if ($user->user_type != 'superadmin') {
            $check = $user->orders->where('id', $order->id)->first();
            if (!($order->assign_to == $user->id)) {
                if (!Gate::allows('can_show_orders') || !$check) {
                    return redirect()->route('panel.home');
                }
            }
        }

        return view('admin-panel.order-view', compact(['order']));
    }

    public function customers()
    {
        $customers = Customer::data()->paginate(10);
        return view('admin-panel.customers', compact(['customers']));
    }

    public function selles()
    {
        return view('admin-panel.selles');
    }

    public function branchs()
    {
        $branches = Branch::data()->paginate(10);
        $cities = City::data()->get();

        return view('admin-panel.branchs', compact(['branches', 'cities']));
    }

    public function mediators()
    {
        $user = auth()->user();

        if ($user) {
            if (!Gate::allows('manage_mediators')) {
                return redirect()->route('panel.home');
            }
        }
        return view('admin-panel.mediators');
    }

    public function sendSMS()
    {
        return view('admin-panel.sendSMS');
    }

    public function createUserInfo()
    {
        return view('admin-panel.forms.create-user-info');
    }

    public function createUserPermissions($email)
    {
        return view('admin-panel.forms.create-user-permissions', [
            'email' => $email
        ]);
    }

    public function createSell()
    {
        return view('admin-panel.create-sell');
    }

    public function createOffer()
    {
        $cities = City::data()->get();
        $neighborhoods = Neighborhood::data()->get();
        $property_types = PropertyType::data()->get();
        $directions = Direction::data()->get();
        $land_types = LandType::data()->get();
        $licenseds = Licensed::data()->get();
        $streets = Street::data()->get();
        $branches = Branch::data()->get();
        $mediators = Mediator::data()->get();
        return view('admin-panel.forms.offers.create-offer', compact([
            'cities',
            'neighborhoods',
            'property_types',
            'directions',
            'land_types',
            'licenseds',
            'streets',
            'branches',
            'mediators',
        ]));
    }

    public function realEstatesDetails()
    {
        return view('admin-panel.real-estates-details');
    }

    public function editBranch(Branch $branch)
    {
        $cities = City::data()->get();
        return view('admin-panel.forms.branches.edit-branch', compact(['branch', 'cities']));
    }

    public function cities()
    {
        return view('admin-panel.cities');
    }

    public function neighborhoods()
    {
        return view('admin-panel.neighborhoods');
    }

    public function changePassword()
    {
        return view('admin-panel.change-password');
    }

    public function updatePassword(UserService $userService)
    {
        return $userService->changePassword();
    }

    public function forgetPassword()
    {
        return view('auth.passwords.forget-password');
    }

    public function checkForgetPassword()
    {
        $request = request();
        $user_email = User::where('email', $request->email_or_phone_number)->first();
        $user_phone = User::where('phone', $request->email_or_phone_number)->first();

        if ($user_email) {
            return view('auth.passwords.reset-password', ['user_id' => $user_email->id]);
        }

        if ($user_phone) {
            return view('auth.passwords.reset-password', ['user_id' => $user_phone->id]);
        }

        return redirect()->back()->with('email_or_phone_number', 'يرجى التحقق من صحة البيانات');
    }

    public function pageResetPassword($user_id)
    {
        return view('auth.passwords.reset-password', ['user_id' => $user_id]);
    }

    public function resetPassword()
    {
        return $this->userService->resetPassword();
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin-panel.profile', ['user' => $user]);
    }












    public function editUserInfo(User $user)
    {
        return view('admin-panel.forms.edit-user-info', compact(['user']));
    }

    public function editUserPermissions(User $user)
    {
        return view('admin-panel.forms.edit-user-permissions', compact(['user']));
    }
}
