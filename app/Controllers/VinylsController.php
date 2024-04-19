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

        // Check if filter criteria is submitted
        $selectedGenre = $this->request->getPost('genre');

        // Filter vinyls by genre if filter criteria is submitted
        if (!empty($selectedGenre)) {
            $filteredVinyls = $vinylModel->getVinylsByGenre($selectedGenre);
        } else {
            $filteredVinyls = $allVinyls;
        }

        // Pass the filtered vinyls to the view
        $data['allVinyls'] = $filteredVinyls;

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
