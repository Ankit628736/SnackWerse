@extends("layouts.auth")

@section("style")
<style>
  body {
    background: linear-gradient(135deg, #6366f1, #818cf8);
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .auth-card {
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 3rem;
    width: 100%;
    max-width: 420px;
    animation: slideUp 0.5s ease;
  }

  @keyframes slideUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .logo {
    width: 80px;
    margin: 0 auto 1.5rem;
    display: block;
  }

  .form-title {
    text-align: center;
    font-weight: 700;
    color: #4f46e5;
    margin-bottom: 0.5rem;
  }

  .form-subtitle {
    text-align: center;
    font-size: 0.95rem;
    color: #6b7280;
    margin-bottom: 2rem;
  }

  .form-control:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
  }

  .btn-custom {
    background-color: #6366f1;
    color: #fff;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
  }

  .btn-custom:hover {
    background-color: #4f46e5;
    transform: translateY(-2px);
  }

  .form-footer {
    font-size: 0.875rem;
    color: #9ca3af;
    text-align: center;
    margin-top: 2rem;
  }

  .alert {
    font-size: 0.9rem;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1.5rem;
  }
</style>
@endsection

@section("content")
<main class="auth-card">
  <form method="POST" action="{{ route('login.post') }}">
    @csrf

    <img class="logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo">

    <h2 class="form-title">Welcome Back</h2>
    <p class="form-subtitle">Login to access your account</p>

    @if (session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="email" required>
      @error('email')
      <div class="text-danger small mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="password" required>
      @error('password')
      <div class="text-danger small mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-check mb-3">
      <input name="rememberme" class="form-check-input" type="checkbox" id="rememberMe">
      <label class="form-check-label" for="rememberMe">
        Remember me
      </label>
    </div>

    <button class="btn btn-custom w-100 mb-3" type="submit">
      Sign In
    </button>

    <div class="text-center">
      <a href="{{ route('register') }}" class="text-decoration-none text-primary fw-semibold">
        Don't have an account? Register
      </a>
    </div>

    <p class="form-footer">&copy; 2017–{{ date('Y') }} Your Company</p>
  </form>
</main>
@endsection
