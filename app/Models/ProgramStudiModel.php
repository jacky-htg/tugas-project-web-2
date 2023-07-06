<?php
// ProgramStudiModel.php

namespace App\Models;

use CodeIgniter\Model;

class ProgramStudiModel extends Model {
    
    protected $table = 'program_studi';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['Nama', 'ProgramPendidikan', 'Akreditasi', 'SKAkreditasi'];
    
    public function getProgramStudi() {
        return $this->findAll();
    }
    
    public function getProgramStudiById($id) {
        return $this->find($id);
    }
    
    public function insertProgramStudi($data) {
        return $this->insert($data);
    }
    
    public function updateProgramStudi($id, $data) {
        return $this->update($id, $data);
    }
    
    public function deleteProgramStudi($id) {
        return $this->delete($id);
    }
}