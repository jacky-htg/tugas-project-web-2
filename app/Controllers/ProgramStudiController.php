<?php

namespace App\Controllers;

use App\Models\ProgramStudiModel;
use CodeIgniter\Controller;

class ProgramStudiController extends Controller {
    
    public function index() {
        $model = new ProgramStudiModel();
        $data['program_studi'] = $model->getProgramStudi();
        return view('program_studi/index', $data);
    }
    
    public function create() {
        return view('program_studi/create');
    }
    
    public function store() {
        $model = new ProgramStudiModel();
        $data = array(
            'Nama' => $this->request->getPost('Nama'),
            'ProgramPendidikan' => $this->request->getPost('ProgramPendidikan'),
            'Akreditasi' => $this->request->getPost('Akreditasi'),
            'SKAkreditasi' => $this->request->getPost('SKAkreditasi')
        );
        $model->insertProgramStudi($data);
        return redirect()->to('/program_studi');
    }
    
    public function edit($id) {
        $model = new ProgramStudiModel();
        $data['program_studi'] = $model->getProgramStudiById($id);
        return view('program_studi/edit', $data);
    }
    
    public function update($id) {
        $model = new ProgramStudiModel();
        $data = array(
            'Nama' => $this->request->getPost('Nama'),
            'ProgramPendidikan' => $this->request->getPost('ProgramPendidikan'),
            'Akreditasi' => $this->request->getPost('Akreditasi'),
            'SKAkreditasi' => $this->request->getPost('SKAkreditasi')
        );
        $model->updateProgramStudi($id, $data);
        return redirect()->to('/program_studi');
    }
    
    public function delete($id) {
        $model = new ProgramStudiModel();
        $model->deleteProgramStudi($id);
        return redirect()->to('/program_studi');
    }
}