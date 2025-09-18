@extends('layouts.portal')

@section('title', 'Claim Details')
@section('page-title', 'Claim Details')

@section('content')
<div class="card">
    <h3 style="margin-bottom:15px;">Claim Information</h3>
    <p><strong>Claim ID:</strong> #101</p>
    <p><strong>Type:</strong> Microinsurance Claim</p>
    <p><strong>Description:</strong> Accident damage claim for vehicle</p>
    <p><strong>Amount:</strong> $1,200</p>
    <p><strong>Date Submitted:</strong> 2025-08-20</p>
</div>

<div class="card">
    <h3 style="margin-bottom:15px;">Case Timeline</h3>
    <ul style="list-style:none; padding-left:0;">
        <li style="margin-bottom:10px;"><strong>Submitted:</strong> 2025-08-20</li>
        <li style="margin-bottom:10px;"><strong>Under Review:</strong> 2025-08-21</li>
        <li style="margin-bottom:10px;"><strong>Closed:</strong> Pending</li>
    </ul>
</div>

<div class="card">
    <h3 style="margin-bottom:15px;">Documents</h3>
    <ul style="list-style:none; padding-left:0;">
        <li style="margin-bottom:10px;">Accident Report <a href="#" style="color:#2563eb; margin-left:10px;">View</a> <a href="#" style="color:#16a34a; margin-left:5px;">Download</a></li>
        <li style="margin-bottom:10px;">Insurance Policy <a href="#" style="color:#2563eb; margin-left:10px;">View</a> <a href="#" style="color:#16a34a; margin-left:5px;">Download</a></li>
    </ul>
</div>

<div class="card">
    <h3 style="margin-bottom:15px;">Notes</h3>
    <textarea placeholder="Add notes..." style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; margin-bottom:10px;"></textarea>
    <button style="padding:10px 20px; border:none; background:#2563eb; color:white; border-radius:4px;">Submit Note</button>
</div>
@endsection
