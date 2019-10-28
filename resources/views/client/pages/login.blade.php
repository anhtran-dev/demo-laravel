@extends('client.master')
@section('title','Login')
@section('desc','Login')
@section('content')

<!-- Content-->

<div id="maincontainer">
  <section id="product">
    <div class="container">
      <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Login</li>
      </ul>
      <!-- Account Login-->
      <div class="row">  
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Login</span><span class="subtext">First Login here to View All your account information</span></h1>
          <section class="newcustomer">
            <div class="loginbox">
             <form method="post" class="register">
              <div class="form-fields">
                <h2>Register</h2>
                <p class="form-row form-row-wide">
                  <label for="reg_email">Email address <span class="required">*</span></label>
                  <input type="email" class="input-text" name="email" id="reg_email" value="">
                </p>
                <p class="form-row form-row-wide">
                  <label for="reg_password">Password <span class="required">*</span></label>
                  <input type="password" class="input-text" name="password" id="reg_password">
                </p>
                <p class="form-row form-row-wide">
                  <label for="reg_password">Password <span class="required">*</span></label>
                  <input type="password" class="input-text" name="password" id="reg_password">
                </p>
                <div style="left: -999em; position: absolute;">
                  <label for="trap">Anti-spam</label>
                  <input type="text" name="email_2" id="trap" tabindex="-1">
                </div>
              </div>
              <div class="form-action">
                <div class="actions-log">
                  <input type="submit" class="btn btn-orange" name="register" value="Register">
                </div>
              </div>
            </form>
          </div>
        </section>
        <section class="returncustomer">
          <h2>Login</h2>
          <div class="loginbox">
            <form class="form-vertical">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label">E-Mail Address:</label>
                  <div class="controls">
                    <input type="text"  class="span3">
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label">Password:</label>
                  <div class="controls">
                    <input type="text"  class="span3">
                  </div>
                </div>
                <a class="" href="#">Forgotten Password</a>
                <br>
                <br>
                <div class="form-action">
                  <div class="actions-log">
                    <input type="submit" class="btn btn-orange" name="login" value="Login">
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </section>
      </div>

      <!-- Sidebar Start-->
      <aside class="span3">
        <div class="sidewidt">
          <h2 class="heading2"><span>Account</span></h2>
          <ul class="nav nav-list categories">
            <li>
              <a href="#"> My Account</a>
            </li>
            <li>
              <a href="#">Edit Account</a>
            </li>
            <li>
              <a href="#">Password</a>
            </li>
            <li>
              <a href="#">Wish List</a>
            </li>
            <li><a href="#">Order History</a>
            </li>
            <li><a href="#">Downloads</a>
            </li>
            <li><a href="#">Returns</a>
            </li>
            <li>
              <a href="#"> Transactions</a>
            </li>
            <li>
              <a href="category.html">Newsletter</a>
            </li>
            <li>
              <a href="category.html">Logout</a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- Sidebar End-->
    </div>
  </div>
</section>
</div>

@endsection