@extends('layouts.portal')

@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')
<div class="card" style="max-width:600px; margin:auto;">
    <h3 style="margin-bottom:20px;">Notification Preferences</h3>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
        <span>Email Notifications</span>
        <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
        </label>
    </div>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
        <span>SMS Notifications</span>
        <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
        </label>
    </div>

    <div style="margin-top:30px;">
        <h3>Change Password</h3>
        <p>(Coming soon after authentication module is added)</p>
        <input type="password" placeholder="New password" style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;">
        <input type="password" placeholder="Confirm password" style="width:100%; padding:10px; margin-bottom:20px; border-radius:6px; border:1px solid #ccc;">
        <button type="submit" style="padding:10px 20px; border:none; background:#2563eb; color:white; border-radius:6px;">Update Password</button>
    </div>
</div>

@endsection

@section('scripts')
<style>
/* Toggle switch styling */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  background-color: #ccc;
  border-radius: 34px;
  top:0;
  left:0;
  right:0;
  bottom:0;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  border-radius: 50%;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2563eb;
}

input:checked + .slider:before {
  transform: translateX(26px);
}
</style>
@endsection
