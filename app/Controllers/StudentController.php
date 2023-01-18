<?php

namespace App\Controllers;

use App\Models\Student;
use CodeIgniter\RESTful\ResourceController;

class StudentController extends ResourceController
{
    private $student;
    private $validation;

    public function __construct()
    {
        $this->student = new Student();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $liste = $this->student->findAll();
        return $this->respond($liste);
    }


    public function show($id = null)
    {
        $student = $this->student->find($id);
        if($student){
            return $this->respondCreated($student);
        }
        return $this->failNotFound('Sorry! no student found');
    }


    public function new()
    {
        //
    }


    public function create()
    {
        #description champ du formulaire

        $rules = [ #regle de validation des chmaps du formulaire
            'firstName' => 'required',
            'lastName' => 'required',
            'birthday' => 'required|is_unique[student.birth]|min_length[3]'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "firstName" => [
                "required" => "Etudiant requis",
                "is_unique" => "Cet etudiant existe déjà"
            ]
        ];

        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            #Objet à inserer dans la BD
            $tab = [
                'fname' => $this->request->getVar('firstName'),
                'lname' => $this->request->getVar('lastName'),
                'birth' => $this->request->getVar('birth')
            ];

            $id = $this->student->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['idstudent'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Echec insertion
                return $this->fail('Sorry! no student created');
            }
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
