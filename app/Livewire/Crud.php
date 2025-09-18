<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class Crud extends Component
{
    public $selectData=true;
    public $createData=false;
    public $updateData=false;
    // public $filter = false;

    // #[Rule('required',message:'Please enter first name')]
    // #[Rule('min:3',message:'first name much be 3 characters long')]
    public $firstName;

    // #[Rule('required',message:'Please enter last name')]
    // #[Rule('min:3',message:'last name much be 3 characters long')]
    public $lastName;

    // #[Rule('required',message:'Please enter email')]
    // #[Rule('email',message:'Please enter a valid email')]
    // #[Rule('unique:students,email',message:'Email already exists')]
    public $email;

    // #[Rule('required',message:'Please enter password')]
    // #[Rule('min:6',message:'Password must be at least 6 characters long')]
    public $password;

    // #[Rule('nullable|file|mimes:jpg,png,pdf|max:2048',message:'Image must be a file of type: jpg, png, pdf and size must not exceed 2MB')]
    public $image;


    public $ids;
    
    //  #[Rule('min:3',message:'first name much be 3 characters long')]
    public $edit_firstName;

    //  #[Rule('min:3',message:'last name much be 3 characters long')]
    public $edit_lastName;

    // #[Rule('unique:students,email',message:'Email already exists')]
    public $edit_email;

    // #[Rule('min:6',message:'Password must be at least 6 characters long')]
    public $edit_password;

    // #[Rule('nullable|file|mimes:jpg,png,pdf|max:2048',message:'Image must be a file of type: jpg, png, pdf and size must not exceed 2MB')]
    public $edit_image;

    public $search='';
    public $filter ='';
    public $filterFirstName='' ;
    public $filterLastName='';
    public $filterEmail='';

    public $student;

    use WithPagination;
    use WithFileUploads;

    public function render()
    {
        //  $students = Student::query()
        // ->when($this->filterFirstName, function ($query) {
        //     $query->where('first_name', 'like', '%' . $this->filterFirstName . '%');
        // })
        // ->when($this->filterLastName, function ($query) {
        //     $query->where('last_name', 'like', '%' . $this->filterLastName . '%');
        // })
        // ->when($this->filterEmail, function ($query) {
        //     $query->where('email', 'like', '%' . $this->filterEmail . '%');
        // })
        // ->get();

        // search
        if($this->search){
            return view('livewire.crud', ['students' => Student::where('first_name','like',"%{$this->search}%")
                ->orWhere('last_name','like',"%{$this->search}%")
                ->get()]);
        }

        //  return view('livewire.crud', [
        // 'students' => $this->students ?? Student::paginate(50)
        // ]);
        // desplay all data
        return view('livewire.crud', ['students' => Student::paginate(50)]);
    }

    public function filter()
    {
        $this->filter = Student::query()
            ->when($this->filterFirstName, fn($q) => $q->where('first_name', 'like', '%' . $this->filterFirstName . '%'))
            ->when($this->filterLastName, fn($q) => $q->where('last_name', 'like', '%' . $this->filterLastName . '%'))
            ->when($this->filterEmail, fn($q) => $q->where('email', 'like', '%' . $this->filterEmail . '%'))
            ->paginate(50);
    }


    public function showForm(){
        $this->createData = true;
        $this->selectData = false;
    }

    public function resetField()
    {
       $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->password = '';
        $this->image = '';

        $this->ids='';
        $this->edit_firstName='';
        $this->edit_lastName='';
        $this->edit_email='';
        $this->edit_password='';
        $this->edit_image='';

        $this->filterFirstName = '';
        $this->filterLastName = '';
        $this->filterEmail = '';
    }
    
    public function create()
    {
        $this->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|unique:students,password|min:6',
            'image' => 'nullable|file|mimes:jpg,png,pdf|max:2048', // 2MB max
        ]);

        $student = new Student();
        $student->first_name = $this->firstName; // Ensure the field names match your database
        $student->last_name = $this->lastName;
        $student->email = $this->email;
        $student->password = bcrypt($this->password);

        if ($this->image) {
           $imagePath = $this->image->store('images', 'public');
            $student->image = $imagePath; // Store the image path in the database
        }

        $result = $student->save();
        $this->resetField();

        $this->selectData = true;
        $this->createData = false;
    }

    public function edit($id)
    {
        $this->resetField();
        $this->ids = $id;
        $student = Student::findOrFail($id);
        $this->ids = $student->id;
        $this->edit_firstName = $student->first_name;
        $this->edit_lastName = $student->last_name;
        $this->edit_email = $student->email;
        $this->edit_password = $student->password;
        $this->edit_image = $student->image;

        $this->selectData = false;
        $this->updateData = true;
    }

    public function update(){
        $student=Student::findOrFail($this->ids);
        $rules=[
            'edit_firstName' => 'required|min:3',
            'edit_lastName' => 'required|min:3',
            'edit_email' => 'required|email|unique:students,email,'.$this->ids,
            // 'edit_password' => 'nullable|min:6', // Password can be empty for update
            // 'edit_image' => 'nullable|file|mimes:jpg,png,pdf|max:2048', // 2MB max
        ];

        if ($this->edit_password) {
            $rules['edit_password'] = 'nullable|min:6';
        }

        if (is_object($this->edit_image)) {
            $rules['edit_image'] = 'nullable|file|mimes:jpg,png,pdf|max:2048';
        }
        $this->validate($rules);
        $student->first_name = $this->edit_firstName;
        $student->last_name = $this->edit_lastName;
        $student->email = $this->edit_email;
        // $student->password = bcrypt($this->edit_password);      
        if ($this->edit_password) {
            $student->password = bcrypt($this->edit_password);
        }

        if ($this->edit_image && is_object($this->edit_image)) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $imagePath = $this->edit_image->store('images', 'public');
            $student->image = $imagePath;
        }


        $result = $student->save();
        $this->resetField();
        $this->selectData = true;
        $this->updateData = false;
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $result = $student->delete();
    }

    // public function filterSearch()
    // {
    //     $this->filter = true;
    //     $this->selectData = false;
    // }

}
