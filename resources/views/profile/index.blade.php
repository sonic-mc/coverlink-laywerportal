@extends('layouts.portal')

@section('title', 'Profile')
@section('page-title', 'Profile')

@section('content')
<div class="card" style="max-width:600px; margin:auto;">
    <h3 style="margin-bottom:20px;">Profile Information</h3>
    
    <div style="text-align:center; margin-bottom:20px;">
        <img id="profilePic" src="https://via.placeholder.com/100" style="border-radius:50%; width:100px; height:100px; margin-bottom:10px;">
        <br>
        <button onclick="document.getElementById('picInput').click()" style="padding:8px 15px; border:none; background:#2563eb; color:white; border-radius:6px;">Change Picture</button>
        <input type="file" id="picInput" style="display:none;" accept="image/*" onchange="previewPic(event)">
    </div>

    <form>
        <label>Name:</label><br>
        <input type="text" value="John Lawyer" style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;"><br>

        <label>Email:</label><br>
        <input type="email" value="john.lawyer@example.com" style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;"><br>

        <label>Phone:</label><br>
        <input type="text" value="+263 785 862 182" style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;"><br>

        <label>Specialization:</label><br>
        <input type="text" value="Microinsurance Claims" style="width:100%; padding:10px; margin-bottom:20px; border-radius:6px; border:1px solid #ccc;"><br>

        <button type="submit" style="padding:10px 20px; border:none; background:#2563eb; color:white; border-radius:6px;">Save Changes</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
function previewPic(event){
    const output = document.getElementById('profilePic');
    output.src = URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection
