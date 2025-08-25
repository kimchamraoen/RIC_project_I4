<div>
    @if ($selectData == true)
    <div class="m-4 justify-content-between d-flex">
        <button type="button" wire:click='showForm' class="btn btn-primary">Create</button>
        @auth
            <livewire:logout />
        @endauth
        @guest
            <div>
                <button type="button" class="btn btn-secondary"><a href="/login" class="text-white">Login</a></button>
                <button type="button" class="btn btn-secondary"><a href="/register" class="text-white">Register</a></button>
            </div>
        @endguest
    </div>

    <!-- search -->
    <div class="d-flex justify-content-end m-3">
        <input type="search" wire:model.live.debounce.300ms='search' name='search' id='search' placeholder="Search Here....." class="form-control form-control-dg w-50" >
        <button wire:click='filterSearch' class="btn btn-outline-secondary w-40 h-auto mx-2" style="width: 50px; height: 50px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="width: 100%; height: 100%;">
                <path d="M96 128C83.1 128 71.4 135.8 66.4 147.8C61.4 159.8 64.2 173.5 73.4 182.6L256 365.3L256 480C256 488.5 259.4 496.6 265.4 502.6L329.4 566.6C338.6 575.8 352.3 578.5 364.3 573.5C376.3 568.5 384 556.9 384 544L384 365.3L566.6 182.7C575.8 173.5 578.5 159.8 573.5 147.8C568.5 135.8 556.9 128 544 128L96 128z"/>
            </svg>
        </button>
    </div>

    
    <!-- filter -->
    <table id="filter-table">
        <thead>
            <tr>
                <th>
                    <span class="flex items-center m-2 ">
                        First Name
                        <input type="text" wire:model='filterFirstName' placeholder="Search by first name" class="form-control form-control-sm ms-2" style="width: 150px;">
                    </span>
                </th>
                <th>
                    <span class="flex items-center m-2">
                        Last Name
                        <input type="text" wire:model='filterLastName' placeholder="Search by last name" class="form-control form-control-sm ms-2" style="width: 150px;">
                    </span>
                </th>
                <th>
                    <span class="flex items-center m-2">
                        Email
                        <input type="email" wire:model='filterEmail' placeholder="Search by email" class="form-control form-control-sm ms-2" style="width: 150px;">
                    </span>
                </th>
            <th><button type="submit" wire:click='filter' class="btn btn-primary ms-2">Search</button></th>
            </tr>
        </thead>
    </table>
    

    <div class="px-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">N0</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Password</th> -->
                    <th scope="col">image</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                </tr>
               
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        @if($student->image)
                            <img src="{{ asset('storage/' . $student->image) }}" alt="image" style="width: 40px; height: auto;">
                        @else
                            No Image Available
                        @endif
                    </td>
                    <td><button wire:click='edit({{$student->id}})' class="btn btn-success">edit</button></td>
                    <td><button wire:click='delete({{$student->id}})' class="btn btn-danger">delete</button></td>
                </tr>
                 @empty
                <h1>Recode not found</h1>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif

    @if ($createData == true)
    <!-- create table -->
     <form action="" class="px-5" wire:submit.prevent='create'>
        <h4 class="text-center">add data</h4>
        <div class="mb-3">
            <label for="exampleInputFirstName" class="form-label">First Name</label>
            <input type="text" wire:model='firstName' class="form-control" id="exampleInputFirstName" aria-describedby="firstNameHelp">
            <span class="text-danger">
                @error('firstName') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputLastName" class="form-label">Last name</label>
            <input type="text" wire:model='lastName' class="form-control" id="exampleInputLastName">
            <span class="text-danger">
                @error('lastName') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" wire:model='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span class="text-danger">
                @error('email') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" wire:model='password' class="form-control" id="exampleInputPassword1">
            <span class="text-danger">
                @error('password') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <input type="file" wire:model='image' class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="image" class="img-fluid mt-2" style="width: 100px; height: 100px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    @endif

    @if ($updateData == true)
    <!-- update table -->
     <form class="px-5" wire:submit.prevent='update({{$ids}})'>
        <h4 class="text-center">update data</h4>
        <div class="mb-3">
            <label for="exampleInputedit_firstName" class="form-label">First Name</label>
            <input type="text" wire:model='edit_firstName' class="form-control" id="edit_firstName" aria-describedby="edit_firstName">
             <span class="text-danger">
                @error('edit_firstName') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputedit_lastName" class="form-label">Last name</label>
            <input type="text" wire:model='edit_lastName' class="form-control" id="edit_lastName">
             <span class="text-danger">
                @error('edit_lastName') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputedit_email" class="form-label">Email address</label>
            <input type="email" wire:model='edit_email' class="form-control" id="edit_email" aria-describedby="edit_email">
             <span class="text-danger">
                @error('edit_email') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleInputedit_password1" class="form-label">Password</label>
            <input type="password" wire:model='edit_password' class="form-control" id="edit_password">
             <span class="text-danger">
                @error('edit_password') 
                    {{ $message }} 
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <input type="file"​​​​​​​​ wire:model='edit_image' ​class="form-control" id="edit_image" aria-describedby="edit_image">
            @if($edit_image && is_object($edit_image))
                <img src="{{ $edit_image->temporaryUrl() }}" alt="New Image" style="width: 100px; height: auto;">
            @else
                @if($ids && $this->edit_image)
                    <img src="{{ asset('storage/' . $this->edit_image) }}" alt="Current Image" style="width: 100px; height: auto;">
                @endif
            @endif
        </div>​​​​​
        <button type="submi​​​​t" class="btn btn-primary">Save</button>
    </form>
    @endif
</div>
