<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('js/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}"" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
 
        <!-- Spinner End -->
 
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Job Dating</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <a href="{{route('profile')}}">
                        <h6 class="mb-0">{{auth()->user()->name}}</h6>
                        @foreach(auth()->user()->roles as $role)
                        <span>{{ $role->name }}</span>
                    @endforeach 
                </a>                  
                 </div>
                </div>
                <div class="navbar-nav w-100">
                    @can('add_annoncement')
                    <a href="{{ route('Compagnies.index') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    @endcan

                    @can('show_users')
                    <a href="{{ route('users.index') }}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>users</a>
                    @endcan

                    @can('show_roles')
                    <a href="{{ route('roles.index') }}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>roles</a>
                    @endcan
                    @can('show_roles')
                    <a href="{{ route('skill.index') }}" class="nav-item nav-link"><i class="fa fa-star me-2"></i>skills</a>
                    @endcan

                

                   
                   
              
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
               
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="images/settings.svg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Settings</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="{{route('logout')}}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            
             <!-- Navbar End -->

             @if ($message = Session::get('success'))
             <div class="alert alert-success">
                 <p>{{ $message }}</p>
             </div>
         @endif
            <!-- Sale & Revenue Start -->
            @can('show_users')
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total compagnies</p>
                                <h6 class="mb-0">{{count($compagnies)}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Announcement</p>
                                <h6 class="mb-0">1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total users</p>
                                <h6 class="mb-0">1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">{{count($announcements)}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
          
            <!-- Sales Chart End -->

      
            <!-- Recent Sales Start -->
            @can('show_users')

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">compagnies</h6>
                         <a class="btn btn-sm btn-primary" href="{{ route('Compagnies.formCompagnies') }}">add compagnie</a>
                    </div>
             
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                 
                                    <th scope="col">name</th>
                                    <th scope="col">address</th>
                                    <th scope="col">contact</th>
                                    <th scope="col">field of activity</th>
                                    {{-- <th scope="col">createdDate</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($compagnies as $compagnie)
                                
                                <tr>
                                    <td>{{ $compagnie->name }}</td>
                                    <td>{{ $compagnie->address }}</td>
                                    <td>{{ $compagnie->contact }}</td>
                                    <td>{{ $compagnie->field_of_activity }}</td>
                                    {{-- <td>{{ $compagnie->title }}</td> --}}
                                    <td>
                                        <form action="{{ route('compagnie.destroy',$compagnie->id) }}" method="POST">
                                           
                                        <a class="btn btn-success" href="{{ route('compagnie.edit',$compagnie->id) }}">update</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"class="btn btn-primary" >delete</button>
                                        </form>
                                    </td>
                                 </tr>
                                 @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan

            @can('show_annoncement')
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">my applyments</h6>
                     </div>
             
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Company Name</th>
                                 </tr>
                            </thead>
                                 <tbody>
                                    @foreach ($userApplyments as $applyment)
                                        <tr>
                                            <td>{{ $applyment->title }}</td>
                                            <td>{{ $applyment->content }}</td>
                                            <td>{{ $applyment->compagnie->name }}</td>
                                    
                                        </tr>
                                    @endforeach
                                    

                                </tbody>
                                
                             
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            @can('show_users')
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">applyment</h6>
                        <a class="btn btn-sm btn-primary" href="{{ route('Announcement.formAnnouncement') }}">Add Announcement</a>
                    </div>
             
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Utilisateurs appliqués:</th>
                                     <th scope="col">Action</th>
                                </tr>
                            </thead>
                                 <tbody>
                                    @foreach ($applyments as $applyment)
                                        <tr>
                                            <td>{{ $applyment->title }}</td>
                                            <td>{{ $applyment->content }}</td>
                                            <td>{{ $applyment->compagnie->name }}</td>
                                             <td>
                                                @foreach($applyment->users as $user)
                                                    <span style="color: aliceblue" class="skill-background-{{ $loop->index }}">{{ $user->name }}  </span>
                                                    @unless($loop->last)
                                                        <br> <!-- Ajoutez une ligne vide sauf pour la dernière compétence -->
                                                    @endunless
                                                @endforeach
                                            </td>
                                            <td>
                                                {{-- <form action="{{ route('Announcement.destroy', $announcement->id) }}" method="POST">
                                                    <a class="btn btn-success" href="{{ route('Announcement.edit', $announcement->id) }}">Update</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    

                                </tbody>
                                
                             
                        </table>
                    </div>
                </div>
            </div>
            @endcan

            @can('show_users')
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Announcement</h6>
                        <a class="btn btn-sm btn-primary" href="{{ route('Announcement.formAnnouncement') }}">Add Announcement</a>
                    </div>
             
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">skills Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                                 <tbody>
                                    @foreach ($announcements as $announcement)
                                        <tr>
                                            <td>{{ $announcement->title }}</td>
                                            <td>{{ $announcement->content }}</td>
                                            <td>{{ $announcement->compagnie->name }}</td>
                                            <td>{{ $announcement->user->name }}</td>
                                            <td>
                                                @foreach($announcement->skills as $skill)
                                                    <span style="color: aliceblue" class="skill-background-{{ $loop->index }}">{{ $skill->name }}</span>
                                                    @unless($loop->last)
                                                        <br> <!-- Ajoutez une ligne vide sauf pour la dernière compétence -->
                                                    @endunless
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('Announcement.destroy', $announcement->id) }}" method="POST">
                                                    <a class="btn btn-success" href="{{ route('Announcement.edit', $announcement->id) }}">Update</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                             
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            
            <!-- Recent Sales End -->

       
           
            <!-- Widgets Start -->
     
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/lib/chart/chart.min.js')}}"></script>
    <script src="{{ asset('js/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('js/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('js/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('js/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/js/main.js')}}"></script>
</body>

</html>