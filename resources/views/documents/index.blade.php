@extends('layouts.portal')

@section('title', 'Documents')
@section('page-title', 'Documents')

@section('content')

<!-- Upload Section -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Upload Document</h5>
        <button class="btn btn-sm btn-outline-primary" onclick="fileInput.click()">
            <i class="fas fa-upload me-1"></i> Browse
        </button>
    </div>
    <div class="card-body">
        <form id="uploadForm">
            <div id="dropArea" class="upload-dropzone">
                <i class="fas fa-cloud-upload-alt fa-2x mb-2 text-primary"></i>
                <p>Drag & drop files here or click to browse</p>
            </div>
            <input type="file" id="fileInput" style="display:none;">
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
    </div>
</div>

<div class="card" style="margin-top:20px;">
    <h3 style="margin-bottom:15px;">Uploaded Documents</h3>
    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background:#f3f4f6;">
                <th style="padding:10px; border-bottom:1px solid #ddd;">Name</th>
                <th style="padding:10px; border-bottom:1px solid #ddd;">Type</th>
                <th style="padding:10px; border-bottom:1px solid #ddd;">Date Uploaded</th>
                <th style="padding:10px; border-bottom:1px solid #ddd;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:10px; border-bottom:1px solid #eee;">Accident Report.pdf</td>
                <td style="padding:10px; border-bottom:1px solid #eee;">PDF</td>
                <td style="padding:10px; border-bottom:1px solid #eee;">2025-08-20</td>
                <td style="padding:10px; border-bottom:1px solid #eee;">
                    <button onclick="previewDocument('Accident Report.pdf')" style="padding:5px 10px; background:#2563eb; color:white; border:none; border-radius:4px;">View</button>
                    <button style="padding:5px 10px; background:#16a34a; color:white; border:none; border-radius:4px; margin-left:5px;">Download</button>
                </td>
            </tr>
            <tr>
                <td style="padding:10px; border-bottom:1px solid #eee;">Insurance Policy.pdf</td>
                <td style="padding:10px; border-bottom:1px solid #eee;">PDF</td>
                <td style="padding:10px; border-bottom:1px solid #eee;">2025-08-19</td>
                <td style="padding:10px; border-bottom:1px solid #eee;">
                    <button onclick="previewDocument('Insurance Policy.pdf')" style="padding:5px 10px; background:#2563eb; color:white; border:none; border-radius:4px;">View</button>
                    <button style="padding:5px 10px; background:#16a34a; color:white; border:none; border-radius:4px; margin-left:5px;">Download</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="previewModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center;">
    <div style="background:#fff; padding:20px; border-radius:8px; width:80%; max-width:600px; position:relative;">
        <span onclick="closeModal()" style="position:absolute; top:10px; right:15px; cursor:pointer; font-weight:bold; font-size:20px;">&times;</span>
        <h3 id="docTitle" style="margin-bottom:15px;">Document Preview</h3>
        <iframe id="docFrame" src="" style="width:100%; height:400px;" frameborder="0"></iframe>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Drag & Drop
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');

    dropArea.addEventListener('click', () => fileInput.click());

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.style.borderColor = '#2563eb';
        dropArea.style.background = '#f0faff';
    });

    dropArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropArea.style.borderColor = '#ccc';
        dropArea.style.background = 'transparent';
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.style.borderColor = '#ccc';
        dropArea.style.background = 'transparent';
        fileInput.files = e.dataTransfer.files;
    });

    // Modal
    function previewDocument(filename) {
        document.getElementById('docTitle').innerText = filename;
        // For demo, we can just load a placeholder PDF
        document.getElementById('docFrame').src = 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf';
        document.getElementById('previewModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('previewModal').style.display = 'none';
        document.getElementById('docFrame').src = '';
    }
</script>
@endsection
