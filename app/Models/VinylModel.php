<?php

namespace App\Models;

use CodeIgniter\Model;

class VinylModel extends Model {

    protected $table = 'vinyl_info';
    protected $allowedFields = ['id', 'vinyl_name', 'vinyl_desc', 'vinyl_artist', 'vinyl_genre', 'vinyl_price', 'vinyl_image'];

    // Method to retrieve random vinyls from the database
    public function getRandomVinyls($limit)
    {
        return $this->orderBy('RAND()')->findAll($limit);
    }

    public function getAllVinyls() {
        return $this->findAll();
    }
}