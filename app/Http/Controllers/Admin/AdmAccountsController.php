<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdmAccountsController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['module_title'] = 'Accounts';
        $data['paginate'] = 10;
        $data['users'] = User::where('role', '!=', 'admin')->orderBy('id', 'desc')->paginate($data['paginate']);
        
        if ($request->header('HX-Request')) {
            $renderedView = view('admin.main-page.accounts', $data)->render();

            return response($renderedView)
                ->header('HX-Current-URL', 'admin-accounts');
        } else {
            return view('admin.admin-accounts', $data);
        }
    }

    public function search(Request $request)
    {
        $paginate = $request->input('paginate');
        $role = $request->input('role');
        $data = [];
        $data['paginate'] = $paginate;

        $query = User::where('role', '!=', 'admin')->orderBy('id', 'desc');
        if ($role != '') {
            $query->where('role', $role);
        }
        
        $search = $request->input('search');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('role', 'like', "%{$search}%")
                    ->orWhere('contact_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere(function ($q) use ($search) {
                        $q->whereHas('employerDetail', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('applicantDetail', function ($q) use ($search) {
                            $q->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $search . '%']);
                        });
                    })
                    ->orWhereRaw("DATE_FORMAT(created_at, '%a, %M %e, %Y') LIKE ?", ['%' . $search . '%']);
            });
        }

        $data['users'] = $query->paginate($paginate);

        if ($request->header('HX-Request')) {
            return view('admin.custom.accounts-table', $data)->render();
        }
    }    

    public function historySearch(Request $request, $id)
    {
        $data = [];
        $search = $request->input('search');
        $user = User::findOrFail($id);
    
        $data['job_applications'] = $user->jobApplications()
            ->whereHas('details', function ($query) use ($search) {
                $query->where('job_title', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
    
        if ($request->header('HX-Request')) {
            return view('admin.custom.accounts-history-table', $data)->render();
        }
    
        return view('admin.custom.accounts-history', $data);
    }
    
    

    public function show(Request $request, int $id)
    {
        $data = [];
        $data['user'] = User::find($id);
        $data['module_title'] = 'Accounts';
        $data['job_applications'] = $data['user']->jobApplications()->with('details')->orderBy('id', 'desc')->paginate(5);

        if ($request->header('HX-Request')) {
            $renderedView = view('admin.main-page.accounts-show', $data)->render();

            return response($renderedView)
                ->header('HX-Current-URL', 'admin-accounts-show');
        } else {
            return view('admin.admin-accounts-show', $data);
        }
    }
}
