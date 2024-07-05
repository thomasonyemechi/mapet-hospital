<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/theme.min.css">
    <title>Sign in</title>
    @laravelPWA
</head>

<body>
    <!-- Page content -->
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow " style="border: 2px solid green " >
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <h1 class="mb-1 fw-bold">Gain Access
                            </h1>
                        </div>


                        @if (session('success'))
                            <div class="alert alert-success refresh">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger refresh">
                                {{ session('error') }}
                            </div>
                        @endif



                        <form method="POST" action="/login"> @csrf
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" value="{{ old('email') }}" name="email"
                                    placeholder="Email address here" required>

                                @error('email')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="**************" required>
                                    @error('password')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <!-- Checkbox -->

                            <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" name="remeber" value="1" class="form-check-input" id="rememberme">
                                    <label class="form-check-label " for="rememberme">Remember me</label>
                                </div>
                                <div>
                                </div>
                            </div>


                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" name="login" class="btn btn-primary ">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/theme.min.js"></script>
    <script>
  
    </script>
</body>


</html>
