<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    </head>
    <body>
    
       
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">{{Cache::get('fam')}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('orders')}}">Orders</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('clients')}}">Clients</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{route('login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{route('store')}}">JSON</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($prod as $p)      
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$p->title}}</h5>
                                    <!-- Product price-->
                                    <p>Soni:{{$p->amount}}</p>
                                    <form action="{{route('action')}}" method="post">
                                        @csrf
                                        <div class="increm">
                                            <input type="button" id="buttonCountPlus" value="+">
                                            <div id="buttonCountNumber" class="mx-2">1</div>
                                            <input type="button" id="buttonCountMinus" value="-">
                                        
                                        <input type="hidden" value="1" id="num" name="num">
                                        <input type="hidden" value="{{$p->id}}" name="prID">
                                        <input type="hidden" value="{{Cache::get('ism')}}"  name="ism">

                                        </div>
                                        <input type="submit" value="BUY" class="btn btn-primary mt-2" onclick="return confirm('Tasdiqlaysizmi ?')">
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   

                
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets/js/script.js')}}"></script>
<script>
            let buttonCountPlus = document.getElementById("buttonCountPlus");
            let buttonCountMinus = document.getElementById("buttonCountMinus");
            let count = document.getElementById("buttonCountNumber");
            let count2 = document.getElementById("num");
            let number = 1;
            

            buttonCountPlus.onclick = function() {
               
                    number++;
                    count.innerHTML = number;
            };

            buttonCountMinus.onclick = function() {
                number--;
                count.innerHTML = number;
            };
        </script>
    </body>
</html>
