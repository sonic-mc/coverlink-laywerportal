@extends('layouts.portal')

@section('title', 'Members')
@section('page-title', 'Members')

@section('content')
<div class="card">
    <h3 style="margin-bottom:15px;">Search Members</h3>
    
    <!-- Search Bar -->
    <input 
        type="text" 
        id="memberSearch" 
        placeholder="Type a name, email, or phone..." 
        style="width:100%; padding:10px; margin-bottom:20px; border-radius:6px; border:1px solid #ccc;"
    >

    <!-- Results will appear here -->
    <div id="results"></div>
</div>

<!-- Inline Script -->
<script>
    document.getElementById('memberSearch').addEventListener('keyup', function() {
        let query = this.value.trim();

        let resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';

        if(query.length > 2) { 
            // Example mock data with full attributes
            let mockMembers = [
                {
                    id: 1, 
                    ID: "1234-456-14",
                    fullName: "Jane Doe", 
                    gender: "Female", 
                    dob: "1990-04-12", 
                    nationality: "Zimbabwean", 
                    email: "jane@example.com", 
                    phone: "+263 771 111 222"
                },
                {
                    id: 2, 
                    ID: "1234-456-74",
                    fullName: "John Smith", 
                    gender: "Male", 
                    dob: "1985-09-23", 
                    nationality: "South African", 
                    email: "john@example.com", 
                    phone: "+27 82 345 6789"
                },
                {
                    id: 3, 
                    ID: "1234-456-55",
                    fullName: "Alice Johnson", 
                    gender: "Female", 
                    dob: "1992-02-05", 
                    nationality: "Botswanan", 
                    email: "alice@example.com", 
                    phone: "+267 71 123 456"
                },
            ];

            let filtered = mockMembers.filter(m => 
                m.fullName.toLowerCase().includes(query.toLowerCase()) ||
                m.email.toLowerCase().includes(query.toLowerCase()) ||
                m.phone.toLowerCase().includes(query.toLowerCase())
            );

            if(filtered.length > 0) {
                let table = `<table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background:#f3f4f6;">
                            <th style="padding:10px; border-bottom:1px solid #ddd;">ID</th>
                            <th style="padding:10px; border-bottom:1px solid #ddd;">Full Name</th>
                            <th style="padding:10px; border-bottom:1px solid #ddd;">Gender</th>
                            <th style="padding:10px; border-bottom:1px solid #ddd;">Date of Birth</th>
                            <th style="padding:10px; border-bottom:1px solid #ddd;">Nationality</th>
                            <th style="padding:10px; border-bottom:1px solid #ddd;">Email</th>
                            <th style="padding:10px; border-bottom:1px solid #ddd;">Phone Number</th>
                            <th style="padding:10px; border-bottom:1px solid #ddd;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>`;
                
                filtered.forEach(m => {
                    table += `
                        <tr>
                            <td style="padding:10px; border-bottom:1px solid #eee;">${m.ID}</td>
                            <td style="padding:10px; border-bottom:1px solid #eee;">${m.fullName}</td>
                            <td style="padding:10px; border-bottom:1px solid #eee;">${m.gender}</td>
                            <td style="padding:10px; border-bottom:1px solid #eee;">${m.dob}</td>
                            <td style="padding:10px; border-bottom:1px solid #eee;">${m.nationality}</td>
                            <td style="padding:10px; border-bottom:1px solid #eee;">${m.email}</td>
                            <td style="padding:10px; border-bottom:1px solid #eee;">${m.phone}</td>
                            <td style="padding:10px; border-bottom:1px solid #eee;">
                                <a href="/members/${m.id}" style="color:#2563eb; text-decoration:none; margin-right:8px;">View</a>
                            </td>
                        </tr>
                    `;
                });

                table += `</tbody></table>`;
                resultsDiv.innerHTML = table;
            } else {
                resultsDiv.innerHTML = `<p style="color:#999;">No members found.</p>`;
            }
        }
    });
</script>
@endsection
