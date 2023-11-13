<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Complain\ComplainResource;
use App\Models\Complaint;
use App\Service\NotificationService;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(){

        $complaints = Complaint::all();
        $complaints = ComplainResource::collection($complaints)->resolve();

        return inertia('Admin/Complaint/Index', compact('complaints'));
    }


    public function update(Complaint $complaint){


        $complaint->update([
          'is_solved' => !$complaint->is_solved
        ]);



        $title = $complaint->is_solved ? 'Ваша жалоба рассмотрена' :'Ваша жалоба в работе';

        NotificationService::store($complaint->message,$complaint->user_id,$title);


        return ComplainResource::make($complaint)->resolve();
    }
}
