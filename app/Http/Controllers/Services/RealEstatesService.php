<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Direction;
use App\Models\Land;
use App\Models\LandType;
use App\Models\Licensed;
use App\Models\Neighborhood;
use App\Models\OfferType;
use App\Models\OrderNoteStatuse;
use App\Models\PriceType;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use App\Models\Street;
use Illuminate\Http\Request;

class RealEstatesService extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function storeOrderNoteStatus($data)
    {
        $this->request->name = $data['order_note_status_name'];

        $order_status = OrderNoteStatuse::create([
            'name' => $this->request->name
        ]);
    }

    public function storeCity($data)
    {
        $this->request->city_name = $data['city_name'];
        $this->request->city_code = $data['city_code'];
        // $this->request->validate([
        //     'city_name' => ['required', 'unique:cities,name'],
        //     'city_code' => ['required', 'unique:cities,code']
        // ], [
        //     'city_name.required' => 'هذا الحقل مطلوب',
        //     'city_code.required' => 'هذا الحقل مطلوب',
        //     'city_name.unique' => 'المدينة موجودة مسبقا',
        //     'city_code.unique' => 'رمز الكود مستخدم لمنطقة اخرى، يرجى إدخال رمز مختلف'
        // ]);

        $city = City::create([
            'name' => $this->request->city_name,
            'code' => $this->request->city_code
        ]);

        $cities = City::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث المدن بنجاح',
            'cities' => $cities
        ]);
    }

    public function storeNeighborhood($data)
    {
        $this->request->city_id = $data['city_id'];
        $this->request->neighborhood_name = $data['neighborhood_name'];
        // $this->request->validate([
        //     'city_id' => ['required', 'exists:cities,id'],
        //     'neighborhood_name' => ['required', 'string']
        // ], [
        //     'city_id.required' => 'هذا الحقل مطلوب',
        //     'neighborhood_name.required' => 'هذا الحقل مطلوب',
        // ]);

        $neighborhood = Neighborhood::create([
            'city_id' => $this->request->city_id,
            'name' => $this->request->neighborhood_name
        ]);

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث الأحياء بنجاح',
        ]);
    }

    public function storePropertyType()
    {
        $this->request->validate([
            'property_type_name' => ['required', 'unique:property_types,name'],
        ], [
            'property_type_name.required' => 'هذا الحقل مطلوب',
            'property_type_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $property_type = PropertyType::create([
            'name' => $this->request->property_type_name
        ]);

        $property_types = PropertyType::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث أنواع العقارات بنجاح',
            'property_types' => $property_types
        ]);
    }

    public function storePropertyStatus()
    {
        $this->request->validate([
            'property_status_name' => ['required', 'unique:property_statuses,name'],
        ], [
            'property_status_name.required' => 'هذا الحقل مطلوب',
            'property_status_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $property_status = PropertyStatus::create([
            'name' => $this->request->property_status_name
        ]);

        $property_statuses = PropertyStatus::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث حالات العقارات بنجاح',
            'property_statuses' => $property_statuses
        ]);
    }

    public function storeOfferTypes()
    {
        $this->request->validate([
            'offer_type_name' => ['required', 'unique:offer_types,name'],
        ], [
            'offer_type_name.required' => 'هذا الحقل مطلوب',
            'offer_type_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $property_status = OfferType::create([
            'name' => $this->request->offer_type_name
        ]);

        $offer_types = OfferType::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث انواع العروض بنجاح',
            'offer_types' => $offer_types
        ]);
    }

    public function storePriceTypes()
    {
        $this->request->validate([
            'price_type_name' => ['required', 'unique:price_types,name'],
        ], [
            'price_type_name.required' => 'هذا الحقل مطلوب',
            'price_type_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $property_status = PriceType::create([
            'name' => $this->request->price_type_name
        ]);

        $price_types = PriceType::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث انوع الاسعار بنجاح',
            'price_types' => $price_types
        ]);
    }

    public function storeDirection()
    {
        $this->request->validate([
            'direction_name' => ['required', 'unique:directions,name'],
        ], [
            'direction_name.required' => 'هذا الحقل مطلوب',
            'direction_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $direction = Direction::create([
            'name' => $this->request->direction_name
        ]);

        $directions = Direction::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث الاتجاهات بنجاح',
            'directions' => $directions
        ]);
    }

    public function storeStreet()
    {
        $this->request->validate([
            'street_name' => ['required', 'unique:streets,name'],
        ], [
            'street_name.required' => 'هذا الحقل مطلوب',
            'street_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $street = Street::create([
            'name' => $this->request->street_name
        ]);

        $streets = Street::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث الشوارع بنجاح',
            'streets' => $streets
        ]);
    }

    public function storeLandType()
    {
        $this->request->validate([
            'land_type_name' => ['required', 'unique:land_types,name'],
        ], [
            'land_type_name.required' => 'هذا الحقل مطلوب',
            'land_type_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $land_type = LandType::create([
            'name' => $this->request->land_type_name
        ]);

        $land_types = LandType::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث انواع الأراضي بنجاح',
            'land_types' => $land_types
        ]);
    }


    public function storeLicensed()
    {
        $this->request->validate([
            'licensed_name' => ['required', 'unique:licenseds,name'],
        ], [
            'licensed_name.required' => 'هذا الحقل مطلوب',
            'licensed_name.unique' => 'هذا الاسم موجود مسبقا',
        ]);

        $licensed = Licensed::create([
            'name' => $this->request->licensed_name
        ]);

        $licenseds = Licensed::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث انواع الأراضي بنجاح',
            'licenseds' => $licenseds
        ]);
    }

    public function storeLand()
    {
        return dd($this->request->all());
        $this->request->validate([
            'licensed_id' => ['required', 'exists:licenseds,id'],
            'land_type_space' => ['required'],
            'price_peer_meter' => ['required'],
            'land_notes' => ['required'],
        ], [
            'land_type_space.required' => 'هذا الحقل مطلوب',
            'price_peer_meter.required' => 'هذا الحقل مطلوب',
            'land_notes.required' => 'هذا الحقل مطلوب',
        ]);

        $licensed = Land::create([
            'name' => $this->request->licensed_name
        ]);

        $licenseds = Licensed::data()->get();

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث انواع الأراضي بنجاح',
            'licenseds' => $licenseds
        ]);
    }
}
