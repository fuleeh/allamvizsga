<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PatientCategory;
use App\Publication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use function bcrypt;
use function redirect;
use function view;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $pubsCount = Publication::all();
        $patientCatCount = PatientCategory::count();

        return view('admin.index', compact('usersCount', 'pubsCount', 'patientCatCount'));
    }

    public function adminPubsList()
    {
        $publications = Publication::paginate(2);
        return view('admin.publications.index', compact('publications'));
    }

}
