<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{

    // Method to check if the current user has admin privileges
    protected function isAdmin()
    {
        // Get the ID of the currently logged-in user
        $userId = auth()->id();

        // Load the user from the database
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        // Check if the user exists and has admin status
        return $user ['status'] === 'admin';
    }

    public function addNew()
    {
        // Check if the current user has admin privileges
        if (!$this->isAdmin()) {
            // Redirect or show error message
            return redirect()->to('/');
        }

        // Load the view for adding new additions
        return view('admin/addNew');
    }

    public function saveNew()
{
    // Check if the current user has admin privileges
    if (!$this->isAdmin()) {
        // Redirect or show error message
        return redirect()->to('/');
    }

    // Load the VinylModel
    $vinylModel = new \App\Models\VinylModel();

    // Process form submission
    $vinylName = $this->request->getPost('vinyl_name');
    $vinylDesc = $this->request->getPost('vinyl_desc');
    $vinylArtist = $this->request->getPost('vinyl_artist');
    $vinylGenre = $this->request->getPost('vinyl_genre');
    $vinylPrice = $this->request->getPost('vinyl_price');
    $vinylImage = $this->request->getFile('vinyl_image');

    $originalFileName = $vinylImage->getName();

    // Insert new record into the vinyl_info table
    $data = [
        'vinyl_name' => $vinylName,
        'vinyl_desc' => $vinylDesc,
        'vinyl_artist' => $vinylArtist,
        'vinyl_genre' => $vinylGenre,
        'vinyl_price' => $vinylPrice,
        'vinyl_image' => $originalFileName
    ];

    $vinylModel->insert($data);

    

    // Redirect to a success page or show a success message
    return view('admin/addNew');
}


}
