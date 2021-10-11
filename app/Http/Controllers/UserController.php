<?php


namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\User;

class UserController extends Controller
{
    /** @var User $mdlUser */
    protected $mdlUser;

    /** @var Address $mdlAddress */
    protected $mdlAddress;

    /**
     * UserController constructor.
     * @param User $mdlUser
     * @param Address $mdlAddress
     */
    public function __construct(User $mdlUser, Address $mdlAddress)
    {
        $this->mdlUser = $mdlUser;
        $this->mdlAddress = $mdlAddress;
    }

    /**
     * @return mixed
     * List Users
     */
    public function index()
    {
        $users = User::get();
        return response()->json($users, 200);
    }

    /**
     * @param $id
     * @return mixed
     * Show User
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'address' => $user->address,
                'city' => $user->address->city,
                'uf' => $user->address->uf,
                'created_at' => $user->created_at,
            ];
            return response()->json($user, 200);
        }
        return response()->json(['status' => false, 'message' => 'user not found'], 400);
    }

    /**
     * @param UserRequest $request
     * @return mixed
     * Store user
     */
    public function store(UserRequest $request)
    {
        $response = $this->mdlUser->CreateUser($request->all());
        if ($response)
            return response()->json(['status' => $response, 'message' => 'Success'], 200);

        return response()->json(['status' => $response, 'message' => 'Fail'], 400);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return mixed
     * Update user
     */
    public function update(UserRequest $request, $id)
    {
        $response = $this->mdlUser->UpdateUser($id, $request->all());
        if ($response)
            return response()->json(['status' => $response, 'message' => 'Success'], 200);

        return response()->json(['status' => $response, 'message' => 'Fail'], 400);
    }

    /**
     * @param $id
     * @return mixed
     * Delete User
     */
    public function delete($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $address = Address::where('user_id', $user->id)->first();
            $address->delete();
            $user->delete();
            return response()->json(['status' => True, 'message' => 'Success'], 200);
        }
        return response()->json(['status' => false, 'message' => 'user not found'], 400);
    }

    /**
     * @return mixed
     * Count users by city
     */
    public function city()
    {
        $response = $this->mdlAddress->byCity();
        return response()->json($response, 200);
    }

    /**
     * @return mixed
     * Count users by uf
     */
    public function uf()
    {
        $response = $this->mdlAddress->byUf();
        return response()->json($response, 200);
    }
}
