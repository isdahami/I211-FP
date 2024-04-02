<?php

namespace App\Controllers;

use App\Models\VinylModel; 

class VinylsController extends BaseController
{
    public function index()
    {
        // Load the VinylModel
        $vinylModel = new VinylModel();

        // Retrieve all vinyls from the model
        $allVinyls = $vinylModel->getAllVinyls();

        // Pass the vinyls to the view
        $data['allVinyls'] = $allVinyls;

        return view('vinyls/vinyls.php', $data);
    }


    public function vinylDetails($vinylId)
    {
        $vinylModel = new VinylModel();
        $vinyl = $vinylModel->find($vinylId);

        if (!$vinyl) {
            // change this to an error page
            return redirect()->to('/');
        }

        $data['vinyl'] = $vinyl;
        return view('vinyls/vinylDetails', $data);
    }
}
