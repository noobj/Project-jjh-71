@extends('layouts.app')
@section('content')
<div class="login-container">
    <h2 class="login-title">Login</h2>
    <form action="" method="POST">
        <div class="login-input">
            <label>Username</label>
            <input type="text" id="username" name="username" required></input>
        </div>
        <div class="login-input">
            <label>Password</label>
            <input type="password" id="password" name="password" required></input>
        </div>
        <button type="submit" class="login-btn">Login</button>
    </form>
    <p>Don't have an account? <a href="/register">Register here</a></p>
</div>
    
@endsection